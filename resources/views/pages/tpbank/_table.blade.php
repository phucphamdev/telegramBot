<!--begin::Row-->
<div class="row gy-5 g-xl-10">
    <!--begin::Col-->
    <div class="col-xl-12 mb-5 mb-xl-12">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card body-->
            <div class="card-body pt-2">
                @if(isset($history['transactionInfos']))
                    <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
                        <thead>
                        <tr>
                            <td >reference</td>
                            <td >arrangementId</td>
                            <td >amount</td>
                            <td >currency</td>
                            <td >creditDebitIndicator</td>
                            <td >description</td>
                            <td >bookingDate</td>
                            <td >valueDate</td>
                            <td >runningBalance</td>

                        </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                        @foreach($history['transactionInfos'] as $val)
                            <tr>
                                <td class="text-end">{{ $val['reference'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['arrangementId'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['amount'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['currency'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['creditDebitIndicator'] ?? "No Data" }}</td>
                                <td class="text-end">{{ $val['description'] ?? "No Data" }}</td>
                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ date('d-m-Y', strtotime($val['bookingDate'])) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ date('d-m-Y', strtotime($val['valueDate'])) }}
                                    </a>
                                </td>

                                <td class="text-end">{{ $val['runningBalance'] ?? "No Data" }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                @else
                    <table class="table align-middle table-row-dashed fs-6 gy-3 text-center" >
                        <tbody class="fw-bold text-gray-600 text-center">
                        <tr class="text-center" >
                            <h1>Không Có Giao Dịch Mới </h1>
                        </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                @endif

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Table Widget 4-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->

