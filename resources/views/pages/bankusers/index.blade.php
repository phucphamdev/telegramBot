<x-base-layout>

	<div class="app-main flex-column flex-row-fluid">

		<!--begin::Content-->
		<div class="flex-lg-row-fluid ms-lg-15">
			<!--begin:::Tabs-->
			<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
				<!--begin:::Tab item-->
				<li class="nav-item">
					<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
					   href="#kt_customer_view_overview_tab">Overview</a>
				</li>
				<!--end:::Tab item-->
			</ul>
			<!--end:::Tabs-->
			<!--begin:::Tab content-->
			<div class="tab-content" id="myTabContent">
				<!--begin:::Tab pane-->
				<div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">

					<!--begin::Payment methods-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header card-header-stretch pb-0">
							<!--begin::Title-->
							<div class="card-title">
								<h3 class="m-0">Quản Lý </h3>
							</div>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar m-0">
								<!--begin::Tab nav-->
								<ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
									<!--begin::Tab item-->
									<li class="nav-item" role="presentation">
										<a id="kt_billing_creditcard_tab"
										   class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab"
										   role="tab" href="#kt_billing_creditcard">Thẻ Ngân Hàng</a>
									</li>
									<!--end::Tab item-->
									<!--begin::Tab item-->
									<li class="nav-item" role="presentation">
										<a id="kt_billing_paypal_tab" class="nav-link fs-5 fw-bold"
										   data-bs-toggle="tab" role="tab" href="#kt_billing_paypal"> Thêm</a>
									</li>
									<!--end::Tab item-->
								</ul>
								<!--end::Tab nav-->
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Card header-->
						<!--begin::Tab content-->
						<div id="kt_billing_payment_tab_content" class="card-body tab-content">
							<!--begin::Tab panel-->
							<div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel">
								<!--begin::Row-->
								<div class="row gx-9 gy-6">
									@foreach(KpayHelper::getBankUser(Auth::user()->id()) as $key => $bank)

										<!--begin::Col-->
										<div class="col-xl-6" data-kt-billing-element="card">
											<!--begin::Card-->
											<div
												class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
												<!--begin::Info-->
												<div class="d-flex flex-column py-2">
													<!--begin::Owner-->
													<div class="d-flex align-items-center fs-4 fw-bold mb-5">{{ $bank['full_name'] }}
														<span
															class="badge  {{ $bank['run'] == 1 ? " badge-light-success  " : " badge-danger " }}fs-7 ms-2">{{ $bank['run'] == 1 ? "ON" : "OFF" }}
																</span>
													</div>
													<!--end::Owner-->
													<!--begin::Wrapper-->
													<div class="d-flex align-items-center">
														<!--begin::Icon-->
														<img src="assets/media/svg/card-logos/visa.svg" alt=""
														     class="me-4"/>
														<!--end::Icon-->
														<!--begin::Details-->
														<div>
															<div class="fs-4 fw-bold">
																{{ $bank['bankcode'] }} -- {{ $bank['number1'] }}</div>
															<div class="fs-6 fw-semibold text-gray-400">Chi Nhanh : {{ $bank['branch'] }}
															</div>
														</div>
														<!--end::Details-->
													</div>
													<!--end::Wrapper-->
												</div>
												<!--end::Info-->
												<!--begin::Actions-->
												<div class="d-flex align-items-center py-2">
													<a
														href="{{ route('bankusers.show',['id' => $bank['id'] ]) }}"
														class="btn btn-sm btn-light btn-active-light-primary"
													        data-bs-target="#kt_modal_new_card">Edit
													</a>
												</div>
												<!--end::Actions-->
											</div>
											<!--end::Card-->
										</div>
										<!--end::Col-->

									@endforeach
								</div>
								<!--end::Row-->
							</div>
							<!--end::Tab panel-->
							<!--begin::Tab panel-->
							<div id="kt_billing_paypal" class="tab-pane fade" role="tabpanel"
							     aria-labelledby="kt_billing_paypal_tab">

								<div class="row gx-9 gy-6">
									<div class="card-header pt-8">
										<!--begin::Card title-->
										<div class="card card-title">
											<h2>Thêm</h2>
										</div>
										<!--end::Card title-->
									</div>
									<div class="card card-flush">
										<div class="card-body">
											<form id="banks_create" name="banks_create" method="POST"
											      class="form"
											      action="{{ route('bankusers.store') }}">
												{{ csrf_field() }}

												<div class="fv-row mb-10">
													<input type="hidden" value="{{ Auth::user()->id() }}"
													       name="id_partners"/>
												</div>

												<div class="fv-row mb-10">
													<label class="fs-5 fw-semibold form-label mb-5">Tên Đầy
														Đủ:</label>
													<input class="form-control form-control-solid"
													       placeholder="Tên Đầy Đủ"
													       name="full_name"/>
												</div>

												<div class="fv-row mb-10">
													<label class="fs-5 fw-semibold form-label mb-5">Chi
														Nhánh:</label>
													<input class="form-control form-control-solid"
													       placeholder="Chi Nhánh"
													       name="branch"/>
												</div>

												<div class="fv-row mb-10">
													<label class="fs-5 fw-semibold form-label mb-5">So Tài
														Khoản:</label>
													<input class="form-control form-control-solid"
													       placeholder="So Tài Khoản"
													       name="number1"/>
												</div>

												<div class="fv-row mb-10">
													<label
														class="fs-5 fw-semibold form-label mb-5">username:</label>
													<input class="form-control form-control-solid"
													       placeholder="username"
													       name="username"/>
												</div>

												<div class="fv-row mb-10">
													<label
														class="fs-5 fw-semibold form-label mb-5">password:</label>
													<input class="form-control form-control-solid"
													       placeholder="password"
													       name="password"/>
												</div>


												<div class="fv-row mb-10">
													<label class="fs-5 fw-semibold form-label mb-5">link
														qrcode:</label>
													<input class="form-control form-control-solid"
													       placeholder="link qrcode" value="#"
													       name="link_qrcode"/>
												</div>

												<div class="fv-row mb-10">
													<label class="fs-5 fw-semibold form-label mb-5"> Loại Ngân
														Hàng:</label>
													<select data-control="select2"
													        data-placeholder="Select a format"
													        data-dz-name="bankcode" id="bankcode"
													        name="bankcode"
													        required
													        data-hide-search="true"
													        class="form-select form-select-solid">
														@foreach(DB::table('bankcodes')->get() as $bank)
															<option
																value="{{ $bank->code }}">{{ $bank->name }}</option>
														@endforeach
													</select>
												</div>

												<div class="fv-row mb-10">
													<label class="fs-5 fw-semibold form-label mb-5"> Trạng
														Thái:</label>
													<select data-control="select2"
													        data-placeholder="Select a format"
													        data-dz-name="trang_thai"
													        name="trang_thai" required
													        data-hide-search="true"
													        class="form-select form-select-solid">
														<option value="active">Active</option>
														<option value="inactive">InActive</option>

													</select>
												</div>

												<div class="text-center">
													<button type="submit" id="kt_customers_export_submit"
													        class="btn btn-primary">
														<span class="indicator-label">Gởi</span>
													</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Tab panel-->
						</div>
						<!--end::Tab content-->
					</div>
					<!--end::Payment methods-->


				</div>
				<!--end:::Tab pane-->
			</div>
			<!--end:::Tab content-->
		</div>
		<!--end::Content-->


	</div>


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


				$("#banks_create").submit(function (e) {

					e.preventDefault(); // avoid to execute the actual submit of the form.

					var form = $(this);
					var actionUrl = form.attr('action');

					let formData = {
						name: $("#bankcode option:selected").text(),
						full_name: $("[name='full_name']").val(),
						number1: $("[name='number1']").val(),
						username: $("[name='username']").val(),
						password: $("[name='password']").val(),
						branch: $("[name='branch']").val(),
						bankcode: $("#bankcode option:selected").val(),
						trang_thai: $("[name='trang_thai'] option:selected").val(),
						link_qrcode: $("[name='link_qrcode']").val(),
						id_partners: $("[name='id_partners']").val(),
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

							if (data.success == true) {
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
							} else {
								Swal.fire({
									text: data.msg,
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

				});



			})(jQuery);


		</script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">

	@endsection
</x-base-layout>
