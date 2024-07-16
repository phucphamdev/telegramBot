<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
	  data-layout="vertical"
	  data-topbar="dark"
	  data-sidebar-image="none"
	  data-preloader="disable"
	  data-layout-style="detached"
	  data-layout-mode="light"
	  data-layout-width="fluid"
	  data-layout-position="fixed"
	  data-sidebar="dark"
	  data-sidebar-size="lg">

<head>
	<meta charset="utf-8"/>
	<title>@yield('title') | Kpaypro </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="@yield('title') | Kpaypro" name="description"/>
	<meta content="Kpaypro" name="author"/>

	<!-- App favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">

	@include('version2.layouts.head-css')
</head>

@section('body')
	@include('version2.layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">

	@include('version2.layouts.topbar')

	@include('version2.layouts.sidebar')

	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				@yield('content')
			</div>
			<!-- container-fluid -->
		</div>
		<!-- End Page-content -->

		@include('version2.layouts.footer')

	</div>
	<!-- end main content-->
</div>
<!-- END layout-wrapper -->

{{--@include('version2.layouts.customizer')--}}

<!-- JAVASCRIPT -->
@include('version2.layouts.vendor-scripts')

</body>

</html>
