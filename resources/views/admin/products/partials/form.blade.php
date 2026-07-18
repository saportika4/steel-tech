@php
    $isEdit = isset($product);
@endphp

<form id="{{ $isEdit ? 'editProductForm' : 'createProductForm' }}" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label for="name">Product Name <span class="text-danger">*</span></label>
            <input
                id="name"
                type="text"
                name="name"
                placeholder="Enter product name"
                class="form-input"
                required
                value="{{ old('name', $product->name ?? '') }}"
            />
        </div>

        <div>
            <label for="category_id">Category <span class="text-danger">*</span></label>
            <div class="flex gap-2">
                <select id="category_id" name="category_id" class="form-select w-full" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button type="button" id="addCategoryBtn" class="btn btn-outline-primary whitespace-nowrap">
                    + New
                </button>
            </div>
            <small class="text-white-dark">You can add a new category using the "+ New" button.</small>
        </div>

        <div>
            <label for="is_active">Status</label>
            <label class="w-12 h-6 relative block mt-2">
                <input
                    type="checkbox"
                    name="is_active"
                    id="is_active"
                    value="1"
                    class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                    {{ old('is_active', isset($product) ? (int)$product->is_active : 1) ? 'checked' : '' }}
                >
                <span class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
            </label>
            <small class="text-white-dark">Toggle to activate/deactivate product</small>
        </div>
    </div>

    <div class="mt-5">
        <label for="description">Description</label>
        <textarea
            id="description"
            name="description"
            rows="4"
            class="form-textarea"
            placeholder="Enter product description"
        >{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="mt-5">
        <label class="block mb-2">
            Product Image @unless($isEdit)<span class="text-danger">*</span>@endunless
        </label>

        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition-colors">
            <input
                type="file"
                name="image"
                id="productImage"
                accept="image/*"
                class="hidden"
                {{ $isEdit ? '' : 'required' }}
                onchange="previewImage(event)"
            >

            <label for="productImage" class="cursor-pointer">
                <div id="imagePreviewContainer" class="mb-3">
                    @if($isEdit && $product->image_url)
                        <img id="imagePreview" src="{{ $product->image_url }}" alt="Preview" class="max-w-xs mx-auto rounded-lg shadow-lg">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" stroke-width="1.5"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5" stroke-width="1.5"></circle>
                            <polyline points="21 15 16 10 5 21" stroke-width="1.5"></polyline>
                        </svg>
                        <img id="imagePreview" src="" alt="Preview" class="hidden max-w-xs mx-auto rounded-lg shadow-lg">
                    @endif
                </div>
                <p class="text-primary font-semibold">Click to upload image</p>
                <p class="text-xs text-gray-500 mt-1">PNG, JPG, WEBP up to 10MB</p>
            </label>
        </div>

        <p id="fileName" class="text-sm text-gray-600 mt-2">
            @if($isEdit && $product->image)
                Current image selected
            @endif
        </p>
    </div>

    <div class="flex justify-end items-center mt-8 gap-4">
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-danger">Cancel</a>
        <button type="submit" class="btn btn-primary gap-2" id="submitBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            {{ $isEdit ? 'Update Product' : 'Create Product' }}
        </button>
    </div>
</form>
