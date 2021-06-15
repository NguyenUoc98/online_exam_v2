@extends('layouts.master')
<style>
    #question {
        padding: 20px;
        font-size: 22px;
        background-color: #996699;
        border-radius: 20px;
        margin: 10px 0 10px 0;
        color: #f6f6f6;
    }

    .option {
        display: inline-block;
        padding: 10px 0px 10px 15px;
        vertical-align: middle;
        background: rgba(207, 207, 207, 0.5);
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
@section('body')
    <div id="quizContainer" class="bg-white container my-10 p-10 shadow-2xl relative">
        <div class="font-bold text-5xl text-center text-primary-light">KỲ THI {{$exam->semester->name}}</div>
        <div class="information">
            <b>Đề: {{ array_flip(\App\Models\Exam::STATUS)[$exam->status] }} |
                Môn: {{ $exam->subject->name }} |
                Số câu: {{ $exam->num_question }} câu |
                Thời gian thi: {{ $exam->time }} phút
            </b></div>
        <div
            class="border-4 border-blue-800 flex items-center justify-center md:absolute md:mt-10 mt-3 mx-10 p-2 md:p-5 right-0 text-center top-0">
            <p class="gio text-4xl md:text-3xl">
                <span id="m"></span> : <span id="s">00</span>
            </p>
        </div>
        @livewire('doing-question', ['exam' => $exam])
    </div>
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

                $(window).off('beforeunload');
                $("#doing_submit").submit();
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
    <script>
        $(document).ready(function() {
            $(window).on('beforeunload', function(e){
                return e.originalEvent.returnValue = "Quá trình nạp tiền đang được xử lý. Vui lòng không tắt trình duyệt...";
            });
        });
    </script>
@endsection
