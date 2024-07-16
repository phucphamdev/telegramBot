<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="cronjob">
	<!--begin::Table head-->
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Times</td>
{{--			<td>Data</td>--}}
			<td>Error</td>
			<td>status</td>
{{--			<td>created_at</td>--}}
{{--			<td>updated_at</td>--}}
		</tr>
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
			$('#cronjob').DataTable({
				"aaSorting": [
					[0, "desc"]
				],
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('cronjob.datatables') }}',
				columns: [
					{data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'time', name: 'time'},
					// {data: 'data', name: 'data'},
					{data: 'error', name: 'error'},
					{data: 'status', name: 'status'},
					// {data: 'created_at', name: 'created_at'},
					// {data: 'updated_at', name: 'updated_at'},
				],

			});
		})(jQuery);




	</script>
	{{ $dataTable->scripts() }}

@endsection

