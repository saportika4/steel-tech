@if($galleries->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Showing {{ $galleries->firstItem() }} to {{ $galleries->lastItem() }} of {{ $galleries->total() }} images
        </div>
        {{ $galleries->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
    </div>
@endif
