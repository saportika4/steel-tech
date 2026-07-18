<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\ContactEnquiryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class PageController extends Controller
{
    public function home()
    {
        $categories = Category::active()->parents()->orderBy('sort_order')->get();
        $featuredProducts = Product::active()->featured()->with('category')->take(8)->get();

        return view('home', compact('categories', 'featuredProducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function products()
    {
        $categories = Category::active()->parents()->orderBy('sort_order')->get();

        return view('products', compact('categories'));
    }

    /**
     * AJAX endpoint for filtered + paginated product grid on the Products page.
     */
    public function productsAjax(Request $request)
    {
        $request->validate([
            'category' => ['nullable', 'string', 'max:255'],
            'page' => ['nullable', 'integer', 'min:1'],
        ]);

        $perPage = 9;
        $page = (int) $request->input('page', 1);
        $slug = $request->input('category');

        $query = Product::active()->with('category');

        if (!empty($slug)) {
            $query->whereHas('category', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        $paginator = $query->orderBy('sort_order')
            ->paginate($perPage, ['*'], 'page', $page);

        $products = $paginator->getCollection()->map(function ($product) {
            return [
                'name' => $product->name,
                'image' => $product->image ? asset('storage/' . $product->image) : asset('assets/images/gallery-1.jpg'),
                'url' => route('products', $product->slug),
                'category' => $product->category->name ?? '',
            ];
        });

        return response()->json([
            'products' => $products,
            'has_more' => $paginator->hasMorePages(),
            'next_page' => $page + 1,
            'total' => $paginator->total(),
        ]);
    }

    public function productsByCategory(Category $category)
    {
        $products = $category->products()->active()->paginate(12);
        $categories = Category::active()->parents()->orderBy('sort_order')->get();

        return view('products.category', compact('category', 'products', 'categories'));
    }

    public function productShow(Product $product)
    {
        $product->load('category');
        $related = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'related'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactSubmit(Request $request)
    {
        $data = $request->validate([
            'fname'   => 'required|string|max:255',
            'lname'   => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        try {

            Mail::to('cncsteeltechblr@gmail.com')
                ->send(new ContactEnquiryMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Your enquiry has been submitted successfully.'
            ]);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
