$(document).ready((function () {
    $(".form-group > .fa-eye").on("click", (function () {
        if ($(this).hasClass("fa-eye-slash")) {
            $(this).removeClass("fa-eye-slash");
            $(this).parent().children("input").attr("type", "password")
        } else {
            $(this).addClass("fa-eye-slash");
            $(this).parent().children("input").attr("type", "text")
        }
    }));
    $(".tab-content #register").addClass("in active show");

    $(document).on("click", ".xn_btn", (function (e) {
        $("#main-form").show()
    }))
}));