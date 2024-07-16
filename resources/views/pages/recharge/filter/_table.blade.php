<x-base-layout>

    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Content-->
        <div class="app-container">

            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <h3> Filter : </h3>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <form action="{{ route('recharge_filter.update_recharge_filter') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="accessToken" value="{{ Auth::user()->access_token() }}">
                        <input type="hidden" name="id_partners" value="{{ Auth::user()->id() }}">
                        <div class="card mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5" style="justify-content: space-around;">
                                <input class="card-toolbar"
                                       style="align-content: space-between;justify-content: space-around;align-items: stretch;display: contents;">


                                {{--                            <!--begin::Daterangepicker-->--}}
                                {{--                            <input class="form-control p-3 form-control-solid w-50 mw-150px"--}}
                                {{--                                   placeholder="Pick date range"--}}
                                {{--                                   id="kt_ecommerce_report_customer_orders_daterangepicker"/>--}}
                                {{--                            <!--end::Daterangepicker-->--}}

                                <!--begin::Filter-->
                                <div class="w-150px p-3">
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label"> Thoi Gian : </label>
                                    </div>
                                    <!--begin::Select2-->
                                    <select class="form-select form-select-solid" data-control="select2" name="date"
                                            data-hide-search="true" data-placeholder="Status"
                                            data-kt-ecommerce-order-filter="status">
                                        <option value="0" {{ $daysAgo == 0 ? "selected" : ""  }}> Hôm Nay</option>
                                        <option value="1" {{ $daysAgo == 1 ? "selected" : ""  }}> Hôm Qua</option>
                                        <option value="10" {{ $daysAgo == 10 ? "selected" : ""  }}> Tuần Này</option>
                                        <option value="14" {{ $daysAgo == 14 ? "selected" : ""  }}> Tuần Trước </option>
                                        <option value="30" {{ $daysAgo == 30 ? "selected" : ""  }}> Tháng Này </option>
                                        <option value="35" {{ $daysAgo == 35 ? "selected" : ""  }}> Tháng Trước </option>

                                    </select>
                                    <!--end::Select2-->
                                </div>
                                <!--end::Filter-->

                                <!--begin::Filter-->
                                <div class="w-150px p-3">
                                    <div class="me-5">
                                        <label class="fs-6 fw-semibold form-label"> Từ Ngày   :   {{ $startDate }}</label>
                                        <label class="fs-6 fw-semibold form-label"> Đến Ngày  :   {{ $endDate }} </label>
                                    </div>

                                </div>
                                <!--end::Filter-->


                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end p-3" data-kt-user-table-toolbar="base">
                                    <!--begin::Filter-->
                                    <button type="submit" class="btn btn-primary me-3">
                                        <i class="ki-duotone ki-filter fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Filter
                                    </button>
                                    <!--end::Filter-->

                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                        </div>
                    </form>

                    <!--begin::Header-->
                    <div class="card border-0 pt-5">
                        <div class="card-toolbar">
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-12 p-3">
                                <h3>Nạp Tiền</h3>
                            </div>
                            <div class="row g-5 g-xl-12 p-3">
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #F7D9E3">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Tổng Cộng </a>
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ $totalAmount ?? "No Data"  }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{ $count_recha_total ?? 0 }}  )  </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #CBF0F4">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Thành Công</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ $totalSuccessAmount ?? 0  }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{ $count_recha_success ?? 0 }}  )  </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3 ">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #CBD4F4">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3">  Từ Chối </a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ $totalCancelAmount ?? " No  Data " }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{  $count_recha_cancel ?? 0 }} ) </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #F7D9E3">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3">  Chờ Duyệt </a>

                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ $totalPendingAmount ?? " No data"  }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{ $count_recha_pending ?? 0   }}  )  </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <div class="row g-5 g-xl-12 p-3">
                                <h3>Rút Tiền</h3>
                            </div>
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-12 p-3">
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #F7D9E3">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Tổng Cộng </a>
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{  $totalAmountWithdraw ?? "No Data"  }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{ $count_withdraw_total ?? 0  }}  )  </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #CBF0F4">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Thành Công</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ $totalSuccessAmountWithdraw ?? " No Data" }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{ $count_withdraw_succcess ?? 0 }}  )  </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3 ">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #CBD4F4">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> Từ Chối</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ $totalCancelAmountWithdraw ?? " No Data" }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{ $count_withdraw_cancel ?? 0 }} ) </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #F7D9E3">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3">  Chờ Duyệt</a>

                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ $totalPendingAmountWithdraw ?? " No Data "  }}</span>
                                                <!--end::Number-->
                                                <!--begin::Text-->
                                                <span class="text-dark fw-bold fs-6 lh-0"> ( {{ $count_withdraw_pending ?? 0  }}  )  </span>
                                                <!--end::Text-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <div class="row g-5 g-xl-12 p-3">
                                <h3> Lỗ / Lãi </h3>
                            </div>
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-12 p-3">
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #F7D9E3">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3">  </a>
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ format_money($totalAmountNum-   $totalAmountWithdrawNum) . ' VND' ?? "No Data"  }}</span>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #CBF0F4">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"></a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ format_money($totalSuccessAmountNum - $totalSuccessAmountWithdrawNum ) . ' VND'?? " No Data" }}</span>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3 ">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #CBD4F4">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> </a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ format_money($totalCancelAmountNum - $totalCancelAmountWithdrawNum ) . ' VND'?? " No Data" }}</span>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-3 p-3">
                                    <!--begin::Mixed Widget 13-->
                                    <div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body"
                                         style="background-color: #F7D9E3">
                                        <!--begin::Body-->
                                        <div class="card-body d-flex flex-column">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark text-hover-primary fw-bold fs-3"> </a>

                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Stats-->
                                            <div class="pt-5">
                                                <!--begin::Number-->
                                                <span class="text-dark fw-bold fs-2x me-2 lh-0">{{ format_money($totalPendingAmountNum - $totalPendingAmountWithdrawNum) . ' VND' ?? " No Data "  }}</span>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 13-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>

                    </div>
                    <!--end::Header-->


                </div>
            </div>
            <!--end::Col-->


            <div class="d-flex flex-wrap flex-stack p-3">
                <div class="d-flex flex-wrap align-items-center my-1">
                    <h3 class="fw-bold me-5 my-1">Chi Tiết Nạp Rút : </h3>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Table Widget 5-->
                    <div class="card card-flush h-xl-100">

                        @foreach($days as $da)


                            @if(isset($da['recharge']) && count($da['recharge']) > 0  && count($da['withdraw']) > 0 && isset($da['withdraw']))
                                <div class="d-flex flex-wrap flex-stack p-3">
                                    <div class="m-3 d-flex flex-wrap align-items-center my-1">
                                        <h3 class="fw-bold me-5 my-1">Ngày : {{ $da['recharge']['day']  ?? " No Data "}} </h3>
                                    </div>
                                </div>

                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                        <!--begin::Table head-->
                                        <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center pe-3 min-w-150px"> </th>
                                            <th class="text-center pe-3 min-w-150px"> Tổng </th>
                                            <th class="text-center pe-3 min-w-150px">Thành Công  </th>
                                            <th class="text-center pe-3 min-w-150px">Thất Bại  </th>
                                            <th class="text-center pe-3 min-w-150px">Chờ Duyệt  </th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">

                                        <tr>
                                            <!--begin::Item-->
                                            <td class="text-center">Nạp Tiền  </td>
                                            <td class="text-center">{{ $da['recharge']['money_total_format'] }} </td>
                                            <td class="text-center">{{ $da['recharge']['money_success_format'] }} </td>
                                            <td class="text-center">{{ $da['recharge']['money_cancel_format'] }} </td>
                                            <td class="text-center">{{ $da['recharge']['money_pending_format'] }} </td>
                                        </tr>

                                        <tr>
                                            <!--begin::Item-->
                                            <td class="text-center">Rút Tien </td>
                                            <td class="text-center">{{ $da['withdraw']['money_total_format'] }} </td>
                                            <td class="text-center">{{ $da['withdraw']['money_success_format'] }} </td>
                                            <td class="text-center">{{ $da['withdraw']['money_cancel_format'] }} </td>
                                            <td class="text-center">{{ $da['withdraw']['money_pending_format'] }} </td>
                                        </tr>

                                        <tr>
                                            <!--begin::Item-->
                                            <td class="text-center"> Lỗ / Lãi  </td>
                                            <td class="text-center">{{ format_money($da['recharge']['money_total'] - $da['withdraw']['money_total']) . 'VND' }} </td>
                                            <td class="text-center">{{ format_money($da['recharge']['money_success'] - $da['withdraw']['money_success']) . 'VND' }} </td>
                                            <td class="text-center">{{ format_money($da['recharge']['money_cancel'] - $da['withdraw']['money_cancel']) . 'VND' }} </td>
                                            <td class="text-center">{{ format_money($da['recharge']['money_pending'] - $da['withdraw']['money_pending']) . 'VND' }} </td>

                                        </tr>

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            @else

                                <div class="d-flex flex-wrap flex-stack p-3">
                                    <div class="d-flex flex-wrap align-items-center my-1 text-center">
                                        <h3 class="fw-bold me-5 my-1 text-center">{{ $da['recharge']['day']  ?? " No Data "}}</h3>
                                    </div>
                                </div>

                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                        <!--begin::Table head-->
                                        <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center pe-3 min-w-150px"> </th>
                                            <th class="text-center pe-3 min-w-150px"> Tổng </th>
                                            <th class="text-center pe-3 min-w-150px">Thành Công  </th>
                                            <th class="text-center pe-3 min-w-150px">Thất Bại  </th>
                                            <th class="text-center pe-3 min-w-150px">Chờ Duyệt  </th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">

                                        <tr>
                                            <th class="text-center pe-3 min-w-150px " colspan="5 ">No Data </th>
                                        </tr>

                                        <tr>
                                            <th class="text-center pe-3 min-w-150px " colspan="5 ">No Data </th>
                                        </tr>

                                        <tr>
                                            <th class="text-center pe-3 min-w-150px " colspan="5 ">No Data </th>
                                        </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->

                            @endif

                        @endforeach



                    </div>
                    <!--end::Table Widget 5-->
                </div>
                <!--end::Col-->
            </div>


        </div>
        <!--end::Row-->



    </div>
    <!--end::Content wrapper-->

    <!--begin::Content wrapper-->
{{--    <div class="d-flex pt-3  flex-column flex-column-fluid">--}}

{{--        <!--begin::Content-->--}}
{{--        <div class="app-container">--}}
{{--            <!--begin::Row-->--}}
{{--            <div class="row g-5 g-xl-8">--}}
{{--                <!--begin::Col-->--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="card card-xl-stretch mb-xl-8">--}}

{{--                        <!--begin::Body-->--}}
{{--                        <div class="card-body py-3">--}}
{{--                            <div class="tab-content">--}}
{{--                                <!--begin::Tap pane-->--}}
{{--                                <div class="tab-pane fade show active">--}}
{{--                                    <!--begin::Table container-->--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <table class="table align-middle gs-0 gy-4" id="recharge4">--}}
{{--                                            <!--begin::Table head-->--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <td>Đối Tác</td>--}}
{{--                                                <td>tranID</td>--}}
{{--                                                <td>Số Tiền</td>--}}
{{--                                                <td>Bình Luận</td>--}}
{{--                                                <td>Bình Luận Api</td>--}}
{{--                                                <td>Tên</td>--}}
{{--                                                <td>Trạng Thái</td>--}}
{{--                                                <td>Thời Gian</td>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <!--end::Table head-->--}}
{{--                                            <!--begin::Table body-->--}}
{{--                                            <tbody>--}}
{{--                                            </tbody>--}}
{{--                                            <!--end::Table body-->--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Table-->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Body-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end::Col-->--}}
{{--            </div>--}}
{{--            <!--end::Row-->--}}

{{--        </div>--}}
{{--        <!--end::Content-->--}}


{{--    </div>--}}
    <!--end::Content wrapper-->


    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!--Data Table-->
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>


    <script type="text/javascript">

        (function ($) {
            "use strict";

            $('#recharge4').DataTable({
                "aaSorting": [
                    [1, "pending"]
                ],
                bFilter: false,
                paging: true,
                pageLength: 20,
                ordering: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('recharge.datatables_api') }}',
                columns: [
                    {data: 'partners', name: 'partners'},
                    {data: 'tranID', name: 'tranID'},
                    {data: 'amount', name: 'amount'},
                    {data: 'comment', name: 'comment'},
                    {data: 'comment_api', name: 'comment_api'},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'trang_thai', name: 'trang_thai'},
                    {data: 'created_at', searchable: false, orderable: false}
                ],

            });

        })(jQuery);


    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">


</x-base-layout>
