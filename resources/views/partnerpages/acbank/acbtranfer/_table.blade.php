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
            url:"http://acb.toidicodedao.click:7002/api/acb/transactions",
            method:"POST",
            data: {
                "accountNumber": "110123456",
                "username": "0921476765",
                "password": "Quan999999#",
                "begin": "01/10/2022 00:00:00",
                "end": "25/10/2022 00:00:00"
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
                    }
                });
            }
        });
    });
</script>


{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
