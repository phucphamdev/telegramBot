<!--begin::Card body-->
<div class="card-body border-top p-9">

    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('username') }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" name="username" class="form-control form-control-lg form-control-solid"
                   placeholder="username" value="{{ old('username',  $momo->username ?? '') }}"/>
        </div>
        <!--end::Col-->
    </div>

    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('password') }}</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" name="password" class="form-control form-control-lg form-control-solid"
                   placeholder="password" value="{{ old('password',  $momo->password ?? '') }}"/>
        </div>
        <!--end::Col-->
    </div>


</div>
<!--end::Card body-->