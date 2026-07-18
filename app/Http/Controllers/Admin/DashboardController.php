<?php
// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = $this->getStats();
        $recentProducts = Product::with('category')
            ->latest()
            ->take(8)
            ->get();

        return view('admin.dashboard', array_merge($stats, compact('recentProducts')));
    }

    // AJAX endpoint — called by the dashboard cards to refresh live
    public function stats()
    {
        return response()->json($this->getStats());
    }

    private function getStats(): array
    {
        $totalProducts    = Product::count();
        $activeProducts   = Product::where('is_active', true)->count();
        $inactiveProducts = Product::where('is_active', false)->count();
        $featuredProducts = Product::where('featured', true)->count();
        $totalCategories  = Category::count();
        $inStockProducts  = Product::where('in_stock', true)->count();

        return compact(
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'featuredProducts',
            'totalCategories',
            'inStockProducts'
        );
    }
}
