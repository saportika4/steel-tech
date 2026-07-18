{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div>
    <ul class="flex space-x-2 rtl:space-x-reverse mb-6">
        <li>
            <span class="text-primary font-semibold">Dashboard</span>
        </li>
    </ul>

    <div class="pt-5">

        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-6" id="stats-grid">

            {{-- Total Products --}}
            <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                <div class="flex justify-between items-start">
                    <div class="text-md font-semibold text-white-light">Total Products</div>
                    <svg class="w-8 h-8 opacity-40 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z"/>
                    </svg>
                </div>
                <div class="text-4xl font-bold mt-5 text-white-light js-stat" data-stat="totalProducts">
                    {{ $totalProducts }}
                </div>
                <div class="mt-5 text-white-light">
                    <a href="{{ route('admin.products.index') }}" class="text-white-light hover:underline text-sm font-semibold">
                        View All Products →
                    </a>
                </div>
            </div>

            {{-- Active Products --}}
            <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                <div class="flex justify-between items-start">
                    <div class="text-md font-semibold text-white-light">Active Products</div>
                    <svg class="w-8 h-8 opacity-40 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-4xl font-bold mt-5 text-white-light js-stat" data-stat="activeProducts">
                    {{ $activeProducts }}
                </div>
                <div class="mt-5 text-white-light text-sm font-semibold">
                    <span class="js-stat-pct" data-of="totalProducts" data-val="{{ $activeProducts }}">
                        {{ number_format(($activeProducts / max($totalProducts, 1)) * 100, 1) }}%
                    </span>
                    of total
                </div>
            </div>

            {{-- Inactive Products --}}
            <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                <div class="flex justify-between items-start">
                    <div class="text-md font-semibold text-white-light">Inactive Products</div>
                    <svg class="w-8 h-8 opacity-40 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/>
                    </svg>
                </div>
                <div class="text-4xl font-bold mt-5 text-white-light js-stat" data-stat="inactiveProducts">
                    {{ $inactiveProducts }}
                </div>
                <div class="mt-5 text-white-light text-sm font-semibold">
                    <span class="js-stat-pct" data-of="totalProducts" data-val="{{ $inactiveProducts }}">
                        {{ number_format(($inactiveProducts / max($totalProducts, 1)) * 100, 1) }}%
                    </span>
                    of total
                </div>
            </div>

            {{-- Featured --}}
            <div class="panel bg-gradient-to-r from-amber-500 to-amber-400">
                <div class="flex justify-between items-start">
                    <div class="text-md font-semibold text-white-light">Featured Products</div>
                    <svg class="w-8 h-8 opacity-40 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <div class="text-4xl font-bold mt-5 text-white-light js-stat" data-stat="featuredProducts">
                    {{ $featuredProducts }}
                </div>
                <div class="mt-5 text-white-light text-sm font-semibold">Pinned on homepage</div>
            </div>

            {{-- In Stock --}}
            <div class="panel bg-gradient-to-r from-emerald-500 to-emerald-400">
                <div class="flex justify-between items-start">
                    <div class="text-md font-semibold text-white-light">In Stock</div>
                    <svg class="w-8 h-8 opacity-40 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                </div>
                <div class="text-4xl font-bold mt-5 text-white-light js-stat" data-stat="inStockProducts">
                    {{ $inStockProducts }}
                </div>
                <div class="mt-5 text-white-light text-sm font-semibold">
                    <span class="js-stat-pct" data-of="totalProducts" data-val="{{ $inStockProducts }}">
                        {{ number_format(($inStockProducts / max($totalProducts, 1)) * 100, 1) }}%
                    </span>
                    available
                </div>
            </div>

            {{-- Categories --}}
            <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                <div class="flex justify-between items-start">
                    <div class="text-md font-semibold text-white-light">Categories</div>
                    <svg class="w-8 h-8 opacity-40 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                </div>
                <div class="text-4xl font-bold mt-5 text-white-light js-stat" data-stat="totalCategories">
                    {{ $totalCategories }}
                </div>
                <div class="mt-5 text-white-light">
                    <a href="{{ route('admin.categories.index') }}" class="text-white-light hover:underline text-sm font-semibold">
                        Manage Categories →
                    </a>
                </div>
            </div>

        </div>

        {{-- Recent Products Table --}}
        <div class="panel h-full">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Recent Products</h5>
                <div class="flex items-center gap-3">
                    <button id="refresh-stats-btn"
                            class="btn btn-sm btn-outline-primary flex items-center gap-1"
                            title="Refresh stats">
                        <svg id="refresh-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                        </svg>
                        Refresh
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                       class="font-semibold text-primary hover:text-black dark:hover:text-white-dark">
                        View All
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="recent-products-body">
                        @forelse($recentProducts as $product)
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <img src="{{ $product->image_url }}"
                                         class="w-12 h-12 rounded-lg object-cover"
                                         alt="{{ $product->name }}"
                                         onerror="this.src='{{ asset('assets/images/logo/logo-main.webp') }}'">
                                    <div>
                                        <p class="font-semibold">{{ $product->name }}</p>
                                        <p class="text-xs text-white-dark">
                                            {{ Str::limit($product->description, 40) }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $product->categoryRelation->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <p class="font-bold text-primary">₹{{ number_format($product->price, 2) }}</p>
                                @if($product->offer_price)
                                    <p class="text-xs text-success line-through text-gray-400">
                                        ₹{{ number_format($product->price, 2) }}
                                    </p>
                                    <p class="text-xs text-success">
                                        Offer: ₹{{ number_format($product->offer_price, 2) }}
                                    </p>
                                @endif
                            </td>
                            <td>
                                @if($product->in_stock)
                                    <span class="badge badge-outline-success">In Stock</span>
                                @else
                                    <span class="badge badge-outline-warning">Out of Stock</span>
                                @endif
                            </td>
                            <td>
                                @if($product->is_active)
                                    <span class="badge badge-outline-success">Active</span>
                                @else
                                    <span class="badge badge-outline-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="btn btn-sm btn-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-8">
                                <p class="text-white-dark">
                                    No products yet.
                                    <a href="{{ route('admin.products.create') }}"
                                       class="text-primary hover:underline">
                                        Add your first product
                                    </a>
                                </p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Login success toast ──
    @if(session('login_success'))
    Swal.fire({
        icon: 'success',
        title: 'Welcome back!',
        text: '{{ session('login_success') }}',
        confirmButtonColor: '#4361ee',
        timer: 2500,
        showConfirmButton: false,
        toast: true,
        position: 'top-end',
    });
    @endif

    // ── AJAX stat refresh ──
    const refreshBtn  = document.getElementById('refresh-stats-btn');
    const refreshIcon = document.getElementById('refresh-icon');

    function refreshStats() {
        refreshIcon.style.animation = 'spin 0.6s linear infinite';
        refreshBtn.disabled = true;

        fetch('{{ route("admin.products.stats") }}', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        })
        .then(res => res.json())
        .then(data => {
            // Update all stat numbers
            document.querySelectorAll('.js-stat').forEach(el => {
                const key = el.dataset.stat;
                if (data[key] !== undefined) {
                    el.textContent = data[key];
                }
            });

            // Update percentage labels
            document.querySelectorAll('.js-stat-pct').forEach(el => {
                const ofKey   = el.dataset.of;   // e.g. "totalProducts"
                const statKey = el.closest('[data-stat]') // walk up to card
                    ?.querySelector('.js-stat')?.dataset.stat;

                if (!statKey || !ofKey) return;

                const val   = data[statKey] ?? 0;
                const total = data[ofKey]   ?? 1;
                el.textContent = ((val / Math.max(total, 1)) * 100).toFixed(1) + '%';
            });
        })
        .catch(() => {
            Swal.fire({
                icon: 'error',
                title: 'Refresh failed',
                text: 'Could not load latest stats.',
                confirmButtonColor: '#4361ee',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false,
            });
        })
        .finally(() => {
            refreshIcon.style.animation = '';
            refreshBtn.disabled = false;
        });
    }

    refreshBtn.addEventListener('click', refreshStats);

    // Auto-refresh every 60 seconds
    setInterval(refreshStats, 60_000);

});
</script>

<style>
@keyframes spin { to { transform: rotate(360deg); } }
</style>
@endpush
