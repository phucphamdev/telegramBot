<!--begin::Form-->
<form class="form" method="POST" action="{{ route('system.updateVietcombank') }}">
    @csrf
    @method('POST')
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_sessionId') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_sessionId" class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_sessionId"
                       value="{{ old('vcb_sessionId',  $info->vcb_sessionId ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_mobileId') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_mobileId" class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_mobileId"
                       value="{{ old('vcb_mobileId',  $info->vcb_mobileId ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_clientId') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_clientId" class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_clientId"
                       value="{{ old('vcb_clientId',  $info->vcb_clientId ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_cif') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_cif" class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_cif" value="{{ old('vcb_cif',  $info->vcb_cif ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->


        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_captchaKey') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_captchaKey" class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_captchaKey"
                       value="{{ old('vcb_captchaKey',  $info->vcb_captchaKey ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

    </div>
    <!--end::Card body-->

</form>
<!--end::Form-->