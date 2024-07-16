<!--begin::Content-->
<div class="collapse show">
    <!--begin::Form-->
    <form class="form" method="POST" action="{{ route('viettelpay.loginOtp') }}">
        @csrf
        @method('POST')
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                @include('partials.general._button-indicator', ['label' => __('Get OTP')])
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Content-->

<!--begin::Content-->
<div class="collapse show">
    <!--begin::Form-->
    <form class="form" method="POST" action="{{ route('viettelpay.DoLogin') }}">
        @csrf
        @method('POST')
        <!--begin::Card body-->
        <div class="card-body border-top p-9">

            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('otp') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text" name="viettelpay_otp" class="form-control form-control-lg form-control-solid"
                           placeholder="viettelpay_otp"
                           value="{{ old('viettelpay_otp',   $data->viettelpay_otp ?? '') }}"/>
                </div>
                <!--end::Col-->
            </div>

        </div>
        <!--end::Card body-->

        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">

            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                @include('partials.general._button-indicator', ['label' => __('Save Changes')])
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Content-->


<!--begin::Content-->
<div class="collapse show">
    <!--begin::Form-->
    <form class="form" method="POST" action="{{ route('viettelpay.update2') }}">
        @csrf
        @method('POST')
        <!--begin::Card body-->
        <div class="card-body border-top p-9">

            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('phone') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text" name="viettelpay_phone"
                           class="form-control form-control-lg form-control-solid"
                           placeholder="viettelpay_phone"
                           value="{{ old('viettelpay_phone',   $data->viettelpay_phone ?? '') }}"/>
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('password') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text" name="viettelpay_password"
                           class="form-control form-control-lg form-control-solid"
                           placeholder="viettelpay_password"
                           value="{{ old('viettelpay_password',   $data->viettelpay_password ?? '') }}"/>
                </div>
                <!--end::Col-->
            </div>

        </div>
        <!--end::Card body-->

        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                @include('partials.general._button-indicator', ['label' => __('Save Changes')])
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Content-->