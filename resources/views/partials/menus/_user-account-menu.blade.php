<!--begin::User account menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
     data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="#" data-action="{{ route('logout') }}" data-method="post" data-csrf="{{ csrf_token() }}"
           data-reload="true" class="button-ajax menu-link px-5">
            {{ __('Sign Out') }}
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::User account menu-->
