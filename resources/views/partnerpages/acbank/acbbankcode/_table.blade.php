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
            url:"http://acb.toidicodedao.click:7002/api/acb/getBankCode",
            method:"POST",
            data: {
                "username": "0921476765",
                "password": "Quan999999#"
            },
            success:function(data){
                console.log(data);
                $.ajax({
                    url:"{{ route('apiacbbankcode.updateacbbankcode') }}",
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
