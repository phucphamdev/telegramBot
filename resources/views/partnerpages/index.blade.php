<x-base-layout>
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">

		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container flex-column-fluid">

			<!--begin::Row-->
			<div class="row g-5 g-xl-8">

				<div class="col-xl-6">
					<!--begin::Mixed Widget 14-->
					<div class="card card-xxl-stretch mb-5 mb-xl-8 theme-dark-bg-body"
						 style="background-color: #F7D9E3">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column mb-7">
								<!--begin::Title-->
								<a href="#" class="text-dark text-hover-primary fw-bold fs-3">Hôm Nay</a>
								<!--end::Title-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Row-->
							<div class="row g-0">

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 me-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',1)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Nhân Viên Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',2)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold"> Đối Tác Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',3)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Khách Hàng Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',3)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Yêu Cầu Nạp Tiền Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',3)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Yêu Cầu Rút Tiền Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

							</div>
							<!--end::Row-->
						</div>
					</div>
					<!--end::Mixed Widget 14-->
				</div>

				<div class="col-xl-6">
					<!--begin::Mixed Widget 14-->
					<div class="card card-xxl-stretch mb-5 mb-xl-8 theme-dark-bg-body"
						 style="background-color: #F7D9E3">
						<!--begin::Body-->
						<div class="card-body d-flex flex-column">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column mb-7">
								<!--begin::Title-->
								<a href="#" class="text-dark text-hover-primary fw-bold fs-3">Tháng Này</a>
								<!--end::Title-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Row-->
							<div class="row g-0">

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 me-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',1)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Nhân Viên Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',2)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold"> Đối Tác Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',3)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Khách Hàng Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',3)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Yêu Cầu Nạp Tiền Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

								<!--begin::Col-->
								<div class="col-12">
									<div class="d-flex align-items-center mb-9 ms-2">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
												<span class="svg-icon svg-icon-1 svg-icon-dark">
																			<svg width="24" height="24"
																				 viewBox="0 0 24 24" fill="none"
																				 xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3"
																					  d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
																					  fill="currentColor"/>
																				<path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
																					  fill="currentColor"/>
																			</svg>
																		</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Symbol-->
										<!--begin::Title-->
										<div>
											<div class="fs-5 text-dark fw-bold lh-1">{{ count(\App\Models\User::Where('type',3)->get()) }}</div>
											<div class="fs-7 text-gray-600 fw-bold">Yêu Cầu Rút Tiền Mới</div>
										</div>
										<!--end::Title-->
									</div>
								</div>
								<!--end::Col-->

							</div>
							<!--end::Row-->
						</div>
					</div>
					<!--end::Mixed Widget 14-->
				</div>

			</div>
			<!--end::Row-->
		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->


	<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
		<div class="col-xl-12">
			{{ theme()->getView('partials/widgets/tables/_widget-dashboard',compact('listUser')) }}
		</div>
	</div>

</x-base-layout>
