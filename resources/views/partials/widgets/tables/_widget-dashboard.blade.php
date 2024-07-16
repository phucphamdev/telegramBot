<!--begin::Tables widget 14-->
<div class="card card-flush h-md-100">
	<!--begin::Header-->
	<div class="card-header pt-7">
		<!--begin::Title-->
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-800">Danh Sách Người Dùng: </span>
{{--			<span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span>--}}
		</h3>
		<!--end::Title-->
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body pt-6">
		<!--begin::Table container-->
		<div class="table-responsive">
			<!--begin::Table-->
			<table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
				<!--begin::Table head-->
				<thead>
				<tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
					<th class="p-0 pb-3 min-w-175px text-start">Tên</th>
					<th class="p-0 pb-3 min-w-175px text-start">Email</th>
					<th class="p-0 pb-3 min-w-175px text-start">Ngày Tạo</th>
					<th class="p-0 pb-3 min-w-175px text-end pe-12">Trạng Thái</th>
					<th class="p-0 pb-3 w-50px text-end"></th>
				</tr>
				</thead>
				<!--end::Table head-->
				<!--begin::Table body-->
				<tbody>
				@if($listUser)
					@foreach($listUser as $user)
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<div class="symbol symbol-50px me-3">
										<img src="{{ $user->avatar_url }}"
											 alt=""/>
									</div>
									<div class="d-flex justify-content-start flex-column">
										<a href="#"
										   class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $user->first_name }}</a>
										<span class="text-gray-400 fw-semibold d-block fs-7">{{ $user->last_name }}</span>
									</div>
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<div class="d-flex justify-content-start flex-column">
										<a href="#"
										   class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $user->email }}</a>

									</div>
								</div>
							</td>
							<td>
								<div class="d-flex align-items-center">
									<div class="d-flex justify-content-start flex-column">
										<a href="#"
										   class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ date('d-m-Y', strtotime($user->created_at)) }}</a>

									</div>
								</div>
							</td>
							<td class="text-end pe-12">
								<span class="badge py-3 px-4 fs-7 badge-light-success">Đăng Ký Thành Công</span>
							</td>
						</tr>
					@endforeach

				@endif

				</tbody>
				<!--end::Table body-->
			</table>
		</div>
		<!--end::Table-->
	</div>
	<!--end: Card Body-->
</div>
<!--end::Tables widget 14-->
