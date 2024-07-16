<div class="block_content">
    <h3 class="title">
        <a>1. Lấy thông tin tài khoản thanh toán</a>
    </h3>
    <div class="byline">
        by <a>Administrator</a>
    </div>
    <p class="mb-0 font-weight-bold">Yêu cầu nhận tài khoản:</p>
    <p class="mb-2">Phương thức: <span class="text-info">POST</span></p>
    <p class="mb-0 font-weight-bold">Tham số truyền đi:</p>
    <p class="mb-0">+ Loại trả về: <span class="text-info">kind</span> (json
        hoặc html) </p>
    <p class="mb-0">+ Tên tiền tố: <span class="text-info">name</span> (đã đăng
        ký trước đó) </p>
    <p class="mb-0">+ Mã đối chiếu: <span class="text-info">key</span> (đã được
        cung cấp trong danh sách website) </p>
    <p class="mb-0">+ Mã giao dịch: <span class="text-info">tranID</span> (mã GD
        của đối tác gửi lên)</p>
    <p class="mb-0">+ Loại giao dịch: <span class="text-info">type</span> (Momo,
        VTPay, Bank hoặc ZaloPay)</p>
    <p class="mb-0">+ Ngân hàng giao dịch: <span
                class="text-info">bankCode</span> (Chỉ áp dụng cho type = Bank)
    </p>
    <p class="mb-2"><span class="text-primary">-- bankCode: </span></p>
    <p class="mb-2">-- + Vietcombank: <span class="text-danger">10010</span></p>
    <p class="mb-2">-- + Vietinbank: <span class="text-danger">10020</span></p>
    <p class="mb-2">-- + MBBank: <span class="text-danger">10030</span></p>
    <p class="mb-2">-- + Techcombank: <span class="text-danger">10040</span></p>
    <p class="mb-2">-- + BIDV: <span class="text-danger">10050</span></p>
    <p class="mb-2">-- + ACB: <span class="text-danger">10060</span></p>
    <p class="mb-2">-- + TPBank: <span class="text-danger">10070</span></p>
    <p class="mb-0">+ Số tiền giao dịch: <span class="text-info">amount</span>
        (min: 20.000 &amp; max: 20.000.000)</p>
    <p class="mb-0">+ Kích thước mã QR: <span class="text-info">size</span> (lớn
        hơn hoặc bằng 50 và bé hơn hoặc bằng 300)</p>
    <p class="mb-0">+ Access token của bạn: <span
                class="text-info">accessToken</span></p>
    <p class="mb-2"><span class="text-primary">API: </span> <span
                class="text-info">https://kpaypro.vip/api/recharge/create_recharge</span></p>
    <p class="mb-0 font-weight-bold">Tham số trả về:</p>
    <p class="mb-0">+ Mã lỗi: <span class="text-info">errorCode</span>
        (errorCode khác 200 là lỗi được chú thích tại description) </p>
    <p class="mb-0">+ Chú thích lỗi: <span
                class="text-info">errorDescription</span> (chú thích lỗi nếu có)
    </p>
    <p class="mb-0">+ Thông tin tài khoản: <span class="text-info">infomationAccount</span>
        (thông tin tài khoản nhận nếu mã lỗi = 200)</p>
    <p class="mb-0">+ Số tiền giao dịch: <span class="text-info">amount</span>
        (Số tiền chuyển nếu mã lỗi = 200)</p>
    <p class="mb-0">+ Nội dung giao dịch: <span class="text-info">comment</span>
        (nội dung chuyển tiền nếu mã lỗi = 200)</p>
    <p class="mb-0">+ URL QRCode: <span class="text-info">qrcode</span> (QRCode
        của Momo, VTPay không có nếu mã lỗi = 200)</p>
    <p class="mb-0">+ Loại giao dịch: <span class="text-info">type</span> (Momo,
        VTPay, Bank hoặc ZaloPay)</p>
    <p class="mb-0">+ Ngân hàng giao dịch: <span
                class="text-info">bankCode</span> (Chỉ áp dụng cho type = Bank)
    </p>
    <p class="mb-0"><span class="text-primary">Giải mã infomationAccount:</span>
        json_decode(base64_decode(infomationAccount)) </p>
    <p class="mb-0"><span class="text-danger">Lưu ý:</span> Đơn hàng chỉ tồn tại
        10 phút. Sau 10p không thực hiện giao dịch sẽ tự động hủy </p>
</div>