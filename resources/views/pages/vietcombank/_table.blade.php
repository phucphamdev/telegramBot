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
                        <th class="text-end min-w-100px">TransactionDate</th>
                        <th class="text-end min-w-100px">Reference</th>
                        <th class="text-end min-w-100px">Amount</th>
                        <th class="text-end min-w-100px">Description</th>
                        <th class="text-end min-w-100px">CD</th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">

                    @if(isset($history->transactions))

                        @foreach($history->transactions as $val)
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ date('d-m-Y', strtotime($val->TransactionDate)) }}
                                    </a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ $val->Reference ?? "No Data" }}
                                    </a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ $val->Amount ?? "No Data" }}
                                    </a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ $val->Description ?? "No Data" }}
                                    </a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary">
                                        {{ $val->CD ?? "No Data" }}
                                    </a>
                                </td>
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

