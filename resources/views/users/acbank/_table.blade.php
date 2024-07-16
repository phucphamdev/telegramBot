<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"https://acb.toidicodedao.click:7002/api/acb/transactions",
            method:"POST",
            // data: {
            //     "accountNumber": "110123456",
            //     "username": "0921476765",
            //     "password": "Quan999999#",
            //     "begin": "01/10/2022 00:00:00",
            //     "end": "25/10/2022 00:00:00"
            // },
            data: {
                "accountNumber": "27508737",
                "username": "0908498107",
                "password": "Quan999999#",
                "begin": "01/01/2022 00:00:00",
                "end": "25/12/2023 00:00:00"
            },
            success:function(data){
                console.log(data);

                $.ajax({
                    url:"{{ route('apiacbbankcode.updatetransactions') }}",
                    method:"POST",
                    data: {
                        "data": data,
                    },
                    success:function(data){
                        console.log(data);
                    },
                    // error: function (request, error) {
                    //     console.log(request);
                    //     alert(" Can't do because: " + error);
                    // }
                });
            }
        });
    });
</script>

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
