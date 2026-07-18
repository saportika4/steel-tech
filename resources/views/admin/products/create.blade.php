@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')
<div class="panel">
    <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Add New Product</h5>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-danger gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
            Cancel
        </a>
    </div>

    @include('admin.products.partials.form')
</div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            const icon = document.querySelector('#imagePreviewContainer svg');
            if (icon) icon.classList.add('hidden');
            document.getElementById('fileName').textContent = 'Selected: ' + file.name;
        }
        reader.readAsDataURL(file);
    }
}

$(document).ready(function () {
    $('#addCategoryBtn').on('click', function () {
        openQuickCategoryDrawer(function (category) {
            const $select = $('#category_id');
            $select.append($('<option>', { value: category.id, text: category.name }));
            $select.val(category.id);

            Swal.fire({
                icon: 'success',
                title: 'Category created',
                text: `"${category.name}" is now selected.`,
                confirmButtonColor: '#fea935',
                timer: 1500,
                showConfirmButton: false
            });
        });
    });

    $('#createProductForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.html();

        submitBtn.prop('disabled', true).html('<span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 inline-block align-middle mr-2"></span>Creating...');

        $.ajax({
            url: '{{ route("admin.products.store") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message || 'Product created successfully',
                    confirmButtonColor: '#fea935',
                    timer: 1800
                }).then(() => {
                    window.location.href = '{{ route("admin.products.index") }}';
                });
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false).html(originalText);

                let errorMsg = 'Failed to create product.';
                if (xhr.responseJSON?.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                } else if (xhr.responseJSON?.message) {
                    errorMsg = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: errorMsg,
                    confirmButtonColor: '#fea935'
                });
            }
        });
    });
});
</script>
@endpush
