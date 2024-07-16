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
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('mbbank_username') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="mbbank_username" class="form-control form-control-lg form-control-solid"
                       placeholder="mbbank_username" value="{{ $info->mbbank_username }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('mbbank_password') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="mbbank_password" class="form-control form-control-lg form-control-solid"
                       placeholder="mbbank_password" value="{{ $info->mbbank_password }}"/>
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


    </div>
    <!--end::Card body-->

</form>
<!--end::Form-->