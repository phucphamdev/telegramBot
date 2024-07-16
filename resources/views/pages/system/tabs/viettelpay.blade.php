
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