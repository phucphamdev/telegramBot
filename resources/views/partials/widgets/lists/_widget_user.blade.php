<!--begin::List Widget 5-->
<div class="card {{ $class }}">
    <!--begin::Header-->
    <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="fw-bolder mb-2 text-dark">Logs</span>
            <span class="text-muted fw-bold fs-7">Logs Details</span>
        </h3>

{{--        <div class="card-toolbar">--}}
{{--            <!--begin::Menu-->--}}
{{--            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">--}}
{{--                {!! theme()->getSvgIcon("icons/duotune/general/gen024.svg", "svg-icon-2");  !!}--}}
{{--            </button>--}}
{{--        {{ theme()->getView('partials/menus/_menu-1') }}--}}
{{--        <!--end::Menu-->--}}
{{--        </div>--}}
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-5">
        <!--begin::Timeline-->
        <div class="timeline-label">
            <!--begin::Item-->
            <div class="timeline-item">
                <!--begin::Label-->
                <div class="timeline-label fw-bolder text-gray-800 fs-6">10:00</div>
                <!--end::Label-->

                <!--begin::Badge-->
                <div class="timeline-badge">
                    <i class="fa fa-genderless text-success fs-1"></i>
                </div>
                <!--end::Badge-->

                <!--begin::Content-->
                <div class="timeline-content d-flex">
                    <span class="fw-bolder text-gray-800 ps-3">Login</span>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="timeline-item">
                <!--begin::Label-->
                <div class="timeline-label fw-bolder text-gray-800 fs-6">14:37</div>
                <!--end::Label-->

                <!--begin::Badge-->
                <div class="timeline-badge">
                    <i class="fa fa-genderless text-danger fs-1"></i>
                </div>
                <!--end::Badge-->

                <!--begin::Desc-->
                <div class="timeline-content fw-bolder text-gray-800 ps-3">
                    Make deposit
                    <a href="#" class="text-primary">USD 700</a>.
                    to ACE 1368
                </div>
                <!--end::Desc-->
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="timeline-item">
                <!--begin::Label-->
                <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                <!--end::Label-->

                <!--begin::Badge-->
                <div class="timeline-badge">
                    <i class="fa fa-genderless text-primary fs-1"></i>
                </div>
                <!--end::Badge-->

                <!--begin::Text-->
                <div class="timeline-content fw-mormal text-muted ps-3">
                    Update Email Done
                </div>
                <!--end::Text-->
            </div>
            <!--end::Item-->

        </div>
        <!--end::Timeline-->
    </div>
    <!--end: Card Body-->
</div>
<!--end: List Widget 5-->
