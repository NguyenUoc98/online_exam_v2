<div class="menu-ngang">
    <div class="row" data-spy="affix" data-offset-top="85">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <a href="{{url('trangchu') }}">
                <img src="{{asset('imgs/logo.png') }}" alt="">
            </a>
        </div>
        <div class="col-md-9 ngang">
            <ul>
                @foreach($items as $menuItem)
                    <?php
                        $parameters = $menuItem->getParametersAttribute();
                        if(!is_null($parameters)) {
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $menuItem->title }}</a>
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

                <li>
                    <form method="get" id="searchform" action="search">
                        <div class="email-box">
                            <i class="fas fa-search"></i>
                            <input type="text" class="tbox" name="key" placeholder="  Nhập từ khóa tìm kiếm">
                            <input type="submit" value="Tìm kiếm" class="btntk">

                        </div>
                    </form>
                </li>

            </ul>
        </div>

        <div class="col-md-1 ngang"></div>
    </div>
    <span id="scrolltopbtn" class="gotop"><i class="fas fa-arrow-up"></i></span>
</div>
