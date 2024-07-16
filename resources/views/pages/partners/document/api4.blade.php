<div class="block_content">
    <h2 class="title">
        <a>4. Yêu qua rút tiền qua Momo</a>
    </h2>
    <div class="byline">
        by <a>Administrator</a>
    </div>
    <p class="mb-0 font-weight-bold">Gửi yêu cầu rút tiền:</p>
    <p class="mb-2">Phương thức: <span class="text-info">POST</span></p>
    <p class="mb-0 font-weight-bold">Tham số truyền đi:</p>
    <p class="mb-0">+ TK nhận: <span class="text-info">userAccount</span></p>
    <p class="mb-0">+ Tên TK nhận: <span class="text-info">nameAccount</span>
    </p>
    <p class="mb-0">+ Số tiền: <span class="text-info">amount</span></p>
    <p class="mb-0">+ Nội dung: <span class="text-info">comment</span></p>
    <p class="mb-0">+ Mã giao dịch đối tác: <span class="text-info">tranIDCallback</span>
    </p>
    <p class="mb-0">+ URL nhận kết quả: <span
                class="text-info">urlCallback</span></p>
    <p class="mb-0">+ Access token của bạn: <span
                class="text-info">accessToken</span></p>
    <p class="mb-2"><span class="text-primary">API: </span> <span
                class="text-info">https://kpaypro.vip/api/withdraw/create_withdraw</span>
    </p>
    <p class="mb-0 font-weight-bold">Tham số trả về:</p>
    <p class="mb-0">+ Mã lỗi: <span class="text-info">errorCode</span>
        (errorCode khác 200 là lỗi được chú thích tại description) </p>
    <p class="mb-0">+ Chú thích lỗi: <span
                class="text-info">errorDescription</span> (chú thích lỗi nếu có)
    </p>
    <p class="mb-0">+ Thông tin giao dịch: <span
                class="text-info">errorData</span> (thông tin giao dịch nếu mã
        lỗi = 200)</p>
    <p class="mb-0">+ Mã giao dịch: <span class="text-info">tranID</span></p>
    <p class="mb-0">+ Số TK rút: <span class="text-info">accountNumber</span>
    </p>
    <p class="mb-0">+ Tên TK rút: <span class="text-info">accountName</span></p>
    <p class="mb-0">+ Số tiền giao dịch: <span class="text-info">amount</span>
    </p>
    <p class="mb-0">+ Nội dung giao dịch: <span class="text-info">comment</span>
    </p>
    <p class="mb-0">+ Mã giao dịch đối tác: <span class="text-info">tranIDCallback</span>
    </p>
    <p class="mb-0">+ Loại giao dịch: <span class="text-info">isBank</span>
        (isBank = true là giao dịch qua Bank, ngược lại là qua Momo)</p>
    <p class="mb-0">+ Ngân hàng: <span class="text-info">bankCode</span>(Xem tại
        danh sách tại phần 3 )</p>
    <p class="mb-0">+ Trạng thái giao dịch: <span
                class="text-info">status</span> (0 là đang chờ, 1 là thành công,
        2 là từ chối giao dịch)</p>
    <p class="mb-0"><span class="text-danger">Lưu ý:</span> Thông tin giao dịch
        là một mảng (array) </p>
    <p class="mb-0"><span class="text-primary">Sau khi nhận được callback vui lòng trả thông báo lại cho máy chủ như sau: </span>
    </p>
    <p class="mb-0">+ errorCode: <span
                class="text-info">Mã lỗi (200 là thành công, 404 là lỗi)</span>
    </p>
    <p class="mb-2">+ errorDescription: <span
                class="text-info">Chú thích lỗi</span></p>
    <p class="mb-0"><span class="text-danger">Lưu ý: </span> Nếu không trả kết
        quả lại cho máy chủ, hệ thống sẽ không tự động cộng tiền vào tài khoản
        cho đối tác.</p>

</div>
