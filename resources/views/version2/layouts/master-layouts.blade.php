<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      data-layout="vertical"
      data-topbar="light"
      data-sidebar="light"
      data-sidebar-size="sm"
      data-sidebar-image="none"
      data-preloader="enable"
      data-layout-style="detached"
      data-layout-mode="dark"
      data-layout-width="fluid"
      data-layout-position="fixed"
>

<head>
    <meta charset="utf-8"/>
    <title> @yield('title')| Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
    @include('version2.layouts.head-css')
</head>
<body>

<!-- Begin page -->
<div id="layout-wrapper">
    @include('version2.layouts.topbar')
    @include('version2.layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <!-- Start content -->
            <div class="container-fluid">
                @yield('content')
            </div> <!-- content -->
        </div>
        @include('version2.layouts.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('version2.layouts.customizer')
<!-- END Right Sidebar -->

@include('version2.layouts.vendor-scripts')
</body>

</html>
