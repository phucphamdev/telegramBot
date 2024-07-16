<!--begin::Basic info-->
<div class="card {{ $class }}">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
		 data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{ __('Ngan Hang') }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->

	<!--begin::Content-->
	<div class="collapse show">
		<!--begin::Form-->
		<form class="form" method="POST" action="{{ route('system.update') }}"
			  enctype="multipart/form-data">
			@csrf
			@method('POST')
			<!--begin::Card body-->
			<div class="card-body border-top p-9">
				<input type="hidden" name="id" class="form-control form-control-lg form-control-solid"
					   placeholder="id" value="{{ old('id',  $info->id ?? '') }}"/>
				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Port') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="port" class="form-control form-control-lg form-control-solid"
							   placeholder="Port" value="{{ old('port',  $info->port ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('URL') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="url" class="form-control form-control-lg form-control-solid"
							   placeholder="URL" value="{{ old('url',  $info->url ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('username') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="username" class="form-control form-control-lg form-control-solid"
							   placeholder="username" value="{{ old('username',  $info->username ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('password') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="password" class="form-control form-control-lg form-control-solid"
							   placeholder="password" value="{{ old('password',  $info->password ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('customfields1') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="customfields1" class="form-control form-control-lg form-control-solid"
							   placeholder="customfields1" value="{{ old('customfields1',  $info->customfields1 ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('customfields2') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="customfields2" class="form-control form-control-lg form-control-solid"
							   placeholder="customfields2" value="{{ old('customfields2',  $info->customfields1 ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('customfields3') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="customfields3" class="form-control form-control-lg form-control-solid"
							   placeholder="customfields3" value="{{ old('customfields3',  $info->customfields3 ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('customfields4') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="customfields4" class="form-control form-control-lg form-control-solid"
							   placeholder="customfields4" value="{{ old('customfields4',  $info->customfields4 ?? '') }}"/>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('customfields5') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="customfields5" class="form-control form-control-lg form-control-solid"
							   placeholder="customfields5" value="{{ old('customfields5',  $info->customfields5 ?? '') }}"/>
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
