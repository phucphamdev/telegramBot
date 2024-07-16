<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="withdraw_callback">
	<!--begin::Table head-->
	<thead>
		<tr>
			<td>Mã tranID</td>
			<td>Mã tranIDHistory</td>
			<td>Số Tiền</td>
			<td>Bình Luận</td>
			<td>Loại</td>
			<td>Tên</td>
			<td>Tên Đầy Đủ</td>
			<td>Trạng Thái</td>
			<td>Ngày Tạo</td>
			<td></td>
		</tr>
	</thead>
	<!--end::Table head-->
	<!--begin::Table body-->
	<tbody>
	</tbody>
	<!--end::Table body-->
</table>
<!--end::Table-->

<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modalwithdraw_callback" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Form-->
			<form class="form" id="withdraw_callback_form" name="withdraw_callback_form" method="POST"
				  action="{{ route('withdraw_callback.update_callback') }}">
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

						<input type="hidden" lass="form-control form-control-solid" placeholder="" name="id"/>

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
											data-control="select2" name="trang_thai"
											data-kt-ecommerce-order-filter="trang_thai" id="trang_thai">
										<option value="pending">Pending</option>
										<option value="success">Thành Công</option>
									</select>
									<!--end::Select2-->
								</div>
							</div>
							<!--end::Col-->
							<!--end::Input-->
						</div>


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

{{-- Inject Scripts --}}
@section('scripts')
	<script type="text/javascript">
		function getDetailwithdrawCallback(event, element) {
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
					$("[name='trang_thai'] option").each(function () {
						if ($(this).val() == data.trang_thai) {
							$(this).prop("selected", true);
							return;
						}
					});
				}

			});
		}

		$("#withdraw_callback_form").submit(function (e) {

			e.preventDefault(); // avoid to execute the actual submit of the form.

			var form = $(this);
			var actionUrl = form.attr('action');

			let formData = {
				id: $("[name='id']").val(),
				trang_thai: $("#trang_thai option:selected").val(),
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

		(function ($) {
			"use strict";
			$('#withdraw_callback').DataTable({
				"aaSorting": [
					[0, "desc"]
				],
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('withdraw_callback.datatables_callback') }}',
				columns: [
					{data: 'tranID', name: 'tranID'},
					{data: 'tranIDHistory', name: 'tranIDHistory'},
					{data: 'amount', name: 'amount'},
					{data: 'comment', name: 'comment'},
					{data: 'type', name: 'type'},
					{data: 'name', name: 'name'},
					{data: 'full_name', name: 'full_name'},
					{data: 'trang_thai', name: 'trang_thai'},
					{data: 'created_at', name: 'created_at'},
					{data: 'action', searchable: true, orderable: true}
				],

			});
		})(jQuery);
	</script>
	{{ $dataTable->scripts() }}

@endsection

