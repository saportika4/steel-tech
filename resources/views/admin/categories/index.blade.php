@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div>
    <div class="mb-5 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Categories Management</h1>
            <p class="mt-1 text-sm text-gray-500">Manage all product categories and subcategories.</p>
        </div>
        <button onclick="openCreateModal()" class="btn btn-primary flex items-center gap-2">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            Add New Category
        </button>
    </div>

    <div class="panel category-panel">
        <div class="mb-5 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <h5 class="text-lg font-semibold">All Categories ({{ $categories->total() }})</h5>
            <input type="text" id="searchInput" class="form-input w-full md:w-80" placeholder="Search categories on this page...">
        </div>

        <div class="table-responsive">
            <table class="table-hover category-table" id="categoriesTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Products Count</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        {{-- Parent Row --}}
                        <tr data-id="{{ $category->id }}" class="parent-row">
                            <td>{{ $categories->firstItem() + $loop->index }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    @if($category->children->isNotEmpty())
                                        <button class="toggle-children btn btn-xs btn-outline-secondary"
                                                data-parent="{{ $category->id }}"
                                                title="Toggle subcategories">
                                            <svg class="chevron-icon" width="14" height="14" viewBox="0 0 24 24" fill="none">
                                                <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        </button>
                                    @else
                                        <span class="inline-block w-6"></span>
                                    @endif
                                    <div>
                                        <div class="font-semibold category-name text-dark">{{ $category->name }}</div>
                                        @if($category->children->isNotEmpty())
                                            <div class="text-xs text-gray-400">{{ $category->children->count() }} subcategories</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-info">{{ $category->products_count }} Products</span></td>
                            <td>
                                <label class="relative h-6 w-12 cursor-pointer">
                                    <input type="checkbox"
                                           class="status-toggle custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0"
                                           {{ $category->is_active ? 'checked' : '' }}
                                           onchange="toggleStatus({{ $category->id }})">
                                    <span class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7"></span>
                                </label>
                            </td>
                            <td>{{ $category->created_at->format('d M, Y') }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}', null)"
                                            class="btn btn-sm btn-outline-primary" title="Edit">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25351 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/></svg>
                                    </button>
                                    <button onclick="deleteCategory({{ $category->id }})"
                                            class="btn btn-sm btn-outline-danger" title="Delete">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Subcategory Rows (hidden by default) --}}
                        @foreach($category->children as $child)
                        <tr data-id="{{ $child->id }}" data-parent-id="{{ $category->id }}"
                            class="subcategory-row hidden" style="display:none;">
                            <td></td>
                            <td>
                                <div class="flex items-center gap-2 pl-8">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-gray-300 flex-shrink-0">
                                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <div class="font-medium category-name text-gray-700">{{ $child->name }}</div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark">{{ $child->products_count }} Products</span></td>
                            <td>
                                <label class="relative h-6 w-12 cursor-pointer">
                                    <input type="checkbox"
                                           class="status-toggle custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0"
                                           {{ $child->is_active ? 'checked' : '' }}
                                           onchange="toggleStatus({{ $child->id }})">
                                    <span class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7"></span>
                                </label>
                            </td>
                            <td>{{ $child->created_at->format('d M, Y') }}</td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openEditModal({{ $child->id }}, '{{ addslashes($child->name) }}', {{ $category->id }})"
                                            class="btn btn-sm btn-outline-primary" title="Edit">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25351 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/></svg>
                                    </button>
                                    <button onclick="deleteCategory({{ $child->id }})"
                                            class="btn btn-sm btn-outline-danger" title="Delete">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-8">
                            <div class="text-gray-500">
                                <svg class="mx-auto mb-3 h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p>No categories found</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="mt-6 category-pagination">
                {{ $categories->onEachSide(1)->links('vendor.pagination.admin') }}
            </div>
        @endif
    </div>

    {{-- Create Category Drawer --}}
    <div id="createCategoryDrawer" class="drawer-overlay" onclick="closeCreateDrawer(event)">
        <div class="drawer-panel">
            <div class="drawer-header">
                <div>
                    <h4 class="drawer-title">Add New Category</h4>
                    <p class="drawer-subtitle">Create a top-level or subcategory</p>
                </div>
                <button onclick="closeCreateDrawer()" class="drawer-close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>

            <div class="drawer-body">
                <form id="createCategoryForm" onsubmit="submitCreateCategory(event)">

                    <div class="form-group">
                        <label class="drawer-label" for="drawerCategoryName">
                            Category Name <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            id="drawerCategoryName"
                            class="form-input drawer-input"
                            placeholder="e.g. Church Artifacts"
                            autocomplete="off"
                        >
                        <div id="nameError" class="field-error" style="display:none;"></div>
                    </div>

                    <div class="form-group mt-4">
                        <label class="drawer-label" for="drawerParentCategory">
                            Parent Category
                        </label>
                        <select id="drawerParentCategory" class="form-select drawer-input">
                            <option value="">— None (Top-level category) —</option>
                            @foreach($parentOptions as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        <p class="field-hint">Leave empty to create a top-level category.</p>
                    </div>

                    <div id="createGlobalError" class="global-error" style="display:none;"></div>

                </form>
            </div>

            <div class="drawer-footer">
                <button type="button" onclick="closeCreateDrawer()" class="btn btn-outline-secondary w-full">
                    Cancel
                </button>
                <button type="button" onclick="submitCreateCategory()" id="createSubmitBtn" class="btn btn-primary w-full">
                    <span id="createBtnText">Create Category</span>
                    <span id="createBtnLoader" style="display:none;">
                        <svg class="spin" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="40" stroke-dashoffset="10"/>
                        </svg>
                        Creating...
                    </span>
                </button>
            </div>
        </div>
    </div>

    {{-- Edit Category Drawer --}}
    <div id="editCategoryDrawer" class="drawer-overlay" onclick="closeEditDrawer(event)">
        <div class="drawer-panel">
            <div class="drawer-header">
                <div>
                    <h4 class="drawer-title">Edit Category</h4>
                    <p class="drawer-subtitle">Update name or reassign parent</p>
                </div>
                <button onclick="closeEditDrawer()" class="drawer-close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>

            <div class="drawer-body">
                <form id="editCategoryForm">
                    <input type="hidden" id="editCategoryId">

                    <div class="form-group">
                        <label class="drawer-label" for="drawerEditName">
                            Category Name <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            id="drawerEditName"
                            class="form-input drawer-input"
                            placeholder="e.g. Chalice"
                            autocomplete="off"
                        >
                        <div id="editNameError" class="field-error" style="display:none;"></div>
                    </div>

                    <div class="form-group mt-4">
                        <label class="drawer-label" for="drawerEditParent">
                            Parent Category
                        </label>
                        <select id="drawerEditParent" class="form-select drawer-input">
                            <option value="">— None (Top-level category) —</option>
                            @foreach($parentOptions as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                        <p class="field-hint">Leave empty to make it a top-level category.</p>
                    </div>

                    <div id="editGlobalError" class="global-error" style="display:none;"></div>
                </form>
            </div>

            <div class="drawer-footer">
                <button type="button" onclick="closeEditDrawer()" class="btn btn-outline-secondary w-full">
                    Cancel
                </button>
                <button type="button" onclick="submitEditCategory()" id="editSubmitBtn" class="btn btn-primary w-full">
                    <span id="editBtnText">Save Changes</span>
                    <span id="editBtnLoader" style="display:none;">
                        <svg class="spin" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="40" stroke-dashoffset="10"/>
                        </svg>
                        Saving...
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Hidden parent options for JS --}}
<script id="parentOptionsData" type="application/json">
    {!! $parentOptions->toJson() !!}
</script>
@endsection

@push('styles')
<style>
    .category-panel {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        border: 1px solid #eef1f5;
    }

    .category-table thead th {
        background: #f8fafc;
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        padding-top: 14px;
        padding-bottom: 14px;
        white-space: nowrap;
    }

    .category-table tbody td {
        vertical-align: middle;
        padding-top: 16px;
        padding-bottom: 16px;
    }

    .category-table tbody tr {
        transition: all .2s ease;
    }

    .category-table tbody tr:hover {
        background: #fffaf1;
    }

    .status-toast-popup {
        padding: 14px 18px !important;
        border-radius: 12px !important;
    }

    .status-toast-title {
        font-size: 15px !important;
        font-weight: 600 !important;
    }

    .category-pagination {
        margin-top: 24px;
    }

    .category-pagination-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .pagination-summary {
        color: #64748b;
        font-size: 13px;
        font-weight: 500;
    }

    .category-page-list {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .category-page-list li {
        list-style: none;
    }

    .category-page-list a,
    .category-page-list span {
        min-width: 42px;
        height: 42px;
        padding: 0 14px;
        border-radius: 12px;
        border: 1px solid #e8edf3;
        background: #fff;
        color: #334155;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        line-height: 1;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.04);
        transition: all .2s ease;
    }

    .category-page-list a:hover {
        background: #fffaf1;
        border-color: #f7c980;
        color: #d97706;
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(254, 169, 53, 0.16);
    }

    .category-page-list .is-active span {
        background: linear-gradient(135deg, #fea935 0%, #f59e0b 100%);
        border-color: #fea935;
        color: #fff;
        box-shadow: 0 10px 22px rgba(254, 169, 53, 0.28);
    }

    .category-page-list .is-disabled span {
        background: #f8fafc;
        border-color: #edf2f7;
        color: #94a3b8;
        cursor: not-allowed;
        box-shadow: none;
        opacity: 0.85;
    }

    @media (max-width: 640px) {
        .category-pagination-nav {
            flex-direction: column;
            align-items: stretch;
        }

        .pagination-summary {
            text-align: center;
        }

        .category-page-list {
            justify-content: center;
        }

        .category-page-list a,
        .category-page-list span {
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            font-size: 13px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

const parentOptions = JSON.parse(document.getElementById('parentOptionsData').textContent);

function buildParentSelect(selectedId = null) {
    let opts = `<option value="">— None (Top-level category) —</option>`;
    parentOptions.forEach(p => {
        opts += `<option value="${p.id}" ${selectedId == p.id ? 'selected' : ''}>${p.name}</option>`;
    });
    return `
        <div style="margin-top:12px; text-align:left;">
            <label style="font-size:13px;font-weight:600;color:#475569;display:block;margin-bottom:4px;">Parent Category</label>
            <select id="category-parent" class="swal2-select" style="display:block;width:100%;">${opts}</select>
        </div>`;
}

function showSuccessAlert(message) {
    Swal.fire({ icon: 'success', title: 'Success', text: message, confirmButtonColor: '#fea935' });
}
function showErrorAlert(message) {
    Swal.fire({ icon: 'error', title: 'Error', text: message, confirmButtonColor: '#dc3545' });
}
function showStatusToast(message) {
    Swal.fire({
        toast: true, position: 'top-end', icon: 'success', title: message,
        width: '460px', customClass: { popup: 'status-toast-popup', title: 'status-toast-title' },
        showConfirmButton: false, timer: 1800, timerProgressBar: true
    });
}

// ── Drawer open/close ──────────────────────────────────
function openCreateModal() {
    // Reset form
    $('#drawerCategoryName').val('').removeClass('input-error');
    $('#drawerParentCategory').val('');
    $('#nameError').hide().text('');
    $('#createGlobalError').hide().text('');
    $('#createBtnText').show();
    $('#createBtnLoader').hide();
    $('#createSubmitBtn').prop('disabled', false);

    $('#createCategoryDrawer').addClass('open');
    setTimeout(() => document.getElementById('drawerCategoryName').focus(), 320);
}

function closeCreateDrawer(e) {
    if (e && e.target !== document.getElementById('createCategoryDrawer')) return;
    $('#createCategoryDrawer').removeClass('open');
}

function openEditModal(id, currentName, currentParentId) {
    // Populate form
    $('#editCategoryId').val(id);
    $('#drawerEditName').val(currentName).removeClass('input-error');
    $('#drawerEditParent').val(currentParentId || '');
    $('#editNameError').hide().text('');
    $('#editGlobalError').hide().text('');
    $('#editBtnText').show();
    $('#editBtnLoader').hide();
    $('#editSubmitBtn').prop('disabled', false);

    $('#editCategoryDrawer').addClass('open');
    setTimeout(() => document.getElementById('drawerEditName').focus(), 320);
}

function closeEditDrawer(e) {
    if (e && e.target !== document.getElementById('editCategoryDrawer')) return;
    $('#editCategoryDrawer').removeClass('open');
}

// Close on ESC key
$(document).on('keydown', function(e) {
    if (e.key === 'Escape') {
        $('#createCategoryDrawer').removeClass('open');
        $('#editCategoryDrawer').removeClass('open');
    }
});

// ── Submit Create ──────────────────────────────────────
function submitCreateCategory() {
    const name = $('#drawerCategoryName').val().trim();
    const parent_id = $('#drawerParentCategory').val() || null;

    // Reset errors
    $('#drawerCategoryName').removeClass('input-error');
    $('#nameError').hide();
    $('#createGlobalError').hide();

    if (!name) {
        $('#drawerCategoryName').addClass('input-error');
        $('#nameError').text('Category name is required.').show();
        return;
    }

    // Loading state
    $('#createBtnText').hide();
    $('#createBtnLoader').show();
    $('#createSubmitBtn').prop('disabled', true);

    $.ajax({
        url: '{{ route("admin.categories.store") }}',
        type: 'POST',
        data: { name, parent_id },
        success: function(response) {
            $('#createCategoryDrawer').removeClass('open');
            Swal.fire({
                icon: 'success',
                title: 'Created!',
                text: response.message,
                confirmButtonColor: '#fea935'
            }).then(() => location.reload());
        },
        error: function(xhr) {
            $('#createBtnText').show();
            $('#createBtnLoader').hide();
            $('#createSubmitBtn').prop('disabled', false);

            if (xhr.responseJSON?.errors?.name) {
                $('#drawerCategoryName').addClass('input-error');
                $('#nameError').text(xhr.responseJSON.errors.name[0]).show();
            } else {
                const msg = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                $('#createGlobalError').text(msg).show();
            }
        }
    });
}

// ── Submit Edit ────────────────────────────────────────
function submitEditCategory() {
    const id        = $('#editCategoryId').val();
    const name      = $('#drawerEditName').val().trim();
    const parent_id = $('#drawerEditParent').val() || null;

    // Reset errors
    $('#drawerEditName').removeClass('input-error');
    $('#editNameError').hide();
    $('#editGlobalError').hide();

    if (!name) {
        $('#drawerEditName').addClass('input-error');
        $('#editNameError').text('Category name is required.').show();
        return;
    }

    $('#editBtnText').hide();
    $('#editBtnLoader').show();
    $('#editSubmitBtn').prop('disabled', true);

    $.ajax({
        url: `/admin/categories/${id}`,
        type: 'PUT',
        data: { name, parent_id },
        success: function(response) {
            $(`tr[data-id="${id}"] .category-name`).text(response.category.name);
            $('#editCategoryDrawer').removeClass('open');
            showStatusToast(response.message);
        },
        error: function(xhr) {
            $('#editBtnText').show();
            $('#editBtnLoader').hide();
            $('#editSubmitBtn').prop('disabled', false);

            if (xhr.responseJSON?.errors?.name) {
                $('#drawerEditName').addClass('input-error');
                $('#editNameError').text(xhr.responseJSON.errors.name[0]).show();
            } else {
                const msg = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                $('#editGlobalError').text(msg).show();
            }
        }
    });
}

function deleteCategory(id) {
    Swal.fire({
        title: 'Delete Category?', text: 'This action cannot be undone!', icon: 'warning',
        showCancelButton: true, confirmButtonColor: '#dc3545', cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete it!', cancelButtonText: 'Cancel',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return $.ajax({
                url: `/admin/categories/${id}`, type: 'DELETE',
                error: function(xhr) {
                    Swal.showValidationMessage(xhr.responseJSON?.message || 'Something went wrong');
                }
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then(result => {
        if (result.isConfirmed) {
            Swal.fire({ icon: 'success', title: 'Deleted!', text: result.value.message, confirmButtonColor: '#fea935' })
                .then(() => location.reload());
        }
    });
}

function toggleStatus(id) {
    $.ajax({
        url: `/admin/categories/${id}/toggle-status`, type: 'POST',
        success: response => showStatusToast(response.message),
        error: () => { showErrorAlert('Failed to update status'); location.reload(); }
    });
}

// Toggle subcategory rows expand/collapse
$(document).on('click', '.toggle-children', function () {
    const parentId = $(this).data('parent');
    const rows = $(`tr[data-parent-id="${parentId}"]`);
    const isHidden = rows.first().is(':hidden');

    rows.toggle(isHidden);
    $(this).find('.chevron-icon').css('transform', isHidden ? 'rotate(180deg)' : 'rotate(0deg)');
});

// Search filter
$('#searchInput').on('keyup', function () {
    const value = $(this).val().toLowerCase();
    $('#categoriesTable tbody tr.parent-row').filter(function () {
        $(this).toggle($(this).text().toLowerCase().includes(value));
    });
});

@if(session('success'))
    Swal.fire({ icon: 'success', title: 'Success', text: '{{ session('success') }}', confirmButtonColor: '#fea935' });
@endif
</script>
@endpush
