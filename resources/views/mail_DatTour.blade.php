<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="vi">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>Xác nhận yêu cầu đặt tour - Ixtal Tour</title>
    <style type="text/css">
        body {
            margin: 0; padding: 40px 0; width: 100%; height: 100%;
            -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;
            background-color: #dff4e8; /* Màu nền tương đương rgba(143, 223, 181, 0.4) */
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .email-wrapper {
            width: 100%;
            background-color: #dff4e8;
            padding: 20px 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        .header {
            background: linear-gradient(135deg, #125633, #1b7d6b);
            padding: 35px 20px;
            text-align: center;
        }
        .header img {
            max-width: 90px;
            height: auto;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border: 3px solid rgba(255, 255, 255, 0.2);
        }
        .header h1 {
            color: #ffffff;
            margin: 20px 0 0 0;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .body-content {
            padding: 35px 45px;
            color: #444444;
            line-height: 1.6;
        }
        .greeting {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #125633;
        }
        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: #1b7d6b;
            border-bottom: 2px solid #eef2f5;
            padding-bottom: 8px;
            margin-top: 30px;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table tr {
            border-bottom: 1px dashed #f0f0f0;
        }
        .info-table tr:last-child {
            border-bottom: none;
        }
        .info-table td {
            padding: 12px 0;
            vertical-align: top;
            font-size: 15px;
        }
        .info-table td.label {
            font-weight: 600;
            color: #666666;
            width: 45%;
        }
        .info-table td.value {
            color: #222222;
            text-align: right;
            font-weight: 500;
        }
        .badge {
            background-color: #f0fdf4;
            color: #16a34a;
            padding: 4px 10px;
            border-radius: 6px;
            font-family: monospace;
            font-weight: bold;
            font-size: 14px;
            border: 1px solid #bbf7d0;
        }
        .badge-warning {
            background-color: #fffbeb;
            color: #d97706;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px;
            border: 1px solid #fde68a;
        }
        .total-box {
            background: linear-gradient(to right, #f8fdfa, #effbf4);
            border: 1px solid #8fdfb5;
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            text-align: center;
        }
        .total-box p {
            margin: 0 0 5px 0;
            font-size: 15px;
            color: #555555;
            text-transform: uppercase;
            font-weight: 600;
        }
        .total-box .price {
            font-size: 26px;
            font-weight: 800;
            color: #125633;
        }
        .note-box {
            background-color: #fff9e6;
            border-left: 4px solid #f59e0b;
            padding: 15px 18px;
            margin-top: 30px;
            font-size: 14px;
            color: #92400e;
            border-radius: 0 8px 8px 0;
            line-height: 1.5;
        }
        .footer {
            background-color: #f8fbf9;
            padding: 25px;
            text-align: center;
            font-size: 13px;
            color: #777777;
            border-top: 1px solid #eef2f5;
        }
        .footer a {
            color: #1b7d6b;
            text-decoration: none;
            font-weight: 600;
        }
        @media only screen and (max-width: 600px) {
            .body-content { padding: 25px 20px; }
            .info-table td.label, .info-table td.value { display: block; width: 100%; text-align: left; }
            .info-table td.value { padding-bottom: 12px; padding-top: 4px; }
            .info-table tr { border-bottom: none; }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="header">
                <img src="https://ixtaltravel.deloydz.io.vn/assets/Logo-3-KgfldS.png"
                    alt="Ixtal Tour Logo"
                    style="display: block; margin: 0 auto; width: 150px;">
                <h1>Yêu cầu đặt tour</h1>
            </div>

            <div class="body-content">
                <div class="greeting">Chào {{ $data['ho_va_ten_khach'] }},</div>
                <p>Cảm ơn bạn đã tin tưởng và lựa chọn dịch vụ của <strong>Ixtal Tour</strong>. Chúng tôi đã tiếp nhận yêu cầu đặt tour của bạn. Vui lòng kiểm tra lại thật kỹ các thông tin hành trình dưới đây:</p>

                <div class="section-title">👤 Thông tin liên hệ</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Họ và tên người đặt:</td>
                        <td class="value">{{ $data['ho_va_ten_khach'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Số điện thoại:</td>
                        <td class="value">{{ $data['so_dien_thoai_khach'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Email liên hệ:</td>
                        <td class="value">{{ $data['email_khach'] }}</td>
                    </tr>
                </table>

                <div class="section-title">✈️ Thông tin Tour du lịch</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Mã yêu cầu:</td>
                        <td class="value"><span class="badge">{{ $data['ma_hoa_don'] }}</span></td>
                    </tr>
                    <tr>
                        <td class="label">Tên Tour:</td>
                        <td class="value" style="color: #125633; font-size: 16px;"><strong>{{ $data['ten_tour'] }}</strong></td>
                    </tr>
                    <tr>
                        <td class="label">Lịch trình:</td>
                        <td class="value">{{ date('d/m/Y', strtotime($data['ngay_bat_dau'])) }} - {{ date('d/m/Y', strtotime($data['ngay_ket_thuc'])) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Điểm đón khách:</td>
                        <td class="value">{{ $data['diem_don'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Số lượng vé:</td>
                        <td class="value"><strong>{{ $data['so_luong_nguoi'] }}</strong> hành khách</td>
                    </tr>
                    @if(!empty($data['ghi_chu_nguoi_di']))
                    <tr>
                        <td class="label" style="padding-top: 15px;">Thông tin người đi cùng:</td>
                        <td class="value" style="padding-top: 15px; font-style: italic; color: #666666; line-height: 1.5;">{!! nl2br(e($data['ghi_chu_nguoi_di'])) !!}</td>
                    </tr>
                    @endif
                </table>

                <div class="section-title">💳 Trạng thái đơn hàng</div>
                <table class="info-table">
                    <tr>
                        <td class="label">Trạng thái:</td>
                        <td class="value"><span class="badge-warning">Chờ thanh toán</span></td>
                    </tr>
                </table>

                <div class="total-box">
                    <p>Tổng chi phí dự kiến</p>
                    <div class="price">{{ number_format($data['tong_tien'], 0, ',', '.') }} VNĐ</div>
                </div>

                <div class="note-box">
                    <strong>Lưu ý:</strong> Đây là email xác nhận yêu cầu đặt chỗ. Quý khách vui lòng tiến hành thanh toán cho Mã hóa đơn <strong>{{ $data['ma_hoa_don'] }}</strong> để hệ thống xuất vé chính thức và hoàn tất quá trình đặt tour.
                </div>
            </div>

            <div class="footer">
                <p style="margin: 0 0 10px 0; font-weight: 800; color: #125633; font-size: 15px; letter-spacing: 0.5px;">IXTAL TOUR</p>
                <p style="margin: 0 0 6px 0;">123 Đường Biển Xanh, Quận Hải Châu, TP. Đà Nẵng</p>
                <p style="margin: 0 0 15px 0;">Hotline: 0909 123 456 &nbsp;|&nbsp; Email: hotro@ixtaltour.com</p>
                <p style="margin: 0;">
                    <a href="#">Trang chủ</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="#">Điều khoản</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="#">Bảo mật</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
