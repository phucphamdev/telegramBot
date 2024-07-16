<div class="block_content">
    <h2 class="title">
        <a>8. Trả Kết Quả Thanh Toán</a>
    </h2>
    <div class="byline">
        by <a>Administrator</a>
    </div>
    <p class="mb-0 font-weight-bold">Lấy Danh Sách Bank hoạt động:</p>
    <p class="mb-2">Phương thức: <span class="text-info">POST</span></p>
    <p class="mb-0 font-weight-bold">Tham số truyền đi:</p>
    <p class="mb-0">+ Access token của bạn: <span
                class="text-info">accessToken</span></p>
    <p class="mb-0">+ tranID của bạn: <span
                class="text-info">tranID</span></p>
    <p class="mb-2"><span class="text-primary">API: </span> <span
                class="text-info">https://kpaypro.vip/api/recharge/result_success_recharge</span>
    </p>
    <p class="mb-0 font-weight-bold">Tham số trả về:</p>
    <p class="mb-0">+ Trạng Thái lỗi: <span class="text-info">isError</span>
        (Thành Công : isError: false / Thất Bại: isError: True) </p>
    <p class="mb-0">+ Chú thích lỗi: <span
                class="text-info">message</span> (chú thích lỗi nếu có Hoặc thành công)
    </p>
    <p class="mb-0">+ Thông tin: Bao gồm 1 danh sách các Bank đang hoạt động trong 1 mảng ( array )  , có cấu trúc nhu sau <span
                class="text-info">Data</span> (thông tin)</p>
    <p class="mb-0">+ Tên TK: <span class="text-info">cardCode</span></p>
    <p class="mb-0">+ Số TK: <span class="text-info">cardCode</span>
    </p>
    <p class="mb-0">+ Tên Ngân Hàng: <span class="text-info">bankName</span></p>
    <p class="mb-0">+ Tài Khoản Ngân Hàng: <span class="text-info">account</span>
    </p>
    <p class="mb-0">+ Mã Ngân Hàng: <span class="text-info">bankcode</span>
    </p>
    <p class="mb-0">+ Mã Ngân Hàng: <span class="text-info">shortName</span>
    </p>

</div>