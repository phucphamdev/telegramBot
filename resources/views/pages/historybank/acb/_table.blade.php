<table class="table align-middle gs-0 gy-4" id="loaddata">
    <thead>
    <tr>
        <td>Đối Tác</td>
        <td>Ngân Hàng</td>
        <td>refNo</td>
        <td>Ghi Chú</td>
        <td>Số Tiển / Tài Khoản</td>
        <td>Số Tiển / Tài Khoản</td>
        <td>Ngày Tạo</td>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

@section('scripts')
    <script type="text/javascript">
        (function ($) {
            "use strict";
            $('#loaddata').DataTable({
                pageLength: 25,
                ordering: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('acb_historybank.datatables_acb_historybank') }}',
                columns: [
                    {data: 'doi_tac', name: 'doi_tac'},
                    {data: 'groupbank', name: 'groupbank'},
                    // {data: 'id_refNo', name: 'id_refNo'},
                    {data: 'refNo', name: 'refNo'},
                    {data: 'description', name: 'description'},
                    {data: 'accountNo', name: 'accountNo'},
                    {data: 'debitAmount', name: 'debitAmount'},
                    {data: 'created_at', searchable: true, orderable: true}
                ]
            });
        })(jQuery);

    </script>
    {{ $dataTable->scripts() }}
@endsection
