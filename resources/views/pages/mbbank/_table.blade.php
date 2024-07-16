<!--begin::Row-->
<div class="row gy-5 g-xl-10">
    <!--begin::Col-->
    <div class="col-xl-12 mb-5 mb-xl-12">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card body-->
            <div class="card-body pt-2">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
                    <!--begin::Table head-->
{{--                    <thead>--}}
{{--                    <!--begin::Table row-->--}}
{{--                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">--}}
{{--                        <th class="text-end min-w-100px">accountNo</th>--}}
{{--                        <th class="text-end min-w-100px">creditAmount</th>--}}
{{--                        <th class="text-end min-w-100px">debitAmount</th>--}}
{{--                        <th class="text-end min-w-100px">currency</th>--}}
{{--                        <th class="text-end min-w-100px">description</th>--}}
{{--                        <th class="text-end min-w-100px">availableBalance</th>--}}
{{--                        <th class="text-end min-w-100px">beneficiaryAccount</th>--}}
{{--                        <th class="text-end min-w-100px">refNo</th>--}}
{{--                        <th class="text-end min-w-100px">benAccountName</th>--}}
{{--                        <th class="text-end min-w-100px">bankName</th>--}}
{{--                        <th class="text-end min-w-100px">benAccountNo</th>--}}
{{--                        <th class="text-end min-w-100px">dueDate</th>--}}
{{--                        <th class="text-end min-w-100px">docId</th>--}}
{{--                        <th class="text-end min-w-100px">transactionType</th>--}}
{{--                    </tr>--}}
{{--                    <!--end::Table row-->--}}
{{--                    </thead>--}}
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @if( $history['transactionHistoryList'] )

                        @foreach($history['transactionHistoryList'] as $val)
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ date('d-m-Y', strtotime($val['postingDate'])) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ date('d-m-Y', strtotime($val['transactionDate'])) }}
                                    </a>
                                </td>
                                <td class="text-end">{{ $val['accountNo'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['creditAmount'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['debitAmount'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['currency'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['description'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['availableBalance'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['beneficiaryAccount'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['refNo'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['benAccountName'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['bankName'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['benAccountNo'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['dueDate'] ?? "No Data" }}</td>
{{--                                <td class="text-end">{{ $val['docId'] ?? "No Data" }}</td>--}}
                                <td class="text-end">{{ $val['transactionType'] ?? "No Data" }}</td>
                            </tr>
                        @endforeach

                    @else
                        <tr class="text-center">
                            <h1>No Data</h1>
                        </tr>
                    @endif
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Table Widget 4-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->

