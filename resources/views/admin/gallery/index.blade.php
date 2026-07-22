@extends('layouts.admin')

@section('title', 'Gallery Management')

@push('styles')
<style>
    .pagination-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .pagination li:first-child span,
    .pagination li:first-child a,
    .pagination li:last-child span,
    .pagination li:last-child a {
        display: none;
    }

    .pagination-info {
        color: #888;
        font-size: 14px;
    }

    .pagination {
        display: flex;
        list-style: none;
        gap: 5px;
        margin: 0;
        padding: 0;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination a,
    .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 38px;
        padding: 0 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .pagination a {
        background: #fff;
        border: 1px solid #e0e0e0;
        color: #333;
    }

    .pagination a:hover {
        background: #fea935;
        border-color: #fea935;
        color: #fff;
        transform: translateY(-2px);
    }

    .pagination .active span {
        background: linear-gradient(135deg, #fea935, #e59420);
        border: 1px solid #fea935;
        color: #fff;
        box-shadow: 0 4px 12px rgba(254, 169, 53, 0.3);
    }

    .pagination .disabled span {
        background: #f5f5f5;
        border: 1px solid #e0e0e0;
        color: #ccc;
        cursor: not-allowed;
    }

    .sortable {
        cursor: pointer;
        user-select: none;
        position: relative;
        padding-right: 25px !important;
        transition: all 0.3s;
    }

    .sortable:hover {
        background: rgba(254, 169, 53, 0.1) !important;
    }

    .sortable::after {
        content: '⇅';
        position: absolute;
        right: 10px;
        opacity: 0.3;
        font-size: 14px;
    }

    .sortable.asc::after {
        content: '▲';
        opacity: 1;
        color: var(--brand-color);
    }

    .sortable.desc::after {
        content: '▼';
        opacity: 1;
        color: var(--brand-color);
    }

    .table-loading {
        position: relative;
        pointer-events: none;
        opacity: 0.6;
    }

    .table-loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid var(--brand-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        transform: translate(-50%, -50%);
        z-index: 10;
    }

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    .status-toast-popup {
        padding: 14px 18px !important;
        border-radius: 12px !important;
    }

    .status-toast-title {
        font-size: 15px !important;
        font-weight: 600 !important;
    }
</style>
@endpush

@section('content')
<div class="panel">
    <div class="flex items-center justify-between mb-5">
        <h5 class="font-semibold text-lg dark:text-white-light">Gallery Management</h5>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add New Image
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-6">
        <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400 text-white">
            <div class="flex justify-between">
                <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Total Images</div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3" id="totalCount">{{ $stats['total'] }}</div>
            </div>
        </div>

        <div class="panel bg-gradient-to-r from-violet-500 to-violet-400 text-white">
            <div class="flex justify-between">
                <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Active</div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3" id="activeCount">{{ $stats['active'] }}</div>
            </div>
        </div>

        <div class="panel bg-gradient-to-r from-blue-500 to-blue-400 text-white">
            <div class="flex justify-between">
                <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Inactive</div>
            </div>
            <div class="flex items-center mt-5">
                <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3" id="inactiveCount">{{ $stats['inactive'] }}</div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="mb-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <input type="text" id="searchInput" class="form-input" placeholder="Search by title...">
            </div>
            <div>
                <select id="statusFilter" class="form-select">
                    <option value="">All Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Gallery Table -->
    <div class="table-responsive mb-5" id="tableContainer">
        <table class="table-hover">
            <thead>
                <tr>
                    <th class="sortable" data-column="id">ID</th>
                    <th>Image</th>
                    <th class="sortable" data-column="title">Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="galleryTableBody">
                @include('admin.gallery.partials.table-rows', ['galleries' => $galleries])
            </tbody>
        </table>
    </div>

    <div id="paginationContainer">
        @include('admin.gallery.partials.pagination', ['galleries' => $galleries])
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let currentSort = { column: 'id', direction: 'desc' };
    let filters = {
        search: '',
        status: ''
    };
    let debounceTimer;
    let ajaxRequest = null;

    $('.sortable').on('click', function() {
        const column = $(this).data('column');

        if (currentSort.column === column) {
            currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
        } else {
            currentSort.column = column;
            currentSort.direction = 'asc';
        }

        updateSortIcons($(this));
        loadGallery();
    });

    $('#searchInput').on('keyup', function() {
        clearTimeout(debounceTimer);
        filters.search = $(this).val();

        debounceTimer = setTimeout(function() {
            loadGallery();
        }, 500);
    });

    $('#statusFilter').on('change', function() {
        filters.status = $(this).val();
        loadGallery();
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        if (url) {
            loadGallery(url);
        }
    });

    function loadGallery(url = null) {
        const loadUrl = url || '{{ route("admin.gallery.index") }}';

        if (ajaxRequest && ajaxRequest.readyState !== 4) {
            ajaxRequest.abort();
        }

        $('#tableContainer').addClass('table-loading');

        ajaxRequest = $.ajax({
            url: loadUrl,
            type: 'GET',
            data: {
                ...filters,
                sort_by: currentSort.column,
                sort_direction: currentSort.direction,
                ajax: true
            },
            success: function(response) {
                $('#galleryTableBody').html(response.html);
                $('#paginationContainer').html(response.pagination);
                $('#tableContainer').removeClass('table-loading');

                animateCount('#totalCount', response.stats.total);
                animateCount('#activeCount', response.stats.active);
                animateCount('#inactiveCount', response.stats.inactive);
            },
            error: function(xhr) {
                if (xhr.statusText !== 'abort') {
                    $('#tableContainer').removeClass('table-loading');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to load gallery',
                        confirmButtonColor: '#fea935'
                    });
                }
            }
        });
    }

    function animateCount(selector, newValue) {
        const $element = $(selector);
        const currentValue = parseInt($element.text()) || 0;

        if (currentValue === newValue) return;

        $({ count: currentValue }).animate(
            { count: newValue },
            {
                duration: 500,
                easing: 'swing',
                step: function() {
                    $element.text(Math.floor(this.count));
                },
                complete: function() {
                    $element.text(newValue);
                }
            }
        );
    }

    function updateSortIcons(clickedTh) {
        $('.sortable').removeClass('asc desc');
        clickedTh.addClass(currentSort.direction);
    }

    $(document).on('change', '.toggle-status', function() {
        const galleryId = $(this).data('id');
        const isActive = $(this).is(':checked');
        const toggle = $(this);

        $.ajax({
            url: `/admin/gallery/${galleryId}/toggle-status`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                is_active: isActive ? 1 : 0
            },
            beforeSend: function() {
                toggle.prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        width: '460px',
                        customClass: {
                            popup: 'status-toast-popup',
                            title: 'status-toast-title'
                        },
                        showConfirmButton: false,
                        timer: 1800,
                        timerProgressBar: true
                    });

                    loadGallery();
                }
                toggle.prop('disabled', false);
            },
            error: function(xhr) {
                toggle.prop('checked', !isActive);
                toggle.prop('disabled', false);

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update status',
                    confirmButtonColor: '#fea935'
                });
            }
        });
    });

    window.deleteGallery = function(id, title) {
        Swal.fire({
            title: 'Delete Image?',
            html: `Are you sure you want to delete <strong>${title}</strong>?<br>This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleting...',
                    text: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: `/admin/gallery/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.message || 'Image deleted successfully',
                            confirmButtonColor: '#fea935',
                            timer: 2000
                        }).then(() => {
                            loadGallery();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to delete image',
                            confirmButtonColor: '#fea935'
                        });
                    }
                });
            }
        });
    };
});
</script>
@endpush
