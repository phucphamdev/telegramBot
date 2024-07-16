<x-base-layout>
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">

		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container flex-column-fluid">

			<!--begin::API Overview-->
			<div class="card mb-5 mb-xxl-10">
				<!--begin::Header-->
				<div class="card-header">
					<!--begin::Title-->
					<div class="card-title">
						<h3>Thông tin API:</h3>
					</div>
					<!--end::Title-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body py-10">
					<!--begin::Row-->
					<div class="row mb-10">
						<!--begin::Col-->
						<div class="col-md-6 pb-10 pb-lg-0">
							<h3>Access token</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->access_token }}</p>

						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-6">
							<h3>Key</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->key }}</p>

						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->

					<div class="row mb-10">
						<!--begin::Col-->
						<div class="col-md-6 pb-10 pb-lg-0">
							<h3>UUID</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->UUID }}</p>

						</div>
						<div class="col-md-6 pb-10 pb-lg-0">
							<h3>email</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->email }}</p>

						</div>
						<div class="col-md-6 pb-10 pb-lg-0">
							<h3>Tên</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->first_name }}</p>

						</div>

						<div class="col-md-6">
							<h3>last_name</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->last_name }}</p>

						</div>

						<div class="col-md-6">
							<h3>Địa Chỉ IP</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->ip }}</p>

						</div>

						<div class="col-md-6">
							<h3>Link Gọi Callback</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->callback_link }}</p>

						</div>
						<div class="col-md-6">
							<h3>Tài Khoản Telegram</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->telegram }}</p>

						</div>

						<div class="col-md-6">
							<h3>Số Điện Thoại</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->dien_thoai }}</p>

						</div>

						<div class="col-md-6">
							<h3>% Chiếc Khấu Momo</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->ck_momo }} %</p>

						</div>

						<div class="col-md-6">
							<h3>% Chiếc Khấu Viettelpay</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->ck_vtpay }} %</p>

						</div>

						<div class="col-md-6">
							<h3>% Chiếc Khấu Ngân Hàng</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->ck_bank }} %</p>

						</div>

						<div class="col-md-6">
							<h3>% Chiếc Khấu  ZaloPay</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->ck_zalo }} %</p>

						</div>

						<div class="col-md-6">
							<h3>Số Dư</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ number_format($user->so_du, 0, '', ',') }}  VNĐ</p>

						</div>

						<div class="col-md-6">
							<h3>Tài Khoản</h3>
							<p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->tai_khoan }}</p>

						</div>

					</div>

				</div>
				<!--end::Body-->
			</div>
			<!--end::API overview-->

		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->

</x-base-layout>
