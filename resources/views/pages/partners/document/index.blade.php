<x-base-layout>
	<style>
		h3.title {
			font-size: 18px !important;
		}

		.byline {
			font-size: 17px;
			font-weight: 700;
		}

		p.mb-0.font-weight-bold {
			font-size: 17px;
			font-style: normal;
		}

		p.mb-0 {
			font-size: 15px;
		}

		span.text-info {
			font-size: 17px;
			font-weight: 700;
		}

		p.mb-2 {
			font-size: 14px;
		}

		.col-md-4 ul li {
			font-size: 13px;
		}
	</style>

    <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
        <div class=" card col-md-12 col-xxl-12 ">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="x_panel">
						<div class="x_content" style="display: block;">
							<p class="badge badge-primary mb-2">Access Token:</p>
							<p style="padding: 1rem; background: #1e1e2d; color: #f5f8fa; border-radius: 0.5rem;font-size: 17px;">
								{{ Auth::user()->access_token }}
							</p>
						</div>
						<div class="x_content" style="display: block;">
							<p class="badge badge-primary mb-2">Key:</p>
							<p style="padding: 1rem; background: #1e1e2d; color: #f5f8fa; border-radius: 0.5rem;font-size: 17px;">
								{{ Auth::user()->key }}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
        <div class="card p-6 col-md-12 col-xxl-12 ">
            <h2>Danh sách API của bạn</h2>
		</div>
	</div>

	<div class="row g-6 mb-6 g-xl-9 mb-xl-9">
		<div class=" card col-md-6 col-xxl-6 ">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body d-flex  flex-column py-9 px-5">
                    @include('pages.partners.document.api1')
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
		<div class=" col-md-6 col-xxl-6">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body d-flex  flex-column py-9 px-5">
                    @include('pages.partners.document.api3')
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
	</div>

	<div class="row g-6 mb-6 g-xl-9 mb-xl-9">
		<div class="  card col-md-6 col-xxl-6">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body d-flex  flex-column py-9 px-5">
                    @include('pages.partners.document.api2')
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
		<div class="  col-md-6 col-xxl-6">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body d-flex  flex-column py-9 px-5">
                    @include('pages.partners.document.api4')
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
	</div>

	<div class="row g-6 mb-6 g-xl-9 mb-xl-9">
		<div class="  card col-md-6 col-xxl-6">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body d-flex  flex-column py-9 px-5">
					@include('pages.partners.document.api6')
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
		<div class="  col-md-6 col-xxl-6">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body d-flex  flex-column py-9 px-5">
					@include('pages.partners.document.api5')
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
	</div>

	<div class="row g-6 mb-6 g-xl-9 mb-xl-9">
		<div class="  card col-md-6 col-xxl-6">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
				<div class="card-body d-flex  flex-column py-9 px-5">
					@include('pages.partners.document.api7')
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
		<div class="  col-md-6 col-xxl-6">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card body-->
{{--				<div class="card-body d-flex  flex-column py-9 px-5">--}}

{{--				</div>--}}
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
	</div>


</x-base-layout>




