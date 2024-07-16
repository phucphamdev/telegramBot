<div class="row g-5 g-xl-6 mb-5 mb-xl-6">
    <div class="app-container flex-column-fluid">
        <div class="card mb-5 mb-xxl-6">
            <div class="card-header">
                <div class="card-title">
                    <h3>Mẫu rút tiền :</h3>
                </div>
            </div>
            <div class="card-body py-10">
                <div class="row mb-10">
                    <div class="col-md-6 pb-10 pb-lg-0">
                        <form id="withdraw_create" name="withdraw_create" method="post" class="form"
                              action="{{ route('withdraw.create_withdraw_submit') }}">
                            {!! csrf_field() !!}
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                                 data-kt-scroll-activate="{default: false, lg: true}"
                                 data-kt-scroll-max-height="auto"
                                 data-kt-scroll-dependencies="#kt_modal_new_address_header"
                                 data-kt-scroll-wrappers="#kt_modal_new_address_scroll"
                                 data-kt-scroll-offset="300px">

                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input type="hidden" class="form-control form-control-solid" value="1"
                                       name="isBank"/>
                                <input type="hidden" class="form-control form-control-solid"
                                       value="{{ $user->callback_link }}"
                                       name="urlCallback"/>
                                <input type="hidden" class="form-control form-control-solid"
                                       value="{{ "tranID_" . Str::random(5) . time() }}"
                                       name="tranIDCallback"/>
                                <input type="hidden" class="form-control form-control-solid"
                                       value="{{ $user->access_token }}"
                                       name="accessToken"/>

                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Mã Code Ngân Hàng</label>
                                    <select class="form-select form-select-solid" data-control="select2" name="bankCode"
                                            data-kt-ecommerce-order-filter="bankCode">
                                        <option></option>
                                        @foreach(DB::table('bankcodes')->get() as $key => $bank)
                                            @if($key ==1)
                                                <option selected value="{{ $bank->code }}">{{ $bank->name }}</option>
                                            @else
                                                <option value="{{ $bank->code }}">{{ $bank->name }}</option>
                                            @endif

                                        @endforeach
                                    </select>

                                    <!--end::Input-->
                                </div>

                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Tên Chủ Thẻ Nhận</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                           name="cardName"/>
                                    <!--end::Input-->
                                </div>

                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Tài Khoản</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                           name="cardCode"/>
                                    <!--end::Input-->
                                </div>

                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Số tiền muốn rút * (Tối thiểu 100.000
                                        VNĐ)</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" placeholder=""
                                           name="amount"/>
                                    <!--end::Input-->
                                </div>

                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-semibold mb-2">Bình Luận</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                           name="comment"/>
                                    <!--end::Input-->
                                </div>


                            </div>
                            <div class="modal-footer flex-center">
                                <button type="submit" id="withdraw_submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                </button>
                            </div>
                        </form>

                    </div>

                    <div class="col-md-6 p-10">
                        <h3>Số Dư</h3>
                        <p class="fs-6 fw-semibold text-gray-600 py-2">{{ number_format($user->so_du, 0, '', ',') }}
                            VNĐ</p>
                        <h3>Access token</h3>
                        <p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->access_token }}</p>

                        <h3>Key</h3>
                        <p class="fs-6 fw-semibold text-gray-600 py-2">{{ $user->key }}</p>
                        <h3>Ghi Chú: </h3>
                        <p class="fs-6 fw-semibold text-gray-600 py-2">
                            Vui lòng điền đầy đủ thông tin đã được đánh dấu *.<br>

                            Số tiền rút dưới 20,000,000 VNĐ sẽ được xử lý nhanh hơn, có thể thực hiện rút nhiều lần
                            trong ngày.<br>

                            Link rút tiền được gửi về telegram đăng ký của quý khách. Vui lòng chờ BQT duyệt yêu cầu
                            rút tiền của bạn.<br>

                            Lưu ý: Các trường hợp sai ngân hàng, số tài khoản hoặc tên tài khoản BQT sẽ không chịu
                            trách nhiệm. Quý khách vui lòng kiểm tra lại trước khi rút.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
@section('scripts')

    <script type="text/javascript">
        function get_form_data(element) {
            element = element || '';
            var all_page_data = {};
            var all_forms_data_temp = {};
            if (!element) {
                element = 'body';
            }

            if ($(element)[0] == undefined) {
                return null;
            }

            $(element).find('input,select,textarea').each(function (i) {
                all_forms_data_temp[i] = $(this);
            });

            $.each(all_forms_data_temp, function () {
                var input = $(this);
                var element_name;
                var element_value;

                if ((input.attr('type') == 'submit') || (input.attr('type') == 'button')) {
                    return true;
                }

                if ((input.attr('name') !== undefined) && (input.attr('name') != '')) {
                    element_name = input.attr('name').trim();
                } else if ((input.attr('id') !== undefined) && (input.attr('id') != '')) {
                    element_name = input.attr('id').trim();
                } else if ((input.attr('class') !== undefined) && (input.attr('class') != '')) {
                    element_name = input.attr('class').trim();
                }

                if (input.val() !== undefined) {
                    if (input.attr('type') == 'checkbox') {
                        element_value = input.parent().find('input[name="' + element_name + '"]:checked').val();
                    } else if ((input.attr('type') == 'radio')) {
                        element_value = $('input[name="' + element_name + '"]:checked', element).val();
                    } else {
                        element_value = input.val();
                    }
                } else if (input.text() != undefined) {
                    element_value = input.text();
                }

                if (element_value === undefined) {
                    element_value = '';
                }

                if (element_name !== undefined) {
                    var element_array = new Array();
                    if (element_name.indexOf(' ') !== -1) {
                        element_array = element_name.split(/(\s+)/);
                    } else {
                        element_array.push(element_name);
                    }

                    $.each(element_array, function (index, name) {
                        name = name.trim();
                        if (name != '') {
                            all_page_data[name] = element_value;
                        }
                    });
                }
            });
            return all_page_data;
        }

        $("#withdraw_create").submit(function (e) {

            e.preventDefault();

            var form = $(this);
            var actionUrl = form.attr('action');

            var form_data = get_form_data();
            console.log(actionUrl);
            console.log(form_data);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(form_data),
                url: actionUrl,
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: function (data) {
                    if (data.errorCode == 200) {
                        Swal.fire({
                            text: "Create successfully!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        location.reload();


                    } else {
                        console.log(data);

                        Swal.fire({
                            text: data.errorDescription,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-danger"
                            }
                        });
                    }


                }
            });

        });

    </script>
@endsection
