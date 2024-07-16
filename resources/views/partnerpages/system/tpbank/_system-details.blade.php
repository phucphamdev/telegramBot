<!--begin::Basic info-->
<div class="card {{ $class }}">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
		 data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{ __('Tpbank Details') }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->
	<!--begin::Content-->
	<div class="collapse show">
		<!--begin::Form-->
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
