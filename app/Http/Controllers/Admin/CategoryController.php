<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Top-level categories with their children and product counts
        $categories = Category::with(['children' => function ($q) {
                $q->withCount('products')->orderBy('name');
            }])
            ->withCount('products')
            ->parents()
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        // For the "parent" dropdown in create/edit modals
        $parentOptions = Category::parents()->orderBy('name')->get(['id', 'name']);

        return view('admin.categories.index', compact('categories', 'parentOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255', 'unique:categories,name'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);

        // Prevent assigning a subcategory as parent (max 1 level deep)
        if (!empty($validated['parent_id'])) {
            $parent = Category::findOrFail($validated['parent_id']);
            if ($parent->parent_id !== null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Subcategories cannot be nested more than one level deep.',
                ], 422);
            }
        }

        $slug = $this->generateUniqueSlug(Str::slug($validated['name']));

        $category = Category::create([
            'name'      => $validated['name'],
            'slug'      => $slug,
            'icon'      => 'fa-cross',
            'is_active' => true,
            'parent_id' => $validated['parent_id'] ?? null,
        ]);

        return response()->json([
            'success'  => true,
            'message'  => 'Category created successfully.',
            'category' => $category->load('parent'),
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'      => [
                'required', 'string', 'max:255',
                Rule::unique('categories', 'name')->ignore($category->id),
            ],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);

        // Cannot set own children or self as parent
        if (!empty($validated['parent_id'])) {
            if ($validated['parent_id'] == $category->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'A category cannot be its own parent.',
                ], 422);
            }

            $parent = Category::findOrFail($validated['parent_id']);
            if ($parent->parent_id !== null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Subcategories cannot be nested more than one level deep.',
                ], 422);
            }

            // Prevent moving a parent that has children to be a child
            if ($category->hasChildren()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This category has subcategories and cannot be moved under another category.',
                ], 422);
            }
        }

        $slug = $this->generateUniqueSlug(Str::slug($validated['name']), $category->id);

        $category->update([
            'name'      => $validated['name'],
            'slug'      => $slug,
            'parent_id' => $validated['parent_id'] ?? null,
        ]);

        return response()->json([
            'success'  => true,
            'message'  => 'Category updated successfully.',
            'category' => $category->fresh()->load('parent'),
        ]);
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'This category cannot be deleted because it has products assigned.',
            ], 422);
        }

        if ($category->hasChildren()) {
            return response()->json([
                'success' => false,
                'message' => 'This category has subcategories. Please delete or reassign them first.',
            ], 422);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.',
        ]);
    }

    public function toggleStatus(Category $category)
    {
        $category->update([
            'is_active' => !$category->is_active,
        ]);

        return response()->json([
            'success'   => true,
            'message'   => $category->is_active
                ? 'Category activated successfully.'
                : 'Category deactivated successfully.',
            'is_active' => $category->is_active,
        ]);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────

    private function generateUniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $original = $slug;
        $counter  = 1;

        while (
            Category::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }
}
