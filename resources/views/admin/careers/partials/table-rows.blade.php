@forelse($careers as $career)
<tr>
    <td>{{ $career->id }}</td>
    <td>
        <div class="font-semibold">{{ $career->title }}</div>
        <div class="text-xs text-white-dark">{{ $career->short_description }}</div>
    </td>
    <td>{{ $career->department ?: '-' }}</td>
    <td>{{ $career->employment_type ?: '-' }}</td>
    <td>{{ $career->location ?: '-' }}</td>
    <td>{{ $career->vacancies }}</td>
    <td>
        <label class="w-12 h-6 relative block">
            <input
                type="checkbox"
                class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer toggle-status"
                data-id="{{ $career->id }}"
                {{ $career->is_active ? 'checked' : '' }}
            >
            <span class="bg-[#ebedf2] block h-full rounded-full before:absolute before:left-1 before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
        </label>
    </td>
    <td>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.careers.edit', $career) }}" class="btn btn-sm btn-outline-primary">
                Edit
            </a>
            <button type="button" onclick="deleteCareer({{ $career->id }}, '{{ addslashes($career->title) }}')" class="btn btn-sm btn-outline-danger">
                Delete
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="8" class="text-center py-8 text-white-dark">No vacancies found.</td>
</tr>
@endforelse
