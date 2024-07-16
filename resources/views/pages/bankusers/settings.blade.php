<x-base-layout>

	<div class="app-main flex-column flex-row-fluid" >

	 settings

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
