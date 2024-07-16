<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="historymomo">
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
<div class="modal fade" id="kt_modalhistorymomo" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Form-->
			<form class="form" id="historymomo_form" method="POST" action="{{ route('historymomo.update') }}" >
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
						<input   type="hidden" class="form-control form-control-solid" placeholder="" name="ma_gd"/>
						<!--end::Input-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">tai_khoan_nhan</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="tai_khoan_nhan"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">tai_khoan_khach_hang</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="tai_khoan_khach_hang"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">ten_khach_hang</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="ten_khach_hang"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">noi_dung</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="noi_dung"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">so_tien</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="number" class="form-control form-control-solid" placeholder="" name="so_tien"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">so_tien_thuc_nhan</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="so_tien_thuc_nhan"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">doi_tac</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="doi_tac"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->


						<div class="row">
							<!--begin::Col-->
							<div class="col-xl-3">
								<div class="fs-6 fw-semibold mt-2 mb-3">Status</div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-xl-9">
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox"  name="trang_thai" >
									<label class="form-check-label fw-semibold text-gray-400 ms-3" for="trang_thai">Active</label>
								</div>
							</div>
							<!--end::Col-->
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
					<button type="submit" id="historymomo_submit"  class="btn btn-primary">
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

{{-- Inject Scripts --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


@section('scripts')
	<script type="text/javascript">
		function getDetailHistoryMomo(event, element) {
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
					$("[name='ma_gd']").val(data.ma_gd);
					$("[name='tai_khoan_nhan']").val(data.tai_khoan_nhan);
					$("[name='tai_khoan_khach_hang']").val(data.tai_khoan_khach_hang);
					$("[name='ten_khach_hang']").val(data.ten_khach_hang);
					$("[name='noi_dung']").val(data.noi_dung);
					$("[name='so_tien']").val(data.so_tien);
					$("[name='so_tien_thuc_nhan']").val(data.so_tien_thuc_nhan);
					$("[name='doi_tac']").val(data.doi_tac);
					if(data.trang_thai == 'active')
					{
						$("[name='trang_thai']").attr('checked','checked')
					}
					else
					{
						$("[name='trang_thai']").attr('checked','none')
					}

					$("[name='created_at']").val(data.created_at);
				}

			});

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

			$("#historymomo_form").submit(function (e) {

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

		}

		function getDeleteHistoryMomo(event, element) {
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

		(function ($) {
			"use strict";
			$('#historymomo').DataTable({
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('historymomo.datatables') }}',
				columns: [
					{data: 'id', name: 'id'},
					{data: 'ma_gd', name: 'ma_gd'},
					{data: 'ten_khach_hang', name: 'ten_khach_hang'},
					{data: 'tai_khoan_nhan', name: 'tai_khoan_nhan'},
					{data: 'tai_khoan_khach_hang', name: 'tai_khoan_khach_hang'},
					{data: 'so_tien', name: 'so_tien'},
					{data: 'so_tien_thuc_nhan', name: 'so_tien_thuc_nhan'},
					{data: 'noi_dung', name: 'noi_dung'},
					{data: 'doi_tac', name: 'doi_tac'},
					{data: 'trang_thai', name: 'trang_thai'},
					{data: 'created_at', name: 'created_at'},
					// {data: 'updated_at', name: 'updated_at'},
					{data: 'action', searchable: true, orderable: true}
				]
			});
		})(jQuery);

	</script>
	{{ $dataTable->scripts() }}
@endsection