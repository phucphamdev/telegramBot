<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="banks">
    <!--begin::Table head-->
    <thead>
    <tr>
        <td>ID</td>
        <td>Ngân Hàng</td>
        <td>Mã bankcode</td>
        <td>updated_at</td>
        <td>created_at</td>
        <td>Hành Động</td>
    </tr>
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody>
    </tbody>
    <!--end::Table body-->
</table>
<!--end::Table-->

<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modalbanks" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="banks_form" method="POST" action="{{ route('bankscode.update') }}">
                @csrf

                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2>Chi tiết</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
										<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                              transform="rotate(-45 6 17.3137)" fill="currentColor"/>
										<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                              transform="rotate(45 7.41422 6)" fill="currentColor"/>
									</svg>
								</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_new_address_header"
                         data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Input-->
                        <input type="hidden" class="form-control form-control-solid" placeholder="" name="id"/>
                        <!--end::Input-->


                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="name"/>
                            <!--end::Input-->
                        </div>


                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-semibold mb-2">code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="code"/>
                            <!--end::Input-->
                        </div>


                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="banks_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Address-->

<!--begin::Card-->
<div class="pt-6">
    <!--begin::Card body-->
    <div class="card card-body pt-6">
        <div class="card-header pt-8">
            <!--begin::Card title-->
            <div class="card card-title">
                <h2>Thêm</h2>
            </div>
            <!--end::Card title-->
        </div>
        <div class="card card-flush">
            <div class="card-body">
                <form id="banks_create" name="banks_create" method="post" class="form"
                      action="{{ route('bankscode.storebank') }}">
                    {!! csrf_field() !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-semibold form-label mb-5">Tên Ngân Hàng:</label>
                        <input class="form-control form-control-solid" placeholder="Tên Đầy Đủ"
                               name="name_create"/>
                    </div>

                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-semibold form-label mb-5">Mã Ngân Hàng:</label>
                        <input class="form-control form-control-solid" placeholder="Mã Ngân Hàng"
                               name="code_create"/>
                    </div>


                    <div class="text-center">
                        <button type="submit"  class="btn btn-primary">
                            <span class="indicator-label">Gởi</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->

@section('scripts')
    <script type="text/javascript">
        function getDetailBankscode(event, element) {
            if ('preventDefault' in event) event.preventDefault();
            event.returnValue = false;
            let id = element.dataset.id;
            let url = element.dataset.url;

            console.log(id);

            var item = {
                id
            }

            $.ajax({
                type: 'post',
                dataType: 'json',
                data: JSON.stringify(item),
                url: url,
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: function (data) {
                    console.log(data);
                    $("[name='id']").val(data.id);
                    $("[name='name']").val(data.name);
                    $("[name='code']").val(data.code);
                }

            });
        }

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

        $("#banks_create").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            let formData = {
                name: $("[name='name_create']").val(),
                code: $("[name='code_create']").val(),
            };

            console.log(formData);
            console.log(actionUrl);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(formData),
                url: actionUrl,
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: function (data) {

                    if (data.success == true) {
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
                        Swal.fire({
                            text: data.msg,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-danger"
                            }
                        });

                        location.reload();
                    }


                }
            });

        });

        $("#banks_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');
            var form_data = get_form_data();
            console.log(form_data);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(form_data),
                url: actionUrl,
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: function (data) {
                    Swal.fire({
                        text: "successfully submitted!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });

                    location.reload();
                }
            });

        });

        (function ($) {
            "use strict";
            $('#banks').DataTable({
                "order": [[1, 'asc'], [2, 'asc']],
                pageLength: 5,
                processing: true,
                serverSide: true,
                ajax: '{{ route('bankscode.datatables') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', searchable: true, orderable: true}
                ]
            });
        })(jQuery);

    </script>
    {{ $dataTable->scripts() }}
@endsection
