<x-base-layout>

	<div class="app-main flex-column flex-row-fluid" >

		<!--begin::Content wrapper-->
		<div class="d-flex flex-column flex-column-fluid">
			<!--begin::Content-->
			<div id="kt_app_content" class="app-content flex-column-fluid">
				<!--begin::Content container-->
				<div id="kt_app_content_container" class="app-container container-xxl">
					<!--begin::Navbar-->
					<div class="card mb-5 mb-xl-10">
						<div class="card-body pt-9 pb-0">
							<!--begin::Navs-->
							<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
								<li class="nav-item mt-2">
									<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#" >Overview</a>
								</li>
								<li class="nav-item mt-2">
									<a class="nav-link text-active-primary ms-0 me-10 py-5" href="#" >Settings</a>
								</li>
								<li class="nav-item mt-2">
									<a class="nav-link text-active-primary ms-0 me-10 py-5" href="#" >Activity</a>
								</li>
								<li class="nav-item mt-2">
									<a class="nav-link text-active-primary ms-0 me-10 py-5" href="#" >Billing</a>
								</li>
								<li class="nav-item mt-2">
									<a class="nav-link text-active-primary ms-0 me-10 py-5" href="#" >API</a>
								</li>
								<li class="nav-item mt-2">
									<a class="nav-link text-active-primary ms-0 me-10 py-5" href="#" >Logs</a>
								</li>
							</ul>
							<!--begin::Navs-->
						</div>
					</div>
					<!--end::Navbar-->

					<!--begin::Payment methods-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header card-header-stretch pb-0">
							<!--begin::Title-->
							<div class="card-title">
								<h3 class="m-0">Payment Methods</h3>
							</div>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar m-0">
								<!--begin::Tab nav-->
								<ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
									<!--begin::Tab item-->
									<li class="nav-item" role="presentation">
										<a id="kt_billing_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_billing_creditcard">Credit / Debit Card</a>
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
								<!--begin::Title-->
								<h3 class="mb-5">My Cards</h3>
								<!--end::Title-->
								<!--begin::Row-->
								<div class="row gx-9 gy-6">
									<!--begin::Col-->
									<div class="col-xl-6" data-kt-billing-element="card">
										<!--begin::Card-->
										<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
											<!--begin::Info-->
											<div class="d-flex flex-column py-2">
												<!--begin::Owner-->
												<div class="d-flex align-items-center fs-4 fw-bold mb-5">Marcus Morris
													<span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
												<!--end::Owner-->
												<!--begin::Wrapper-->
												<div class="d-flex align-items-center">
													<!--begin::Icon-->
													<img src="assets/media/svg/card-logos/visa.svg" alt="" class="me-4" />
													<!--end::Icon-->
													<!--begin::Details-->
													<div>
														<div class="fs-4 fw-bold">Visa **** 1679</div>
														<div class="fs-6 fw-semibold text-gray-400">Card expires at 09/24</div>
													</div>
													<!--end::Details-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Info-->
											<!--begin::Actions-->
											<div class="d-flex align-items-center py-2">
												<button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
													<!--begin::Indicator label-->
													<span class="indicator-label">Delete</span>
													<!--end::Indicator label-->
													<!--begin::Indicator progress-->
													<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													<!--end::Indicator progress-->
												</button>
												<button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-6" data-kt-billing-element="card">
										<!--begin::Card-->
										<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
											<!--begin::Info-->
											<div class="d-flex flex-column py-2">
												<!--begin::Owner-->
												<div class="d-flex align-items-center fs-4 fw-bold mb-5">Jacob Holder</div>
												<!--end::Owner-->
												<!--begin::Wrapper-->
												<div class="d-flex align-items-center">
													<!--begin::Icon-->
													<img src="assets/media/svg/card-logos/american-express.svg" alt="" class="me-4" />
													<!--end::Icon-->
													<!--begin::Details-->
													<div>
														<div class="fs-4 fw-bold">Mastercard **** 2040</div>
														<div class="fs-6 fw-semibold text-gray-400">Card expires at 10/22</div>
													</div>
													<!--end::Details-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Info-->
											<!--begin::Actions-->
											<div class="d-flex align-items-center py-2">
												<button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
													<!--begin::Indicator label-->
													<span class="indicator-label">Delete</span>
													<!--end::Indicator label-->
													<!--begin::Indicator progress-->
													<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													<!--end::Indicator progress-->
												</button>
												<button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-6" data-kt-billing-element="card">
										<!--begin::Card-->
										<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
											<!--begin::Info-->
											<div class="d-flex flex-column py-2">
												<!--begin::Owner-->
												<div class="d-flex align-items-center fs-4 fw-bold mb-5">Jhon Larson</div>
												<!--end::Owner-->
												<!--begin::Wrapper-->
												<div class="d-flex align-items-center">
													<!--begin::Icon-->
													<img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="me-4" />
													<!--end::Icon-->
													<!--begin::Details-->
													<div>
														<div class="fs-4 fw-bold">Mastercard **** 1290</div>
														<div class="fs-6 fw-semibold text-gray-400">Card expires at 03/23</div>
													</div>
													<!--end::Details-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Info-->
											<!--begin::Actions-->
											<div class="d-flex align-items-center py-2">
												<button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
													<!--begin::Indicator label-->
													<span class="indicator-label">Delete</span>
													<!--end::Indicator label-->
													<!--begin::Indicator progress-->
													<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													<!--end::Indicator progress-->
												</button>
												<button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-6">
										<!--begin::Notice-->
										<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
											<!--begin::Wrapper-->
											<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
												<!--begin::Content-->
												<div class="mb-3 mb-md-0 fw-semibold">
													<h4 class="text-gray-900 fw-bold">Important Note!</h4>
													<div class="fs-6 text-gray-700 pe-7">Please carefully read
														<a href="#" class="fw-bold me-1">Product Terms</a>adding
														<br />your new payment card</div>
												</div>
												<!--end::Content-->
												<!--begin::Action-->
												<a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add Card</a>
												<!--end::Action-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Notice-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Tab panel-->
						</div>
						<!--end::Tab content-->
					</div>
					<!--end::Payment methods-->

					<!--begin::Billing History-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header card-header-stretch border-bottom border-gray-200">
							<!--begin::Title-->
							<div class="card-title">
								<h3 class="fw-bold m-0">Billing History</h3>
							</div>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar m-0">
								<!--begin::Tab nav-->
								<ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
									<!--begin::Tab nav item-->
									<li class="nav-item" role="presentation">
										<a id="kt_billing_6months_tab" class="nav-link fs-5 fw-semibold me-3 active" data-bs-toggle="tab" role="tab" href="#kt_billing_months">Month</a>
									</li>
									<!--end::Tab nav item-->
									<!--begin::Tab nav item-->
									<li class="nav-item" role="presentation">
										<a id="kt_billing_1year_tab" class="nav-link fs-5 fw-semibold me-3" data-bs-toggle="tab" role="tab" href="#kt_billing_year">Year</a>
									</li>
									<!--end::Tab nav item-->
									<!--begin::Tab nav item-->
									<li class="nav-item" role="presentation">
										<a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold" data-bs-toggle="tab" role="tab" href="#kt_billing_all">All Time</a>
									</li>
									<!--end::Tab nav item-->
								</ul>
								<!--end::Tab nav-->
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Card header-->
						<!--begin::Tab Content-->
						<div class="tab-content">
							<!--begin::Tab panel-->
							<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-bordered align-middle gy-4 gs-9">
										<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
										<tr>
											<td class="min-w-150px">Date</td>
											<td class="min-w-250px">Description</td>
											<td class="min-w-150px">Amount</td>
											<td class="min-w-150px">Invoice</td>
											<td></td>
										</tr>
										</thead>
										<tbody class="fw-semibold text-gray-600">
										<!--begin::Table row-->
										<tr>
											<td>Nov 01, 2020</td>
											<td>
												<a href="#">Invoice for Ocrober 2023</a>
											</td>
											<td>$123.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Oct 08, 2020</td>
											<td>
												<a href="#">Invoice for September 2023</a>
											</td>
											<td>$98.03</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Aug 24, 2020</td>
											<td>Paypal</td>
											<td>$35.07</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Aug 01, 2020</td>
											<td>
												<a href="#">Invoice for July 2023</a>
											</td>
											<td>$142.80</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jul 01, 2020</td>
											<td>
												<a href="#">Invoice for June 2023</a>
											</td>
											<td>$123.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jun 17, 2020</td>
											<td>Paypal</td>
											<td>$523.09</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jun 01, 2020</td>
											<td>
												<a href="#">Invoice for May 2023</a>
											</td>
											<td>$123.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										</tbody>
									</table>
									<!--end::Table-->
								</div>
								<!--end::Table container-->
							</div>
							<!--end::Tab panel-->
							<!--begin::Tab panel-->
							<div id="kt_billing_year" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_year">
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-bordered align-middle gy-4 gs-9">
										<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
										<tr>
											<td class="min-w-150px">Date</td>
											<td class="min-w-250px">Description</td>
											<td class="min-w-150px">Amount</td>
											<td class="min-w-150px">Invoice</td>
											<td></td>
										</tr>
										</thead>
										<tbody class="fw-semibold text-gray-600">
										<!--begin::Table row-->
										<tr>
											<td>Dec 01, 2021</td>
											<td>
												<a href="#">Billing for Ocrober 2023</a>
											</td>
											<td>$250.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Oct 08, 2021</td>
											<td>
												<a href="#">Statements for September 2023</a>
											</td>
											<td>$98.03</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Aug 24, 2021</td>
											<td>Paypal</td>
											<td>$35.07</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Aug 01, 2021</td>
											<td>
												<a href="#">Invoice for July 2023</a>
											</td>
											<td>$142.80</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jul 01, 2021</td>
											<td>
												<a href="#">Statements for June 2023</a>
											</td>
											<td>$123.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jun 17, 2021</td>
											<td>Paypal</td>
											<td>$23.09</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										</tbody>
									</table>
									<!--end::Table-->
								</div>
								<!--end::Table container-->
							</div>
							<!--end::Tab panel-->
							<!--begin::Tab panel-->
							<div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_all">
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-bordered align-middle gy-4 gs-9">
										<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
										<tr>
											<td class="min-w-150px">Date</td>
											<td class="min-w-250px">Description</td>
											<td class="min-w-150px">Amount</td>
											<td class="min-w-150px">Invoice</td>
											<td></td>
										</tr>
										</thead>
										<tbody class="fw-semibold text-gray-600">
										<!--begin::Table row-->
										<tr>
											<td>Nov 01, 2021</td>
											<td>
												<a href="#">Billing for Ocrober 2023</a>
											</td>
											<td>$123.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Aug 10, 2021</td>
											<td>Paypal</td>
											<td>$35.07</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Aug 01, 2021</td>
											<td>
												<a href="#">Invoice for July 2023</a>
											</td>
											<td>$142.80</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jul 20, 2021</td>
											<td>
												<a href="#">Statements for June 2023</a>
											</td>
											<td>$123.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jun 17, 2021</td>
											<td>Paypal</td>
											<td>$23.09</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<td>Jun 01, 2021</td>
											<td>
												<a href="#">Invoice for May 2023</a>
											</td>
											<td>$123.79</td>
											<td>
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">PDF</a>
											</td>
											<td class="text-right">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
											</td>
										</tr>
										<!--end::Table row-->
										</tbody>
									</table>
									<!--end::Table-->
								</div>
								<!--end::Table container-->
							</div>
							<!--end::Tab panel-->
						</div>
						<!--end::Tab Content-->
					</div>
					<!--end::Billing Address-->

					<!--begin::Payment methods-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Col-->
						<div class="col-xl-12">
							<!--begin::Table Widget 5-->
							<div class="card card-flush h-xl-100">
								<!--begin::Card header-->
								<div class="card-header pt-7">
									<!--begin::Title-->
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label fw-bold text-dark">Stock Report</span>
										<span class="text-gray-400 mt-1 fw-semibold fs-6">Total 2,356 Items in the Stock</span>
									</h3>
									<!--end::Title-->
								</div>
								<!--end::Card header-->

								<!--begin::Card body-->
								<div class="card-body">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
										<!--begin::Table head-->
										<thead>
										<!--begin::Table row-->
										<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
											<th class="min-w-150px">Item</th>
											<th class="text-end pe-3 min-w-100px">Product ID</th>
											<th class="text-end pe-3 min-w-150px">Date Added</th>
											<th class="text-end pe-3 min-w-100px">Price</th>
											<th class="text-end pe-3 min-w-100px">Status</th>
											<th class="text-end pe-0 min-w-75px">Qty</th>
										</tr>
										<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="fw-bold text-gray-600">
										<tr>
											<!--begin::Item-->
											<td>
												<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Macbook Air M1</a>
											</td>
											<!--end::Item-->
											<!--begin::Product ID-->
											<td class="text-end">#XGY-356</td>
											<!--end::Product ID-->
											<!--begin::Date added-->
											<td class="text-end">02 Apr, 2023</td>
											<!--end::Date added-->
											<!--begin::Price-->
											<td class="text-end">$1,230</td>
											<!--end::Price-->
											<!--begin::Status-->
											<td class="text-end">
												<span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
											</td>
											<!--end::Status-->
											<!--begin::Qty-->
											<td class="text-end" data-order="58">
												<span class="text-dark fw-bold">58 PCS</span>
											</td>
											<!--end::Qty-->
										</tr>
										<tr>
											<!--begin::Item-->
											<td>
												<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Surface Laptop 4</a>
											</td>
											<!--end::Item-->
											<!--begin::Product ID-->
											<td class="text-end">#YHD-047</td>
											<!--end::Product ID-->
											<!--begin::Date added-->
											<td class="text-end">01 Apr, 2023</td>
											<!--end::Date added-->
											<!--begin::Price-->
											<td class="text-end">$1,060</td>
											<!--end::Price-->
											<!--begin::Status-->
											<td class="text-end">
												<span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
											</td>
											<!--end::Status-->
											<!--begin::Qty-->
											<td class="text-end" data-order="0">
												<span class="text-dark fw-bold">0 PCS</span>
											</td>
											<!--end::Qty-->
										</tr>
										<tr>
											<!--begin::Item-->
											<td>
												<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Logitech MX 250</a>
											</td>
											<!--end::Item-->
											<!--begin::Product ID-->
											<td class="text-end">#SRR-678</td>
											<!--end::Product ID-->
											<!--begin::Date added-->
											<td class="text-end">24 Mar, 2023</td>
											<!--end::Date added-->
											<!--begin::Price-->
											<td class="text-end">$64</td>
											<!--end::Price-->
											<!--begin::Status-->
											<td class="text-end">
												<span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
											</td>
											<!--end::Status-->
											<!--begin::Qty-->
											<td class="text-end" data-order="290">
												<span class="text-dark fw-bold">290 PCS</span>
											</td>
											<!--end::Qty-->
										</tr>
										<tr>
											<!--begin::Item-->
											<td>
												<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">AudioEngine HD3</a>
											</td>
											<!--end::Item-->
											<!--begin::Product ID-->
											<td class="text-end">#PXF-578</td>
											<!--end::Product ID-->
											<!--begin::Date added-->
											<td class="text-end">24 Mar, 2023</td>
											<!--end::Date added-->
											<!--begin::Price-->
											<td class="text-end">$1,060</td>
											<!--end::Price-->
											<!--begin::Status-->
											<td class="text-end">
												<span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
											</td>
											<!--end::Status-->
											<!--begin::Qty-->
											<td class="text-end" data-order="46">
												<span class="text-dark fw-bold">46 PCS</span>
											</td>
											<!--end::Qty-->
										</tr>
										<tr>
											<!--begin::Item-->
											<td>
												<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">HP Hyper LTR</a>
											</td>
											<!--end::Item-->
											<!--begin::Product ID-->
											<td class="text-end">#PXF-778</td>
											<!--end::Product ID-->
											<!--begin::Date added-->
											<td class="text-end">16 Jan, 2023</td>
											<!--end::Date added-->
											<!--begin::Price-->
											<td class="text-end">$4500</td>
											<!--end::Price-->
											<!--begin::Status-->
											<td class="text-end">
												<span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
											</td>
											<!--end::Status-->
											<!--begin::Qty-->
											<td class="text-end" data-order="78">
												<span class="text-dark fw-bold">78 PCS</span>
											</td>
											<!--end::Qty-->
										</tr>
										<tr>
											<!--begin::Item-->
											<td>
												<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Dell 32 UltraSharp</a>
											</td>
											<!--end::Item-->
											<!--begin::Product ID-->
											<td class="text-end">#XGY-356</td>
											<!--end::Product ID-->
											<!--begin::Date added-->
											<td class="text-end">22 Dec, 2023</td>
											<!--end::Date added-->
											<!--begin::Price-->
											<td class="text-end">$1,060</td>
											<!--end::Price-->
											<!--begin::Status-->
											<td class="text-end">
												<span class="badge py-3 px-4 fs-7 badge-light-warning">Low Stock</span>
											</td>
											<!--end::Status-->
											<!--begin::Qty-->
											<td class="text-end" data-order="8">
												<span class="text-dark fw-bold">8 PCS</span>
											</td>
											<!--end::Qty-->
										</tr>
										<tr>
											<!--begin::Item-->
											<td>
												<a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Google Pixel 6 Pro</a>
											</td>
											<!--end::Item-->
											<!--begin::Product ID-->
											<td class="text-end">#XVR-425</td>
											<!--end::Product ID-->
											<!--begin::Date added-->
											<td class="text-end">27 Dec, 2023</td>
											<!--end::Date added-->
											<!--begin::Price-->
											<td class="text-end">$1,060</td>
											<!--end::Price-->
											<!--begin::Status-->
											<td class="text-end">
												<span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
											</td>
											<!--end::Status-->
											<!--begin::Qty-->
											<td class="text-end" data-order="124">
												<span class="text-dark fw-bold">124 PCS</span>
											</td>
											<!--end::Qty-->
										</tr>
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Table Widget 5-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Payment methods-->


				</div>
				<!--end::Content container-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Content wrapper-->





	</div>



	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>


	<script type="text/javascript">

		(function ($) {
			"use strict";


			$('#recharge').DataTable({
				"aaSorting": [
					[1, "pending"]
				],
				bFilter: false,
				paging: true,
				pageLength: 10,
				ordering: false,
				processing: true,
				serverSide: true,
				ajax: '{{ route('recharge.datatables_today') }}',
				columns: [
					{data: 'partners', name: 'partners'},
					{data: 'tranID', name: 'tranID'},
					{data: 'amount', name: 'amount'},
					{data: 'comment', name: 'comment'},
					{data: 'comment_api', name: 'comment_api'},
					{data: 'full_name', name: 'full_name'},
					{data: 'trang_thai', name: 'trang_thai'},
					{data: 'created_at', searchable: false, orderable: false}
				],

			});


		})(jQuery);


	</script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">


</x-base-layout>
