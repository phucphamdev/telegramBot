<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
	<!--begin::Content container-->
	<div id="kt_app_content_container" class="app-container container-xxl">
		<!--begin::Layout-->
		<div class="d-flex flex-column flex-lg-row">
			<!--begin::Content-->
			<div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
				<!--begin::Card-->
				<div class="card card-flush pt-3 mb-5 mb-xl-10">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title">
							<h2 class="fw-bold">Product Details</h2>
						</div>
						<!--begin::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<a href="../../demo1/dist/apps/subscriptions/add.html" class="btn btn-light-primary">Update Product</a>
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-3">
						<!--begin::Section-->
						<div class="mb-10">
							<!--begin::Title-->
							<h5 class="mb-4">Billing Address:</h5>
							<!--end::Title-->
							<!--begin::Details-->
							<div class="d-flex flex-wrap py-5">
								<!--begin::Row-->
								<div class="flex-equal me-5">
									<!--begin::Details-->
									<table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
										<!--begin::Row-->
										<tr>
											<td class="text-gray-400 min-w-175px w-175px">Bill to:</td>
											<td class="text-gray-800 min-w-200px">
												<a href="../../demo1/dist/pages/apps/customers/view.html" class="text-gray-800 text-hover-primary">smith@kpmg.com</a>
											</td>
										</tr>
										<!--end::Row-->
										<!--begin::Row-->
										<tr>
											<td class="text-gray-400">Customer Name:</td>
											<td class="text-gray-800">Emma Smith</td>
										</tr>
										<!--end::Row-->
										<!--begin::Row-->
										<tr>
											<td class="text-gray-400">Address:</td>
											<td class="text-gray-800">Floor 10, 101 Avenue of the Light Square, New York, NY, 10050.</td>
										</tr>
										<!--end::Row-->
										<!--begin::Row-->
										<tr>
											<td class="text-gray-400">Phone:</td>
											<td class="text-gray-800">(555) 555-1234</td>
										</tr>
										<!--end::Row-->
									</table>
									<!--end::Details-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Section-->



					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
				<!--begin::Card-->
				<div class="card card-flush pt-3 mb-5 mb-xl-10">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>Recent Events</h2>
						</div>
						<!--end::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<a href="#" class="btn btn-light-primary">View All Events</a>
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table wrapper-->
						<div class="table-responsive">
							<!--begin::Table-->
							<table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-5" id="kt_table_customers_events">
								<!--begin::Table body-->
								<tbody>
								<!--begin::Table row-->
								<tr>
									<!--begin::Event=-->
									<td class="min-w-400px">
										<a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Brian Cox</a>has made payment to
										<a href="#" class="fw-bold text-gray-800 text-hover-primary">4652-9635</a></td>
									<!--end::Event=-->
									<!--begin::Timestamp=-->
									<td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2022, 10:30 am</td>
									<!--end::Timestamp=-->
								</tr>
								<!--end::Table row-->
								<!--begin::Table row-->
								<tr>
									<!--begin::Event=-->
									<td class="min-w-400px">Invoice
										<a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">6530-7433</a>has been
										<span class="badge badge-light-danger">Declined</span></td>
									<!--end::Event=-->
									<!--begin::Timestamp=-->
									<td class="pe-0 text-gray-600 text-end min-w-200px">25 Oct 2022, 2:40 pm</td>
									<!--end::Timestamp=-->
								</tr>
								<!--end::Table row-->
								<!--begin::Table row-->
								<tr>
									<!--begin::Event=-->
									<td class="min-w-400px">
										<a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Max Smith</a>has made payment to
										<a href="#" class="fw-bold text-gray-800 text-hover-primary">1402-6722</a></td>
									<!--end::Event=-->
									<!--begin::Timestamp=-->
									<td class="pe-0 text-gray-600 text-end min-w-200px">25 Jul 2022, 5:20 pm</td>
									<!--end::Timestamp=-->
								</tr>
								<!--end::Table row-->
								<!--begin::Table row-->
								<tr>
									<!--begin::Event=-->
									<td class="min-w-400px">
										<a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">Emma Smith</a>has made payment to
										<a href="#" class="fw-bold text-gray-800 text-hover-primary">6603-2893</a></td>
									<!--end::Event=-->
									<!--begin::Timestamp=-->
									<td class="pe-0 text-gray-600 text-end min-w-200px">25 Jul 2022, 8:43 pm</td>
									<!--end::Timestamp=-->
								</tr>
								<!--end::Table row-->
								<!--begin::Table row-->
								<tr>
									<!--begin::Event=-->
									<td class="min-w-400px">Invoice
										<a href="#" class="fw-bold text-gray-800 text-hover-primary me-1">5026-3927</a>status has changed from
										<span class="badge badge-light-info me-1">In Progress</span>to
										<span class="badge badge-light-primary">In Transit</span></td>
									<!--end::Event=-->
									<!--begin::Timestamp=-->
									<td class="pe-0 text-gray-600 text-end min-w-200px">21 Feb 2022, 6:05 pm</td>
									<!--end::Timestamp=-->
								</tr>
								<!--end::Table row-->
								</tbody>
								<!--end::Table body-->
							</table>
							<!--end::Table-->
						</div>
						<!--end::Table wrapper-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
				<!--begin::Card-->
				<div class="card card-flush pt-3 mb-5 mb-xl-10">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>Invoices</h2>
						</div>
						<!--end::Card title-->

					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-2">

					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Content-->
			<!--begin::Sidebar-->
			<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
				<!--begin::Card-->
				<div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
					<!--begin::Card header-->
					<div class="card-header">
						<!--begin::Card title-->
						<div class="card-title">
							<h2>Summary</h2>
						</div>
						<!--end::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::More options-->
							<a href="#" class="btn btn-sm btn-light btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
								<!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
								<span class="svg-icon svg-icon-3">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
																	<rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor" />
																	<rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor" />
																</svg>
															</span>
								<!--end::Svg Icon-->
							</a>
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-6 w-200px py-4" data-kt-menu="true">
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3">Pause Subscription</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3" data-kt-subscriptions-view-action="delete">Edit Subscription</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link text-danger px-3" data-kt-subscriptions-view-action="edit">Cancel Subscription</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu-->
							<!--end::More options-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0 fs-6">
						<!--begin::Section-->
						<div class="mb-7">
							<!--begin::Details-->
							<div class="d-flex align-items-center">
								<!--begin::Info-->
								<div class="d-flex flex-column">
									<!--begin::Name-->
									<a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-2">Sean Bean</a>
									<!--end::Name-->
									<!--begin::Email-->
									<a href="#" class="fw-semibold text-gray-600 text-hover-primary">sean@dellito.com</a>
									<!--end::Email-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Details-->
						</div>
						<!--end::Section-->
						<!--begin::Seperator-->
						<div class="separator separator-dashed mb-7"></div>
						<!--end::Seperator-->
						<!--begin::Section-->
						<div class="mb-7">
							<!--begin::Title-->
							<h5 class="mb-4">Product details</h5>
							<!--end::Title-->
							<!--begin::Details-->
							<div class="mb-0">
								<!--begin::Plan-->
								<span class="badge badge-light-info me-2">Basic Bundle</span>
								<!--end::Plan-->
								<!--begin::Price-->
								<span class="fw-semibold text-gray-600">$149.99 / Year</span>
								<!--end::Price-->
							</div>
							<!--end::Details-->
						</div>
						<!--end::Section-->
						<!--begin::Seperator-->
						<div class="separator separator-dashed mb-7"></div>
						<!--end::Seperator-->
						<!--begin::Section-->
						<div class="mb-10">
							<!--begin::Title-->
							<h5 class="mb-4">Payment Details</h5>
							<!--end::Title-->
							<!--begin::Details-->
							<div class="mb-0">
								<!--begin::Card info-->
								<div class="fw-semibold text-gray-600 d-flex align-items-center">Mastercard
									<img src="assets/media/svg/card-logos/mastercard.svg" class="w-35px ms-2" alt="" /></div>
								<!--end::Card info-->
								<!--begin::Card expiry-->
								<div class="fw-semibold text-gray-600">Expires Dec 2024</div>
								<!--end::Card expiry-->
							</div>
							<!--end::Details-->
						</div>
						<!--end::Section-->
						<!--begin::Seperator-->
						<div class="separator separator-dashed mb-7"></div>
						<!--end::Seperator-->
						<!--begin::Section-->
						<div class="mb-10">
							<!--begin::Title-->
							<h5 class="mb-4">Subscription Details</h5>
							<!--end::Title-->
							<!--begin::Details-->
							<table class="table fs-6 fw-semibold gs-0 gy-2 gx-2">
								<!--begin::Row-->
								<tr class="">
									<td class="text-gray-400">Subscription ID:</td>
									<td class="text-gray-800">sub_4567_8765</td>
								</tr>
								<!--end::Row-->
								<!--begin::Row-->
								<tr class="">
									<td class="text-gray-400">Started:</td>
									<td class="text-gray-800">15 Apr 2021</td>
								</tr>
								<!--end::Row-->
								<!--begin::Row-->
								<tr class="">
									<td class="text-gray-400">Status:</td>
									<td>
										<span class="badge badge-light-success">Active</span>
									</td>
								</tr>
								<!--end::Row-->
								<!--begin::Row-->
								<tr class="">
									<td class="text-gray-400">Next Invoice:</td>
									<td class="text-gray-800">15 Apr 2022</td>
								</tr>
								<!--end::Row-->
							</table>
							<!--end::Details-->
						</div>
						<!--end::Section-->
						<!--begin::Actions-->
						<div class="mb-0">
							<a href="../../demo1/dist/apps/subscriptions/add.html" class="btn btn-primary" id="kt_subscriptions_create_button">Edit Subscription</a>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Sidebar-->
		</div>
		<!--end::Layout-->
	</div>
	<!--end::Content container-->
</div>
<!--end::Content-->