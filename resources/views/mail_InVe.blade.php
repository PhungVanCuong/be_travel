<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=JetBrains+Mono&display=swap');

        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            background-color: #e2e8f0;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        /* Fix font cho JetBrains Mono */
        .code-text {
            font-family: 'JetBrains Mono', Courier, monospace !important;
        }
    </style>
</head>
<body style="background-color: #e2e8f0; margin: 0; padding: 40px 10px;">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #e2e8f0;">
        <tr>
            <td align="center">
                <table width="100%" max-width="500" border="0" cellspacing="0" cellpadding="0" style="max-width: 500px; margin-bottom: 20px;">
                    <tr>
                        <td align="left" style="font-size: 15px; color: #334155; line-height: 1.6; padding: 0 10px;">
                            <p>Xin chào <strong>{{ $data['khach_hang']->ho_va_ten }}</strong>,</p>
                            <p>Cảm ơn bạn đã tin tưởng và lựa chọn dịch vụ của <strong>IXTAL TOUR</strong>. Chuyến đi của bạn đã được xác nhận thành công.</p>
                            <p>Dưới đây là vé điện tử chi tiết. Bạn vui lòng lưu lại email này hoặc chụp màn hình mã vạch để xuất trình cho hướng dẫn viên khi làm thủ tục check-in nhé!</p>
                        </td>
                    </tr>
                </table>
                <table width="100%" max-width="500" border="0" cellspacing="0" cellpadding="0" style="max-width: 500px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05);">

                    <tr>
                        <td style="padding: 25px 30px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left" valign="middle">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding-right: 12px;">
                                                    <img src="{{ asset('assets/images/Logo1.png') }}" alt="Logo"  style="height:auto; width:70px; display:block;">
                                                </td>
                                                <td>
                                                    <div style="font-size: 20px; font-weight: 800; color: #1e293b; letter-spacing: 1px; margin-bottom: 2px;">IXTAL TOUR</div>
                                                    <div style="font-size: 10px; font-weight: 600; color: #64748b;">Trải nghiệm du lịch đích thực</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td align="right" valign="middle">
                                        <div style="background-color: #dcfce7; color: #166534; font-size: 10px; font-weight: 700; padding: 6px 12px; border-radius: 20px; display: inline-block;">
                                            ĐÃ THANH TOÁN
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="20" height="20" style="background-color: #e2e8f0; border-radius: 0 20px 20px 0;"></td>
                                    <td valign="middle">
                                        <div style="border-top: 2px dashed #cbd5e1; width: 100%; height: 0; line-height: 0;"></div>
                                    </td>
                                    <td width="20" height="20" style="background-color: #e2e8f0; border-radius: 20px 0 0 20px;"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 25px 30px;">

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 25px;">
                                <tr>
                                    <td width="33%" valign="top">
                                        <div style="font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-bottom: 5px;">KHÁCH HÀNG</div>
                                        <div style="font-size: 13px; font-weight: 700; color: #1e293b;">{{ $data['khach_hang']->ho_va_ten }}</div>
                                    </td>
                                    <td width="33%" valign="top">
                                        <div style="font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-bottom: 5px;">SỐ ĐIỆN THOẠI</div>
                                        <div style="font-size: 13px; font-weight: 700; color: #1e293b;">{{ $data['khach_hang']->so_dien_thoai }}</div>
                                    </td>
                                    <td width="34%" valign="top" align="right">
                                        <div style="font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-bottom: 5px;">MÃ HÓA ĐƠN</div>
                                        <div class="code-text" style="font-size: 13px; font-weight: 700; color: #6366f1;">{{ $data['hoa_don']->ma_hoa_don }}</div>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f8fafc; border-radius: 12px; margin-bottom: 25px;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <div style="font-size: 16px; font-weight: 700; color: #0f172a; line-height: 1.4; margin-bottom: 20px;">
                                            {{ $data['tour']->ten_tour }}
                                        </div>

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="50%" valign="top" style="padding-bottom: 15px;">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="20" valign="top"><img src="https://img.icons8.com/ios-filled/50/6366f1/calendar--v1.png" width="16" style="display:block; margin-top:2px;"></td>
                                                            <td padding-left="10">
                                                                <div style="font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-bottom: 3px;">KHỞI HÀNH</div>
                                                                <div style="font-size: 13px; font-weight: 700; color: #1e293b;">{{ date('d/m/Y', strtotime($data['tour']->ngay_bat_dau)) }}</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="50%" valign="top" style="padding-bottom: 15px;">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="20" valign="top"><img src="https://img.icons8.com/ios-filled/50/6366f1/marker.png" width="16" style="display:block; margin-top:2px;"></td>
                                                            <td padding-left="10">
                                                                <div style="font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-bottom: 3px;">ĐIỂM ĐÓN</div>
                                                                <div style="font-size: 13px; font-weight: 700; color: #1e293b;">{{ $data['tour']->diem_don }}</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%" valign="top">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="20" valign="top"><img src="https://img.icons8.com/ios-filled/50/6366f1/conference-call.png" width="16" style="display:block; margin-top:2px;"></td>
                                                            <td padding-left="10">
                                                                <div style="font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-bottom: 3px;">SỐ LƯỢNG</div>
                                                                <div style="font-size: 13px; font-weight: 700; color: #1e293b;">{{ $data['hoa_don']->so_luong_nguoi }} Khách</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="50%" valign="top">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="20" valign="top"><img src="https://img.icons8.com/ios-filled/50/6366f1/bank-cards.png" width="16" style="display:block; margin-top:2px;"></td>
                                                            <td padding-left="10">
                                                                <div style="font-size: 9px; font-weight: 700; color: #94a3b8; text-transform: uppercase; margin-bottom: 3px;">THANH TOÁN</div>
                                                                <div style="font-size: 13px; font-weight: 700; color: #1e293b; text-transform: uppercase;">{{ $data['hoa_don']->phuong_thuc_thanh_toan }}</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            @foreach($data['danh_sach_ve'] as $index => $ve)
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #e2e8f0; border-radius: 10px; margin-bottom: 15px;">
                                <tr>
                                    <td style="padding: 15px; text-align: center;">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 15px;">
                                            <tr>
                                                <td align="left">
                                                    <span style="font-size: 12px; font-weight: 700; color: #64748b;">VÉ #{{ $index + 1 }}</span>
                                                </td>
                                                <td align="right">
                                                    <span style="font-size: 14px; font-weight: 800; color: #1e293b;">{{ number_format($ve->gia_ve ?? ($data['hoa_don']->tong_tien / $data['hoa_don']->so_luong_nguoi), 0, ',', '.') }} ₫</span>
                                                </td>
                                            </tr>
                                        </table>

                                        <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $ve->ma_ve }}&code=Code128" alt="Barcode" style="width: 100%; max-width: 250px; display: inline-block;">
                                        <div class="code-text" style="font-size: 10px; font-weight: 600; color: #64748b; margin-top: 5px;">{{ $ve->ma_ve }}</div>

                                    </td>
                                </tr>
                            </table>
                            @endforeach

                        </td>
                    </tr>

                    <tr>
                        <td style="background-color: #1e293b; padding: 25px 30px;">

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px solid #334155; padding-bottom: 20px; margin-bottom: 20px;">
                                <tr>
                                    <td align="left" valign="middle">
                                        <div style="font-size: 12px; font-weight: 700; color: #e2e8f0;">TỔNG CỘNG</div>
                                    </td>
                                    <td align="right" valign="middle">
                                        <div style="font-size: 22px; font-weight: 800; color: #818cf8;">{{ number_format($data['hoa_don']->tong_tien, 0, ',', '.') }} ₫</div>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <div style="font-size: 10px; color: #94a3b8; line-height: 1.6;">
                                            Vui lòng xuất trình mã này tại quầy đón khách.<br>
                                            <a href="https://ixtaltravel.deloydz.io.vn/" style="color: #e2e8f0; font-weight: 700; text-decoration: none;">https://ixtaltravel.deloydz.io.vn/</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                </table>
                </td>
        </tr>
    </table>

</body>
</html>
