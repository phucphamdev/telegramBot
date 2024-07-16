<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="proxy">
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
<div class="modal fade" id="kt_modalproxy" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Form-->
			<form class="form" id="proxy_form" method="POST" action="{{ route('proxy.update') }}" >
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

						<!--begin::Input-->
						<input   type="hidden" class="form-control form-control-solid" placeholder="" name="id"/>
						<!--end::Input-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">local</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="local"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">ip</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="ip"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">port</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="port"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">username</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="username"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">password</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="password"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<div class="fv-row mb-10">
							<label class="fs-5 fw-semibold form-label mb-5">type:</label>
							<select data-control="select2" data-placeholder="Select a format" data-dz-name="type"
									name="type" id="type" required
									data-hide-search="true"
									class="form-select form-select-solid">
								<option value="momo">Momo</option>
								<option value="bank">Bank</option>
								<option value="zalopay">ZaloPay</option>
								<option value="viettelpay">Viettel Pay</option>
							</select>
						</div>

						<div class="fv-row mb-10">
							<label class="fs-5 fw-semibold form-label mb-5">status:</label>
							<select data-control="select2" data-placeholder="Select a format" data-dz-name="status"
									name="status" id="status" required
									data-hide-search="true"
									class="form-select form-select-solid">
								<option value="active">Active</option>
								<option value="inactive">InActive</option>
							</select>
						</div>


					</div>
					<!--end::Scroll-->
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					<!--begin::Button-->
					<button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
					<!--end::Button-->
					<!--begin::Button-->
					<button type="submit" id="proxy_submit"  class="btn btn-primary">
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
				<form id="proxy_create" name="proxy_create" method="post" class="form"
					  action="{{ route('proxy.store') }}">
					@csrf

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">IP</label>

						<input class="form-control form-control-solid" placeholder="ip"
							   name="ip_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">local</label>

						<input class="form-control form-control-solid" placeholder="local"
							   name="local_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">port</label>

						<input class="form-control form-control-solid" placeholder="port"
							   name="port_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">username</label>

						<input class="form-control form-control-solid" placeholder="username"
							   name="username_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">password</label>

						<input class="form-control form-control-solid" placeholder="password"
							   name="password_create"/>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">status:</label>
						<select data-control="select2" data-placeholder="Select a format" data-dz-name="type_create"
								name="type_create" id="type_create" required
								data-hide-search="true"
								class="form-select form-select-solid">
							<option value="momo">Momo</option>
							<option value="bank">Bank</option>
							<option value="zalopay">ZaloPay</option>
							<option value="viettelpay">Viettel Pay</option>
						</select>
					</div>

					<div class="fv-row mb-10">
						<label class="fs-5 fw-semibold form-label mb-5">status:</label>
						<select data-control="select2" data-placeholder="Select a format" data-dz-name="status_create"
								name="status_create" id="status_create" required
								data-hide-search="true"
								class="form-select form-select-solid">
							<option value="active">Active</option>
							<option value="inactive">InActive</option>
						</select>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

@section('scripts')
	<script type="text/javascript">
		function getDetailProxy(event, element) {
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
					$("[name='ip']").val(data.ip);
					$("[name='local").val(data.local);
					$("[name='port']").val(data.port);
					$("[name='username']").val(data.username);

					$("[name='type'] option").each(function() {
						if ($(this).val() == data.type) {
							$(this).prop("selected", true);
							return;
						}
					});

					if(data.status == 'active')
					{
						$("[name='status']").attr('checked','checked')
					}
					else
					{
						$("[name='status']").attr('checked','none')
					}
				}

			});

		}

		function getDeleteProxy(event, element) {
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

		function get_form_data(element){
			element = element || '';
			var all_page_data = {};
			var all_forms_data_temp = {};
			if(!element){
				element = 'body';
			}

			if($(element)[0] == undefined){
				return null;
			}

			$(element).find('input,select,textarea').each(function(i){
				all_forms_data_temp[i] = $(this);
			});

			$.each(all_forms_data_temp,function(){
				var input = $(this);
				var element_name;
				var element_value;

				if((input.attr('type') == 'submit') || (input.attr('type') == 'button')){
					return true;
				}

				if((input.attr('name') !== undefined) && (input.attr('name') != '')){
					element_name = input.attr('name').trim();
				} else if((input.attr('id') !== undefined) && (input.attr('id') != '')){
					element_name = input.attr('id').trim();
				} else if((input.attr('class') !== undefined) && (input.attr('class') != '')){
					element_name = input.attr('class').trim();
				}

				if(input.val() !== undefined){
					if(input.attr('type') == 'checkbox'){
						element_value = input.parent().find('input[name="'+element_name+'"]:checked').val();
					} else if((input.attr('type') == 'radio')){
						element_value = $('input[name="'+element_name+'"]:checked',element).val();
					} else {
						element_value = input.val();
					}
				} else if(input.text() != undefined){
					element_value = input.text();
				}

				if(element_value === undefined){
					element_value = '';
				}

				if(element_name !== undefined){
					var element_array = new Array();
					if(element_name.indexOf(' ') !== -1){
						element_array = element_name.split(/(\s+)/);
					} else {
						element_array.push(element_name);
					}

					$.each(element_array,function(index, name){
						name = name.trim();
						if(name != ''){
							all_page_data[name] = element_value;
						}
					});
				}
			});
			return all_page_data;
		}

		(function ($) {
			"use strict";
			$('#proxy').DataTable({
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('proxy.datatables') }}',
				columns: [
					{data: 'id', name: 'id'},
					{data: 'local', name: 'local'},
					{data: 'ip', name: 'ip'},
					{data: 'port', name: 'port'},
					{data: 'username', name: 'username'},
					{data: 'password', name: 'password'},
					{data: 'type', name: 'type'},
					{data: 'status', name: 'status'},
					// {data: 'trang_thai', name: 'trang_thai'},
					{data: 'created_at', name: 'created_at'},
					// {data: 'updated_at', name: 'updated_at'},
					{data: 'action', searchable: true, orderable: true}
				]
			});
		})(jQuery);

		$("#proxy_form").submit(function (e) {

			e.preventDefault(); // avoid to execute the actual submit of the form.

			var form = $(this);
			var actionUrl = form.attr('action');

			let formData = {
				id: $("[name='id']").val(),
				local: $("[name='local']").val(),
				ip: $("[name='ip']").val(),
				port: $("[name='port']").val(),
				username: $("[name='username']").val(),
				password: $("[name='password']").val(),
				status: $("#status option:selected").val(),
				type: $("#type option:selected").val(),
			};

			console.log(formData);
			console.log(actionUrl);

			$.ajax({
				type: 'POST',
				dataType: 'json',
				data: JSON.stringify(formData),
				url: actionUrl,
				contentType: "application/json; charset=utf-8",
				traditional: true,
				success: function (data) {
					console.log(data);
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


		$("#proxy_create").submit(function (e) {

			e.preventDefault(); // avoid to execute the actual submit of the form.

			var form = $(this);
			var actionUrl = form.attr('action');

			let formData = {
				local: $("[name='local_create']").val(),
				ip: $("[name='ip_create']").val(),
				port: $("[name='port_create']").val(),
				username: $("[name='username_create']").val(),
				password: $("[name='password_create']").val(),
				status: $("#status_create option:selected").val(),
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

	</script>
	{{ $dataTable->scripts() }}
@endsection