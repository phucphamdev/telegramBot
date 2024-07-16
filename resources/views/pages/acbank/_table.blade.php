<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    function fetchAndProcessTransactions(accountNumber, username, password, begin, end, routeName, successMessage) {
        $.ajax({
            url: "https://acb.kpaypro.vip/api/acb/transactions",
            method: "POST",
            data: {
                accountNumber: accountNumber,
                username: username,
                password: password,
                begin: begin,
                end: end
            },
            success: function (data) {
                console.log(accountNumber);
                console.log(data);

                $.ajax({
                    url: routeName,
                    method: "POST",
                    data: {
                        data: data
                    },
                    success: function (data) {
                        console.log(data);
                        console.log(accountNumber + successMessage);
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const accounts = [
            {
                accountNumber: "31527897",
                username: "linhht20",
                password: "Linh123@",
                begin: "10/8/2023 00:00:00",
                end: "31/8/2023 00:00:00",
                routeName: "{{ route('apiacbbankcode.updatetransactionsnani') }}",
                successMessage: " thanh cong"
            },
            {
                accountNumber: "27508737",
                username: "0908498107",
                password: "Quan9999999#",
                begin: "10/8/2023 00:00:00",
                end: "31/8/2023 00:00:00",
                routeName: "{{ route('apiacbbankcode.updatetransactionsnani') }}",
                successMessage: " thanh cong"
            },
            {
                accountNumber: "10808611",
                username: "10808611",
                password: "Baomat03@@",
                begin: "10/8/2023 00:00:00",
                end: "31/8/2023 00:00:00",
                routeName: "{{ route('apiacbbankcode.updatetransactionsnani88') }}",
                successMessage: " Ho Van Duong =   thanh cong "
            },

        ];

        accounts.forEach(account => {
            fetchAndProcessTransactions(
                account.accountNumber,
                account.username,
                account.password,
                account.begin,
                account.end,
                account.routeName,
                account.successMessage
            );
        });
    });


</script>

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}
@endsection
