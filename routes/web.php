<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PageController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// ── Public Site ──────────────────────────────────────────────
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Products listing (category grid) + single category page
Route::get('/products/ajax', [PageController::class, 'productsAjax'])->name('products.ajax');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/category/{category:slug}', [PageController::class, 'productsByCategory'])->name('products.category');
Route::get('/products/{slug}', [PageController::class, 'productShow'])->name('products.show');

// Public Gallery Routes
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/gallery/ajax', [PageController::class, 'galleryAjax'])->name('gallery.ajax');

Route::get('/careers', [PageController::class, 'careers'])->name('careers');
Route::get('/careers/ajax', [PageController::class, 'careersAjax'])->name('careers.ajax');
Route::get('/careers/{career:slug}', [PageController::class, 'careerShow'])->name('careers.show');
Route::post('/careers/{career:slug}/apply', [PageController::class, 'careerApply'])->name('careers.apply');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');

// ── Admin ─────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->name('dashboard.stats');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::post('/categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])->name('categories.toggle-status');
        Route::get('/categories/parents', function () {
            return Category::parents()->orderBy('name')->get(['id', 'name']);
        })->name('categories.parents');

        Route::get('/products/stats', [ProductController::class, 'stats'])->name('products.stats');
        Route::resource('products', ProductController::class);
        Route::post('/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggle-status');

        Route::get('gallery/', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('gallery/', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::post('gallery/{gallery}/toggle-status', [GalleryController::class, 'toggleStatus'])->name('gallery.toggle-status');
        Route::delete('gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

        Route::resource('careers', CareerController::class);
        Route::post('careers/{career}/toggle-status', [CareerController::class, 'toggleStatus'])->name('careers.toggle-status');
        Route::get('career-applications', [CareerApplicationController::class, 'index'])->name('career-applications.index');
        Route::delete('career-applications/{careerApplication}', [CareerApplicationController::class, 'destroy'])->name('career-applications.destroy');
    });
});

Route::get('/create-public-storage-link', function () {

    $target = storage_path('app/public');
    $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';

    if (file_exists($link) || is_link($link)) {
        return [
            'success' => false,
            'message' => 'storage already exists',
            'link' => $link,
        ];
    }

    if (symlink($target, $link)) {
        return [
            'success' => true,
            'target' => $target,
            'link' => $link,
        ];
    }

    return [
        'success' => false,
        'message' => 'Failed to create symlink. Symlinks may be disabled by your hosting provider.',
    ];
});
