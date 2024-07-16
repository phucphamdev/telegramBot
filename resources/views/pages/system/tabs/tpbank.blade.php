<form class="form" method="POST" action="{{ route('tpbank.update2') }}">
    @csrf
    @method('POST')
    <!--begin::Card body-->
    <div class="card-body border-top p-9">

        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('username') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="tpbank_username"
                       class="form-control form-control-lg form-control-solid"
                       placeholder="tpbank_username"
                       value="{{ old('tpbank_username',  $data->tpbank_username ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('password') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="tpbank_password"
                       class="form-control form-control-lg form-control-solid"
                       placeholder="tpbank_password"
                       value="{{ old('tpbank_password',  $data->tpbank_password ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('debtorAccountNumber') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="tpbank_debtorAccountNumber"
                       class="form-control form-control-lg form-control-solid"
                       placeholder="tpbank_debtorAccountNumber"
                       value="{{ old('tpbank_debtorAccountNumber',  $data->tpbank_debtorAccountNumber ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>

    </div>
    <!--end::Card body-->
</form>