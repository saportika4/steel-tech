@extends('layouts.admin')

@section('title', 'Create Vacancy')

@section('content')
<div class="panel">
    <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Create Vacancy</h5>
    </div>

    @include('admin.careers.partials.form')
</div>
@endsection

@push('scripts')
<script>
$('#createCareerForm').on('submit', function (e) {
    e.preventDefault();

    const formData = $(this).serialize();

    $.post('{{ route('admin.careers.store') }}', formData, function (response) {
        Swal.fire({
            icon: 'success',
            title: 'Created!',
            text: response.message,
            timer: 1500
        }).then(() => {
            window.location = '{{ route('admin.careers.index') }}';
        });
    }).fail(function (xhr) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            html: Object.values(xhr.responseJSON?.errors || { error: ['Something went wrong'] }).flat().join('<br>')
        });
    });
});
</script>
@endpush
