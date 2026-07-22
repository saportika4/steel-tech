@if($careers->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Showing {{ $careers->firstItem() }} to {{ $careers->lastItem() }} of {{ $careers->total() }} results
        </div>

        {{ $careers->links() }}
    </div>
@endif
