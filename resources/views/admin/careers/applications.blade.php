@extends('layouts.admin')

@section('title', 'Career Applications')

@section('content')
<div class="panel">
    <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Career Applications</h5>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-primary">
            Back to Vacancies
        </a>
    </div>

    <div class="table-responsive">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vacancy</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Resume</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->career->title ?? '-' }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>{{ $application->phone ?: '-' }}</td>
                        <td>
                            @if($application->resume_url)
                                <a href="{{ $application->resume_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    View Resume
                                </a>
                            @endif
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($application->message, 50) }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteApplication({{ $application->id }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-8 text-white-dark">No applications found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        {{ $applications->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteApplication(id) {
    Swal.fire({
        title: 'Delete Application?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545'
    }).then((r) => {
        if (r.isConfirmed) {
            $.ajax({
                url: `/admin/career-applications/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (resp) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: resp.message,
                        timer: 1500
                    }).then(() => location.reload());
                }
            });
        }
    });
}
</script>
@endpush
