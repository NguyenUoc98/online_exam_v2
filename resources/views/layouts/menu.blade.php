<div class="menu-top">
    <div class="row h-available">
        <div class="col-md-1"></div>
        <div class="col-md-1 doc">
            <p class="add"><i class="fas fa-map"></i> ADDRESS</p>
            <p class="diachi">Hưng Yên</p>
        </div>
        <div class="col-md-1 doc">
            <p class="add"><i class="fas fa-envelope-open"></i> EMAIL</p>
            <p class="diachi a">thao@gmail.com </p>
        </div>
        <div class="col-md-1 doc">
            <p class="add"><i class="fas fa-phone"></i> CONTACT</p>
            <p class="diachi">0967978353</p>
        </div>

        <div class="flex items-center justify-end h-available pr-10">
            @guest
                <a href="{{ route('login') }}">
                    <div class="login px-8 py-4"><i class="fas fa-user mr-2"></i>Đăng nhập</div>
                </a>
                <a href="{{ route('register') }}">
                    <div class="login px-8 py-4"><i class="fas fa-user mr-2"></i>Đăng ký</div>
                </a>
            @else

                <p class="checklichsu flex items-center cursor-pointer text-white font-bold">
                    <img src="{{ Voyager::image(Auth::user()->avatar) }}" width="35" height="35" class="mr-3 rounded-full">
                    <span>{{ Auth::user()->name }} <i class="fa-sort-down fas mb-2 ml-1"></i></span>
                </p>
                <div class="menunguoidung">
                    {{ menu('user', 'layouts.user_menu') }}
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="login px-8 py-4">Đăng xuất <i class="fas fa-sign-out-alt"></i></button>
                </form>
            @endguest
        </div>
    </div>
</div>
{{ menu('header', 'layouts.sub_menu') }}

<style>
    .gotop {
        margin-top: 600px;
        position: fixed;
        padding: 6px 13px 6px 13px;
        color: #fff;
        background: #4A9FF5;
    }

    .gotop:hover {
        color: #fff;
        background: #4A9FF5;
    }

    .infor_user {
        color: #fff;
        margin-top: 20px;
        text-align: right;
    }

    .infor_user img {
        border-radius: 50%;
    }

    .menunguoidung {
        background: #ffb606;
        color: #000;
        position: fixed;
        top: 65px;
        right:0;
        min-width: 233px;
        z-index: 1;
        line-height: 50px;
        border: 1px solid #9C9A9A;
        display: none;
    }

</style>
<script type="text/javascript">
    $(document).ready(function () {
        var state = 0;
        $(".checklichsu").click(function () {
            if (state == 0) {
                $(".menunguoidung").css("display", "block");
                state = 1;
            } else if (state == 1) {
                $(".menunguoidung").css("display", "none");
                state = 0;
            }
        })
    })

    $('#scrolltopbtn').click(function () {
        $('html,body').animate({scrollTop: 600}, 2000)
    });
</script>
