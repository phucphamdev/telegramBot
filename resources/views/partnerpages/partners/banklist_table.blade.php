<!--begin::Table-->
<table class="table align-middle gs-0 gy-4" id="partnersbanklist">
    <!--begin::Table head-->
    <thead>
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
                <div class="modal-header" id="kt_modal_new_address_header">
                    <!--begin::Modal title-->
                    <h2>Details</h2>
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

                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bold text-dark">Danh Sách Banks</h3>
                            </div>
                            <!--end::Header-->
                            <div class="card-body pt-2" id="listbank" >

                            </div>
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bold text-dark">Cập Nhật Banks mới cho đối tác</h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2" id="checkboxes" >
                                @foreach($listbank as $bank)

                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-8">
                                    <!--begin::Bullet-->
                                    <span class="bullet bullet-vertical h-40px bg-success"></span>
                                    <!--end::Bullet-->
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid mx-5">
                                        <input class="form-check-input" type="checkbox" value="{{ $bank->id }}" name="{{ $bank->id }}">
                                    </div>
                                    <!--end::Checkbox-->
                                    <!--begin::Description-->
                                    <div class="flex-grow-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">{{ $bank->full_name }}</a>
                                        <span class="text-muted fw-semibold d-block">{{ $bank->number1 }}</span>
                                        <span class="text-muted fw-semibold d-block">{{ $bank->number2 }}</span>
                                    </div>
                                    <!--end::Description-->

                                </div>
                                <!--end:Item-->
                                @endforeach
                            </div>
                            <!--end::Body-->
                        </div>




                    </div>
                    <!--end::Scroll-->
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

                    if(data.length >0 )
                    {
                        $("#listbank").html(data);
                    }
                }

            });
        }

        $("#partnersbanklist_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            var selected = [];
            $('#checkboxes input:checked').each(function() {
                selected.push($(this).attr('name'));
            });

            let formData = {
                id: $("[name='id']").val(),
                first_name: $("[name='first_name']").val(),
                last_name: $("[name='last_name']").val(),
                email: $("[name='email']").val(),
                callback_link: $("[name='callback_link']").val(),
                key: $("[name='key']").val(),
                access_token: $("[name='access_token']").val(),
                ip: $("[name='ip']").val(),
                checkboxes : selected,
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
