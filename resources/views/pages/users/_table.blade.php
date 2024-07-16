<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="users">
	<!--begin::Table head-->
	<thead>
	</thead>
	<!--end::Table head-->
	<!--begin::Table body-->
	<tbody>
	</tbody>
	<!--end::Table body-->
</table>
<!--end::Table-->

<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modaluser" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Form-->
			<form class="form" id="users_form" name="users_form" method="POST" action="{{ route('users.update') }}">
				@csrf
				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_new_address_header">
					<!--begin::Modal title-->
					<h2>Details</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
										 xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
											  transform="rotate(-45 6 17.3137)" fill="currentColor"/>
										<rect x="7.41422" y="6" width="16" height="2" rx="1"
											  transform="rotate(45 7.41422 6)" fill="currentColor"/>
									</svg>
								</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body py-10 px-lg-17">
					<!--begin::Scroll-->
					<div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_new_address_header"
						 data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">ID</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="id"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">UUID</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="UUID"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">first_name</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="first_name"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->


						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">last_name</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="last_name"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">email</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="email"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">IP</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="ip"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->


						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">key</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="key"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">access_token</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="access_token"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">callback_link</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="callback_link"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->


						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">Loại</label>
							<!--end::Label-->
							<!--begin::Input-->
							<!--begin::Col-->
							<div class="col-xl-9">
								<div class="form-check form-switch form-check-custom form-check-solid">
									<!--begin::Select2-->
									<select aria-label="label for the select" class="form-select form-select-solid"
											data-control="select2" name="type"
											data-kt-ecommerce-order-filter="type" id="type">
										<option value="1">Nhân Viên</option>
										<option value="2">Đối Tác</option>
										<option value="3">Khách Khàng Của Đói Tác</option>
									</select>
									<!--end::Select2-->
								</div>
							</div>
							<!--end::Col-->
							<!--end::Input-->
						</div>

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">Password</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="password"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

					</div>
					<!--end::Scroll-->
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					<!--begin::Button-->
					<button type="submit" class="btn btn-primary">
						<span class="indicator-label">Submit</span>
					</button>
					<!--end::Button-->
				</div>
				<!--end::Modal footer-->
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>
<!--end::Modal - New Address-->


<!--begin::Card-->
<div class="pt-6">
	<!--begin::Card body-->
	<div class="card card-body pt-6">
		<div class="card-header pt-8">
			<!--begin::Card title-->
			<div class="card card-title">
				<h2>Thêm</h2>
			</div>
			<!--end::Card title-->
		</div>
		<div class="card card-flush">
			<div class="card-body">
				<form id="users_create" name="users_create" method="post" class="form"
					  action="{{ route('users.store') }}">
					@csrf
					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">Loại:</label>
						<select data-control="select2" data-placeholder="Select a format" data-dz-name="type_create"
								name="type_create" required
								data-hide-search="true"
								class="form-select form-select-solid">
							<option value="1" selected>Nhân Viên</option>
							{{--							<option value="2">Đối Tác</option>--}}
							{{--							<option value="3">Khách Khàng Của Đói Tác</option>--}}
						</select>
					</div>


					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">Access-Token:</label>
						<input class="form-control form-control-solid" placeholder="access_token"
							   value="{{  Str::random(45) }}"
							   name="access_token_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">key:</label>
						<input class="form-control form-control-solid" placeholder="key"
							   value="{{  Str::random(35) }}"
							   name="key_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">Callback Link:</label>
						<input class="form-control form-control-solid" placeholder="callback_link"
							   name="callback_link_create"/>
					</div>

					<div class="fv-row mb-10">

						<label class="fs-5 fw-semibold form-label mb-5">Email:</label>

						<input class="form-control form-control-solid" placeholder="Email"
							   name="email_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">IP Server:</label>
						<input class="form-control form-control-solid" placeholder="ip"
							   name="ip_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">Username:</label>
						<input class="form-control form-control-solid" placeholder="Tên"
							   name="name_create"/>
					</div>

					<div class="fv-row mb-10">

						<label class="fs-5 fw-semibold form-label mb-5">Password:</label>

						<input class="form-control form-control-solid" placeholder="123456"
							   name="password_create"/>

					</div>

					<div class="text-center">
						<button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
							<span class="indicator-label">Submit</span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
	<!--end::Card body-->
</div>
<!--end::Card-->


{{-- Inject Scripts --}}
@section('scripts')

	<script type="text/javascript">

		function getDetailUsers(event, element) {
			if ('preventDefault' in event) event.preventDefault();
			event.returnValue = false;
			let id = element.dataset.id;
			let url = element.dataset.url;

			console.log(id);

			var item = {
				id
			}

			$.ajax({
				type: 'post',
				dataType: 'json',
				data: JSON.stringify(item),
				url: url,
				contentType: "application/json; charset=utf-8",
				traditional: true,
				success: function (data) {
					console.log(data);
					$("[name='id']").val(data.id);
					$("[name='UUID']").val(data.UUID);
					$("[name='first_name']").val(data.first_name);
					$("[name='last_name']").val(data.last_name);
					$("[name='email']").val(data.email);
					$("[name='password']").val(data.password);
					$("[name='ip']").val(data.ip);
					$("[name='callback_link']").val(data.callback_link);
					$("[name='key']").val(data.key);
					$("[name='access_token']").val(data.access_token);
					$("[name='api_token']").val(data.api_token);
					$("[name='type'] option").each(function () {
						if ($(this).val() == data.type) {
							$(this).prop("selected", true);
							return;
						}
					});
				}

			});
		}

		function getDeleteUsers(event, element) {
			Swal.fire({
				title: "Are you sure?",
				text: "You will not be able to recover this row!",
				type: "warning",
				icon: "error",
				buttonsStyling: false,
				closeOnConfirm: false,
				showLoaderOnConfirm: true,
				showCancelButton: true,
				confirmButtonText: "Yes, delete it!",
				customClass: {
					confirmButton: "btn btn-danger",
					cancelButton: "btn btn-primary",
				},
			}).then(function (isConfirm) {
				console.log(isConfirm.isConfirmed);
				if (!isConfirm.isConfirmed) return;

				let id = element.dataset.id;
				let url = element.dataset.url;

				if (id.length > 0) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						type: 'post',
						dataType: 'json',
						data: JSON.stringify({
							id: id
						}),
						url: url,
						contentType: "application/json; charset=utf-8",
						traditional: true,
						success: function (data) {
							if (data == true) {
								Swal.fire({
									text: "successfully Delete!",
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								});

								location.reload();

							} else {
								Swal.fire({
									text: "Oops! There are some error(s) detected.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								});

								location.reload();
							}
						}
					});
				} else {
					Swal.fire({
						text: "Oops! There are some error(s) detected.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-danger"
						}
					});
				}
			});

		}

		$("#users_form").submit(function (e) {

			e.preventDefault(); // avoid to execute the actual submit of the form.

			var form = $(this);
			var actionUrl = form.attr('action');

			let formData = {
				id: $("[name='id']").val(),
				first_name: $("[name='first_name']").val(),
				last_name: $("[name='last_name']").val(),
				email: $("[name='email']").val(),
				callback_link: $("[name='callback_link']").val(),
				password: $("[name='password']").val(),
				key: $("[name='key']").val(),
				access_token: $("[name='access_token']").val(),
				ip: $("[name='ip']").val(),
				type: $("#type option:selected").val(),
			};
			console.log(formData);
			$.ajax({
				type: 'POST',
				dataType: 'json',
				data: JSON.stringify(formData),
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

		$("#users_create").submit(function (e) {

			e.preventDefault(); // avoid to execute the actual submit of the form.

			var form = $(this);
			var actionUrl = form.attr('action');

			let formData = {
				name: $("[name='name_create']").val(),
				access_token: $("[name='access_token_create']").val(),
				callback_link: $("[name='callback_link_create']").val(),
				key: $("[name='key_create']").val(),
				ip: $("[name='ip_create']").val(),
				password: $("[name='password_create']").val(),
				email: $("[name='email_create']").val(),
				type: $("#type_create option:selected").val(),
			};
			console.log(formData);
			$.ajax({
				type: 'POST',
				dataType: 'json',
				data: JSON.stringify(formData),
				url: actionUrl,
				contentType: "application/json; charset=utf-8",
				traditional: true,
				success: function (data) {
					Swal.fire({
						text: "Create successfully!",
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

		(function ($) {
			"use strict";
			$('#users').DataTable({
				"aaSorting": [
					[0, "desc"]
				],
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('users.datatables') }}',
				columns: [
					// {data: 'id', name: 'id'},
					// {data: 'UUID', name: 'UUID'},
					{data: 'first_name', name: 'first_name'},
					{data: 'last_name', name: 'last_name'},
					{
						className: 'type',
						data: 'type',
						render: function (data, type) {
							if (type === 'display') {

								if (data == 1) {

									data = 'Nhân Viên';
								}

								if (data == 2) {

									data = 'Đối Tác';
								}

								if (data == 3) {

									data = 'KH của Đối Tác';
								}

							}
							return data;
						}
					},
					// {data: 'ip', name: 'ip'},
					{data: 'key', name: 'key'},
					{data: 'access_token', name: 'access_token'},
					{data: 'callback_link', name: 'callback_link'},
					// {data: 'created_at', name: 'created_at'},
					{data: 'action', searchable: true, orderable: true}
				],

			});
		})(jQuery);
	</script>
	{{ $dataTable->scripts() }}
@endsection
