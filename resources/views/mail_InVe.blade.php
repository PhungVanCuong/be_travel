<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #dff4e8; padding: 20px; }
        .ticket-card { background: white; max-width: 500px; margin: 0 auto; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .header { background: #125633; padding: 30px; text-align: center; color: white; }
        .body { padding: 30px; }
        .info-row { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 14px; }
        .barcode-box { text-align: center; background: #f8f9fa; padding: 15px; border-radius: 12px; margin: 15px 0; border: 1px dashed #ced4da; }
        .footer { background: #1e293b; color: white; padding: 20px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <div class="ticket-card">
        <div class="header">
            <h1 style="margin:0;">IXTAL TOUR</h1>
            <p>Vé điện tử chính thức</p>
        </div>
        <div class="body">
            <h3 style="color: #125633;">Thông tin đặt chỗ</h3>
            <div class="info-row"><span>Khách hàng:</span> <b>{{ $data['khach_hang']->ho_va_ten }}</b></div>
            <div class="info-row"><span>Tour:</span> <b>{{ $data['tour']->ten_tour }}</b></div>
            <div class="info-row"><span>Ngày đi:</span> {{ date('d/m/Y', strtotime($data['tour']->ngay_bat_dau)) }}</div>

            <h3 style="color: #125633; margin-top: 25px;">Danh sách vé của bạn</h3>
            @foreach($data['danh_sach_ve'] as $ve)
            <div class="barcode-box">
                <div style="font-weight:bold; margin-bottom: 8px;">Mã vé: {{ $ve->ma_ve }}</div>
                <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $ve->ma_ve }}&code=Code128" alt="Barcode" style="width:180px;">
            </div>
            @endforeach
        </div>
        <div class="footer">
            <p>Tổng tiền đã thanh toán: {{ number_format($data['hoa_don']->tong_tien, 0, ',', '.') }} VNĐ</p>
            <p>Vui lòng trình mã vé này cho hướng dẫn viên khi check-in.</p>
        </div>
    </div>
</body>
</html>
