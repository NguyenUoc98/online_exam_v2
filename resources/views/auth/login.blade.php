<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ url('css/trangdangnhap.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-area text-white">
        <div class="img-area flex h-20 w-20">
            <img src="/imgs/login-icon.png" class="box-content p-3  ">
        </div>
        <h2 class="font-bold text-4xl my-4 uppercase text-center">Đăng Nhập</h2>

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
            <div class="flex justify-between">
                <div class="form-check text-left">
                    <input class="form-check-input" type="checkbox" name="remember"
                           style="width:auto; height:auto"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember" style="">
                        Duy trì đăng nhập
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Quên mật khẩu?
                    </a>
                @endif
            </div>
        </div>

        <div class="w-full text-center">
            <button type="submit" class="btnlogin w-2/3">
                <span class="btn-text font-bold"> Đăng nhập</span>
            </button>
        </div>
    </div>
</form>
</body>
</html>
