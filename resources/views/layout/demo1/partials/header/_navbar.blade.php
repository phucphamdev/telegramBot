<!--begin::Navbar-->
<div class="app-navbar flex-shrink-0">
	<div class="app-navbar-item ms-1 ms-lg-3" >
		<h3> {{ auth()->user()->first_name }} </h3>
	</div>
	<div class="app-navbar-item ms-1 ms-lg-3" >
		<h4> {{ number_format(auth()->user()->so_du, 0, '', ',') }}  VNĐ </h4>
	</div>
	<!--begin::User menu-->
	<div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
		<!--begin::Menu wrapper-->
		<div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
			<img src="{{ auth()->user()->avatarUrl }}" alt="user" />
		</div>
		@include('partials/menus/_user-account-menu')
		<!--end::Menu wrapper-->
	</div>
	<!--end::User menu-->

</div>
<!--end::Navbar-->
