@if($products->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products
        </div>
        {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
    </div>
@endif
