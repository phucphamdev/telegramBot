<table class="table align-middle gs-0 gy-4" id="recharge">
	<thead>
	<tr>
		<td>partners</td>
		<td>tranID</td>
		<td>amount</td>
		<td>comment</td>
		<td>comment_api</td>
		<td>type</td>
		<td>full_name</td>
		<td>trang_thai</td>
		<td>TGian Tạo</td>
		<td></td>
	</tr>
	</thead>
	<tbody>
	</tbody>
</table>


{{-- Inject Scripts --}}
@section('scripts')
	<script type="text/javascript">

		(function ($) {
			"use strict";
			$('#recharge').DataTable({
				"aaSorting": [
					[0, "desc"]
				],
				pageLength: 25,
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('recharge_success.datatables_recharge_success') }}',
				columns: [
					{data: 'partners', name: 'partners'},
					{data: 'tranID', name: 'tranID','title': 'Mã tranID'},
					{data: 'amount', name: 'amount','title': 'Số Tiền'},
					{data: 'comment', name: 'comment','title': 'Bình Luận'},
					{data: 'comment_api', name: 'comment_api','title': 'Bình Luận Từ API'},
					{data: 'type', name: 'type','title': 'Loại'},
					{data: 'full_name', name: 'full_name','title': 'Tên Đầy Đủ'},
					{data: 'trang_thai', name: 'trang_thai','title': 'Trạng Thái'},
					{data: 'created_at','title': 'Ngày Tạo', searchable: true, orderable: true}
				],

			});
		})(jQuery);




	</script>
	{{ $dataTable->scripts() }}

@endsection

