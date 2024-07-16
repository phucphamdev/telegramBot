<!--begin::Content-->
<div  class="app-content flex-column-fluid">

	<!--begin::Basic info-->
	<div class="card mb-5 mb-xl-10">
		<!--begin::Content-->
		<div id="kt_account_settings_profile_details" class="collapse show">
			<!--begin::Form-->
			<form action="{{ route('partners_profile.update') }}" method="POST" class="form"  id="partners_profile" name="partners_profile">
				{{ csrf_field() }}
				<!--begin::Card body-->
				<div class="card-body border-top p-9">
					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
							<input type="hidden" name="id" value="{{ $user->id }}" />
							<!--begin::Row-->
							<div class="row">
								<!--begin::Col-->
								<div class="col-lg-6 fv-row">
									<input type="text" name="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="first_name" value="{{ $user->first_name }}" />
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-6 fv-row">
									<input type="text" name="last_name" class="form-control form-control-lg form-control-solid" placeholder="last_name" value="{{ $user->last_name }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label required fw-semibold fs-6">email</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<a class="form-control form-control-lg form-control-solid" > {{ $user->email }} </a>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->

					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label fw-semibold fs-6">ck_momo</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<a class="form-control form-control-lg form-control-solid" > {{ $user->ck_momo }} %</a>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->

					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label fw-semibold fs-6">ck_vtpay</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<a class="form-control form-control-lg form-control-solid" > {{ $user->ck_vtpay }} %</a>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->

					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label fw-semibold fs-6">ck_bank</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<a class="form-control form-control-lg form-control-solid" > {{ $user->ck_bank }} %</a>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->

					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label fw-semibold fs-6">ck_zalo</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<a class="form-control form-control-lg form-control-solid" > {{ $user->ck_zalo }} %</a>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->

					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label fw-semibold fs-6">so_du</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<a class="form-control form-control-lg form-control-solid" > {{  str_replace(',', '.', number_format($user->so_du)) }} VND</a>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->

					<!--begin::Input group-->
					<div class="row mb-6">
						<!--begin::Label-->
						<label class="col-lg-4 col-form-label fw-semibold fs-6">role</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<a class="form-control form-control-lg form-control-solid"  />{{ $user->role }}</a>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->


				</div>
				<!--end::Card body-->
				<!--begin::Actions-->
				<div class="card-footer d-flex justify-content-end py-6 px-9">
					<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
					<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
				</div>
				<!--end::Actions-->
			</form>
			<!--end::Form-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Basic info-->

	@section('scripts')
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript"
				src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript">


			(function ($) {
				"use strict";

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});



				$("#partners_profile").submit(function (e) {

					e.preventDefault(); // avoid to execute the actual submit of the form.

					var form = $(this);
					var actionUrl = form.attr('action');
					var form_data = get_form_data();
					console.log(form_data);

					$.ajax({
						type: 'POST',
						dataType: 'json',
						data: JSON.stringify(form_data),
						url: actionUrl,
						contentType: "application/json; charset=utf-8",
						traditional: true,
						success: function (data) {
							Swal.fire({
								text: "successfully submitted!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							});

							location.reload();
						}
					});

				});

				function get_form_data(element) {
					element = element || '';
					var all_page_data = {};
					var all_forms_data_temp = {};
					if (!element) {
						element = 'body';
					}

					if ($(element)[0] == undefined) {
						return null;
					}

					$(element).find('input,select,textarea').each(function (i) {
						all_forms_data_temp[i] = $(this);
					});

					$.each(all_forms_data_temp, function () {
						var input = $(this);
						var element_name;
						var element_value;

						if ((input.attr('type') == 'submit') || (input.attr('type') == 'button')) {
							return true;
						}

						if ((input.attr('name') !== undefined) && (input.attr('name') != '')) {
							element_name = input.attr('name').trim();
						} else if ((input.attr('id') !== undefined) && (input.attr('id') != '')) {
							element_name = input.attr('id').trim();
						} else if ((input.attr('class') !== undefined) && (input.attr('class') != '')) {
							element_name = input.attr('class').trim();
						}

						if (input.val() !== undefined) {
							if (input.attr('type') == 'checkbox') {
								element_value = input.parent().find('input[name="' + element_name + '"]:checked').val();
							} else if ((input.attr('type') == 'radio')) {
								element_value = $('input[name="' + element_name + '"]:checked', element).val();
							} else {
								element_value = input.val();
							}
						} else if (input.text() != undefined) {
							element_value = input.text();
						}

						if (element_value === undefined) {
							element_value = '';
						}

						if (element_name !== undefined) {
							var element_array = new Array();
							if (element_name.indexOf(' ') !== -1) {
								element_array = element_name.split(/(\s+)/);
							} else {
								element_array.push(element_name);
							}

							$.each(element_array, function (index, name) {
								name = name.trim();
								if (name != '') {
									all_page_data[name] = element_value;
								}
							});
						}
					});
					return all_page_data;
				}



			})(jQuery);


		</script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">

	@endsection
</div>
<!--end::Content-->
