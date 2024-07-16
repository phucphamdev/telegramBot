<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="recharge_callback">
	<!--begin::Table head-->
	<thead>
		<tr>
			<td>Result</td>
			<td>Times</td>
			<td>tranID</td>
{{--			<td>tranIDHistory</td>--}}
			<td>amount</td>
			<td>comment</td>
			<td>type</td>
			<td>name</td>
			<td>full_name</td>
{{--			<td>trang_thai</td>--}}
			<td>TGian Tạo</td>
			<td></td>
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
		function callback_again(event, element) {
			if ('preventDefault' in event) event.preventDefault();
			event.returnValue = false;
			let id = element.dataset.id;
			let url = element.dataset.url;

			console.log(id);
			console.log(url);

			var item = {
				id,
				url
			}
			var sweet_loader = '<div class="sweet_loader" style="z-index: 9999;"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

			$.ajax({
				type: 'post',
				dataType: 'json',
				data: JSON.stringify(item),
				url: url,
				contentType: "application/json; charset=utf-8",
				traditional: true,
				beforeSend: function() {
					swal.fire({
						html: '<h3>Loading...</h3>',
						showConfirmButton: false,
						onRender: function() {
							// there will only ever be one sweet alert open.
							$('.swal2-content').prepend(sweet_loader);
						}
					});
				},
				success: function (data) {
					console.log(data);
					Swal.fire({
						text: data,
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					});
				},
				error: function (error) {
					let text = error.responseText;
					console.log(text);
					Swal.fire({
						text: error.responseText,
						icon: "error",
						buttonsStyling: false,
						timer: 10000,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-danger"
						}
					});
				}
			});
		}


		$(".recharge_callback_form").submit(function (e) {

			e.preventDefault(); // avoid to execute the actual submit of the form.

			var form = $(this);
			var actionUrl = form.attr('action');

			let formData = {
				id: $("[name='id']").val()
			};
			console.log(formData);
			$.ajax({
				type: 'POST',
				dataType: 'json',
				data: JSON.stringify(formData),
				url: actionUrl,
				contentType: "application/json; charset=utf-8",
				traditional: true,
				success: function (data) {
					Swal.fire({
						text: "successfully submitted!",
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					});

					location.reload();
				}
			});

		});

		(function ($) {
			"use strict";
			$('#recharge_callback').DataTable({
				"aaSorting": [
					[0, "desc"]
				],
				pageLength: 25,
				ordering: true,
				processing: true,
				serverSide: true,
				ajax: '{{ route('recharge_callback.datatables_callback') }}',
				columns: [
					// {data: 'callback', name: 'callback'},
					{data: 'callback_result', name: 'callback_result', 'title': 'Kết Quả CallBack'},
					{data: 'callback_time', name: 'callback_time','title': 'Số Lần CallBack'},
					{data: 'tranID', name: 'tranID','title': 'Mã tranID'},
					// {data: 'tranIDHistory', name: 'tranIDHistory'},
					{data: 'amount', name: 'amount','title': 'Số Tiền'},
					{data: 'comment', name: 'comment','title': 'Bình Luận'},
					{data: 'type', name: 'type','title': 'Loại'},
					{data: 'name', name: 'name','title': 'Tên Ngân Hàng'},
					{data: 'full_name', name: 'full_name','title': 'Tên Đầy Đủ'},
					// {data: 'trang_thai', name: 'trang_thai'},
					{data: 'created_at', name: 'created_at','title': 'Ngày Tạo'},
					{data: 'action','title': 'Hành Động', searchable: true, orderable: true}
				],

			});
		})(jQuery);




	</script>
	{{ $dataTable->scripts() }}

@endsection

