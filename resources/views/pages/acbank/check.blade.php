<!--begin::Card-->
<div class="card">
	<!--begin::Card body-->
	<div class="card-body pt-6">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url:"https://acb.kpaypro.vip/api/acb/transactions",
					method:"POST",
					data: {
						"accountNumber": "27508737",
						"username": "0908498107",
						"password": "Quan999999#",
						"begin": "1/5/2023 00:00:00",
						"end": "31/5/2023 00:00:00"
					},
					success:function(data)
					{
						console.log(data);

						$.ajax({
							url:"{{ route('apiacbbankcode.updatetransactions') }}",
							method:"POST",
							data: {
								"data": data,
							},
							success:function(data){
								console.log(data);
							}
						});
					}
				});
			});
		</script>

	</div>
	<!--end::Card body-->
</div>
<!--end::Card-->
