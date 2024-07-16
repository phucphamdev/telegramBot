<div class="row">
    <style>
        ul.list-unstyled.timeline.widget p {
            font-size: 18px !important;
        }
        p.badge.badge-primary.mb-2 {
            font-size: 17px;
        }
        .byline {
            font-size: 17px;
            font-weight: 700;
        }
        .text-info {
            color: var(--kt-text-info) !important;
            font-weight: 700;
        }
    </style>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách API của bạn</h2>
            </div>
            <div class="x_content" style="display: block;">
                <p class="badge badge-primary mb-2">Access Token:</p>
                <p style="padding: 1rem; background: #1e1e2d; color: #f5f8fa; border-radius: 0.5rem;font-size: 17px;">
                    2sWUaHS6K4plOtTXwOfTMjAyMi0wOC0wMyAxMToyNzo0OA==
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách API của bạn</h2>
            </div>
            <div class="x_content" style="display: block;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                    <a>1. Lấy thông tin tài khoản thanh toán</a>
                                </h2>
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
                                            class="text-info">https://apiay.online/api/info</span></p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>



<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách API của bạn</h2>
        </div>
        <div class="x_content" style="display: block;">
            <p class="badge badge-primary mb-2">Access Token:</p>
            <p style="padding: 1rem; background: #1e1e2d; color: #f5f8fa; border-radius: 0.5rem;font-size: 17px;">
                2sWUaHS6K4plOtTXwOfTMjAyMi0wOC0wMyAxMToyNzo0OA==
            </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>1. Lấy thông tin tài khoản thanh toán</a>
                                        </h2>
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
                                                    class="text-info">https://apiay.online/api/info</span></p>
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
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>3. Gửi yêu cầu rút tiền qua ngân hàng</a>
                                        </h2>
                                        <div class="byline">
                                            by <a>Administrator</a>
                                        </div>
                                        <p class="mb-0 font-weight-bold">Gửi yêu cầu rút tiền:</p>
                                        <p class="mb-2">Phương thức: <span class="text-info">POST</span></p>
                                        <p class="mb-0 font-weight-bold">Tham số truyền đi:</p>
                                        <p class="mb-0">+ Mã ngân hàng: <span class="text-info">bankCode</span> (xem
                                            phía dưới)</p>
                                        <p class="mb-0">+ Tên TK rút: <span class="text-info">cardName</span> (đã
                                            đăng ký trước đó) </p>
                                        <p class="mb-0">+ Số TK rút: <span class="text-info">cardCode</span> (đã
                                            được cung cấp trong danh sách website) </p>
                                        <p class="mb-0">+ Số tiền giao dịch: <span class="text-info">amount</span>
                                            (min: 100.000)</p>
                                        <p class="mb-0">+ Nội dung giao dịch: <span class="text-info">comment</span>
                                        </p>
                                        <p class="mb-0">+ Mã giao dịch đối tác: <span class="text-info">tranIDCallback</span>
                                        </p>
                                        <p class="mb-0">+ URL nhận kết quả: <span
                                                    class="text-info">urlCallback</span></p>
                                        <p class="mb-0">+ Access token của bạn: <span
                                                    class="text-info">accessToken</span></p>
                                        <p class="mb-2"><span class="text-primary">API: </span> <span
                                                    class="text-info">https://apiay.online/api/user/withdrawal</span>
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
                                        <p class="mb-0">+ errorCode: <span class="text-info">Mã lỗi (200 là thành công, 404 là lỗi)</span>
                                        </p>
                                        <p class="mb-2">+ errorDescription: <span
                                                    class="text-info">Chú thích lỗi</span></p>
                                        <p class="mb-0"><span class="text-danger">Lưu ý: </span> Nếu không trả kết
                                            quả lại cho máy chủ, hệ thống sẽ không tự động cộng tiền vào tài khoản
                                            cho đối tác.</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <ul>
                                                    <li>Vietcombank: 10010</li>
                                                    <li>Techcombank: 10020</li>
                                                    <li>MBBank: 10030</li>
                                                    <li>TPBank: 10040</li>
                                                    <li>Agribank: 10050</li>
                                                    <li>Kien Long Bank: 10060</li>
                                                    <li>HDBank: 10070</li>
                                                    <li>Vietbank: 10080</li>
                                                    <li>Eximbank: 10090</li>
                                                    <li>Sacombank: 10100</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul>
                                                    <li>VietCapitalBank: 10110</li>
                                                    <li>Đông Á Bank: 10120</li>
                                                    <li>Nam A Bank: 10130</li>
                                                    <li>OCB: 10140</li>
                                                    <li>SCB: 10150</li>
                                                    <li>Saigonbank: 10160</li>
                                                    <li>BacABank: 10170</li>
                                                    <li>NCB: 10180</li>
                                                    <li>VPBank: 10190</li>
                                                    <li>Shinhanbank: 10200</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul>
                                                    <li>LienVietPostBank: 10210</li>
                                                    <li>VietinBank: 10220</li>
                                                    <li>BIDV: 10230</li>
                                                    <li>SeABank: 10240</li>
                                                    <li>ABBANK: 10250</li>
                                                    <li>MSB: 10260</li>
                                                    <li>VietABank: 10270</li>
                                                    <li>PVcombank: 10280</li>
                                                    <li>BaoVietBank: 10290</li>
                                                    <li>PG Bank: 10300</li>
                                                    <li>VIB: 10310</li>
                                                    <li>ACB: 10320</li>
                                                    <li>SHB: 10330</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
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
                                        <p class="mb-0">+ errorCode: <span class="text-info">Mã lỗi (200 là thành công, 404 là lỗi)</span>
                                        </p>
                                        <p class="mb-2">+ errorDescription: <span
                                                    class="text-info">Chú thích lỗi</span></p>
                                        <p class="mb-0"><span class="text-danger">Lưu ý: </span> Nếu không trả kết
                                            quả lại cho máy chủ, hệ thống sẽ không tự động cộng tiền vào tài khoản
                                            cho đối tác.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
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
                                                    class="text-info">https://apiay.online/api/user/withdrawal-momo</span>
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
                                        <p class="mb-0">+ errorCode: <span class="text-info">Mã lỗi (200 là thành công, 404 là lỗi)</span>
                                        </p>
                                        <p class="mb-2">+ errorDescription: <span
                                                    class="text-info">Chú thích lỗi</span></p>
                                        <p class="mb-0"><span class="text-danger">Lưu ý: </span> Nếu không trả kết
                                            quả lại cho máy chủ, hệ thống sẽ không tự động cộng tiền vào tài khoản
                                            cho đối tác.</p>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>5. Kiểm tra yêu cầu rút tiền &amp; callback</a>
                                        </h2>
                                        <div class="byline">
                                            by <a>Administrator</a>
                                        </div>
                                        <p class="mb-0 font-weight-bold">Gửi yêu cầu rút tiền:</p>
                                        <p class="mb-2">Phương thức: <span class="text-info">POST</span></p>
                                        <p class="mb-0 font-weight-bold">Tham số truyền đi:</p>
                                        <p class="mb-0">+ Mã giao dịch: <span class="text-info">tranID</span> (mã
                                            giao dịch từ mục 3 &amp; 4 trả về)</p>
                                        <p class="mb-0">+ Access token của bạn: <span
                                                    class="text-info">accessToken</span></p>
                                        <p class="mb-2"><span class="text-primary">API: </span> <span
                                                    class="text-info">https://apiay.online/api/user/withdrawal-status</span>
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

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
