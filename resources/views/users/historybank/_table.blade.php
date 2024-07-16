<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="historybank">
    <!--begin::Table head-->
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
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody>
    </tbody>
    <!--end::Table body-->
</table>
<!--end::Table-->

{{-- Inject Scripts --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


@section('scripts')
    <script type="text/javascript">
        (function ($) {
            "use strict";
            $('#historybank').DataTable({
                pageLength: 25,
                ordering: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('historybank.datatables_user') }}',
                columns: [
                    {data: 'doi_tac', name: 'doi_tac'},
                    {data: 'groupbank', name: 'groupbank'},
                    // {data: 'id_refNo', name: 'id_refNo'},
                    {data: 'refNo', name: 'refNo'},
                    {data: 'description', name: 'description'},
                    {data: 'accountNo', name: 'accountNo'},
                    {data: 'debitAmount', name: 'debitAmount'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        })(jQuery);

    </script>
    {{ $dataTable->scripts() }}
@endsection