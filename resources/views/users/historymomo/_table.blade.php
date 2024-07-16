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
					{data: 'created_at', name: 'created_at'}
				]
			});
		})(jQuery);

	</script>
	{{ $dataTable->scripts() }}
@endsection