@forelse($products as $product)
<tr id="product-{{ $product->id }}">
    <td><strong class="text-primary">#{{ $product->id }}</strong></td>
    <td>
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-16 h-16 rounded-lg object-cover">
    </td>
    <td>
        <div class="font-semibold">{{ $product->name }}</div>
        @if($product->manufacturer)
            <div class="text-xs text-gray-500 mt-1">{{ $product->manufacturer }}</div>
        @endif
    </td>
    <td>
        @if($product->categoryRelation)
            <span class="badge" style="background: #f77f00; color: #fff;">
                {{ $product->categoryRelation->name }}
            </span>
        @else
            <span class="badge bg-secondary">N/A</span>
        @endif
    </td>
    <td>
        <label class="w-12 h-6 relative">
            <input type="checkbox"
                   class="toggle-status custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                   data-id="{{ $product->id }}"
                   {{ $product->is_active ? 'checked' : '' }}>
            <span class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
        </label>
    </td>
    <td>
        <div class="flex gap-2">
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-info" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
            </a>

            <button onclick='deleteProduct({{ $product->id }}, @json($product->name))'
                    class="btn btn-sm btn-danger"
                    title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-8">
        <div class="text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3 opacity-50">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <p>No products found. <a href="{{ route('admin.products.create') }}" class="text-primary hover:underline">Add your first product</a></p>
        </div>
    </td>
</tr>
@endforelse
