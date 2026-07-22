<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Admin Panel') - Steel Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo/logo.webp') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/style.css') }}" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('admin/assets/css/animate.css') }}" />

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --brand-color: #131310;
            --brand-dark: #131310;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--brand-color), var(--brand-dark)) !important;
            border-color: var(--brand-color) !important;
        }

        .text-primary {
            color: var(--brand-color) !important;
        }

        .bg-primary {
            background: linear-gradient(135deg, var(--brand-color), var(--brand-dark)) !important;
        }

        /* Table Sorting Icons */
        .sortable {
            cursor: pointer;
            user-select: none;
            position: relative;
            padding-right: 20px !important;
        }

        .sortable:hover {
            background: rgba(254, 169, 53, 0.1);
        }

        .sortable::after {
            content: '⇅';
            position: absolute;
            right: 8px;
            opacity: 0.3;
            font-size: 12px;
        }

        .sortable.asc::after {
            content: '▲';
            opacity: 1;
        }

        .sortable.desc::after {
            content: '▼';
            opacity: 1;
        }

        /* SweetAlert2 Custom Positioning */
        .swal2-container {
            z-index: 99999 !important;
        }

        .swal2-popup {
            z-index: 99999 !important;
        }

        /* Fix Toast Position */
        .swal2-top-end {
            top: 85px !important;
            right: 20px !important;
        }

        /* Dropdown Menu Positioning Fix */
        .dropdown {
            position: relative;
        }

        .dropdown ul {
            position: absolute;
            top: 100%;
            right: 0;
            z-index: 50;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            min-width: 200px;
        }

        .dropdown ul li {
            list-style: none;
        }

        .dropdown ul li a,
        .dropdown ul li button {
            display: flex;
            align-items: center;
            padding: 0.625rem 1rem;
            color: #4b5563;
            transition: all 0.3s;
            text-decoration: none;
            width: 100%;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
        }

        .dropdown ul li a:hover,
        .dropdown ul li button:hover {
            background-color: #f3f4f6;
            color: var(--brand-color);
        }

        .dropdown ul li a svg,
        .dropdown ul li button svg {
            flex-shrink: 0;
        }
    </style>

    <style>
        /* ── Shared Drawer Styles (categories + product pages) ───────────── */
        .drawer-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.45);
            z-index: 9999;
            display: flex;
            justify-content: flex-end;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s ease;
            backdrop-filter: blur(2px);
        }
        .drawer-overlay.open {
            opacity: 1;
            visibility: visible;
        }
        .drawer-panel {
            width: 100%;
            max-width: 420px;
            height: 100%;
            background: #fff;
            display: flex;
            flex-direction: column;
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: -8px 0 32px rgba(15, 23, 42, 0.12);
        }
        .drawer-overlay.open .drawer-panel {
            transform: translateX(0);
        }
        .drawer-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 24px 24px 20px;
            border-bottom: 1px solid #eef1f5;
        }
        .drawer-title {
            font-size: 17px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }
        .drawer-subtitle {
            font-size: 13px;
            color: #94a3b8;
            margin: 3px 0 0;
        }
        .drawer-close {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s;
            flex-shrink: 0;
        }
        .drawer-close:hover {
            background: #fee2e2;
            border-color: #fca5a5;
            color: #dc2626;
        }
        .drawer-body {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
        }
        .drawer-footer {
            padding: 16px 24px;
            border-top: 1px solid #eef1f5;
            display: flex;
            gap: 10px;
            background: #f8fafc;
        }
        .drawer-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 7px;
        }
        .drawer-input {
            width: 100%;
            border-radius: 10px !important;
            border: 1.5px solid #e2e8f0 !important;
            padding: 10px 14px !important;
            font-size: 14px !important;
            color: #1e293b !important;
            background: #fff !important;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .drawer-input:focus {
            border-color: #fea935 !important;
            box-shadow: 0 0 0 3px rgba(254, 169, 53, 0.15) !important;
            outline: none !important;
        }
        .drawer-input.input-error {
            border-color: #f87171 !important;
            box-shadow: 0 0 0 3px rgba(248, 113, 113, 0.15) !important;
        }
        .field-error {
            font-size: 12px;
            color: #ef4444;
            margin-top: 5px;
        }
        .field-hint {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 5px;
            margin-bottom: 0;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .global-error {
            margin-top: 16px;
            padding: 12px 14px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            font-size: 13px;
            color: #dc2626;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        .spin {
            animation: spin 0.7s linear infinite;
            display: inline-block;
        }
    </style>

    @stack('styles')
</head>

<body
    x-data="main"
    class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]"
>
    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

    <!-- screen loader -->
    <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa]">
        <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#fea935">
            <path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
            </path>
            <path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
                <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
            </path>
        </svg>
    </div>

    <div class="main-container min-h-screen text-black" :class="[$store.app.navbar]">
        <!-- BEGIN SIDEBAR -->
        <div>
            <nav class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
                <div class="bg-white h-full">
                    <div class="flex justify-between items-center px-4 py-3">
                        <a href="{{ route('admin.dashboard') }}" class="main-logo flex items-center shrink-0">
                            <img class="h-12 ltr:ml-[5px] rtl:mr-[5px] flex-none rounded-lg" src="{{ asset('assets/images/logo/logo.webp') }}" alt="logo" style="max-width: 200px;"/>
                        </a>
                        <button type="button" class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 transition duration-300 rtl:rotate-180" @click="$store.app.toggleSidebar()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 m-auto">
                                <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold">
                        <li class="menu nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="group {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" fill="currentColor"/>
                                        <path d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z" fill="currentColor"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">Dashboard</span>
                                </div>
                            </a>
                        </li>

                        <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 -mx-4 mb-1">
                            <span>PRODUCTS</span>
                        </h2>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="group {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M5 6H16.4504C18.5054 6 19.5328 6 19.9775 6.67426C20.4221 7.34853 20.0173 8.29294 19.2078 10.1818L18.7792 11.1818C18.4013 12.0636 18.2123 12.5045 17.8366 12.7523C17.4609 13 16.9812 13 16.0218 13H5" stroke="currentColor" stroke-width="1.5"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">Categories</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.products.index') }}" class="group {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.74157 18.5545C4.94119 20 7.17389 20 11.6393 20H12.3605C16.8259 20 19.0586 20 20.2582 18.5545M3.74157 18.5545C2.54194 17.1091 2.9534 14.9146 3.77633 10.5257C4.36155 7.40452 4.65416 5.84393 5.76506 4.92196M3.74157 18.5545C3.74156 18.5545 3.74157 18.5545 3.74157 18.5545ZM20.2582 18.5545C21.4578 17.1091 21.0464 14.9146 20.2235 10.5257C19.6382 7.40452 19.3456 5.84393 18.2347 4.92196M20.2582 18.5545C20.2582 18.5545 20.2582 18.5545 20.2582 18.5545ZM18.2347 4.92196C17.1238 4 15.5361 4 12.3605 4H11.6393C8.46374 4 6.87596 4 5.76506 4.92196M18.2347 4.92196C18.2347 4.92196 18.2347 4.92196 18.2347 4.92196ZM5.76506 4.92196C5.76506 4.92196 5.76506 4.92196 5.76506 4.92196Z" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M9.1709 8C9.58273 9.16519 10.694 10 12.0002 10C13.3064 10 14.4177 9.16519 14.8295 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">All Products</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.products.create') }}" class="group {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        ircle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">Add Product</span>
                                </div>
                            </a>
                        </li>

                        <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 -mx-4 mb-1 mt-4">
                            <span>GALLERY</span>
                        </h2>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.gallery.index') }}" class="group {{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                        <circle cx="8.5" cy="10" r="1.5" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M5.5 17L10 12.5C10.4 12.1 11.1 12.1 11.5 12.5L14 15L15.5 13.5C15.9 13.1 16.6 13.1 17 13.5L18.5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">All Images</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.gallery.create') }}" class="group {{ request()->routeIs('admin.gallery.create') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="5" width="12" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                        <circle cx="7.5" cy="9" r="1.2" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M5 13L8 10.5C8.4 10.2 8.9 10.2 9.3 10.5L12 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19 8V16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M15 12H23" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">Add Image</span>
                                </div>
                            </a>
                        </li>

                        <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 -mx-4 mb-1 mt-4">
                            <span>CAREERS</span>
                        </h2>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.careers.index') }}" class="group {{ request()->routeIs('admin.careers.index') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="7" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M9 7V6C9 4.89543 9.89543 4 11 4H13C14.1046 4 15 4.89543 15 6V7" stroke="currentColor" stroke-width="1.5"/>
                                        <path d="M3 12H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M14 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M10 11V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M14 11V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">All Openings</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.career-applications.index') }}" class="group {{ request()->routeIs('admin.career-applications.*') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 8H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M7 12H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M7 16H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M6 3H14.5858C15.1162 3 15.6249 3.21071 16 3.58579L19.4142 7C19.7893 7.37507 20 7.88378 20 8.41421V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V5C4 3.89543 4.89543 3 6 3Z" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M14 3V7C14 8.10457 14.8954 9 16 9H20" stroke="currentColor" stroke-width="1.5"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">Applications</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="{{ route('admin.careers.create') }}" class="group {{ request()->routeIs('admin.careers.create') ? 'active' : '' }}">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="7" width="12" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                        <path opacity="0.5" d="M7.5 7V6C7.5 4.89543 8.39543 4 9.5 4H10.5C11.6046 4 12.5 4.89543 12.5 6V7" stroke="currentColor" stroke-width="1.5"/>
                                        <path d="M19 8V16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M15 12H23" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">Add Opening</span>
                                </div>
                            </a>
                        </li>

                        <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 -mx-4 mb-1 mt-4">
                            <span>OTHERS</span>
                        </h2>

                        <li class="menu nav-item">
                            <a href="{{ route('home') }}" target="_blank" class="group">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary shrink-0" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 11L21.2 2.80005" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M13 11H17.8C19.5222 11 20.3833 11 20.9417 10.4417C21.5 9.88333 21.5 9.02222 21.5 7.3V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"/>
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black">View Website</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- END SIDEBAR -->

        <!-- BEGIN CONTENT AREA -->
        <div class="main-content flex min-h-screen flex-col">
            <!-- BEGIN TOP NAVBAR -->
            <header :class="[$store.app.navbar]">
                <div class="shadow-sm">
                    <div class="relative flex w-full items-center bg-white px-5 py-2.5">
                        <div class="horizontal-logo flex lg:hidden justify-between items-center ltr:mr-2 rtl:ml-2">
                            <a href="{{ route('admin.dashboard') }}" class="main-logo flex items-center shrink-0">
                                {{-- <img class="w-18 h-10 ltr:-ml-1 rtl:-mr-1 inline rounded-lg" src="{{ asset('assets/images/logo/logo-main.webp') }}" alt="logo" />  --}}
                            </a>
                            <button type="button" class="collapse-icon flex-none hover:text-primary flex lg:hidden ltr:ml-2 rtl:mr-2 p-2 rounded-full bg-white-light/40 hover:bg-white-light/90" @click="$store.app.toggleSidebar()">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>

                        <div class="sm:flex-1 ltr:sm:ml-0 ltr:ml-auto sm:rtl:mr-0 rtl:mr-auto flex items-center justify-end space-x-1.5 lg:space-x-2 rtl:space-x-reverse">
                            <div class="dropdown shrink-0" x-data="dropdown" @click.outside="open = false">
                                <a href="javascript:;" class="group relative" @click="toggle">
                                    <span class="flex items-center gap-2 p-2 rounded-full bg-white-light/40 hover:bg-white-light/90 transition">
                                        <span class="text-sm font-semibold">{{ Session::get('admin_name', 'Admin') }}</span>
                                        <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                            <path opacity="0.5" d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                    </span>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms>
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}" @click="toggle">
                                            <svg class="ltr:mr-2 rtl:ml-2 shrink-0" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" fill="currentColor"/>
                                                <path d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z" fill="currentColor"/>
                                            </svg>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}" id="logoutForm">
                                            @csrf
                                            <button type="submit">
                                                <svg class="ltr:mr-2 rtl:ml-2 rotate-90 shrink-0" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END TOP NAVBAR -->

            <!-- BEGIN CONTENT -->
            <div class="animate__animated p-6 flex-1" :class="[$store.app.animation]">
                @yield('content')
            </div>
            <!-- END CONTENT -->

            <!-- BEGIN FOOTER -->
            <div class="p-6 pt-0 mt-auto w-full">
                <p class="text-center ltr:sm:text-center rtl:sm:text-center">
                    © {{ date('Y') }} Steel Tech. All rights reserved.
                </p>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- END CONTENT AREA -->
    </div>

    {{-- Quick Create Category Drawer (shared across product pages) --}}
    <div id="quickCategoryDrawer" class="drawer-overlay" onclick="closeQuickCategoryDrawer(event)">
        <div class="drawer-panel">
            <div class="drawer-header">
                <div>
                    <h4 class="drawer-title">Quick Add Category</h4>
                    <p class="drawer-subtitle">New category will be selected automatically</p>
                </div>
                <button onclick="closeQuickCategoryDrawer()" class="drawer-close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>

            <div class="drawer-body">
                <div class="form-group">
                    <label class="drawer-label" for="quickCategoryName">
                        Category Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="quickCategoryName"
                        class="form-input drawer-input"
                        placeholder="Enter category name"
                        autocomplete="off">
                    <div id="quickNameError" class="field-error" style="display:none;"></div>
                </div>

                <div class="form-group mt-4">
                    <label class="drawer-label" for="quickParentCategory">
                        Parent Category
                    </label>
                    <select id="quickParentCategory" class="form-select drawer-input">
                        <option value="">— None (Top-level category) —</option>
                        {{-- Populated dynamically by JS --}}
                    </select>
                    <p class="field-hint">Leave empty to create a top-level category.</p>
                </div>

                <div id="quickGlobalError" class="global-error" style="display:none;"></div>
            </div>

            <div class="drawer-footer">
                <button type="button" onclick="closeQuickCategoryDrawer()" class="btn btn-outline-secondary w-full">
                    Cancel
                </button>
                <button type="button" onclick="submitQuickCategory()" id="quickSubmitBtn" class="btn btn-primary w-full">
                    <span id="quickBtnText">Create & Select</span>
                    <span id="quickBtnLoader" style="display:none;">
                        <svg class="spin" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="40" stroke-dashoffset="10"/>
                        </svg>
                        Creating...
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts at the bottom of body -->
    <!-- jQuery First -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Alpine.js and dependencies -->
    <script src="{{ asset('admin/assets/js/alpine-collaspe.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/alpine-persist.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/alpine-ui.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/alpine-focus.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/alpine.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('admin/assets/js/perfect-scrollbar.min.js') }}"></script>

    <!-- Popper & Tippy -->
    <script defer src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('admin/assets/js/tippy-bundle.umd.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            // Main Alpine data
            Alpine.data('main', () => ({}));

            // Alpine store - Always Light Mode
            Alpine.store('app', {
                sidebar: false,
                navbar: 'navbar-sticky',
                semidark: false,
                theme: 'light',
                isDarkMode: false,
                rtlClass: 'ltr',
                menu: 'vertical',
                layout: 'full',
                animation: '',

                toggleSidebar() {
                    this.sidebar = !this.sidebar;
                }
            });

            // Dropdown component
            Alpine.data('dropdown', () => ({
                open: false,
                toggle() {
                    this.open = !this.open;
                },
            }));
        });

        // Initialize Perfect Scrollbar
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarScrollbar = document.querySelector('.sidebar .perfect-scrollbar');
            if (sidebarScrollbar && typeof PerfectScrollbar !== 'undefined') {
                new PerfectScrollbar(sidebarScrollbar, {
                    wheelPropagation: false,
                    suppressScrollX: true
                });
            }
        });

        // Hide loader on page load
        window.addEventListener('load', function() {
            const loader = document.querySelector('.screen_loader');
            if (loader) {
                loader.style.display = 'none';
            }
        });

        // Logout confirmation
        $(document).ready(function() {
            $('#logoutForm').on('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Logout?',
                    text: 'Are you sure you want to logout?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#fea935',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, Logout',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        container: 'swal-custom-zindex'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>

    <script>
    // ── Quick Category Drawer (product create/edit pages) ──────────────────
    let _quickCategoryCallback = null;

    function openQuickCategoryDrawer(onSuccess) {
        _quickCategoryCallback = onSuccess;

        // Reset state
        $('#quickCategoryName').val('').removeClass('input-error');
        $('#quickParentCategory').val('');
        $('#quickNameError').hide().text('');
        $('#quickGlobalError').hide().text('');
        $('#quickBtnText').show();
        $('#quickBtnLoader').hide();
        $('#quickSubmitBtn').prop('disabled', false);

        // Load parent options dynamically
        $.get('{{ route("admin.categories.index") }}', function() {})
            .always(function() {
                // Load via dedicated endpoint instead
            });

        loadQuickParentOptions();
        $('#quickCategoryDrawer').addClass('open');
        setTimeout(() => document.getElementById('quickCategoryName').focus(), 320);
    }

    function loadQuickParentOptions() {
        $.ajax({
            url: '/admin/categories/parents',
            type: 'GET',
            success: function(data) {
                const $sel = $('#quickParentCategory');
                $sel.find('option:not(:first)').remove();
                data.forEach(function(cat) {
                    $sel.append($('<option>', { value: cat.id, text: cat.name }));
                });
            }
        });
    }

    function closeQuickCategoryDrawer(e) {
        if (e && e.target !== document.getElementById('quickCategoryDrawer')) return;
        $('#quickCategoryDrawer').removeClass('open');
    }

    function submitQuickCategory() {
        const name      = $('#quickCategoryName').val().trim();
        const parent_id = $('#quickParentCategory').val() || null;

        $('#quickCategoryName').removeClass('input-error');
        $('#quickNameError').hide();
        $('#quickGlobalError').hide();

        if (!name) {
            $('#quickCategoryName').addClass('input-error');
            $('#quickNameError').text('Category name is required.').show();
            return;
        }

        $('#quickBtnText').hide();
        $('#quickBtnLoader').show();
        $('#quickSubmitBtn').prop('disabled', true);

        $.ajax({
            url: '{{ route("admin.categories.store") }}',
            type: 'POST',
            data: { name: name, parent_id: parent_id, _token: '{{ csrf_token() }}' },
            success: function(response) {
                $('#quickCategoryDrawer').removeClass('open');
                if (typeof _quickCategoryCallback === 'function') {
                    _quickCategoryCallback(response.category);
                }
            },
            error: function(xhr) {
                $('#quickBtnText').show();
                $('#quickBtnLoader').hide();
                $('#quickSubmitBtn').prop('disabled', false);

                if (xhr.responseJSON?.errors?.name) {
                    $('#quickCategoryName').addClass('input-error');
                    $('#quickNameError').text(xhr.responseJSON.errors.name[0]).show();
                } else {
                    const msg = xhr.responseJSON?.message || 'Something went wrong.';
                    $('#quickGlobalError').text(msg).show();
                }
            }
        });
    }

    $(document).on('keydown', function(e) {
        if (e.key === 'Escape') $('#quickCategoryDrawer').removeClass('open');
    });
    </script>

    @stack('scripts')
</body>
</html>
