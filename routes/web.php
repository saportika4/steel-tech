<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Category;
use App\Models\Product;

// ── Public Site ──────────────────────────────────────────────
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Products listing (category grid) + single category page
Route::get('/products/ajax', [PageController::class, 'productsAjax'])->name('products.ajax');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/{category:slug}', [PageController::class, 'productsByCategory'])->name('products.category');
Route::get('/product/{product:slug}', [PageController::class, 'productShow'])->name('products.show');

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
