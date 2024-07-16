<x-base-layout>

	<div class="app-main flex-column flex-row-fluid" >
		<!--begin::Basic info-->
		<div class="card mb-5 mb-xl-10">
			<!--begin::Card header-->
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Chi Tiết </h3>
				</div>
				<!--end::Card title-->
			</div>
			<!--begin::Card header-->

			<form id="banks_update" name="banks_update" method="POST"
				  class="form"
				  action="{{ route('bankusers.update') }}" >

				{{ csrf_field() }}

				<div id="kt_account_settings_profile_details" class="collapse show">
					<!--begin::Form-->
					<form id="kt_account_profile_details_form" class="form">
						<!--begin::Card body-->
						<div class="card-body border-top p-9">

							<input type="hidden" name="id" class="form-control form-control-lg form-control-solid" placeholder="full_name" value="{{ $data['id']  }}" />

							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Ten Day Du</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" name="full_name" class="form-control form-control-lg form-control-solid" placeholder="full_name" value="{{ $data['full_name']  }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->


							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">chi nhanh</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" name="branch" class="form-control form-control-lg form-control-solid" placeholder="branch" value="{{ $data['branch']  }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">so tai khoan</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" name="number1" class="form-control form-control-lg form-control-solid" placeholder="number1" value="{{ $data['number1']  }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">username</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" name="username" class="form-control form-control-lg form-control-solid" placeholder="username" value="{{ $data['username']  }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->


							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">password</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" name="password" class="form-control form-control-lg form-control-solid" placeholder="password" value="{{ $data['password']  }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">link_qrcode</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" name="link_qrcode" class="form-control form-control-lg form-control-solid" placeholder="link_qrcode" value="{{ $data['link_qrcode']  }}" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->


							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6">
								<span class="required">Loại Ngân
														Hàng:</span>
									<span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
																<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
								</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<select data-control="select2"
											data-placeholder="Select a format"
											data-dz-name="bankcode" id="bankcode"
											name="bankcode"
											required
											data-hide-search="true"
											class="form-select form-select-solid">
										@foreach(DB::table('bankcodes')->get() as $bank)
											<option
												value="{{ $bank->code }}" {{ $bank->code == $data['bankcode']  ? 'selected' : '' }}>{{ $bank->name }}</option>
										@endforeach
									</select>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="row mb-0">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6"> Chay Cron Job</label>
								<!--begin::Label-->
								<!--begin::Label-->
								<div class="col-lg-8 d-flex align-items-center">
									<div class="form-check form-check-solid form-switch form-check-custom fv-row">
										<input class="form-check-input w-45px h-30px" name="run" type="checkbox" id="allowmarketing" {{ $data['run'] == 1 ? 'checked '  :  " "  }}  />
										<label class="form-check-label" for="allowmarketing"></label>
									</div>
								</div>
								<!--begin::Label-->
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Card body-->
						<!--begin::Actions-->
						<div class="card-footer d-flex justify-content-end py-6 px-9">
							<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
							<button type="submit" class="btn btn-primary" >Save Changes</button>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>

			</form>

		</div>
		<!--end::Basic info-->



	</div>



	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>


	<script type="text/javascript">

		(function ($) {
			"use strict";


			$("#banks_update").submit(function (e) {

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


</x-base-layout>
