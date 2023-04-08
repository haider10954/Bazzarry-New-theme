@php
if(!isset($useAssets))
    {
        $useAssets = [];
    }
@endphp
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon.ico')}}">
    @include('admin.includes.head')
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    @include('admin.includes.header')
    <!-- ========== App Menu ========== -->
    @include('admin.components.sidebar')
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
    <div class="main-content">

        @yield('content')
        @yield('modals')
        @include('admin.includes.footer')

    </div>
</div>
<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<div class="customizer-setting d-none d-md-block">
    <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
</div>

@include('admin.components.theme_setting')

@include('admin.includes.script')
@yield('custom-script')
</body>
</html>
