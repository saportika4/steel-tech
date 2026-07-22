@extends('layouts.admin')

@section('title', 'Edit Vacancy')

@section('content')
<div class="panel">
    <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Edit Vacancy</h5>
    </div>

    @include('admin.careers.partials.form', ['career' => $career])
</div>
@endsection

@push('scripts')
<script>
$('#editCareerForm').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route('admin.careers.update', $career) }}',
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: response.message,
                timer: 1500
            }).then(() => {
                window.location = '{{ route('admin.careers.index') }}';
            });
        },
        error: function (xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: Object.values(xhr.responseJSON?.errors || { error: ['Something went wrong'] }).flat().join('<br>')
            });
        }
    });
});
</script>
@endpush
