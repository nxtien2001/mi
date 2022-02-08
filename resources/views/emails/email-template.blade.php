<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Chào {{$user->name}}</h2>
    <h3>Vui lòng xác thực tài khoản của bạn</h3>
    <p>
        <a href="{{route('verify',['user' => $user->id, 'token' => $user->verify->token])}}">Xác thực</a>

    </p>
</body>

</html>