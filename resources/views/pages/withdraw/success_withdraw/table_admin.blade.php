<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="withdraw">
	<thead>
	<tr>
		<td > Đối Tác </td>
		<td > Thời Gian Tạo Y/C </td>
		<td >Tên Chủ Thẻ Nhận</td>
		<td >Tên Ngân Hàng</td>
		<td >Tài Khoản Nhận</td>
		<td >Số Tiền</td>
		{{--			<td >Bình Luận</td>--}}
		<td >Mã tranIDCallback</td>
		{{--			<td >Link Callback</td>--}}
		{{--			<td >Trạng Thái Lỗi</td>--}}
		{{--			<td >Chi tiết Lỗi</td>--}}
		{{--			<td >errorCode</td>--}}
		<td >Mã tranID</td>
		<td>Trạng Thái</td>
		<td>Hành Động</td>
	</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<!--end::Table-->

<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modalwithdraw" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Form-->
			<form class="form" id="withdraw_form" method="POST" action="{{ route('withdraw.update') }}" >
				@csrf

				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_new_address_header">
					<!--begin::Modal title-->
					<h2>Chi Tiết</h2>
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
							<label class="required fs-5 fw-semibold mb-2">Mã Code Ngân Hàng</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" disabled class="form-control form-control-solid" placeholder="" name="bankCode"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">Tên Chủ Thẻ Nhận</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="cardName"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->


						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">Tài Khoản</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="cardCode"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">Só Tiền</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="number" class="form-control form-control-solid" placeholder="" name="amount"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">Bình Luận</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="comment"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">tranIDCallback</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="tranIDCallback"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">urlCallback</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="urlCallback"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">errorCode</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="errorCode"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">errorDescription</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="errorDescription"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">errorData</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="errorData"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-semibold mb-2">tranID</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input  type="text" class="form-control form-control-solid" placeholder="" name="tranID"/>
							<!--end::Input-->
						</div>
						<!--end::Input group-->

						<div class="fv-row mb-10">
							<label class="fs-5 fw-semibold form-label mb-5">isBank:</label>
							<select data-control="select2" data-placeholder="Select a format" data-dz-name="isBank"
									name="isBank" required
									data-hide-search="true"
									class="form-select form-select-solid">
								<option value="1"   >GD qua Ngân Hàng</option>
								<option value="0"   >GD qua Ví</option>
							</select>
						</div>

						<div class="fv-row mb-10">
							<label class="fs-5 fw-semibold form-label mb-5">Status:</label>
							<select data-control="select2" data-placeholder="Select a format" data-dz-name="status"
									name="status" required
									data-hide-search="true"
									class="form-select form-select-solid">
								<option value="pending"   >đang chờ</option>
								<option value="success"   >thành công</option>
								<option value="cancel"   >từ chối giao dịch</option>
							</select>
						</div>


					</div>
					<!--end::Scroll-->
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					<!--begin::Button-->
					<button type="submit" id="withdraw_submit"  class="btn btn-primary">
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
		function getDetailWithdraw(event, element) {
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
					$("[name='bankCode']").val(data.bankCode);
					$("[name='cardName']").val(data.cardName);
					$("[name='cardCode']").val(data.cardCode);
					$("[name='amount']").val(data.amount);
					$("[name='comment']").val(data.comment);
					$("[name='tranIDCallback']").val(data.tranIDCallback);
					$("[name='urlCallback']").val(data.urlCallback);
					$("[name='errorCode']").val(data.errorCode);
					$("[name='errorDescription']").val(data.errorDescription);
					$("[name='errorData']").val(data.errorData);
					$("[name='tranID']").val(data.tranID);
					$("[name='status'] option").each(function () {
						if ($(this).val() == data.status) {
							$(this).prop("selected", true);
							return;
						}
					});
					$("[name='isBank'] option").each(function () {
						if ($(this).val() == data.isBank) {
							$(this).prop("selected", true);
							return;
						}
					});

					$("[name='created_at']").val(data.created_at);
				}

			});

		}

		function getDeleteWithdraw(event, element) {
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

		$("#withdraw_form").submit(function (e) {

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

		(function ($) {
			"use strict";
			$('#withdraw').DataTable({
				pageLength: 25,
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('success_withdraw.datatables_success_withdraw') }}',
				columns: [
					{data: 'partner_obj', name: 'partner_obj'},
					{data: 'created_at', name: 'created_at'},
					{data: 'cardName', name: 'cardName'},
					{data: 'nameBank', name: 'nameBank'},
					{data: 'cardCode', name: 'cardCode'},
					{data: 'amount', name: 'amount'},
					// {data: 'comment', name: 'comment'},
					{data: 'tranIDCallback', name: 'tranIDCallback'},
					// {data: 'urlCallback', name: 'urlCallback'},
					// {data: 'errorDescription', name: 'errorDescription'},
					// {data: 'errorData', name: 'errorData'},
					{data: 'tranID', name: 'tranID'},
					{data: 'status', name: 'status'},
					{data: 'action', searchable: true, orderable: true}
				]
			});
		})(jQuery);

	</script>
	{{ $dataTable->scripts() }}
@endsection