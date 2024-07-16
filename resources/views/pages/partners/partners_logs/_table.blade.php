<!--begin::Content-->
<div  class="app-content flex-column-fluid">
	<!--begin::Social - Followers -->
	<div class="d-flex flex-row">
		<!--begin::Start sidebar-->
		<div class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px" data-kt-drawer="true"
			 data-kt-drawer-name="start-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
			 data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '250px': '300px'}"
			 data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_social_start_sidebar_toggle">
			<!--begin::User menu-->
			<div class="card mb-5 mb-xl-8">
				<!--begin::Body-->
				<div class="card-body pt-15 px-0">
					<!--begin::Member-->
					<div class="d-flex flex-column text-center mb-9 px-9">
						<!--begin::Info-->
						<div class="text-center">
							<!--begin::Name-->
							<a href="#"
							   class="text-gray-800 fw-bold text-hover-primary fs-4">{{ $user->first_name }} - {{ $user->last_name }} </a>
							<!--end::Name-->
							<!--begin::Position-->
							<span class="text-muted d-block fw-semibold">{{ $user->email }}</span>
							<!--end::Position-->
						</div>
						<!--end::Info-->
					</div>
					<!--end::Member-->
					<!--begin::Row-->
					<div class="row px-9 mb-4">
						<!--begin::Col-->
						<div class="col-md-4 text-center">
							<div class="text-gray-800 fw-bold fs-3">
								{{ \App\Helper\KpayHelper::count_recharge($user->id)  }}
							</div>
							<span class="text-gray-500 fs-8 d-block fw-bold">Nạp Tien</span>
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-4 text-center">
							<div class="text-gray-800 fw-bold fs-3">
								<span class="m-0" data-kt-countup="true" data-kt-countup-value="24">{{ \App\Helper\KpayHelper::count_withdraw($user->access_token) }}</span>
							</div>
							<span class="text-gray-500 fs-8 d-block fw-bold">Rút Tiền </span>
						</div>
						<!--end::Col-->

					</div>
					<!--end::Row-->

				</div>
				<!--end::Body-->
			</div>
			<!--end::User menu-->

		</div>
		<!--end::Start sidebar-->
		<!--begin::Content-->
		<div class="w-100 flex-lg-row-fluid mx-lg-13">
			<!--begin::List widget 14-->
			<div class="card card-flush">
				<!--begin::Header-->
				<div class="card-header pt-5">
					<!--begin::Title-->
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold text-dark">Logs - Gần Đây !!! </span>
					</h3>
					<!--end::Title-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-6">
					<!--begin::Timeline-->
					<div class="timeline-label">

						 @foreach(\App\Helper\KpayHelper::get_Logs_today_limit($user->id) as $item)
							<!--begin::Item-->
							<div class="timeline-item">
								<!--begin::Label-->
								<div class="timeline-label fw-bold text-gray-800 fs-6">{{ $item['created_at'] }} </div>
								<!--end::Label-->
								<!--begin::Badge-->
								<div class="timeline-badge">
									<i class="ki-duotone ki-abstract-8 text-gray-600 fs-3">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Badge-->
								@php
								$check = false;
								@endphp
								@foreach($item['new'] as $key =>  $new)
									@if(isset($item['old']->$key) &&  $item['old']->$key != $new)
										<div class="fw-semibold text-gray-700 ps-3 fs-7">
											{{ $key }} : {{ $new }}
										</div>
										@php
											$check = true;
										@endphp
									@endif
								@endforeach

								@if($check== false)
									<div class="fw-semibold text-gray-700 ps-3 fs-7">
										 Đối Tác đã cập nhật nhiều lần liên tục mà không có sự thay đổi nào hết !!
									</div>
								@else
									<div class="fw-semibold text-gray-700 ps-3 fs-7">
										- {{ $item['type'] }}
									</div>
								@endif

							</div>
							<!--end::Item-->
						 @endforeach


					</div>
					<!--end::Timeline-->
				</div>
				<!--end: Card Body-->
			</div>
			<!--end: List widget 14-->
		</div>
		<!--end::Content-->

	</div>
	<!--end::Social - Followers-->

	<div class="card mb-5 mb-xl-10">
		<div class="card">
			<!--begin::Card head-->
			<div class="card-header card-header-stretch">
				<!--begin::Title-->
				<div class="card-title d-flex align-items-center">
					<i class="ki-duotone ki-calendar-8 fs-1 text-primary me-3 lh-0">
						<span class="path1"></span>
						<span class="path2"></span>
						<span class="path3"></span>
						<span class="path4"></span>
						<span class="path5"></span>
						<span class="path6"></span>
					</i>
					<h3 class="fw-bold m-0 text-gray-800">{{ \Carbon\Carbon::today()->format('d-m-Y h:m:s') }}</h3>
				</div>
				<!--end::Title-->
				<!--begin::Toolbar-->
				<div class="card-toolbar m-0">
					<!--begin::Tab nav-->
					<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
						<li class="nav-item" role="presentation">
							<a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today">Hôm Nay</a>
						</li>
					</ul>
					<!--end::Tab nav-->
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Card head-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Tab Content-->
				<div class="tab-content">
					<!--begin::Tab panel-->
					<div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
						@php
							$check = false;
						@endphp

						@foreach(\App\Helper\KpayHelper::get_Logs_today($user->id) as $item)
							<div class="timeline">
								<div class="timeline-item">
									<!--begin::Timeline line-->
									<div class="timeline-line w-40px"></div>
									<!--end::Timeline line-->
									<!--begin::Timeline icon-->
									<div class="timeline-icon symbol symbol-circle symbol-40px me-4">
										<div class="symbol-label bg-light">
											<i class="ki-duotone ki-message-text-2 fs-2 text-gray-500">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
										</div>
									</div>
									<!--end::Timeline icon-->
									<!--begin::Timeline content-->
									<div class="timeline-content mb-10 mt-n1">
										<!--begin::Timeline heading-->
										<div class="pe-3 mb-5">
											<!--begin::Title-->
											<div class="fs-5 fw-semibold mb-2">{{ $item['type'] }}: ( vao luc : {{ $item['created_at_2'] }}  ):</div>
											<!--end::Title-->
											<!--begin::Description-->
											<div class="d-flex align-items-center mt-1 fs-6">
												<!--begin::Info-->
												<div class="text-muted me-2 fs-7">Cap nhat luc :  {{ $item['created_at_2'] }}  </div>
												<!--end::Info-->
												<!--begin::User-->
												<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
													<div class="text-muted me-2 fs-7">id_user : {{ $item['id_user'] }}</div>
												</div>
												<!--end::User-->
											</div>
											<!--end::Description-->
										</div>
										<!--end::Timeline heading-->

										@foreach($item['new'] as $key =>  $new)
											@if($key == 'id')
												@continue
											@else
													@if(isset($item['old']->$key) && $item['old']->$key != $new )
													@php
														$check = true;
													@endphp
														<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
														<!--begin::Icon-->
														<i class="ki-duotone ki-devices-2 fs-2tx text-primary me-4">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
														<!--end::Icon-->
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
															<!--begin::Content-->
															<div class="mb-3 mb-md-0 fw-semibold">
																<h4 class="text-gray-900 fw-bold">{{ $key }}  cập nhật : </h4>
																<div class="fs-6 text-gray-700 pe-7">
																	" {{ $item['old']->$key  }} "
																	cập nhật thành :
																	" {{ $new }} "
																</div>
															</div>
															<!--end::Content-->
															<!--begin::Action-->
															{{--														<a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Thành Công</a>--}}
															<!--end::Action-->
														</div>
														<!--end::Wrapper-->
													</div>
												@endif
											@endif
										@endforeach

										@if($check== false)
											<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
												<!--begin::Icon-->
												<i class="ki-duotone ki-devices-2 fs-2tx text-primary me-4">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
												<!--end::Icon-->
												<!--begin::Wrapper-->
												<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
													<!--begin::Content-->
													<div class="mb-3 mb-md-0 fw-semibold">
														<h4 class="text-gray-900 fw-bold">Đối Tác đã cập nhật nhiều lần liên tục mà không có sự thay đổi nào hết !!</h4>
													</div>
												</div>
												<!--end::Wrapper-->
											</div>
										@endif
									</div>
									<!--end::Timeline content-->
								</div>
									<!--end::Timeline item-->
							</div>
						@endforeach
					</div>
				</div>
				<!--end::Tab Content-->
			</div>
			<!--end::Card body-->
		</div>
	</div>
</div>
<!--end::Content-->
