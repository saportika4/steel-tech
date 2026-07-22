@if ($products->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
        </div>

        {{ $products->links() }}
    </div>
@endif
