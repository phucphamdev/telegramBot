<!--begin::Basic info-->
<div class="card {{ $class }}">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
		 data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{ __('ACB Details') }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->

	<!--begin::Content-->
	<div class="collapse show">
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
