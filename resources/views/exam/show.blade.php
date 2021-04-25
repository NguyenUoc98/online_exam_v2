@extends('admin.layout.index')
@section('body')
    <div class="container">
        <div class="md:flex">
            <div class="md:mr-10 my-10 md:w-2/3 lg:w-3/4">
                <div class="bg-white p-8 md:p-12 ">
                    <h3 class="text-5xl font-bold uppercase md:hidden">ĐỀ {{ $exam->semester->name }}</h3>
                    <div class="grid grid-cols-3 gap-3 md:gap-12">
                        <img src="{{ Voyager::image($exam->subject->image) }}"
                             class="picture object-cover h-72 md:h-auto">
                        <div class="col-span-2 text-2xl">
                            <h3 class="text-5xl font-bold uppercase hidden md:block">ĐỀ {{ $exam->semester->name }}</h3>
                            <table class="w-full md:w-2/3 table table-bordered">
                                <tr>
                                    <th><b>Môn thi:</b></th>
                                    <td>{{ $exam->subject->name }}</td>
                                </tr>
                                <tr>
                                    <th><b>Số câu:</b></th>
                                    <td>{{ $exam->num_question }} câu</td>
                                </tr>
                                <tr>
                                    <th><b>Thời gian thi:</b></th>
                                    <td>{{ $exam->time }} phút</td>
                                </tr>
                                <tr>
                                    <th><b>Khối:</b></th>
                                    <td>{{ $exam->grade->name }}</td>
                                </tr>
                            </table>

                            <div class="hidden md:block">
                                <div class="mb-10 w-2/3 flex justify-between">
                                    <span class="f text-center"><i class="fas fa-eye mr-2"></i>View: 217</span>
                                    <span class="g text-center"><i
                                            class="fas fa-clipboard-check mr-2"></i>Taken: 1200</span>
                                    <span class="L text-center"><i class="fas fa-vote-yea mr-2"></i>Vote: 20</span>
                                </div>

                                <div class="text-left">
                                    <p class="text-3xl font-bold">Chú ý khi tham gia</p>
                                    <p>
                                        <span class="glyphicon glyphicon-ok"></span> Hệ thống bắt đầu tính giờ làm bài
                                        thi
                                    </p>
                                    <p class="review">
                                        <span class="glyphicon glyphicon-ok"></span> Phải chọn đáp án trả lời để tiếp
                                        tục bài
                                        thi
                                    </p>
                                    <p class="review">
                                        <span class="glyphicon glyphicon-ok"></span> Hệ thống tự động kết thúc bài, tính
                                        điểm
                                        khi hết giờ làm bài
                                    </p>
                                    <p class="review">
                                        <span class="glyphicon glyphicon-ok"> </span> Xem lịch sử bài thi
                                    </p>
                                </div>

                                @if(Auth::check())
                                    <div class="text-center mt-10">
                                        <a href="{{ route('exam.doing', $exam->id) }}">
                                            <button type="button"
                                                    class="bg-yellow-600 px-16 py-4 rounded-full font-bold hover:bg-yellow-500 text-white">
                                                THAM GIA NGAY
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="md:hidden">
                        <div class="mb-10 flex justify-between">
                            <span class="f text-center"><i class="fas fa-eye mr-2"></i>View: 217</span>
                            <span class="g text-center"><i class="fas fa-clipboard-check mr-2"></i>Taken: 1200</span>
                            <span class="L text-center"><i class="fas fa-vote-yea mr-2"></i>Vote: 20</span>
                        </div>

                        <div class="text-left">
                            <p class="text-3xl font-bold">Chú ý khi tham gia</p>
                            <p>
                                <span class="glyphicon glyphicon-ok"></span> Hệ thống bắt đầu tính giờ làm bài thi
                            </p>
                            <p class="review">
                                <span class="glyphicon glyphicon-ok"></span> Phải chọn đáp án trả lời để tiếp tục bài
                                thi
                            </p>
                            <p class="review">
                                <span class="glyphicon glyphicon-ok"></span> Hệ thống tự động kết thúc bài, tính điểm
                                khi hết giờ làm bài
                            </p>
                            <p class="review">
                                <span class="glyphicon glyphicon-ok"> </span> Xem lịch sử bài thi
                            </p>
                        </div>

                        @if(Auth::check())
                            <div class="text-center mt-10">
                                <a href="{{ route('exam.doing', $exam->id) }}">
                                    <button type="button"
                                            class="bg-yellow-600 px-16 py-4 rounded-full font-bold hover:bg-yellow-500 text-white">
                                        THAM GIA NGAY
                                    </button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="thembinhluan bg-white mt-10 p-8 md:p-12 ">
                    <div class="w-full">
                        <ul class="nav nav-tabs" style="padding-bottom: 5px;">
                            <li class="active"><a data-toggle="tab" href="#tab-comment">THẢO LUẬN</a></li>
                            <li><a data-toggle="tab" href="#tab-review">ĐÁNH GIÁ</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="tab-comment" class="tab-pane fade in active">
                                @if(Auth::check())
                                    <form method="post" action="{{ route('comment.store', $exam->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                        <div class="">
                                            @if(count($errors)>0)
                                                <div class="alert alert-danger">
                                                    @foreach($errors->all() as $err)
                                                        <span
                                                            class="glyphicon glyphicon-remove icon-remove"></span> {{$err}}
                                                        <br>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <div style="padding-top: 10px;">
                                                <div>
                                                    <p class="text-2xl">Viết bình luận... <span
                                                            class="glyphicon glyphicon-pencil"></span></p>
                                                    <textarea name="content" placeholder="Nhập nội dung thảo luận" id=""
                                                              style="width: 100%;padding: 10px" cols="90"
                                                              rows="5"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn px-16 text-white bg-primary">
                                                        Bình luận
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif

                                @foreach($comments as $comment)
                                    <div class="flex my-10">
                                        <img class="h-24 w-24" src="{{ Voyager::image($comment->user->avatar) }}">
                                        <div class="media-body ml-3">
                                            <div class="bg-gray-200 media-body px-10 py-5 rounded-3xl">
                                                <p class="font-bold text-2xl">{{ $comment->user->name }}</p>
                                                <p style="font-size: 13px; color: #B3B2B2;">{{ $comment->created_at->format('d-m-Y H:i:s') }}</p>
                                                <p style="color: #F9CA0D;margin-top: 10px;margin-bottom: 0px">
                                                </p>
                                                <p>{{ $comment->content }} </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="tab-review" class="tab-pane fade">hahaha</div>
                        </div>

                        {{-- model đánh giá ý kiến --}}
                        <div class="modal fade" id="review" role="dialog" style="margin-top: 150px">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #189eff ;color: #fff">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="padding-left: 50px">Đánh giá</h4>
                                    </div>
                                    <div class="modal-body" style="padding-left: 25px">
                                        <p>
                                          <span style="padding-left: 50px; color: #EDC022">
                                              <span class="glyphicon glyphicon-user" style="color: #000"></span>&nbsp;
                                        <span class="glyphicon glyphicon-star-empty "></span>
                                       <span class="glyphicon glyphicon-star-empty"></span>
                                       <span class="glyphicon glyphicon-star-empty"></span>
                                       <span class="glyphicon glyphicon-star-empty"></span>
                                       <span class="glyphicon glyphicon-star-empty"></span>

                                </span>
                                        </p>
                                        <p>Nooij dung</p>
                                        <p><textarea name="" id="" cols="30" rows="10"
                                                     placeholder="Nhập nội dung"></textarea>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                style="margin-right: 120px">Gửi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white my-10 p-10 w-full">
                <span class="bg-primary p-4 font-bold">Đề Thi Liên Quan</span>
                <p class="h4 mt-4"></p>
                @foreach($otherExams as $otherExam)
                    <div class="row_chitiet flex mt-2 pb-6 border-b">
                        <div class="w-1/3">
                            <a href="{{ route('exam.show', $otherExam->id) }}">
                                <img class="object-cover md:h-40 h-60"
                                     src="{{ voyager::image($otherExam->subject->image) }}" alt="">
                            </a>
                        </div>
                        <div class="ml-4">
                            <a href="{{ route('exam.show', $otherExam->id) }}"><b>Đề {{ $otherExam->semester->name }}</b></a>
                            <p class="canmonthi"><b>Môn thi:</b> {{ $otherExam->subject->name }}</p>
                            <p><b>Thời gian:</b> {{ $otherExam->time }} phút</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

