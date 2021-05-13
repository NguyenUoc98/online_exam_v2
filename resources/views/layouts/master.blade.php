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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="{{ asset('css/hocsinh.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chitiet/lienhe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- 2 follow links is to count number up -->
    <script src="{{ asset('js/counter_up/jquery.counterup.js') }}"></script>
    <script src="{{ asset('js/waypoint/jquery.waypoints.js') }}"></script>
    <link rel="stylesheet" href="/css/OwlCarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/OwlCarousel2/dist/assets/owl.theme.default.min.css">
    <script src="/css/OwlCarousel2/dist/owl.carousel.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
{{ menu('header', 'layouts.menu') }}

@yield('body')

@include('layouts.footer')

@livewireScripts
@if(@session('notify'))
    @php
        $notify = @session('notify');
    @endphp
    <script type="text/javascript">
        $(document).ready(function () {
            Swal.fire(
                '{{ $notify['title'] }}',
                '{{ $notify['msg'] }}',
                '{{ $notify['icon'] }}'
            )
        });
    </script>
@endif
</body>
</html>
