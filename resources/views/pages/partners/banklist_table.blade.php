<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="partnersbanklist">
    <!--begin::Table head-->
    <thead>
    <tr>
        <td>Tên Đối Tác</td>
        <td>Ngân Hàng</td>
        <td>Danh Sách Ngân Hàng</td>
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
<div class="modal fade" id="kt_modalpartnersbanklist" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="partnersbanklist_form" name="partnersbanklist_form" method="POST"
                  action="{{ route('partnersbanklist.update2') }}">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" >
                    <!--begin::Modal title-->
                    <h2>Details</h2>
                    <!--end::Modal title-->
                </div>
                <!--end::Modal header-->



                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_new_address_header"
                         data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">

                        <div class="card-body pt-2" id="listbank">




                    </div>
                    <!--end::Scroll-->
                </div>

                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <input class="form-control form-control-solid" value="" name="tags"
                               tabindex="-1">

                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tags</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                   aria-label="Specify a target priorty"
                                   data-bs-original-title="Specify a target priorty" data-kt-initialized="1"></i>
                            </label>

                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
                        <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
                        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
                        <script type="text/javascript">

                            (function ($) {
                                "use strict";
                                // Tags. For more info, please visit the official plugin site: https://yaireo.github.io/tagify/
                                var tags = new Tagify(document.querySelector('[name="tags"]'), {
                                    whitelist: [
                                            @foreach($bankscode as $item)
                                        {
                                            "value": "{{ $item->name }}",
                                            "name": "{{ $item->code }}"
                                        },
                                        @endforeach
                                    ],
                                    // maxTags: 5,
                                    dropdown: {
                                        maxItems: 10,           // <- mixumum allowed rendered suggestions
                                        enabled: 0,             // <- show suggestions on focus
                                        closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
                                    }
                                });


                            })(jQuery);

                        </script>



                    </div>


                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
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

{{-- Inject Scripts --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

@section('scripts')

    <script type="text/javascript">

        function getDetailpartnersbanklist(event, element) {
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

                    if (data.length > 0) {
                        $("#listbank").html(data);
                    }
                }

            });
        }

        $("#partnersbanklist_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            let formData = {
				tags: $("[name='tags']").val(),
                id: $("[name='id']").val()
            };
            console.log(formData);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(formData),
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
            $('#partnersbanklist').DataTable({
                "aaSorting": [
                    [0, "desc"]
                ],
                pageLength: 25,
                ordering: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route('partnersbanklist.datatables2') }}',
                columns: [
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'banklist', name: 'banklist'},
                    {data: 'action', searchable: true, orderable: true}
                ],

            });



        })(jQuery);
    </script>
    {{ $dataTable->scripts() }}
@endsection
