@extends('admin.layout.index')

@section('body')
    <div class="anhbanner">
        <div class="col-md-12 banner">
            <h3 class="dream">FOLLOW YOUR DREAM</h3>
            <div class="up">
                <h2 class="online">Learn From Best Online</h2>
                <h2 class="training">Training Exam</h2>
            </div>
            <p class="canbtn">
                <a href="trangchu"><span class="view">VIEW MORE</span></a>
                <a href="trangchu"><span class="thamgia">JOIN EXAMIN</span></a>
            </p>
        </div>
    </div>

    <div class="container-fluid main_test_container pb-12">
        <div class="container ">
            <div class="row main_test">
                <div class="thanh_menu">
                    <ul class="nav nav-tabs">
                        @foreach($semesters as $key => $semester)
                            <li class="thpt{{ $key + 1 }} @if($key == 0) active @endif">
                                <a data-toggle="tab" class="kt{{ $key }}" href="#menu{{ $key }}">
                                    {{ $semester->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content">
                    @foreach($semesters as $key => $semester)
                        <div id="menu{{ $key }}" class="tab-pane fade @if($key == 0)in active @endif">
                            @livewire('semester-exams', ['semester' => $semester])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row loiich">
        <div class="col-md-4"></div>
        <div class="col-md-5 camnhan">
            <h3>CÁC TIỆN ÍCH THI TRỰC TUYẾN</h3>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row gt">
        <div class="col-md-12">
            <p>Giúp các em học sinh nâng cao kiến thức, đạt kết quả cao, phát huy năng lực và yêu thích học tập. Đồng
                thời tiết kiệm tối đa thời gian, và chi phí.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('imgs/banner/bg-utility_.png') }}" alt="" width="250" height="400">
        </div>
        <div class="col-md-8">
            <div class="row ctloi">
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-kiem-tra-thi-8.png') }}" alt="">
                    <p>Phù hợp với quy trình thi</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-cau-hoi-da-dang-6.png') }}" alt="">
                    <p>Hỗ trợ phần mềm nhanh, hiệu quả</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-hoc-tu-vung-2.png') }}" alt="">
                    <p>Tránh gian lận trong thi cử</p>
                </div>
            </div>
            <div class="row ctloi">
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-nhac-lich-hoc-4.png') }}" alt="">
                    <p>Nhắc nhở lịch học hằng ngày</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-noi-dung-9.png') }}" alt="">
                    <p>Quản lý ngân hàng câu hỏi</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-thong-ke-ky-nang-5.png') }}" alt="">
                    <p>Quản lý đề thi đa dạng</p>
                </div>
            </div>
            <div class="row ctloi">
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-tra-tu-dien-1.png') }}" alt="">
                    <p>Tiết kiệm thời gian</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-tuong-tac-cao-7.png') }}" alt="">
                    <p>Tính tương tác cao(Chat, Bình luận)</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('imgs/banner/icon-xem-live-stream-3.png') }}" alt="">
                    <p>Tương tác và giải đáp trực tiếp</p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <img src="{{ asset('imgs/banner/bg-utility_.png') }}" width="250" height="400" alt="">
        </div>
    </div>

    <div class="container-fluid thisinhcamnhan">
        <div class="container">
            <div class="row emotion">
                <div class="col-md-4"></div>
                <div class="col-md-5 camnhan">

                    <h3>CẢM NHẬN THÍ SINH VỀ CHÚNG TÔI</h3>
                </div>

                <div class="col-md-3"></div>
            </div>

            <div class="row abc">
                <div class="col-md-4">
                    <div class="card middle">
                        <div class="front anhfb1">

                            <p class="fb1"><img src="{{ asset('imgs/fb1.png') }}" alt=""></p>
                            <p class="tenthisinh">Lê Thị Ngọc Thảo</p>
                            <p class="cmt"><span class="icon fa fa-quote-left"> </span>&nbsp;&nbsp; Trước tiên cho em
                                gửi lời cảm ơn chân thành tới đội ngũ phát trển đã tạo ra cho em một môi trường
                                học tập bổ ích và lý thú cùng với số lượng câu hỏi đa dạng rất phù hợp với xu
                                hướng hiện nay. Hệ thống có các bài giảng, bài tập, bài thi qua đó giúp em cải thiện
                                được điểm số khả quan. &nbsp;<span class="icon fa fa-quote-right"> </span></p>
                            <p class="decoration"></p>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>EXAMIN</h2>
                                <span>Join Exam Now !</span>
                                <div class="sm">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card middle">
                        <div class="front anhfb2">
                            <p class="fb1"><img src="{{ asset('imgs/fb2.jpg') }}" alt=""></p>
                            <p class="tenthisinh">Nguyễn Thị Quỳnh</p>
                            <p class="cmt"><span class="icon fa fa-quote-left"> </span>&nbsp;&nbsp; Trước tiên cho em
                                gửi lời cảm ơn chân thành tới đội ngũ phát trển đã tạo ra cho em một môi trường
                                học tập bổ ích và lý thú cùng với số lượng câu hỏi đa dạng rất phù hợp với xu
                                hướng hiện nay. Hệ thống có các bài giảng, bài tập, bài thi qua đó giúp em cải thiện
                                được điểm số khả quan. &nbsp;<span class="icon fa fa-quote-right"> </span></p>
                            <p class="decoration"></p>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>EXAMIN</h2>
                                <span>Join Exam Now !</span>
                                <div class="sm">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card middle">
                        <div class="front anhfb3">
                            <p class="fb1"><img src="{{ asset('imgs/fb3.png') }}" alt=""></p>
                            <p class="tenthisinh">Đoàn Thị Linh</p>
                            <p class="cmt"><span class="icon fa fa-quote-left"> </span>&nbsp;&nbsp; Trước tiên cho em
                                gửi lời cảm ơn chân thành tới đội ngũ phát trển đã tạo ra cho em một môi trường
                                học tập bổ ích và lý thú cùng với số lượng câu hỏi đa dạng rất phù hợp với xu
                                hướng hiện nay. Hệ thống có các bài giảng, bài tập, bài thi qua đó giúp em cải thiện
                                được điểm số khả quan. &nbsp;<span class="icon fa fa-quote-right"> </span></p>
                            <p class="decoration"></p>
                        </div>
                        <div class="back">
                            <div class="back-content middle">
                                <h2>EXAMIN</h2>
                                <span>Join Exam Now !</span>
                                <div class="sm">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
