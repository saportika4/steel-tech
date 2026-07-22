@extends('layouts.admin')

@section('title', 'Careers Management')

@section('content')
<div class="panel">
    <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Careers Management</h5>
        <div class="flex gap-2">
            <a href="{{ route('admin.career-applications.index') }}" class="btn btn-outline-primary">
                Applications
            </a>
            <a href="{{ route('admin.careers.create') }}" class="btn btn-primary">
                Add Vacancy
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-6">
        <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400 text-white">
            <div class="text-md font-semibold">Total Vacancies</div>
            <div class="text-3xl font-bold mt-5" id="totalCount">{{ $stats['total'] }}</div>
        </div>

        <div class="panel bg-gradient-to-r from-violet-500 to-violet-400 text-white">
            <div class="text-md font-semibold">Active</div>
            <div class="text-3xl font-bold mt-5" id="activeCount">{{ $stats['active'] }}</div>
        </div>

        <div class="panel bg-gradient-to-r from-blue-500 to-blue-400 text-white">
            <div class="text-md font-semibold">Inactive</div>
            <div class="text-3xl font-bold mt-5" id="inactiveCount">{{ $stats['inactive'] }}</div>
        </div>
    </div>

    <div class="mb-5 grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" id="searchInput" class="form-input" placeholder="Search by title...">

        <select id="statusFilter" class="form-select">
            <option value="">All Status</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <div class="table-responsive mb-5" id="tableContainer">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Vacancies</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody id="careerTableBody">
                @include('admin.careers.partials.table-rows', ['careers' => $careers])
            </tbody>
        </table>
    </div>

    <div id="paginationContainer">
        @include('admin.careers.partials.pagination', ['careers' => $careers])
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    let filters = {
        search: '',
        status: ''
    };

    let timer;

    function loadData(url = null) {
        $.get(url || '{{ route('admin.careers.index') }}', {
            ...filters,
            ajax: true
        }, function (response) {
            $('#careerTableBody').html(response.html);
            $('#paginationContainer').html(response.pagination);
            $('#totalCount').text(response.stats.total);
            $('#activeCount').text(response.stats.active);
            $('#inactiveCount').text(response.stats.inactive);
        });
    }

    $('#searchInput').on('keyup', function () {
        clearTimeout(timer);
        filters.search = this.value;
        timer = setTimeout(loadData, 400);
    });

    $('#statusFilter').on('change', function () {
        filters.status = this.value;
        loadData();
    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        loadData($(this).attr('href'));
    });

    $(document).on('change', '.toggle-status', function () {
        const id = $(this).data('id');
        const isActive = $(this).is(':checked');

        $.post(`/admin/careers/${id}/toggle-status`, {
            _token: '{{ csrf_token() }}',
            is_active: isActive ? 1 : 0
        }, function (resp) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: resp.message,
                showConfirmButton: false,
                timer: 1500
            });

            loadData();
        });
    });

    window.deleteCareer = function (id, title) {
        Swal.fire({
            title: 'Delete Vacancy?',
            html: `Delete <strong>${title}</strong>?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545'
        }).then((r) => {
            if (r.isConfirmed) {
                $.ajax({
                    url: `/admin/careers/${id}`,
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
                        });

                        loadData();
                    }
                });
            }
        });
    }
});
</script>
@endpush
