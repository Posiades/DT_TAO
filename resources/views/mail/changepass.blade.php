<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt lại mật khẩu</title>
</head>
<body>

<h2>Xác nhận đặt lại mật khẩu</h2>

<p>Bạn đã nhận email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn từ <strong>DT TÁO</strong>.</p>

<p style="color: red"><strong>Nếu bạn không yêu cầu đặt lại mật khẩu, không cần thực hiện thêm hành động nào.</strong></p>

<p>
    Để đặt lại mật khẩu của bạn, hãy nhấp vào liên kết sau:
    <a href="{{ route('reset_pass', ['email'=> $email, 'token' => $token]) }}">Bấm Vào đây</a>
</p>

<p>
    Liên kết đặt lại mật khẩu này sẽ hết hạn trong <strong>5 phút</strong>.
</p>



<p>
    Trân trọng,
    <br>
   <strong> DT TAO</strong>
    <br>
</p>

</body>
</html>