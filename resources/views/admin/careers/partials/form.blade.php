@php
    $isEdit = isset($career);
@endphp

<form id="{{ $isEdit ? 'editCareerForm' : 'createCareerForm' }}">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label>Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-input" value="{{ old('title', $career->title ?? '') }}" required>
        </div>

        <div>
            <label>Department</label>
            <input type="text" name="department" class="form-input" value="{{ old('department', $career->department ?? '') }}">
        </div>

        <div>
            <label>Employment Type</label>
            <input type="text" name="employment_type" class="form-input" placeholder="Full Time / Part Time" value="{{ old('employment_type', $career->employment_type ?? '') }}">
        </div>

        <div>
            <label>Location</label>
            <input type="text" name="location" class="form-input" value="{{ old('location', $career->location ?? '') }}">
        </div>

        <div>
            <label>Vacancies</label>
            <input type="number" min="1" name="vacancies" class="form-input" value="{{ old('vacancies', $career->vacancies ?? 1) }}">
        </div>

        <div>
            <label>Sort Order</label>
            <input type="number" min="0" name="sort_order" class="form-input" value="{{ old('sort_order', $career->sort_order ?? 0) }}">
        </div>
    </div>

    <div class="mt-5">
        <label>Short Description</label>
        <textarea name="short_description" rows="3" class="form-textarea">{{ old('short_description', $career->short_description ?? '') }}</textarea>
    </div>

    <div class="mt-5">
        <label>Job Description</label>
        <textarea name="description" rows="8" class="form-textarea">{{ old('description', $career->description ?? '') }}</textarea>
    </div>

    <div class="mt-5">
        <label class="w-12 h-6 relative block mt-2">
            <input type="checkbox" name="is_active" value="1" class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" {{ old('is_active', isset($career) ? (int) $career->is_active : 1) ? 'checked' : '' }}>
            <span class="bg-[#ebedf2] block h-full rounded-full before:absolute before:left-1 before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
        </label>
        <small class="text-white-dark">Active vacancy</small>
    </div>

    <div class="flex justify-end items-center mt-8 gap-4">
        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-primary" id="submitBtn">
            {{ $isEdit ? 'Update Vacancy' : 'Create Vacancy' }}
        </button>
    </div>
</form>
