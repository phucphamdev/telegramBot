<x-base-layout>

	<!--begin::Card-->
	<div class="card">
		<!--begin::Card body-->
		<div class="card-body pt-6">
			@if( Auth::user()->role() == 'admin')
				@include('pages.withdraw.success_withdraw.table_admin')
			@else
				@include('pages.withdraw.success_withdraw.table_partner')
			@endif
		</div>
		<!--end::Card body-->
	</div>
	<!--end::Card-->

</x-base-layout>




