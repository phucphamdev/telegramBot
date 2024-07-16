console.log('start');

(function ($) {
    "use strict";

    // start Historybank
    function getDetailHistorybank(event, element) {
        if ('preventDefault' in event) event.preventDefault();
        event.returnValue = false;
        let id = element.dataset.id;
        let magd = element.dataset.magd;
        let url = element.dataset.url;

        var item = {
            id: id,
            magd: magd,
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
                $("[name='ma_gd']").val(data.ma_gd);
                $("[name='id']").val(data.id);
                $("[name='ten_khach_hang").val(data.ten_khach_hang);
                $("[name='doi_tac']").val(data.doi_tac);
                $("[name='noi_dung']").val(data.noi_dung);
                $("[name='so_tien']").val(data.so_tien);
                $("[name='so_tien_thuc_nhan']").val(data.so_tien_thuc_nhan);
                $("[name='tai_khoan_khach_hang']").val(data.tai_khoan_khach_hang);
                $("[name='tai_khoan_nhan']").val(data.tai_khoan_nhan);
                $("[name='trang_thai']").val(data.trang_thai);
                $("[name='created_at']").val(data.created_at);
                $("[name='updated_at']").val(data.updated_at);
            }

        });

        $("#historybank_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
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

    }

    function getDeleteHistorybank(event, element) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this row!",
            type: "warning",
            icon: "error",
            buttonsStyling: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        }).then(function (isConfirm) {
            console.log(isConfirm.isConfirmed);
            if (!isConfirm.isConfirmed) return;

            let id = element.dataset.id;
            let magd = element.dataset.magd;
            let url = element.dataset.url;

            if (id.length > 0 && magd.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: JSON.stringify({
                        id: id,
                        magd: magd
                    }),
                    url: url,
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (data) {
                        if (data == true) {
                            Swal.fire({
                                text: "successfully Delete!",
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
                                text: "Oops! There are some error(s) detected.",
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
            } else {
                Swal.fire({
                    text: "Oops! There are some error(s) detected.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        });

    }

// end Historybank

// start Historyzalopay
    function getDetailHistoryzalopay(event, element) {
        if ('preventDefault' in event) event.preventDefault();
        event.returnValue = false;
        let id = element.dataset.id;
        let magd = element.dataset.magd;
        let url = element.dataset.url;

        var item = {
            id: id,
            magd: magd,
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
                $("[name='ma_gd']").val(data.ma_gd);
                $("[name='id']").val(data.id);
                $("[name='ten_khach_hang").val(data.ten_khach_hang);
                $("[name='doi_tac']").val(data.doi_tac);
                $("[name='noi_dung']").val(data.noi_dung);
                $("[name='so_tien']").val(data.so_tien);
                $("[name='so_tien_thuc_nhan']").val(data.so_tien_thuc_nhan);
                $("[name='tai_khoan_khach_hang']").val(data.tai_khoan_khach_hang);
                $("[name='tai_khoan_nhan']").val(data.tai_khoan_nhan);
                $("[name='trang_thai']").val(data.trang_thai);
                $("[name='created_at']").val(data.created_at);
                $("[name='updated_at']").val(data.updated_at);
            }

        });

        $("#historyzalopay_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
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

    }

    function getDeleteHistoryzalopay(event, element) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this row!",
            type: "warning",
            icon: "error",
            buttonsStyling: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        }).then(function (isConfirm) {
            console.log(isConfirm.isConfirmed);
            if (!isConfirm.isConfirmed) return;

            let id = element.dataset.id;
            let magd = element.dataset.magd;
            let url = element.dataset.url;

            if (id.length > 0 && magd.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: JSON.stringify({
                        id: id,
                        magd: magd
                    }),
                    url: url,
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (data) {
                        if (data == true) {
                            Swal.fire({
                                text: "successfully Delete!",
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
                                text: "Oops! There are some error(s) detected.",
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
            } else {
                Swal.fire({
                    text: "Oops! There are some error(s) detected.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        });

    }

// end Historyzalopay

// start Historyviettelpay
    function getDetailHistoryviettelpay(event, element) {
        if ('preventDefault' in event) event.preventDefault();
        event.returnValue = false;
        let id = element.dataset.id;
        let magd = element.dataset.magd;
        let url = element.dataset.url;

        var item = {
            id: id,
            magd: magd,
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
                $("[name='ma_gd']").val(data.ma_gd);
                $("[name='id']").val(data.id);
                $("[name='ten_khach_hang").val(data.ten_khach_hang);
                $("[name='doi_tac']").val(data.doi_tac);
                $("[name='noi_dung']").val(data.noi_dung);
                $("[name='so_tien']").val(data.so_tien);
                $("[name='so_tien_thuc_nhan']").val(data.so_tien_thuc_nhan);
                $("[name='tai_khoan_khach_hang']").val(data.tai_khoan_khach_hang);
                $("[name='tai_khoan_nhan']").val(data.tai_khoan_nhan);
                $("[name='trang_thai']").val(data.trang_thai);
                $("[name='created_at']").val(data.created_at);
                $("[name='updated_at']").val(data.updated_at);
            }

        });

        $("#historyviettelpay_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
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

    }

    function getDeleteHistoryviettelpay(event, element) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this row!",
            type: "warning",
            icon: "error",
            buttonsStyling: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        }).then(function (isConfirm) {
            console.log(isConfirm.isConfirmed);
            if (!isConfirm.isConfirmed) return;

            let id = element.dataset.id;
            let magd = element.dataset.magd;
            let url = element.dataset.url;

            if (id.length > 0 && magd.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: JSON.stringify({
                        id: id,
                        magd: magd
                    }),
                    url: url,
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (data) {
                        if (data == true) {
                            Swal.fire({
                                text: "successfully Delete!",
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
                                text: "Oops! There are some error(s) detected.",
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
            } else {
                Swal.fire({
                    text: "Oops! There are some error(s) detected.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        });

    }

// end Historyviettelpay

// start Historymomo
    function getDetailHistorymomo(event, element) {
        if ('preventDefault' in event) event.preventDefault();
        event.returnValue = false;
        let id = element.dataset.id;
        let magd = element.dataset.magd;
        let url = element.dataset.url;

        var item = {
            id: id,
            magd: magd,
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
                $("[name='ma_gd']").val(data.ma_gd);
                $("[name='id']").val(data.id);
                $("[name='ten_khach_hang").val(data.ten_khach_hang);
                $("[name='doi_tac']").val(data.doi_tac);
                $("[name='noi_dung']").val(data.noi_dung);
                $("[name='so_tien']").val(data.so_tien);
                $("[name='so_tien_thuc_nhan']").val(data.so_tien_thuc_nhan);
                $("[name='tai_khoan_khach_hang']").val(data.tai_khoan_khach_hang);
                $("[name='tai_khoan_nhan']").val(data.tai_khoan_nhan);
                $("[name='trang_thai']").val(data.trang_thai);
                $("[name='created_at']").val(data.created_at);
                $("[name='updated_at']").val(data.updated_at);
            }

        });

        $("#historymomo_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
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

    }

    function getDeleteHistorymomo(event, element) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this row!",
            type: "warning",
            icon: "error",
            buttonsStyling: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        }).then(function (isConfirm) {
            console.log(isConfirm.isConfirmed);
            if (!isConfirm.isConfirmed) return;

            let id = element.dataset.id;
            let magd = element.dataset.magd;
            let url = element.dataset.url;

            if (id.length > 0 && magd.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: JSON.stringify({
                        id: id,
                        magd: magd
                    }),
                    url: url,
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (data) {
                        if (data == true) {
                            Swal.fire({
                                text: "successfully Delete!",
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
                                text: "Oops! There are some error(s) detected.",
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
            } else {
                Swal.fire({
                    text: "Oops! There are some error(s) detected.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        });

    }

// end Historymomo

// start apimanage
    function getDetailApiManage(event, element) {
        if ('preventDefault' in event) event.preventDefault();
        event.returnValue = false;
        let id = element.dataset.id;
        let magd = element.dataset.magd;
        let url = element.dataset.url;

        var item = {
            id: id,
            magd: magd,
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
                $("[name='ma_gd']").val(data.ma_gd);
                $("[name='id']").val(data.id);
                $("[name='ten_khach_hang").val(data.ten_khach_hang);
                $("[name='doi_tac']").val(data.doi_tac);
                $("[name='noi_dung']").val(data.noi_dung);
                $("[name='so_tien']").val(data.so_tien);
                $("[name='so_tien_thuc_nhan']").val(data.so_tien_thuc_nhan);
                $("[name='tai_khoan_khach_hang']").val(data.tai_khoan_khach_hang);
                $("[name='tai_khoan_nhan']").val(data.tai_khoan_nhan);
                $("[name='trang_thai']").val(data.trang_thai);
                $("[name='created_at']").val(data.created_at);
                $("[name='updated_at']").val(data.updated_at);
            }

        });

        $("#historymomo_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
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

    }

    function getDeleteApiManage(event, element) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this row!",
            type: "warning",
            icon: "error",
            buttonsStyling: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        }).then(function (isConfirm) {
            console.log(isConfirm.isConfirmed);
            if (!isConfirm.isConfirmed) return;

            let id = element.dataset.id;
            let magd = element.dataset.magd;
            let url = element.dataset.url;

            if (id.length > 0 && magd.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: JSON.stringify({
                        id: id,
                        magd: magd
                    }),
                    url: url,
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (data) {
                        if (data == true) {
                            Swal.fire({
                                text: "successfully Delete!",
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
                                text: "Oops! There are some error(s) detected.",
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
            } else {
                Swal.fire({
                    text: "Oops! There are some error(s) detected.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        });

    }

// end apimanage

// start users
    function getDetailUsers(event, element) {
        if ('preventDefault' in event) event.preventDefault();
        event.returnValue = false;
        let id = element.dataset.id;
        let url = element.dataset.url;

        var item = {
            id: id,
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
                $("[name='UUID']").val(data.UUID);
                $("[name='first_name").val(data.first_name);
                $("[name='last_name']").val(data.last_name);
                $("[name='email']").val(data.email);
                $("[name='password']").val(data.password);
                $("[name='created_at']").val(data.created_at);
                $("[name='updated_at']").val(data.updated_at);
            }

        });

        $("#historymomo_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
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

    }

    function getDeleteUsers(event, element) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this row!",
            type: "warning",
            icon: "error",
            buttonsStyling: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        }).then(function (isConfirm) {
            console.log(isConfirm.isConfirmed);
            if (!isConfirm.isConfirmed) return;

            let id = element.dataset.id;
            let magd = element.dataset.magd;
            let url = element.dataset.url;

            if (id.length > 0 && magd.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: JSON.stringify({
                        id: id,
                        magd: magd
                    }),
                    url: url,
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (data) {
                        if (data == true) {
                            Swal.fire({
                                text: "successfully Delete!",
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
                                text: "Oops! There are some error(s) detected.",
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
            } else {
                Swal.fire({
                    text: "Oops! There are some error(s) detected.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        });

    }
// start users


    function getDetailPartners(event, element) {
        if ('preventDefault' in event) event.preventDefault();
        event.returnValue = false;
        let id = element.dataset.id;
        let url = element.dataset.url;

        var item = {
            id: id,
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
                $("[name='ten']").val(data.ten);
                $("[name='tai_khoan']").val(data.tai_khoan);
                $("[name='telegram']").val(data.telegram);
                $("[name='trang_thai']").val(data.trang_thai);
                $("[name='ck_momo']").val(data.ck_momo);
                $("[name='ck_vtpay']").val(data.ck_vtpay);
                $("[name='ck_bank']").val(data.ck_bank);
                $("[name='ck_zalo']").val(data.ck_zalo);
                $("[name='so_du']").val(data.so_du);
                $("[name='ngay_nhan']").val(data.ngay_nhan);
                $("[name='created_at']").val(data.created_at);
            }

        });

        $("#partners_form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
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

    }

    //getDeletePartners
    function getDeletePartners(event, element) {
        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this row!",
            type: "warning",
            icon: "error",
            buttonsStyling: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary",
            },
        }).then(function (isConfirm) {
            console.log(isConfirm.isConfirmed);
            if (!isConfirm.isConfirmed) return;

            let id = element.dataset.id;
            let magd = element.dataset.magd;
            let url = element.dataset.url;

            if (id.length > 0 && magd.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    data: JSON.stringify({
                        id: id,
                        magd: magd
                    }),
                    url: url,
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (data) {
                        if (data == true) {
                            Swal.fire({
                                text: "successfully Delete!",
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
                                text: "Oops! There are some error(s) detected.",
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
            } else {
                Swal.fire({
                    text: "Oops! There are some error(s) detected.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            }
        });

    }





})(jQuery);

console.log('end');