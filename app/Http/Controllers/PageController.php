<?php

namespace App\Http\Controllers;

use App\Mail\ContactEnquiryMail;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


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

        $paginator = $query
            ->orderBy('sort_order')
            ->paginate($perPage, ['*'], 'page', $page);

        $products = $paginator->getCollection()->map(function ($product) {
            return [
                'name' => $product->name,
                'slug' => $product->slug,
                'image' => $product->image ? asset('storage/' . $product->image) : asset('assets/images/gallery-1.jpg'),
                'category' => $product->category->name ?? '',
                'manufacturer' => $product->manufacturer ?? '',
                'url' => route('products.show', $product->slug),
            ];
        })->values();

        return response()->json([
            'products' => $products,
            'has_more' => $paginator->hasMorePages(),
            'next_page' => $paginator->hasMorePages() ? $page + 1 : null,
            'total' => $paginator->total(),
        ]);
    }

    public function productsByCategory(Category $category)
    {
        $products = $category->products()->active()->paginate(12);
        $categories = Category::active()->parents()->orderBy('sort_order')->get();

        return view('products.category', compact('category', 'products', 'categories'));
    }

    public function productShow($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('is_active', 1)
            ->firstOrFail();

        $relatedProducts = Product::with('category')
            ->where('is_active', 1)
            ->where('id', '!=', $product->id)
            ->when($product->category_id, function ($query) use ($product) {
                $query->where('category_id', $product->category_id);
            })
            ->latest()
            ->take(6)
            ->get();

        return view('product-details', compact('product', 'relatedProducts'));
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

    public function gallery()
    {
        return view('gallery');
    }

    public function galleryAjax(Request $request)
    {
        $request->validate(['page' => ['nullable', 'integer', 'min:1']]);

        $perPage = 6;
        $page = (int) $request->input('page', 1);

        $paginator = \App\Models\Gallery::active()->ordered()->paginate($perPage, ['*'], 'page', $page);

        $images = $paginator->getCollection()->map(function ($item) {
            return [
                'title' => $item->title,
                'description' => $item->description,
                'image' => $item->image_url,
            ];
        });

        return response()->json([
            'images' => $images,
            'has_more' => $paginator->hasMorePages(),
            'next_page' => $paginator->hasMorePages() ? $page + 1 : null,
        ]);
    }

    public function careers()
    {
        return view('careers.index');
    }

    public function careerShow(Career $career)
    {
        abort_unless($career->is_active, 404);

        $relatedCareers = Career::active()
            ->where('id', '!=', $career->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('careers.show', compact('career', 'relatedCareers'));
    }

    public function careersAjax(Request $request)
    {
        $request->validate([
            'page' => ['nullable', 'integer', 'min:1'],
        ]);

        $page = (int) $request->input('page', 1);
        $perPage = 6;

        $paginator = Career::active()
            ->ordered()
            ->paginate($perPage, ['*'], 'page', $page);

        $careers = $paginator->getCollection()->map(function ($career) {
            return [
                'title' => $career->title,
                'slug' => $career->slug,
                'location' => $career->location,
                'employment_type' => $career->employment_type,
                'department' => $career->department,
                'vacancies' => $career->vacancies,
                'short_description' => $career->short_description,
                'details_url' => route('careers.show', $career->slug),
                'apply_url' => route('careers.apply', $career->slug),
            ];
        });

        return response()->json([
            'success' => true,
            'careers' => $careers,
            'has_more' => $paginator->hasMorePages(),
            'next_page' => $paginator->hasMorePages() ? $page + 1 : null,
        ]);
    }

    public function careerApply(Request $request, Career $career)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'message' => ['nullable', 'string'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please correct the highlighted fields.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $application = CareerApplication::create([
            'career_id' => $career->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'resume' => $request->file('resume')->store('career-resumes', 'public'),
            'status' => 'new',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your application has been submitted successfully.',
            'data' => [
                'id' => $application->id,
                'career' => $career->title,
            ],
        ]);
    }
}
