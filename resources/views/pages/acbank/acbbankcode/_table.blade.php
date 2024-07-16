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
            url:"https://acb.kpaypro.vip/api/acb/getBankCode",
            method:"POST",
            data: {
                "username": "0908498107",
                "password": "Quan9999999#"
            },
            success:function(data){
                console.log(data);

                if(!data)
                {
                    console.log("ACB - getBankCode - No Data");
                }
                else
                {
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

            }
        });
    });
</script>

@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
