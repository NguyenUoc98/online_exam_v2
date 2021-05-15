<div class="bg-white mb-4 overflow-hidden rounded-2xl shadow" id="edit-user">
    <div class="bg-primary-light">
        <div class="font-black p-10 text-4xl text-white">
            <i class="text-5xl fas fa-user-circle"></i>
            <span class="mx-2" style="line-height: 30px">THÔNG TIN TÀI KHOẢN</span>
        </div>
    </div>

    <div id="card-user" class="p-5 text-2xl">
        <!-- Avatar -->
        <form action="{{ route('user.update-account') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="md:flex items-center">
                <div class="md:w-1/3 w-full text-center md:px-10 px-5 md:mb-0 mb-10">
                    <img id="img-avatar" src="{{ Voyager::image(auth()->user()->avatar) }}" alt="your image"
                         class="border-8 border-primary rounded-full mx-auto"/>
                    <input type="file" class="hidden" name="avatar" id="input-avatar">
                    <button class="btn btn-default mt-4 px-20" id="btn-avatar" type="button">
                        <i class="fa fa-camera" aria-hidden="true"></i> Chọn ảnh
                    </button>
                </div>

                <div class="md:w-2/3 w-full md:px-10 px-5">
                    <!-- User Name -->
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name="user_name" id="input-username" class="form-control pl-2"
                               placeholder="Username"
                               value="{{ old('user_name', auth()->user()->name) }}" required>
                        @error('user_name')
                        <span class="invalid-feedback text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" name="email" id="input-email" class="form-control pl-2" placeholder="Email"
                               value="{{ old('email', auth()->user()->email) }}" required>
                        @error('email')
                        <span class="invalid-feedback text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a data-toggle="collapse" href="#reset-password" role="button" aria-expanded="false"
                           aria-controls="reset-password"
                           class="border-2 border-primary collapsed mr-3 px-10 py-3 rounded-xl text-primary">
                            Đổi mật khẩu?
                        </a>
                        <button type="submit" class="btn btn-danger rounded-xl px-20" id="btn-account">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Password -->
        <div id="reset-password" class="collapse md:px-10 px-5">
            <hr class="my-10"/>
            <form action="{{ route('user.update-password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="input-old-password">Mật khẩu cũ</label>
                        <input type="password" id="input-old-password" name="old_password" class="form-control pl-2"
                               placeholder="Mật khẩu cũ" required>
                        @error('old_password')
                        <span class="invalid-feedback text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <label class="form-control-label" for="input-password">Mật khẩu mới</label>
                    <input type="password" id="input-password" name="new_password" class="form-control pl-2" placeholder="Mật khẩu mới"
                           required>
                    @error('new_password')
                    <span class="invalid-feedback text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="input-password-confirmation">
                        Nhập lại mật khẩu mới
                    </label>
                    <input type="password" id="input-password-confirmation" name="re_password" class="form-control pl-2"
                           placeholder="Nhập lại mật khẩu mới" value="" required>
                    @error('re_password')
                    <span class="invalid-feedback text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-danger mt-2 rounded-xl px-20" id="btn-reset-password">Thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#btn-avatar').click(function () {
            $('#input-avatar').click();
        });
    });
</script>
