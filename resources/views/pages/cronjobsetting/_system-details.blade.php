<div class="card {{ $class }}">
	<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
		 data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{ __('CronJob Setting') }}</h3>
		</div>
	</div>
	<div class="collapse show">
		<form class="form" name="cronjobsetting"  id="cronjobsetting" method="POST" action="{{ route('cronjobsetting.update') }}">
			@csrf
			@method('POST')
			<meta name="csrf-token" content="{{ csrf_token() }}" />

			<div class="card-body border-top p-9">
				<div class="card-body">
					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('Cancel Recharge Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->cancelrecharge == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="cancelrecharge" name="cancelrecharge" id="cancelrecharge"
										 {{ $object->cancelrecharge == 1 ? 'checked="checked"' : "" }}  >
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('Delete Recharge Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->deleterecharge == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox"  value="deleterecharge" name="deleterecharge" id="deleterecharge"  {{ $object->deleterecharge == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('HistoryBank Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->historybank == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox"  value="historybank" name="historybank" id="historybank"
											{{ $object->historybank == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('Vietcombank Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->vietcombank == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="vietcombank" name="vietcombank" id="vietcombank"
											{{ $object->vietcombank == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('ACB Nodejs Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->acbnodejs == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="acbnodejs" name="acbnodejs" id="acbnodejs"
											{{ $object->acbnodejs == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('Viettelpay Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->viettelpay == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="viettelpay" name="viettelpay" id="viettelpay"
											{{ $object->viettelpay == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('TPBank Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->tpbank == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="tpbank" name="tpbank" id="tpbank"
											{{ $object->tpbank == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('MbBank Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->mbbank == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="mbbank" name="mbbank" id="mbbank"
											{{ $object->mbbank == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('updateHistoryPartners Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->updateHistoryPartners == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="updateHistoryPartners" name="updateHistoryPartners" id="updateHistoryPartners"
											{{ $object->updateHistoryPartners == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->

					<!--begin::Item-->
					<div class="d-flex flex-stack">
						<!--begin::Section-->
						<div class="d-flex align-items-center me-5">
							<!--begin::Symbol-->
							<div class="symbol symbol-40px me-3">
																<span class="symbol-label bg-light-info">
																	<!--begin::Svg Icon | path: icons/duotune/abstract/abs025.svg-->
																	<span class="svg-icon svg-icon-2x svg-icon-info">
																		<svg width="24" height="24" viewBox="0 0 24 24"
																			 fill="none"
																			 xmlns="http://www.w3.org/2000/svg">
																			<path d="M16.925 3.90078V8.00077L12.025 10.8008V5.10078L15.525 3.10078C16.125 2.80078 16.925 3.20078 16.925 3.90078ZM2.525 13.5008L6.025 15.5008L10.925 12.7008L6.025 9.90078L2.525 11.9008C1.825 12.3008 1.825 13.2008 2.525 13.5008ZM18.025 19.7008V15.6008L13.125 12.8008V18.5008L16.625 20.5008C17.225 20.8008 18.025 20.4008 18.025 19.7008Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M8.52499 3.10078L12.025 5.10078V10.8008L7.125 8.00077V3.90078C7.125 3.20078 7.92499 2.80078 8.52499 3.10078ZM7.42499 20.5008L10.925 18.5008V12.8008L6.02499 15.6008V19.7008C6.02499 20.4008 6.82499 20.8008 7.42499 20.5008ZM21.525 11.9008L18.025 9.90078L13.125 12.7008L18.025 15.5008L21.525 13.5008C22.225 13.2008 22.225 12.3008 21.525 11.9008Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</span>
							</div>
							<!--end::Symbol-->
							<!--begin::Content-->
							<div class="me-5">
								<!--begin::Title-->
								<a href="#"
								   class="text-gray-800 fw-bold text-hover-primary fs-6">{{ __('Momo Cron') }}</a>
								<!--end::Title-->
								<!--begin::Desc-->
								<span class="fw-semibold fs-7 d-block text-start text-success ps-0">{{ $object->momo == 1 ? ' Running ' : " Dort Running" }}</span>
								<!--end::Desc-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Section-->
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center">
							<!--begin::Info-->
							<div class="d-flex flex-center">
								<!--begin::Action-->
								<div class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input h-20px w-30px" type="checkbox" value="momo" name="momo" id="momo"
											{{ $object->momo == 1 ? 'checked="checked"' : "" }}>
								</div>
								<!--end::Action-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Item-->
					<!--begin::Separator-->
					<div class="separator separator-dashed my-4"></div>
					<!--end::Separator-->


				</div>
			</div>
			<div class="card-footer d-flex justify-content-end py-6 px-9">
				<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
					@include('partials.general._button-indicator', ['label' => __('Save Changes')])
				</button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
@section('scripts')

	<script type="text/javascript">

		$("#cronjobsetting").submit(function (e) {

			e.preventDefault(); // avoid to execute the actual submit of the form.

			var form = $(this);
			var actionUrl = form.attr('action');

			let formData = {
				cancelrecharge: document.getElementById('cancelrecharge').checked ? 1 : 0,
				deleterecharge: document.getElementById('deleterecharge').checked ? 1 : 0,
				historybank: document.getElementById('historybank').checked ? 1 : 0,
				vietcombank: document.getElementById('vietcombank').checked ? 1 : 0,
				acbnodejs: document.getElementById('acbnodejs').checked ? 1 : 0,
				viettelpay: document.getElementById('viettelpay').checked ? 1 : 0,
				tpbank: document.getElementById('tpbank').checked ? 1 : 0,
				mbbank: document.getElementById('mbbank').checked ? 1 : 0,
				updateHistoryPartners: document.getElementById('updateHistoryPartners').checked ? 1 : 0,
				momo: document.getElementById('momo').checked ? 1 : 0
			};

			console.log(formData);
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				dataType: 'json',
				data: JSON.stringify(formData),
				url: actionUrl,
				contentType: "application/json; charset=utf-8",
				traditional: true,
				success: function (data) {
					if (data == true) {
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
						console.log(data);

						Swal.fire({
							text: data.errorDescription,
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-danger"
							}
						});


					}
				}
			});

		});

	</script>
@endsection
