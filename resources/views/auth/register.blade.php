<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ url('css/trangdangnhap.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-area text-white">
        <div class="img-area flex h-20 w-20">
            <img src="/imgs/login-icon.png" class="box-content p-3  ">
        </div>
        <h2 class="font-bold text-4xl my-4 uppercase text-center">Đăng ký</h2>

        <div class="mb-4">
            <p>User Name: </p>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback text-sm text-red-600" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4">
            <p>Email: </p>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror mt-2" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback text-sm text-red-600" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4">
            <p>Mật khẩu: </p>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror mt-2" name="password"
                   required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback text-sm text-red-600" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group row">
            <p>Nhập lại mật khẩu: </p>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                   autocomplete="new-password">
        </div>

        <div class="w-full text-center">
            <button type="submit" class="btnlogin w-2/3">
                <span class="btn-text font-bold"> Đăng ký</span>
            </button>
        </div>
    </div>
</form>
</body>
</html>

