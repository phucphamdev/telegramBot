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
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center ">transId</th>
                        <th class="text-center ">io</th>
                        <th class="text-center ">partnerId</th>
                        <th class="text-center ">partnerName</th>
                        <th class="text-center ">amount</th>
                        <th class="text-center ">comment</th>
                        <th class="text-center ">postBalance</th>
                        <th class="text-center ">status</th>

                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @if($data['status'] == 200)

                        @foreach($data['momoMsg']['tranList'] as $val)
                            <tr>
                                <td class="text-center">{{ $val['transId'] ?? "No Data" }}</td>
                                <td class="text-center">{{ $val['io'] ?? "No Data" }}</td>
                                <td class="text-center">{{ $val['partnerId'] ?? "No Data" }}</td>
                                <td class="text-center">{{ $val['partnerName'] ?? "No Data" }}</td>
                                <td class="text-center">{{ $val['amount'] ?? "No Data" }}</td>
                                <td class="text-center">{{ $val['comment'] ?? "No Data" }}</td>
                                <td class="text-center">{{ $val['postBalance'] ?? "No Data" }}</td>
                                <td class="text-center">{{ $val['status'] ?? "No Data" }}</td>
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

