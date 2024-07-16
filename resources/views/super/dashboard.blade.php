<x-base-layout>

	<!--begin::Content wrapper-->
	<div class="d-flex flex-column flex-column-fluid">

		<!--begin::Content-->
		<div id="kt_app_content" class="app-content ">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container">

				<!--begin::Row-->
				<div class="row g-5 g-xl-8">
					<!--begin::Col-->
					<div class="col-xl-4">
						<!--begin::Mixed Widget 13-->
						<div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body" style="background-color: #F7D9E3">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column">
								<!--begin::Wrapper-->
								<div class="d-flex flex-column flex-grow-1">
									<!--begin::Title-->
									<a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Hôm Nay  </a>

									<!--end::Title-->
									<!--begin::Chart-->
{{--									<div class="mixed-widget-13-chart" style="height: 100px"></div>--}}
									<!--end::Chart-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Stats-->
								<div class="pt-5">
									<!--begin::Number-->
									<span class="text-dark fw-bold fs-2x me-2 lh-0">{{ \App\Helper\KpayHelper::get_sum_days() }}</span>
									<!--end::Number-->
									<!--begin::Text-->
									<span class="text-dark fw-bold fs-6 lh-0"> ( {{ \App\Helper\KpayHelper::get_total_days() }}  )  </span>
									<!--end::Text-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Mixed Widget 13-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-xl-4">
						<!--begin::Mixed Widget 13-->
						<div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body" style="background-color: #CBF0F4">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column">
								<!--begin::Wrapper-->
								<div class="d-flex flex-column flex-grow-1">
									<!--begin::Title-->
									<a href="#" class="text-dark text-hover-primary fw-bold fs-3"> 7 Ngày </a>
									<!--end::Title-->
									<!--begin::Chart-->
{{--									<div class="mixed-widget-13-chart" style="height: 100px"></div>--}}
									<!--end::Chart-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Stats-->
								<div class="pt-5">
									<!--begin::Number-->
									<span class="text-dark fw-bold fs-2x me-2 lh-0">{{ \App\Helper\KpayHelper::get_sum_week() }}</span>
									<!--end::Number-->
									<!--begin::Text-->
									<span class="text-dark fw-bold fs-6 lh-0"> ( {{ \App\Helper\KpayHelper::get_total_week() }}  )  </span>
									<!--end::Text-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Mixed Widget 13-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-xl-4">
						<!--begin::Mixed Widget 13-->
						<div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body" style="background-color: #CBD4F4">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column">
								<!--begin::Wrapper-->
								<div class="d-flex flex-column flex-grow-1">
									<!--begin::Title-->
									<a href="#" class="text-dark text-hover-primary fw-bold fs-3"> 30 Ngày </a>
									<!--end::Title-->
									<!--begin::Chart-->
{{--									<div class="mixed-widget-13-chart" style="height: 100px"></div>--}}
									<!--end::Chart-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Stats-->
								<div class="pt-5">
									<!--begin::Number-->
									<span class="text-dark fw-bold fs-2x me-2 lh-0">{{ \App\Helper\KpayHelper::get_sum_month() }}</span>
									<!--end::Number-->
									<!--begin::Text-->
									<span class="text-dark fw-bold fs-6 lh-0"> ( {{ \App\Helper\KpayHelper::get_total_month() }} ) </span>
									<!--end::Text-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Mixed Widget 13-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->

				<!--begin::Row-->
				<div class="row g-5 g-xl-8">
					<!--begin::Col-->
					<div class="col-xl-12">
						<!--begin::Tables Widget 5-->
						<div class="card card-xl-stretch mb-xl-8">
							<!--begin::Header-->
							<div class="card-header border-0 pt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label fw-bold fs-3 mb-1">Cron Job Cập Nhật Giao Dịch Mới</span>
									<span class="text-muted mt-1 fw-semibold fs-7">Các Giao Dịch Vừa Được Cập Nhật Tự Động Bởi Cron Job!</span>
								</h3>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body py-3">
								<div class="tab-content">
									<!--begin::Tap pane-->
									<div class="tab-pane fade show active">
										<!--begin::Table container-->
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4" id="recharge4">
												<!--begin::Table head-->
												<thead>
												<tr>
													<td>Đối Tác</td>
													<td>tranID</td>
													<td>Số Tiền</td>
													<td>Bình Luận</td>
													<td>Bình Luận Api</td>
													<td>Tên</td>
													<td>Trạng Thái</td>
													<td>Thời Gian</td>
												</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>
										<!--end::Table-->
									</div>
								</div>
							</div>
							<!--end::Body-->
						</div>
						<!--end::Tables Widget 5-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->

				<!--begin::Row-->
				<div class="row g-5 g-xl-8">
					<!--begin::Col-->
					<div class="col-xl-12">
						<!--begin::Tables Widget 5-->
						<div class="card card-xl-stretch mb-xl-8">
							<!--begin::Header-->
							<div class="card-header border-0 pt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label fw-bold fs-3 mb-1">Giao Dịch Gần Đây</span>
									<span class="text-muted mt-1 fw-semibold fs-7">Giao Dịch Thành Công Gần Đây!</span>
								</h3>
								<div class="card-toolbar">
									<ul class="nav">
										<li class="nav-item">
											<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4 me-1 active" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">Hom Nay</a>
										</li>
										<li class="nav-item">
											<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">7 Ngay </a>
										</li>
										<li class="nav-item">
											<a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bold px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">30 Ngay </a>
										</li>
									</ul>
								</div>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body py-3">
								<div class="tab-content">
									<!--begin::Tap pane-->
									<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
										<!--begin::Table container-->
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4" id="recharge">
												<!--begin::Table head-->
												<thead>
												<tr>
													<td>Đối Tác</td>
													<td>tranID</td>
													<td>Số Tiền</td>
													<td>Bình Luận</td>
													<td>Bình Luận Api</td>
													<td>Tên</td>
													<td>Trạng Thái</td>
													<td>Thời Gian</td>
												</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>
										<!--end::Table-->
									</div>
									<!--end::Tap pane-->
									<!--begin::Tap pane-->
									<div class="tab-pane fade" id="kt_table_widget_5_tab_2">
										<!--begin::Table container-->
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4" id="recharge2">
												<!--begin::Table head-->
												<thead>
												<tr>
													<td>Đối Tác</td>
													<td>Mã tranID</td>
													<td>Số Tiền</td>
													<td>Bình Luận</td>
													<td>Bình Luận Lấy Từ Api</td>
													<td>Tên Đầy Đủ</td>
													<td>Trạng Thái</td>
													<td>Thời Gian Tạo</td>
												</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>
										<!--end::Table-->
									</div>
									<!--end::Tap pane-->
									<!--begin::Tap pane-->
									<div class="tab-pane fade" id="kt_table_widget_5_tab_3">
										<!--begin::Table container-->
										<div class="table-responsive">
											<table class="table align-middle gs-0 gy-4" id="recharge3">
												<!--begin::Table head-->
												<thead>
												<tr>
													<td>Đối Tác</td>
													<td>Mã tranID</td>
													<td>Số Tiền</td>
													<td>Bình Luận</td>
													<td>Bình Luận Lấy Từ Api</td>
													<td>Tên Đầy Đủ</td>
													<td>Trạng Thái</td>
													<td>Thời Gian Tạo</td>
												</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>
										<!--end::Table-->
									</div>
									<!--end::Tap pane-->
								</div>
							</div>
							<!--end::Body-->
						</div>
						<!--end::Tables Widget 5-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->

			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->


	</div>
	<!--end::Content wrapper-->


	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!--Data Table-->
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

			$('#recharge2').DataTable({
				"aaSorting": [
					[1, "pending"]
				],
				bFilter: false,
				paging: true,
				pageLength: 10,
				ordering: false,
				processing: true,
				serverSide: true,
				ajax: '{{ route('recharge.datatables_week') }}',
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

			$('#recharge3').DataTable({
				"aaSorting": [
					[1, "pending"]
				],
				bFilter: false,
				paging: true,
				pageLength: 10,
				ordering: false,
				processing: true,
				serverSide: true,
				ajax: '{{ route('recharge.datatables_month') }}',
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

			$('#recharge4').DataTable({
				"aaSorting": [
					[1, "pending"]
				],
				bFilter: false,
				paging: true,
				pageLength: 10,
				ordering: false,
				processing: true,
				serverSide: true,
				ajax: '{{ route('recharge.datatables_api') }}',
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
