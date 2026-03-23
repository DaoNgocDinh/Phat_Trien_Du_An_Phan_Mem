<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Báo cáo thống kê công bố khoa học</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { text-align: center; color: #1D546D; }
        .header { margin-bottom: 30px; }
        .stats { margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .total { background-color: #e8f4f8; font-weight: bold; }
        .chart-placeholder { text-align: center; margin: 20px 0; padding: 40px; border: 1px dashed #ccc; }
    </style>
</head>
<body>

    <h1>BÁO CÁO THỐNG KÊ CÔNG BỐ KHOA HỌC</h1>

    <div class="header">
        <p><strong>Thời gian:</strong>
            @if($from && $to)
                Từ năm {{ $from }} đến năm {{ $to }}
            @else
                Tất cả
            @endif
        </p>
        <p><strong>Ngày xuất báo cáo:</strong> {{ date('d/m/Y') }}</p>
    </div>

    <div class="stats">
        <h2>Tổng quan</h2>
        <p><strong>Tổng số công bố khoa học:</strong> {{ $total }}</p>
    </div>

    <h2>Thống kê theo năm</h2>
    <table>
        <thead>
            <tr>
                <th>Năm</th>
                <th>Số lượng công bố</th>
            </tr>
        </thead>
        <tbody>
            @foreach($byYear as $year)
            <tr>
                <td>{{ $year->NamXuatBan }}</td>
                <td>{{ $year->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Thống kê theo loại công bố</h2>
    <table>
        <thead>
            <tr>
                <th>Loại công bố</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($byType as $type)
            <tr>
                <td>{{ $type->LoaiCongBo }}</td>
                <td>{{ $type->total }}</td>
            </tr>
            @endforeach
            <tr class="total">
                <td><strong>Tổng cộng</strong></td>
                <td><strong>{{ $total }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="chart-placeholder">
        <p><em>Biểu đồ thống kê sẽ được hiển thị trong phiên bản web</em></p>
    </div>

</body>
</html>