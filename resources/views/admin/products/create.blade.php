@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')
<div class="panel">
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
        };
        reader.readAsDataURL(file);
    }
}

function refreshSpecIndexes() {
    $('#specificationsWrapper .spec-row').each(function(index) {
        $(this).find('input').eq(0).attr('name', `specifications[${index}][label]`);
        $(this).find('input').eq(1).attr('name', `specifications[${index}][value]`);
    });
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

    $('#addApplicationBtn').on('click', function () {
        $('#applicationsWrapper').append(`
            <div class="repeater-item compact-row application-row">
                <input type="text" name="applications[]" class="form-input" placeholder="Enter application">
                <button type="button" class="repeater-remove-btn remove-row" title="Remove row">×</button>
            </div>
        `);
    });

    $('#addModelBtn').on('click', function () {
        $('#modelsWrapper').append(`
            <div class="repeater-item compact-row model-row">
                <input type="text" name="available_models[]" class="form-input" placeholder="Enter model name">
                <button type="button" class="repeater-remove-btn remove-row" title="Remove row">×</button>
            </div>
        `);
    });

    $('#addSpecBtn').on('click', function () {
        const index = $('#specificationsWrapper .spec-row').length;
        $('#specificationsWrapper').append(`
            <div class="repeater-item spec-row">
                <div class="spec-grid">
                    <input type="text" name="specifications[${index}][label]" class="form-input" placeholder="Specification label">
                    <input type="text" name="specifications[${index}][value]" class="form-input" placeholder="Specification value">
                    <button type="button" class="repeater-remove-btn remove-row" title="Remove specification">×</button>
                </div>
            </div>
        `);
    });

    $(document).on('click', '.remove-row', function () {
        $(this).closest('.application-row, .model-row, .spec-row').remove();
        refreshSpecIndexes();
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
