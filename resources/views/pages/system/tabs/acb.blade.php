<!--begin::Form-->
<form class="form" method="POST" action="{{ route('system.updateACBank') }}" >
    @csrf
    @method('POST')
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('acb_username') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="acb_username" class="form-control form-control-lg form-control-solid"
                       placeholder="acb_username" value="{{ $info->acb_username }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('acb_password') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="acb_password" class="form-control form-control-lg form-control-solid"
                       placeholder="acb_password" value="{{ $info->acb_password }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('acb_accountNumber') }}</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" name="acb_accountNumber" class="form-control form-control-lg form-control-solid"
                       placeholder="acb_accountNumber" value="{{ $info->acb_accountNumber }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->




    </div>
    <!--end::Card body-->


</form>
<!--end::Form-->