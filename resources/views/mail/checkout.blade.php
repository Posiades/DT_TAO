<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details p {
            margin: 5px 0;
        }
        .order-items {
            margin-bottom: 20px;
        }
        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-items table, .order-items th, .order-items td {
            border: 1px solid #ddd;
        }
        .order-items th, .order-items td {
            padding: 10px;
            text-align: left;
        }
        .order-items th {
            background-color: #f4f4f4;
        }
        .total {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Cảm ơn bạn đã đặt hàng tại <strong>DT TAO</strong>!</h1>
        </div>

        <div class="order-items">
            <h3>Chi tiết đơn hàng:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Màu Sắc</th>
                        <th>Dung Lượng</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['color'] }}</td>
                            <td>{{ $item['storage'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="total">Tổng thanh toán: {{ $total }} VND</p>
        <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email c9smoothie1995@gmail.com .</p>
        <p>Cảm ơn bạn đã mua sắm tại <strong>DT TAO</strong> !</p>
    </div>
    
    </p>
</body>
</html>

</body>
</html>