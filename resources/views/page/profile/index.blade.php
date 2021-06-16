@extends('layouts.master')
@section('page_title', 'Trang cá nhân')

@section('body')

    <div class="pb-64 pt-40 flex" style="background-image: url(/imgs/gbfooter.jpeg); background-size: cover; background-position: center center;">
        <!-- Header container -->
        <div class="container text-3xl">
            <div>
                <h3 class="font-bold text-6xl text-white">Xin chào {{ auth()->user()->name }}</h3>
                <p class="text-white">
                    Đây là trang quản lý thông tin cá nhân của bạn. Nơi bạn có thể quản lý toàn bộ thông tin về bạn. Bạn có thể
                    chỉnh sửa nó!</p>
            </div>
        </div>
    </div>

    <div class="-mt-40">
        <div class="container md:flex">
            <div class="md:w-1/3 w-full">
                @include('page.profile._show')
            </div>
            <div class="md:ml-10 md:w-2/3 w-full">
                @include('page.profile._edit_account')
                @include('page.profile._history')
            </div>
        </div>
    </div>

@endsection
