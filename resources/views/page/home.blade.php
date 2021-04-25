@extends('admin.layout.index')

@section('body')
    <div class="owl-carousel owl-theme max-h-screen">
        @foreach($slides as $slide)
            <div class="item max-h-80 md:max-h-screen">
                <img class="object-cover max-h-screen z-10" src="{{ Voyager::image($slide->image) }}">
                <div class="bg-gray-900 bg-opacity-25 absolute flex h-available items-center justify-center md:justify-start md:text-left md:pl-56 text-center top-0 w-full z-20">
                    <div>
                        <h3 class="dream text-4xl md:text-6xl">{{ $slide->title }}</h3>
                        <h2 class="online text-5xl md:text-6xl">{{ $slide->content }}</h2>
                    </div>
                </div>
            </div>
        @endforeach
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

    <div class="mt-20">
        <div class="loiich mb-1">
            <div class="camnhan mx-auto text-4xl md:w-1/3">
                <h3>CÁC TIỆN ÍCH THI TRỰC TUYẾN</h3>
            </div>
        </div>
        <div class="gt mt-0">
            <p>Giúp các em học sinh nâng cao kiến thức, đạt kết quả cao, phát huy năng lực và yêu thích học tập. Đồng
                thời tiết kiệm tối đa thời gian, và chi phí.</p>
        </div>
        <div class="grid md:grid-cols-12">
            <div class="col-span-2 hidden md:block">
                <img src="{{ asset('imgs/banner/bg-utility_.png') }}" alt="" width="250" height="400">
            </div>
            <div class="md:col-span-8 px-10 grid grid-cols-3">
                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-kiem-tra-thi-8.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Phù hợp với quy trình thi</p>
                </div>
                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-cau-hoi-da-dang-6.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Hỗ trợ phần mềm nhanh, hiệu quả</p>
                </div>
                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-hoc-tu-vung-2.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Tránh gian lận trong thi cử</p>
                </div>

                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-nhac-lich-hoc-4.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Nhắc nhở lịch học hằng ngày</p>
                </div>
                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-noi-dung-9.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Quản lý ngân hàng câu hỏi</p>
                </div>
                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-thong-ke-ky-nang-5.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Quản lý đề thi đa dạng</p>
                </div>

                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-tra-tu-dien-1.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Tiết kiệm thời gian</p>
                </div>
                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-tuong-tac-cao-7.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Tính tương tác cao(Chat, Bình luận)</p>
                </div>
                <div class="ctloi">
                    <img src="{{ asset('imgs/banner/icon-xem-live-stream-3.png') }}" alt="" class="mx-auto h-32 w-32">
                    <p>Tương tác và giải đáp trực tiếp</p>
                </div>
            </div>
            <div class="col-span-2 hidden md:block">
                <img src="{{ asset('imgs/banner/bg-utility_.png') }}" width="250" height="400" alt="">
            </div>
        </div>
    </div>

    <div class="flex items-center justify-around sodem">
        <div class="coldb">
            <i class="fas fa-user-graduate"></i>
            <div class="text-4xl md:text-6xl font-bold">678</div>
            <span>MEMBERS</span>
        </div>

        <div class="coldb">
            <i class="fas fa-question-circle"></i>
            <div class="text-4xl md:text-6xl font-bold">1234</div>
            <span>QUESTIONS</span>
        </div>

        <div class="coldb">
            <i class="fas fa-file-alt"></i>
            <div class="text-4xl md:text-6xl font-bold">750</div>
            <span>EXAMS</span>
        </div>

        <div class="coldb">
            <i class="fas fa-users"></i>
            <div class="text-4xl md:text-6xl font-bold">1345</div>
            <span>VISITORS</span>
        </div>
    </div>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            items: 1,
            autoplay: true,
            dots: false
        })
    </script>
@stop
