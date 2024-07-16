<!--begin::Basic info-->
<div class="card {{ $class }}">
	<!--begin::Card header-->
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
		 data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{ __('Momo Details') }}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->

	<!--begin::Content-->
	<div class="collapse show">
		<!--begin::Form-->
		<form class="form" method="POST" action="{{ route('momo.momo.loginOtp') }}">
			@csrf
			@method('POST')
			<!--begin::Actions-->
			<div class="card-footer d-flex justify-content-end py-6 px-9">
				<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
					@include('partials.general._button-indicator', ['label' => __('Get OTP')])
				</button>
			</div>
			<!--end::Actions-->
		</form>
		<!--end::Form-->
	</div>
	<!--end::Content-->

	<!--begin::Content-->
	<div class="collapse show">
		<!--begin::Form-->
		<form class="form" method="POST" action="{{ route('momo.momo.DoLogin') }}">
			@csrf
			@method('POST')
			<!--begin::Card body-->
			<div class="card-body border-top p-9">
				<div class="row mb-6">
					<!--begin::Label-->
					<label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('otp') }}</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 fv-row">
						<input type="text" name="otp" class="form-control form-control-lg form-control-solid"
							   placeholder="otp" value="{{ old('otp',  $momo->otp ?? '') }}"/>
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

	<!--begin::Content-->
	<div class="collapse show">
		<!--begin::Form-->
		<form class="form" method="POST" action="{{ route('momo.momo.update2') }}">
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
