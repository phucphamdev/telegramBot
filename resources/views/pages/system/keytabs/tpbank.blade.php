<form class="form" method="POST" action="{{ route('tpbank.update2') }}">
    @csrf
    @method('POST')
    <!--begin::Card body-->
    <div class="card-body border-top p-9">


        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('tpbank_imei') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="tpbank_imei"
                       class="form-control form-control-lg form-control-solid"
                       placeholder="tpbank_imei"
                       value="{{ old('tpbank_imei',  $data->tpbank_imei ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('tpbank_token') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="tpbank_token"
                       class="form-control form-control-lg form-control-solid"
                       placeholder="tpbank_token"
                       value="{{ old('tpbank_token',  $data->tpbank_token ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('tpbank_DEVICE_NAME') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="tpbank_DEVICE_NAME"
                       class="form-control form-control-lg form-control-solid"
                       placeholder="tpbank_DEVICE_NAME"
                       value="{{ old('tpbank_DEVICE_NAME',  $data->tpbank_DEVICE_NAME ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>


    </div>
    <!--end::Card body-->

</form>