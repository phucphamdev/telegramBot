<!--begin::Form-->
<form class="form" method="POST" action="{{ route('system.updateVietcombank') }}">
    @csrf
    @method('POST')

    <div class="card-body border-top p-9">

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_username') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_username" class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_username"
                       value="{{ old('vcb_username',  $info->vcb_username ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_password') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_password" class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_password"
                       value="{{ old('vcb_password',  $info->vcb_password ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->



        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('vcb_account_number') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="vcb_account_number"
                       class="form-control form-control-lg form-control-solid"
                       placeholder="vcb_account_number"
                       value="{{ old('vcb_account_number',  $info->vcb_account_number ?? '') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

    </div>

</form>
<!--end::Form-->