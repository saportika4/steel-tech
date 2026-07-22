@forelse($galleries as $item)
<tr id="gallery-{{ $item->id }}">
    <td><strong class="text-primary">#{{ $item->id }}</strong></td>
    <td><img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-16 h-16 rounded-lg object-cover"></td>
    <td><div class="whitespace-nowrap font-semibold">{{ $item->title ?: '—' }}</div></td>
    <td><div class="max-w-xs truncate text-white-dark">{{ $item->description ?: '—' }}</div></td>
    <td>
        <label class="w-12 h-6 relative">
            <input type="checkbox" class="toggle-status custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                data-id="{{ $item->id }}" {{ $item->is_active ? 'checked' : '' }}>
            <span class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
        </label>
    </td>
    <td>
        <div class="flex gap-2">
            <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-sm btn-info" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
            </a>
            <button onclick='deleteGallery({{ $item->id }}, @json($item->title ?: "this image"))' class="btn btn-sm btn-danger" title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </button>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-8">
        <div class="text-muted">
            <p>No gallery images found. <a href="{{ route('admin.gallery.create') }}" class="text-primary hover:underline">Add your first image</a></p>
        </div>
    </td>
</tr>
@endforelse
