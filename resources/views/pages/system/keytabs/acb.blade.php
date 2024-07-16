<!--begin::Form-->
<form class="form" method="POST" action="{{ route('system.updateACBank') }}" >
    @csrf
    @method('POST')
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('acb_accessToken') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="acb_accessToken" class="form-control form-control-lg form-control-solid"
                       placeholder="acb_accessToken" value="{{ $info->acb_accessToken }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('acb_identity') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="acb_identity" class="form-control form-control-lg form-control-solid"
                       placeholder="acb_identity" value="{{ $info->acb_identity }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('acb_refreshToken') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="acb_refreshToken" class="form-control form-control-lg form-control-solid"
                       placeholder="acb_refreshToken" value="{{ $info->acb_refreshToken }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->


    </div>
    <!--end::Card body-->

</form>
<!--end::Form-->