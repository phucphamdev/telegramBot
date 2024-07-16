<!--begin::Form-->
<form class="form" method="POST" action="{{ route('system.updateMBBank') }}" >
    @csrf
    @method('POST')

    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <input type="hidden" name="id" value="{{ $info->id }}"/>
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('mbbank_captchaKey') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="mbbank_captchaKey" class="form-control form-control-lg form-control-solid"
                       placeholder="mbbank_captchaKey" value="{{ $info->mbbank_captchaKey }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('mbbank_imei') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="mbbank_imei" class="form-control form-control-lg form-control-solid"
                       placeholder="mbbank_imei" value="{{ $info->mbbank_imei }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('mbbank_sessionId') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="mbbank_sessionId" class="form-control form-control-lg form-control-solid"
                       placeholder="mbbank_sessionId" value="{{ $info->mbbank_sessionId }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('mbbank_account_no') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="mbbank_account_no" class="form-control form-control-lg form-control-solid"
                       placeholder="mbbank_account_no" value="{{ $info->mbbank_account_no }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('mbbank_cust_id') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="mbbank_cust_id" class="form-control form-control-lg form-control-solid"
                       placeholder="mbbank_cust_id" value="{{ $info->mbbank_cust_id }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

    </div>
    <!--end::Card body-->

</form>
<!--end::Form-->