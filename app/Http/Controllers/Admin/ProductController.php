<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('categoryRelation');

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status') || $request->status === '0') {
            $query->where('is_active', (int) $request->status);
        }

        $sortBy = $request->get('sort_by', 'id');
        $sortDirection = $request->get('sort_direction', 'desc');

        $allowedSorts = ['id', 'name', 'sort_order', 'created_at'];
        $sortDirection = in_array($sortDirection, ['asc', 'desc']) ? $sortDirection : 'desc';

        if ($sortBy === 'category') {
            $query->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*')
                ->orderBy('categories.name', $sortDirection);
        } elseif (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('id', 'desc');
        }

        $products = $query->paginate(10)->withQueryString();

        $stats = [
            'total' => Product::count(),
            'active' => Product::where('is_active', true)->count(),
            'inactive' => Product::where('is_active', false)->count(),
        ];

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.products.partials.table-rows', compact('products'))->render(),
                'pagination' => view('admin.products.partials.pagination', compact('products'))->render(),
                'stats' => $stats,
            ]);
        }

        return view('admin.products.index', compact('products', 'stats'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name'        => ['required', 'string', 'max:255', 'unique:products,name'],
            'description' => ['nullable', 'string'],
            'image'       => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'is_active'   => ['nullable', 'boolean'],
            'featured'    => ['nullable', 'boolean'],
        ]);

        DB::beginTransaction();

        try {
            $imagePath = $request->file('image')->store('products', 'public');

            $product = Product::create([
                'category_id' => $validated['category_id'],
                'name'        => $validated['name'],
                'slug'        => $this->generateUniqueSlug($validated['name']),
                'description' => $validated['description'] ?? null,
                'image'       => $imagePath,
                'is_active'   => $request->boolean('is_active'),
                'featured'    => $request->boolean('featured'),
                'sort_order'  => 0,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully.',
                'product' => $product,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            if (isset($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            return response()->json(['success' => false, 'message' => 'Failed to create product.'], 500);
        }
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name'        => ['required', 'string', 'max:255', Rule::unique('products', 'name')->ignore($product->id)],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'is_active'   => ['nullable', 'boolean'],
            'featured'    => ['nullable', 'boolean'],
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'category_id' => $validated['category_id'],
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'is_active'   => $request->boolean('is_active'),
                'featured'    => $request->boolean('featured'),
            ];

            if ($product->name !== $validated['name']) {
                $data['slug'] = $this->generateUniqueSlug($validated['name'], $product->id);
            }

            if ($request->hasFile('image')) {
                $newImagePath = $request->file('image')->store('products', 'public');
                $data['image'] = $newImagePath;
            }

            $oldImage = $product->image;
            $product->update($data);

            if (isset($newImagePath) && $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Product updated successfully.']);
        } catch (\Throwable $e) {
            DB::rollBack();
            if (isset($newImagePath)) {
                Storage::disk('public')->delete($newImagePath);
            }
            return response()->json(['success' => false, 'message' => 'Failed to update product.'], 500);
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.',
        ]);
    }

    public function toggleStatus(Request $request, Product $product)
    {
        $product->update([
            'is_active' => $request->boolean('is_active'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product status updated successfully.',
        ]);
    }

    public function stats()
    {
        return response()->json([
            'total' => Product::count(),
            'active' => Product::where('is_active', true)->count(),
            'inactive' => Product::where('is_active', false)->count(),
        ]);
    }

    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 1;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

}
