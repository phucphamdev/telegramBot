<!--begin::Basic info-->
<div class="card {{ $class }}">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
		 data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{ __('MBBank Details') }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->

	<!--begin::Content-->
	<div class="collapse show">
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
