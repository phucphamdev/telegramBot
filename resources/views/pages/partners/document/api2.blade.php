<div class="block_content">
    <h2 class="title">
        <a>2. Trả kết quả thanh toán</a>
    </h2>
    <div class="byline">
        by <a>Administrator</a>
    </div>
    <p class="mb-0 font-weight-bold">Yêu cầu nhận kết quả:</p>
    <p class="mb-2">Phương thức: <span class="text-info">POST</span></p>
    <p class="mb-0 font-weight-bold">Tham số truyền đi:</p>
    <p class="mb-0">+ Mã giao dịch: <span class="text-info">tranID</span> (Mã GD
        của Momo, VTPay)</p>
    <p class="mb-0">+ Mã GD của đối tác: <span class="text-info">keyID</span>
        (Mã GD của đối tác gửi lên ban đầu)</p>
    <p class="mb-0">+ TK nhận tiền: <span class="text-info">phoneAccount</span>
    </p>
    <p class="mb-0">+ TK chuyển tiền: <span
                class="text-info">phoneCustomer</span></p>
    <p class="mb-0">+ Tên TK chuyển tiền: <span
                class="text-info">nameCustomer</span></p>
    <p class="mb-0">+ Nội dung: <span class="text-info">comment</span></p>
    <p class="mb-0">+ Số tiền: <span class="text-info">amount</span></p>
    <p class="mb-0">+ Loại: <span class="text-info">type</span> (Loại giao dịch
        Momo, VTPay)</p>
    <p class="mb-0">+ Thực nhận: <span class="text-info">money</span> (Số tiền
        thực nhận được cộng vào tài khoản của bạn)</p>
    <p class="mb-0">+ Chữ ký giao dịch: <span class="text-info">signature</span>
    </p>
    <p class="mb-2"><span class="text-primary">API: </span> <span
                class="text-info">Trả về theo callbackLink của đối tác</span>
    </p>
    <p class="mb-2"><span class="text-primary">Mã hóa signature: </span> <span
                class="text-info">md5(tranID.'|'.amount.'|'.comment.'|'.key.'|'.accesstoken)</span>
    </p>
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
