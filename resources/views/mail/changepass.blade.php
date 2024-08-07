<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt lại mật khẩu</title>
</head>
<body>

<h2>Xác nhận đặt lại mật khẩu</h2>

<p>Bạn đang nhận email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn từ DT TÁO.</p>

<p>Nếu bạn không yêu cầu đặt lại mật khẩu, không cần thực hiện thêm hành động nào.</p>

<p>
    Để đặt lại mật khẩu của bạn, hãy nhấp vào liên kết sau:
    <a href="{{ route('reset_pass', ['email'=> $email, 'token' => $token]) }}">Bấm Vào đây</a>
</p>

<p>
    Liên kết đặt lại mật khẩu này sẽ hết hạn trong 5 phút.
</p>



<p>
    Trân trọng,
    <br>
    DT TAO
    <br>
</p>

</body>
</html>