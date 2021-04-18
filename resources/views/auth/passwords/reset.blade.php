<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu</title>
    <link rel="stylesheet" href="{{ url('css/trangdangnhap.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-area text-white">
        <div class="img-area flex h-20 w-20">
            <img src="/imgs/login-icon.png" class="box-content p-3">
        </div>
        <h2 class="font-bold text-3xl mb-4 mt-8 uppercase text-center">Đặt lại mật khẩu</h2>

        <div class="mb-4">
            <p>Email: </p>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback text-sm text-red-600" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4">
            <p>Mật khẩu: </p>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" name="password"
                   required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback text-sm text-red-600" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4">
            <p>Nhập lại mật khẩu: </p>
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="w-full text-center">
            <button type="submit" class="btnlogin w-2/3">
                <span class="btn-text font-bold">Đặt lại</span>
            </button>
        </div>
    </div>
</form>
</body>
</html>
