<!--begin::Basic info-->
<div class="card {{ $class }}">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
		 data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{ __('Vietcombank Details') }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->

	<!--begin::Content-->
	<div class="collapse show">
		<!--begin::Form-->
		<form class="form" method="POST" action="{{ route('system.updateVietcombank') }}">
			@csrf
			@method('POST')
			<!--begin::Card body-->
			<div class="card-body border-top p-9">
				<input type="hidden" name="id" value="999"/>
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
</div>
<!--end::Basic info-->
