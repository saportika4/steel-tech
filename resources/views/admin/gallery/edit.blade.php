@extends('layouts.admin')

@section('title', 'Edit Gallery Image')

@section('content')
<div class="panel">
    <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Edit Gallery Image</h5>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-danger gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
            Cancel
        </a>
    </div>

    @include('admin.gallery.partials.form', ['gallery' => $gallery])
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
    $('#editGalleryForm').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.html();

        submitBtn.prop('disabled', true).html('<span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 inline-block align-middle mr-2"></span>Updating...');

        $.ajax({
            url: '{{ route("admin.gallery.update", $gallery->id) }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success', title: 'Updated!',
                    text: response.message || 'Gallery image updated successfully',
                    confirmButtonColor: '#fea935', timer: 1800
                }).then(() => { window.location.href = '{{ route("admin.gallery.index") }}'; });
            },
            error: function(xhr) {
                submitBtn.prop('disabled', false).html(originalText);
                let errorMsg = 'Failed to update gallery image.';
                if (xhr.responseJSON?.errors) errorMsg = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                else if (xhr.responseJSON?.message) errorMsg = xhr.responseJSON.message;
                Swal.fire({ icon: 'error', title: 'Error', html: errorMsg, confirmButtonColor: '#fea935' });
            }
        });
    });
});
</script>
@endpush
