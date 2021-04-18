<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thi Trực Tuyến</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            background-color: #6cf;
        }

        .giaodienthi {
            width: 1000px;
            position: absolute;
            top: 380px;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            background: rgba(255, 255, 255, 0.5);
            padding: 20px 20px 0 20px;
            border: 1px solid #08038C;
            box-shadow: 0 0 8px 3px #fff;
        }

        .title {
            padding-top: 20px;
            text-align: center;
            font-size: 29px;
            text-transform: uppercase;
            color: #08038C;
        }

        #question {
            padding: 20px;
            font-size: 22px;
            background-color: #08038C;
            border-radius: 20px;
            margin: 10px 0 10px 0;
            color: #f6f6f6;
        }

        .option {
            display: inline-block;
            padding: 10px 0px 10px 15px;
            vertical-align: middle;
            background: rgba(255, 255, 255, 0.5);
            color: #000000;
            border-radius: 20px;
        }

        .option:hover {
            background: #6a87ec;
            color: #f6f6f6;
        }

        .choosed, .choosed:hover {
            background: #33a205;
            color: #f6f6f6;
        }

        .result {
            height: 100px;
            text-align: center;
            font-size: 75px;
        }

        .information {
            text-align: center;
            margin-top: 5px;
        }

        .counttime {
            width: 140px;
            height: 100px;
            margin-left: 800px;
            margin-top: -80px;

        }

        .gio {
            font-size: 17px;
            --text-opacity: 1 !important;
            color: #e53e3e !important;
            color: rgba(229, 62, 62, var(--text-opacity)) !important;
            font-weight: bold;
        }

        .content1 p {
            display: inline;
        }
    </style>
</head>

<body>
<div id="quizContainer" class="container giaodienthi">
    <div class="title font-bold">KỲ THI {{$exam->semester->name}}</div>
    <div class="information">
        <b>Đề: {{ array_flip(\App\Models\Exam::STATUS)[$exam->status] }} |
            Môn: {{ $exam->subject->name }} |
            Số câu: {{ $exam->num_question }} câu |
            Thời gian thi: {{ $exam->time }} phút
        </b></div>
    <div
        class="mt-4 border-4 border-blue-800 fixed flex items-center justify-center mx-10 p-5 py-10 right-0 rounded-full text-center top-0">
        <p class="gio">
            <span class="text-blue-900">Thời gian</span><br>
            <span id="m"></span> : <span id="s">00</span>
        </p>
    </div>
    @livewire('doing-question', ['exam' => $exam])
</div>
@livewireScripts
<script>
    var m = "{{ $exam->time }}";
    var s = 0; // Giây
    var timeout = null; // Timeout

    function stop() {
        clearTimeout(timeout);
    }

    function start() {
        if (s === -1) {
            m -= 1;
            s = 59;
        }

        if (m == -1) {
            clearTimeout(timeout);

            // alert('Hết giờ');
            window.location.assign("http://localhost:1412/thitructuyen/public/ketqua");
            return false;
        }

        $('#m').text(m.toString());
        $('#s').text((s < 10) ? '0' + s.toString() : s.toString());

        timeout = setTimeout(function () {
            s--;
            start();
        }, 1000);
    }

    start();
</script>
</body>
</html>
