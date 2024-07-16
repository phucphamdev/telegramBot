<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="historybank">
	<!--begin::Table head-->
	<thead>
	</thead>
	<!--end::Table head-->
	<!--begin::Table body-->
	<tbody>
	</tbody>
	<!--end::Table body-->
</table>
<!--end::Table-->


{{-- Inject Scripts --}}
@section('scripts')
	<script type="text/javascript">
		(function ($) {
			"use strict";
			$('#historybank').DataTable({
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('historybank.datatables') }}',
				columns: [
					// {data: 'id', name: 'id'},
					{data: 'ma_gd', name: 'ma_gd'},
					{data: 'ten_khach_hang', name: 'ten_khach_hang'},
					{data: 'tai_khoan_nhan', name: 'tai_khoan_nhan'},
					{data: 'tai_khoan_khach_hang', name: 'tai_khoan_khach_hang'},
					{data: 'so_tien_thuc_nhan', name: 'so_tien_thuc_nhan'},
					{data: 'so_tien', name: 'so_tien'},
					{data: 'noi_dung', name: 'noi_dung'},
					{data: 'doi_tac', name: 'doi_tac'},
					{data: 'trang_thai', name: 'trang_thai'},
					{data: 'created_at', name: 'created_at'},
					// {data: 'updated_at', name: 'updated_at'},
					{data: 'action', searchable: true, orderable: true}
				],
				"aoColumnsDefs": [
					{ "sClass": "aaaaa", "aTargets": [1] }
				],
			});


			$('.editupdate').click(function update() {
				console.log('sdasdasdas');
			})



		})(jQuery);
	</script>
	{{ $dataTable->scripts() }}
@endsection