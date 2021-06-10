<div class="bg-yellow-500 py-8 w-full z-20">
    <div data-spy="affix" data-offset-top="85">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}">
                    <img src="{{asset('/imgs/logo.png') }}" class="h-24" alt="">
                </a>
                <div class="ngang hidden md:block">
                    <ul>
                        @foreach($items as $menuItem)
                            <?php
                            $parameters = $menuItem->getParametersAttribute();
                            if (isset($parameters->model) && !is_null($parameters->model)) {
                                $dataType = \Voyager::model('DataType')->where('name', '=', $parameters->model)->first();
                                $subMenu = app($dataType->model_name)->all();
                            } else {
                                $subMenu = [];
                            }
                            ?>
                            @if(empty($subMenu))
                                <li><a href="{{ $menuItem->link() }}">{{ $menuItem->title }}</a></li>
                            @else
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle"
                                           data-toggle="dropdown">{{ $menuItem->title }}</a>
                                        <span class="caret"></span>
                                        <ul class="dropdown-menu down_menu" style="min-width: 170px">
                                            @foreach($subMenu as $menu)
                                                <li style="width: 100%">
                                                    <a href="{{ route('semester.show', $menu->slug) }}"><span>{{ $menu->name }}</span>
                                                        <i class="fas fa-angle-right ic1" style="float:right"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>
                <div class="flex items-center justify-end h-available">
                    @guest
                        <a href="{{ route('login') }}">
                            <div class="login px-8 py-4 mx-1"><i class="fas fa-user mr-2"></i>Đăng nhập</div>
                        </a>
                        <a href="{{ route('register') }}">
                            <div class="login px-8 py-4 mx-1"><i class="fas fa-user mr-2"></i>Đăng ký</div>
                        </a>
                    @else

                        <p class="checklichsu flex items-center cursor-pointer text-white font-bold">
                            <img src="{{ Voyager::image(Auth::user()->avatar) }}" width="35" height="35"
                                 class="mr-3 rounded-full">
                            <span>{{ Auth::user()->name }} <i class="fa-sort-down fas mb-2 ml-1"></i></span>
                        </p>
                        <div class="menunguoidung z-10">
                            {{ menu('user', 'layouts.user_menu') }}
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <span id="scrolltopbtn" class="gotop"><i class="fas fa-arrow-up"></i></span>
</div>

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
        right: 0;
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
