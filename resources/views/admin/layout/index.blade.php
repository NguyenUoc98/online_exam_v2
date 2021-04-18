<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thi Trực Tuyến</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <script src="{{ asset('js/jquery3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/hocsinh.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chitiet/lienhe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/anhchuyendong.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- 2 follow links is to count number up -->
    <script src="{{ asset('js/counter_up/jquery.counterup.js') }}"></script>
    <script src="{{ asset('js/waypoint/jquery.waypoints.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('editor/ckeditor/ckeditor.js')}}"></script> --}}
    <link href="{{ asset('css/OwlCarousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/OwlCarousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .affix {
            left: 9px;
        }

        .main_test_container {
            background-image: url('imgs/banner/bg-feedback-student.jpg');
            margin-bottom: 30px;
        }

        .bgsearch {
            background-image: url('imgs/banner/bg-feedback-student.jpg');
        }

        .login {
            float: left;
            margin-left: 15px;
        }

    </style>

</head>
<body>
@include('layouts.menu')

@yield('body')

@include('admin.layout.footer')

@livewireScripts
</body>
</html>
