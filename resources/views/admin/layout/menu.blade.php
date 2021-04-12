<div class="menu-top">
    <div class="row">
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
        <div class="col-md-4"></div>
        <div class="col-md-2 infor_user">
            @if(Auth::check() && Auth::user()->quyen==0)
                <p class="checklichsu" style="cursor: pointer;">
                    <img src="{{ Voyager::image(Auth::user()->avatar) }}" alt="" width="35" height="35">
                    {{Auth::user()->name}} <i class="fas fa-sort-down"></i>
                </p>
            @endif
            <div class="menunguoidung">
                {{ menu('user', 'layout.user_menu') }}
            </div>
        </div>
        <div class="col-md-2">
            @if(Auth::check() && Auth::user()->quyen==0)
                <a href="{{url('dangxuat')}}">
                    <div class="login"><i class="fas fa-sign-out-alt"></i> Logout</div>
                </a>
            @else

                <a href="{{url('dangnhap')}}">
                    <div class="login "><i class="fas fa-user"></i> Login</div>
                </a>
            @endif
        </div>
    </div>
</div>
{{ menu('header', 'layout.sub_menu') }}
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
        width: 150px;
        height: 50px;
        position: fixed;
        margin-left: 90px;
        margin-top: 15px;
        top: 1;
        z-index: 1;
        text-align: center;
        line-height: 50px;
        border: 1px solid #9C9A9A;
        display: none;
    }

    .menunguoidung a {
        color: #000;

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
