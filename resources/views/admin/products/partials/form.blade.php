@php
    $isEdit = isset($product);
    $applications = old('applications', $product->applications ?? ['']);
    $availableModels = old('available_models', $product->available_models ?? ['']);
    $specifications = old('specifications', $product->specifications ?? [['label' => '', 'value' => '']]);
@endphp

<style>
    .product-form-shell {
        max-width: 1180px;
        margin: 0 auto;
    }

    .product-page-hero {
        background: linear-gradient(135deg, rgba(254, 169, 53, 0.12), rgba(254, 169, 53, 0.04));
        border: 1px solid rgba(254, 169, 53, 0.18);
        border-radius: 18px;
        padding: 22px 24px;
        margin-bottom: 24px;
    }

    .product-page-hero h2 {
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0 0 6px;
        color: #111827;
    }

    .product-page-hero p {
        margin: 0;
        color: #6b7280;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .product-form-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 24px;
        align-items: start;
    }

    .product-main-column,
    .product-side-column {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .product-section-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
    }

    .dark .product-section-card {
        background: #0e1726;
        border-color: #1f2937;
    }

    .product-section-head {
        display: flex;
        align-items: start;
        justify-content: space-between;
        gap: 16px;
        padding: 18px 20px;
        border-bottom: 1px solid #eef0f4;
        background: linear-gradient(180deg, rgba(248, 250, 252, 0.95), rgba(255, 255, 255, 0.95));
    }

    .dark .product-section-head {
        border-color: #1f2937;
        background: rgba(17, 24, 39, 0.65);
    }

    .product-section-title {
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }

    .product-section-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(254, 169, 53, 0.14);
        color: #f77f00;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .product-section-title h3 {
        margin: 0;
        font-size: 1rem;
        font-weight: 700;
        color: #111827;
    }

    .dark .product-section-title h3 {
        color: #f3f4f6;
    }

    .product-section-title p {
        margin: 4px 0 0;
        font-size: 0.84rem;
        color: #6b7280;
        line-height: 1.5;
    }

    .product-section-body {
        padding: 20px;
    }

    .product-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.89rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .dark .product-label {
        color: #d1d5db;
    }

    .product-help {
        font-size: 0.78rem;
        color: #6b7280;
        margin-top: 6px;
        line-height: 1.5;
    }

    .product-inline-group {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .product-field-card {
        background: #fafafa;
        border: 1px solid #eceff3;
        border-radius: 14px;
        padding: 16px;
    }

    .dark .product-field-card {
        background: #111827;
        border-color: #1f2937;
    }

    .product-toggle-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 16px;
        border: 1px solid #eceff3;
        border-radius: 14px;
        background: #fafafa;
    }

    .dark .product-toggle-card {
        background: #111827;
        border-color: #1f2937;
    }

    .product-toggle-copy strong {
        display: block;
        font-size: 0.92rem;
        color: #111827;
        margin-bottom: 4px;
    }

    .dark .product-toggle-copy strong {
        color: #f3f4f6;
    }

    .product-toggle-copy span {
        font-size: 0.78rem;
        color: #6b7280;
        line-height: 1.5;
        display: block;
    }

    .repeater-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 14px;
        flex-wrap: wrap;
    }

    .repeater-toolbar p {
        margin: 0;
        font-size: 0.8rem;
        color: #6b7280;
    }

    .repeater-stack {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .repeater-item {
        border: 1px solid #eceff3;
        background: #fafafa;
        border-radius: 14px;
        padding: 14px;
    }

    .dark .repeater-item {
        background: #111827;
        border-color: #1f2937;
    }

    .repeater-item.compact-row {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .repeater-item.compact-row .form-input {
        flex: 1;
    }

    .spec-grid {
        display: grid;
        grid-template-columns: 1fr 1.4fr auto;
        gap: 10px;
        align-items: center;
    }

    .repeater-remove-btn {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        border: 1px solid rgba(239, 68, 68, 0.16);
        background: rgba(239, 68, 68, 0.08);
        color: #dc2626;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all .2s ease;
    }

    .repeater-remove-btn:hover {
        background: rgba(239, 68, 68, 0.14);
        transform: translateY(-1px);
    }

    .upload-panel {
        border: 2px dashed #d1d5db;
        border-radius: 18px;
        padding: 28px 20px;
        text-align: center;
        background: linear-gradient(180deg, #fcfcfc, #f8fafc);
        transition: all .25s ease;
    }

    .upload-panel:hover {
        border-color: #fea935;
        background: #fffaf3;
    }

    .dark .upload-panel {
        background: #111827;
        border-color: #374151;
    }

    .upload-preview {
        min-height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
    }

    .upload-preview img {
        max-width: 100%;
        max-height: 220px;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
        object-fit: cover;
    }

    .sidebar-summary {
        position: sticky;
        top: 90px;
    }

    .summary-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .summary-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px dashed #e5e7eb;
    }

    .summary-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .summary-dot {
        width: 10px;
        height: 10px;
        border-radius: 999px;
        margin-top: 6px;
        background: #fea935;
        flex-shrink: 0;
    }

    .summary-item strong {
        display: block;
        color: #111827;
        font-size: 0.9rem;
        margin-bottom: 3px;
    }

    .dark .summary-item strong {
        color: #f3f4f6;
    }

    .summary-item span {
        display: block;
        color: #6b7280;
        font-size: 0.8rem;
        line-height: 1.5;
    }

    .sticky-action-bar {
        position: sticky;
        bottom: 16px;
        z-index: 15;
        display: flex;
        justify-content: flex-end;
        margin-top: 24px;
    }

    .sticky-action-inner {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        padding: 14px 16px;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(10px);
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
    }

    .dark .sticky-action-inner {
        background: rgba(17, 24, 39, 0.92);
        border-color: #1f2937;
    }

    .sticky-action-copy {
        font-size: 0.82rem;
        color: #6b7280;
        line-height: 1.5;
        max-width: 500px;
    }

    .sticky-action-buttons {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    @media (max-width: 1024px) {
        .product-form-grid {
            grid-template-columns: 1fr;
        }

        .sidebar-summary {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .product-inline-group,
        .spec-grid {
            grid-template-columns: 1fr;
        }

        .repeater-item.compact-row {
            flex-direction: column;
            align-items: stretch;
        }

        .sticky-action-inner {
            flex-direction: column;
            align-items: stretch;
        }

        .sticky-action-buttons {
            width: 100%;
        }

        .sticky-action-buttons .btn {
            flex: 1;
            justify-content: center;
        }
    }
</style>

<form id="{{ $isEdit ? 'editProductForm' : 'createProductForm' }}" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="product-form-shell">
        <div class="product-page-hero">
            <h2>{{ $isEdit ? 'Update product information' : 'Create a new product' }}</h2>
            <p>
                Add structured product details for your catalog, including manufacturer, machine type, supported models, applications, and technical specifications.
            </p>
        </div>

        <div class="product-form-grid">
            <div class="product-main-column">
                <div class="product-section-card">
                    <div class="product-section-head">
                        <div class="product-section-title">
                            <div class="product-section-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M3 7.5 12 3l9 4.5-9 4.5L3 7.5Z"></path>
                                    <path d="M3 12l9 4.5 9-4.5"></path>
                                    <path d="M3 16.5 12 21l9-4.5"></path>
                                </svg>
                            </div>
                            <div>
                                <h3>Basic information</h3>
                                <p>Core identity fields used in listings, search, and category mapping.</p>
                            </div>
                        </div>
                    </div>

                    <div class="product-section-body">
                        <div class="product-inline-group">
                            <div>
                                <label for="name" class="product-label">Product Name <span class="text-danger">*</span></label>
                                <input id="name" type="text" name="name" class="form-input" required
                                       value="{{ old('name', $product->name ?? '') }}"
                                       placeholder="e.g. VLF Plus Series">
                                <div class="product-help">Use the exact customer-facing product or series name.</div>
                            </div>

                            <div>
                                <label for="category_id" class="product-label">Category <span class="text-danger">*</span></label>
                                <div class="flex gap-2">
                                    <select id="category_id" name="category_id" class="form-select w-full" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <button type="button" id="addCategoryBtn" class="btn btn-outline-primary whitespace-nowrap">+ New</button>
                                </div>
                                <div class="product-help">Keep categories generic, and use manufacturer for brand separation.</div>
                            </div>

                            <div>
                                <label for="manufacturer" class="product-label">Manufacturer</label>
                                <input id="manufacturer" type="text" name="manufacturer" class="form-input"
                                       value="{{ old('manufacturer', $product->manufacturer ?? '') }}"
                                       placeholder="e.g. VN-J Precision Mechanics">
                                <div class="product-help">Used for filtering and brand display on the product page.</div>
                            </div>

                            <div>
                                <label for="machine_type" class="product-label">Machine Type</label>
                                <input id="machine_type" type="text" name="machine_type" class="form-input"
                                       value="{{ old('machine_type', $product->machine_type ?? '') }}"
                                       placeholder="e.g. Dual Function Plate & Tube Cutting Machine">
                                <div class="product-help">Short technical classification for quick recognition.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-section-card">
                    <div class="product-section-head">
                        <div class="product-section-title">
                            <div class="product-section-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3>Content and publishing</h3>
                                <p>Control visibility and add descriptive content for the frontend product page.</p>
                            </div>
                        </div>
                    </div>

                    <div class="product-section-body">
                        <div class="product-inline-group mb-5">
                            <div class="product-toggle-card">
                                <div class="product-toggle-copy">
                                    <strong>Active status</strong>
                                    <span>Show or hide this product from the public catalog.</span>
                                </div>
                                <label class="w-12 h-6 relative block">
                                    <input type="checkbox" name="is_active" id="is_active" value="1"
                                           class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                           {{ old('is_active', isset($product) ? (int)$product->is_active : 1) ? 'checked' : '' }}>
                                    <span class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
                                </label>
                            </div>

                            <div class="product-toggle-card">
                                <div class="product-toggle-copy">
                                    <strong>Featured product</strong>
                                    <span>Highlight this product in featured sections or landing blocks.</span>
                                </div>
                                <label class="w-12 h-6 relative block">
                                    <input type="checkbox" name="featured" id="featured" value="1"
                                           class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                                           {{ old('featured', isset($product) ? (int)$product->featured : 0) ? 'checked' : '' }}>
                                    <span class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="description" class="product-label">Description</label>
                            <textarea id="description" name="description" rows="6" class="form-textarea"
                                      placeholder="Write a practical, customer-facing summary of the product, applications, and performance.">{{ old('description', $product->description ?? '') }}</textarea>
                            <div class="product-help">Keep it scannable. Focus on capabilities, use cases, and production value.</div>
                        </div>
                    </div>
                </div>

                <div class="product-section-card">
                    <div class="product-section-head">
                        <div class="product-section-title">
                            <div class="product-section-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M8 6h13"></path>
                                    <path d="M8 12h13"></path>
                                    <path d="M8 18h13"></path>
                                    <path d="M3 6h.01"></path>
                                    <path d="M3 12h.01"></path>
                                    <path d="M3 18h.01"></path>
                                </svg>
                            </div>
                            <div>
                                <h3>Applications and models</h3>
                                <p>Add repeatable business-use cases and supported model variants.</p>
                            </div>
                        </div>
                    </div>

                    <div class="product-section-body">
                        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
                            <div class="product-field-card">
                                <div class="repeater-toolbar">
                                    <div>
                                        <label class="product-label mb-0">Applications</label>
                                        <p>Examples: metal fabrication, steel structures, tube processing.</p>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="addApplicationBtn">+ Add</button>
                                </div>

                                <div id="applicationsWrapper" class="repeater-stack">
                                    @foreach($applications as $application)
                                        <div class="repeater-item compact-row application-row">
                                            <input type="text" name="applications[]" class="form-input"
                                                   value="{{ $application }}" placeholder="Enter application">
                                            <button type="button" class="repeater-remove-btn remove-row" title="Remove row">×</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="product-field-card">
                                <div class="repeater-toolbar">
                                    <div>
                                        <label class="product-label mb-0">Available Models</label>
                                        <p>Add machine model variants that belong to this product or series.</p>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="addModelBtn">+ Add</button>
                                </div>

                                <div id="modelsWrapper" class="repeater-stack">
                                    @foreach($availableModels as $model)
                                        <div class="repeater-item compact-row model-row">
                                            <input type="text" name="available_models[]" class="form-input"
                                                   value="{{ $model }}" placeholder="Enter model name">
                                            <button type="button" class="repeater-remove-btn remove-row" title="Remove row">×</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-section-card">
                    <div class="product-section-head">
                        <div class="product-section-title">
                            <div class="product-section-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M4 7h16"></path>
                                    <path d="M4 12h16"></path>
                                    <path d="M4 17h16"></path>
                                    <path d="M9 4v16"></path>
                                </svg>
                            </div>
                            <div>
                                <h3>Technical specifications</h3>
                                <p>Create a structured specification table for the product detail page.</p>
                            </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-outline-primary" id="addSpecBtn">+ Add Specification</button>
                    </div>

                    <div class="product-section-body">
                        <div id="specificationsWrapper" class="repeater-stack">
                            @foreach($specifications as $index => $spec)
                                <div class="repeater-item spec-row">
                                    <div class="spec-grid">
                                        <input type="text" name="specifications[{{ $index }}][label]" class="form-input"
                                               value="{{ $spec['label'] ?? '' }}" placeholder="Specification label">
                                        <input type="text" name="specifications[{{ $index }}][value]" class="form-input"
                                               value="{{ $spec['value'] ?? '' }}" placeholder="Specification value">
                                        <button type="button" class="repeater-remove-btn remove-row" title="Remove specification">×</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="sticky-action-bar">
                    <div class="sticky-action-inner">
                        <div class="sticky-action-copy">
                            Save only when the product has the right category, manufacturer, and at least the key specs needed for sales inquiries.
                        </div>

                        <div class="sticky-action-buttons">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary gap-2" id="submitBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                {{ $isEdit ? 'Update Product' : 'Create Product' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-side-column">
                <div class="product-section-card sidebar-summary">
                    <div class="product-section-head">
                        <div class="product-section-title">
                            <div class="product-section-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5Z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3>Media and checklist</h3>
                                <p>Upload the main product image and review key publishing checks.</p>
                            </div>
                        </div>
                    </div>

                    <div class="product-section-body">
                        <div class="mb-6">
                            <label class="product-label">
                                Product Image @unless($isEdit)<span class="text-danger">*</span>@endunless
                            </label>

                            <div class="upload-panel">
                                <input type="file" name="image" id="productImage" accept="image/*" class="hidden"
                                       {{ $isEdit ? '' : 'required' }} onchange="previewImage(event)">

                                <label for="productImage" class="cursor-pointer block">
                                    <div id="imagePreviewContainer" class="upload-preview">
                                        @if($isEdit && !empty($product->image_url))
                                            <img id="imagePreview" src="{{ $product->image_url }}" alt="Preview">
                                        @else
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" stroke-width="1.5"></rect>
                                                    <circle cx="8.5" cy="8.5" r="1.5" stroke-width="1.5"></circle>
                                                    <polyline points="21 15 16 10 5 21" stroke-width="1.5"></polyline>
                                                </svg>
                                                <img id="imagePreview" src="" alt="Preview" class="hidden">
                                            </div>
                                        @endif
                                    </div>

                                    <p class="text-primary font-semibold">Click to upload image</p>
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, WEBP up to 120 KB</p>
                                </label>
                            </div>

                            <p id="fileName" class="text-sm text-gray-600 mt-3">
                                @if($isEdit && $product->image)
                                    Current image selected
                                @else
                                    No file selected yet
                                @endif
                            </p>
                        </div>

                        <div class="summary-list">
                            <div class="summary-item">
                                <span class="summary-dot"></span>
                                <div>
                                    <strong>Use one clear category</strong>
                                    <span>Keep category generic and use manufacturer to separate VN-J and ACCURL products.</span>
                                </div>
                            </div>

                            <div class="summary-item">
                                <span class="summary-dot"></span>
                                <div>
                                    <strong>Add real applications</strong>
                                    <span>These help both filtering and customer understanding on the frontend.</span>
                                </div>
                            </div>

                            <div class="summary-item">
                                <span class="summary-dot"></span>
                                <div>
                                    <strong>Structure specs cleanly</strong>
                                    <span>Use short labels and exact values so the detail page can render a neat spec table.</span>
                                </div>
                            </div>

                            <div class="summary-item">
                                <span class="summary-dot"></span>
                                <div>
                                    <strong>Optimize image size</strong>
                                    <span>Keep the image under the upload limit and use a clean product-focused visual.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
