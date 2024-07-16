<x-base-layout>

	<div class="app-main flex-column flex-row-fluid" >

		<!--begin::Content wrapper-->
		<div class="d-flex flex-column flex-column-fluid">
			<!--begin::Content-->
			<div id="kt_app_content" class="app-content flex-column-fluid">
				<!--begin::Content container-->
				<div id="kt_app_content_container" class="app-container container-xxl">

					<div class="d-flex flex-wrap flex-stack pb-7">
						<div class="d-flex flex-wrap align-items-center my-1">
							<h3 class="fw-bold me-5 my-1">Users ( {{ \App\Helper\KpayHelper::count_partners() }})</h3>
						</div>
					</div>

					<div class="card mb-5 mb-xl-10">
						<!--begin::Col-->
						<div class="col-xl-12">
							<!--begin::Table Widget 5-->
							<div class="card card-flush h-xl-100">

								<!--begin::Card body-->
								<div class="card-body">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
										<!--begin::Table head-->
										<thead>
										<!--begin::Table row-->
										<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
											<th class="min-w-150px">Ten</th>
											<th class="text-center pe-3 min-w-100px">Email</th>
											<th class="text-center pe-3 min-w-100px">So Du</th>
											<th class="text-center pe-3 min-w-150px">Ngay Tao</th>
											<th class="text-center pe-3 min-w-100px">Cap Nhat Cuoi</th>

										</tr>
										<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="fw-bold text-gray-600">

										@foreach(\App\Helper\KpayHelper::list_partners() as $partner)
											<tr>
												<!--begin::Item-->
												<td>
													<a href="#" class="text-dark text-hover-primary">{{ $partner['name']  }}</a>
												</td>
												<td class="text-center">{{ $partner['email']  }}</td>
												<td class="text-center">{{ $partner['so_du']  }}  VND </td>
												<td class="text-center">{{ $partner['created_at']  }}</td>
												<td class="text-center">{{ $partner['updated_at']  }}</td>
											</tr>
										@endforeach



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
