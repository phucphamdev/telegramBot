<x-base-layout>

	<div class="app-main flex-column flex-row-fluid">


		<!--begin::Content wrapper-->
		<div class="d-flex flex-column flex-column-fluid">

			<!--begin::Content-->
			<div id="kt_app_content" class="app-content flex-column-fluid">
				<!--begin::Content container-->
				<div id="kt_app_content_container" class="app-container container-xxl">
					<!--begin::Layout-->
					<div class="d-flex flex-column flex-xl-row">

						<!--begin::Content-->
						<div class="flex-lg-row-fluid ms-lg-15">
							<!--begin:::Tabs-->
							<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
								<!--begin:::Tab item-->
								<li class="nav-item">
									<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
									   href="#kt_customer_view_overview_tab"> Vietcombank </a>
									<span class="text-gray-400 mt-1 fw-semibold fs-6"></span>
								</li>
								<!--end:::Tab item-->
								<!--begin:::Tab item-->
								<li class="nav-item">
									<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
									   href="#kt_customer_view_overview_events_and_logs_tab"> ACB </a>
								</li>
								<!--end:::Tab item-->
							</ul>
							<!--end:::Tabs-->
							<!--begin:::Tab content-->
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="kt_customer_view_overview_tab"
									 role="tabpanel">

									<!--begin::Billing History-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header card-header-stretch border-bottom border-gray-200">
											<!--begin::Title-->
											<div class="card-title">
												<h3 class="fw-bold m-0">Vietcombank History</h3>
											</div>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar m-0">
												<!--begin::Tab nav-->
												<ul class="nav nav-stretch nav-line-tabs border-transparent"
													role="tablist">
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_6months_tab"
														   class="nav-link fs-5 fw-semibold me-3 active"
														   data-bs-toggle="tab" role="tab" href="#kt_billing_months">Hom
															Nay </a>
													</li>
													<!--end::Tab nav item-->
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_1year_tab"
														   class="nav-link fs-5 fw-semibold me-3" data-bs-toggle="tab"
														   role="tab" href="#kt_billing_year">7 Ngay </a>
													</li>
													<!--end::Tab nav item-->
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold"
														   data-bs-toggle="tab" role="tab" href="#kt_billing_all">30
															Ngay</a>
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
											<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active"
												 role="tabpanel" aria-labelledby="kt_billing_months">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead
															class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
														<tr>
															<th class="min-w-150px">TransactionDate</th>
															<th class="text-center pe-3 min-w-150px">Description</th>
															<th class="text-center pe-3 min-w-100px">Amount</th>
															<th class="text-center pe-3 min-w-100px">Reference</th>
															<th class="text-center pe-3 min-w-100px">created_at</th>
															<th class="text-center pe-0 min-w-75px">updated_at</th>
														</tr>
														</thead>

														<tbody class="fw-semibold text-gray-600">

														@foreach(\App\Helper\KpayHelper::cron_vcb() as $vcb)

															<tr>
																<!--begin::Item-->
																<td>
																	<a href="#"
																	   class="text-dark text-hover-primary">{{ $vcb['TransactionDate'] }}</a>
																</td>
																<td class="text-center">{{ $vcb['Description'] }}</td>
																<td class="text-center">{{ $vcb['Amount'] }}  </td>
																<td class="text-center">{{ $vcb['Reference'] }}</td>
																<td class="text-center">{{ $vcb['created_at'] }}</td>
																<td class="text-center">{{ $vcb['updated_at'] }}</td>

															</tr>
														@endforeach


														</tbody>
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--end::Tab panel-->
											<!--begin::Tab panel-->
											<div id="kt_billing_year" class="card-body p-0 tab-pane fade"
												 role="tabpanel" aria-labelledby="kt_billing_year">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead
															class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
														<tr>
															<th class="min-w-150px">TransactionDate</th>
															<th class="text-center pe-3 min-w-150px">Description</th>
															<th class="text-center pe-3 min-w-100px">Amount</th>
															<th class="text-center pe-3 min-w-100px">Reference</th>
															<th class="text-center pe-3 min-w-100px">created_at</th>
															<th class="text-center pe-0 min-w-75px">updated_at</th>
														</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
														@foreach(\App\Helper\KpayHelper::cron_vcb_week() as $vcb)

															<tr>
																<!--begin::Item-->
																<td>
																	<a href="#"
																	   class="text-dark text-hover-primary">{{ $vcb['TransactionDate'] }}</a>
																</td>
																<td class="text-center">{{ $vcb['Description'] }}</td>
																<td class="text-center">{{ $vcb['Amount'] }}  </td>
																<td class="text-center">{{ $vcb['Reference'] }}</td>
																<td class="text-center">{{ $vcb['created_at'] }}</td>
																<td class="text-center">{{ $vcb['updated_at'] }}</td>

															</tr>
														@endforeach
														</tbody>
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--end::Tab panel-->
											<!--begin::Tab panel-->
											<div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel"
												 aria-labelledby="kt_billing_all">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead
															class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
														<tr>
															<th class="min-w-150px">TransactionDate</th>
															<th class="text-center pe-3 min-w-150px">Description</th>
															<th class="text-center pe-3 min-w-100px">Amount</th>
															<th class="text-center pe-3 min-w-100px">Reference</th>
															<th class="text-center pe-3 min-w-100px">created_at</th>
															<th class="text-center pe-0 min-w-75px">updated_at</th>
														</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
														@foreach(\App\Helper\KpayHelper::cron_vcb_month() as $vcb)

															<tr>
																<!--begin::Item-->
																<td>
																	<a href="#"
																	   class="text-dark text-hover-primary">{{ $vcb['TransactionDate'] }}</a>
																</td>
																<td class="text-center">{{ $vcb['Description'] }}</td>
																<td class="text-center">{{ $vcb['Amount'] }}  </td>
																<td class="text-center">{{ $vcb['Reference'] }}</td>
																<td class="text-center">{{ $vcb['created_at'] }}</td>
																<td class="text-center">{{ $vcb['updated_at'] }}</td>

															</tr>
														@endforeach
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

								</div>

								<div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab"
									 role="tabpanel">
									<!--begin::Billing History-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header card-header-stretch border-bottom border-gray-200">
											<!--begin::Title-->
											<div class="card-title">
												<h3 class="fw-bold m-0">ACB History</h3>
											</div>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar m-0">
												<!--begin::Tab nav-->
												<ul class="nav nav-stretch nav-line-tabs border-transparent"
													role="tablist">
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_6months_tab"
														   class="nav-link fs-5 fw-semibold me-3 active"
														   data-bs-toggle="tab" role="tab" href="#kt_billing_months">Hom
															Nay </a>
													</li>
													<!--end::Tab nav item-->
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_1year_tab"
														   class="nav-link fs-5 fw-semibold me-3" data-bs-toggle="tab"
														   role="tab" href="#kt_billing_year">7 Ngay </a>
													</li>
													<!--end::Tab nav item-->
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold"
														   data-bs-toggle="tab" role="tab" href="#kt_billing_all">30
															Ngay</a>
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
											<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active"
												 role="tabpanel" aria-labelledby="kt_billing_months">
												<!--begin::Table container-->
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead
															class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
														<tr>
															<td class="min-w-150px">transactionNumber</td>
															<td class="min-w-250px">receiverName</td>
															<td class="min-w-150px">description</td>
															<td class="min-w-150px">account</td>
															<td class="min-w-150px">created_at</td>
															<td class="min-w-150px">updated_at</td>
															<td></td>
														</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
														@foreach(\App\Helper\KpayHelper::cron_acb() as $acb)

															<tr>
																<td>{{ $acb['transactionNumber'] }}</td>
																<td>{{ $acb['receiverName'] }}</td>
																<td>{{ $acb['description'] }}</td>
																<td>{{ $acb['amount'] }}</td>
																<td>{{ $acb['created_at'] }}</td>
																<td>{{ $acb['updated_at'] }}</td>
															</tr>
														@endforeach

														</tbody>
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->

											</div>

											<!--end::Tab panel-->
											<!--begin::Tab panel-->
											<div id="kt_billing_year" class="card-body p-0 tab-pane fade"
												 role="tabpanel" aria-labelledby="kt_billing_year">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead
															class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
														<tr>
															<td class="min-w-150px">transactionNumber</td>
															<td class="min-w-250px">receiverName</td>
															<td class="min-w-150px">description</td>
															<td class="min-w-150px">account</td>
															<td class="min-w-150px">created_at</td>
															<td class="min-w-150px">updated_at</td>
															<td></td>
														</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
														@foreach(\App\Helper\KpayHelper::cron_acb_week() as $acb2)

															<tr>
																<td>{{ $acb2['transactionNumber'] }}</td>
																<td>{{ $acb2['receiverName'] }}</td>
																<td>{{ $acb2['description'] }}</td>
																<td>{{ $acb2['amount'] }}</td>
																<td>{{ $acb2['created_at'] }}</td>
																<td>{{ $acb2['updated_at'] }}</td>
															</tr>
														@endforeach

														</tbody>
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--end::Tab panel-->
											<!--begin::Tab panel-->
											<div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel"
												 aria-labelledby="kt_billing_all">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead
															class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
														<tr>
															<td class="min-w-150px">transactionNumber</td>
															<td class="min-w-250px">receiverName</td>
															<td class="min-w-150px">description</td>
															<td class="min-w-150px">account</td>
															<td class="min-w-150px">created_at</td>
															<td class="min-w-150px">updated_at</td>
															<td></td>
														</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
														@foreach(\App\Helper\KpayHelper::cron_acb_month() as $acb3)

																<td>{{ $acb3['transactionNumber'] }}</td>
																<td>{{ $acb3['receiverName'] }}</td>
																<td>{{ $acb3['description'] }}</td>
																<td>{{ $acb3['amount'] }}</td>
																<td>{{ $acb3['created_at'] }}</td>
																<td>{{ $acb3['updated_at'] }}</td>
															</tr>
														@endforeach

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

								</div>
							</div>
							<!--end:::Tab content-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Layout-->
				</div>
				<!--end::Content container-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Content wrapper-->


	</div>


	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript"
			src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>


	<script type="text/javascript">

		(function ($) {
			"use strict";


		})(jQuery);


	</script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">


</x-base-layout>
