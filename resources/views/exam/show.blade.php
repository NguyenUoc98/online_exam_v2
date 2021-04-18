@extends('admin.layout.index')
@section('body')
    <div class="container" id="main">
        <div class="row giohang">
            <div class="col-md-4">
                <img src="{{ Voyager::image($exam->subject->image) }}" class="picture">
            </div>

            <div class="col-md-5 text-2xl">
                <h3 class="thongtinctde" style="text-transform: uppercase;"><b>ĐỀ {{ $exam->semester->name }}</b></h3>
                <p><b>Môn thi:</b> {{ $exam->subject->name }}</p>
                <p><b>Số câu:</b> {{ $exam->num_question }} câu</p>
                <p><b>Thời gian thi:</b> {{ $exam->time }} phút</p>
                <p><b>Khối:</b> {{ $exam->grade->name }}</p>
                <p class="note"><b>Chú ý khi tham gia</b></p>
                <p><span class="glyphicon glyphicon-ok"></span> Hệ thống bắt đầu tính giờ làm bài thi</p>
                <p class="review">
                    <span class="glyphicon glyphicon-ok"> </span> Phải chọn đáp án trả lời để tiếp tục bài thi
                </p>
                <p class="review">
                    <span class="glyphicon glyphicon-ok"> </span> Hệ thống tự động kết thúc bài, tính điểm khi hết giờ
                    làm bài
                </p>
                <p class="review">
                    <span class="glyphicon glyphicon-ok"> </span> Xem lịch sử bài thi
                </p>
                @if(Auth::check())
                    <marquee behavior="alternate" width="10%">>></marquee>
                    <a href="{{ route('exam.doing', $exam->id) }}">
                        <button type="button" class="btn warning" id="giohang">THAM GIA NGAY</button>
                    </a>
                    <marquee behavior="alternate" width="10%"><<</marquee>
                @endif

                <p>
                    <span class="f"><b><i class="fas fa-eye"></i></b> &nbsp;View: 217</span>
                    <span class="g"><b><i class="fas fa-clipboard-check"></i></b> &nbsp;Taken: 1200</span>
                    <span class="L" id="vote"><b>20</b> &nbsp;votes</span>
                </p>

            </div>

            <div class="col-md-3 chitiet">
                <p><b class="chuhotro">Đề Thi Liên Quan</b></p>
                <p class="h4 mt-4"></p>
                @foreach($otherExams as $otherExam)
                    <div class="row row_chitiet">
                        <div class="col-md-4">
                            <a href="{{ $otherExam->id }}">
                                <img src="{{ voyager::image($otherExam->subject->image) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <a href="{{ $otherExam->id }}">Đề {{ $otherExam->semester->name }}</a>
                            <p class="canmonthi"><b>Môn thi:</b> {{ $otherExam->subject->name }}</p>
                            <p><b>Thời gian:</b> {{ $otherExam->time }} phút</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!--đóng cột đầu tiên gồm ảnh, sản phẩm liên quan-->
        <div class="row thembinhluan">
            <div class="col-md-12">
                <ul class="nav nav-tabs" style="padding-bottom: 5px;">
                    <li class="active"><a data-toggle="tab" href="#tab-comment">THẢO LUẬN</a></li>
                    <li><a data-toggle="tab" href="#tab-review">ĐÁNH GIÁ</a></li>
                </ul>

                <div class="tab-content">
                    <div id="tab-comment" class="tab-pane fade in active" style="padding-left: 20px">
                        @if(Auth::check())
                            <form method="post" action="{{ route('comment.store', $exam->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                <div class="row">
                                    @if(count($errors)>0)
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $err)
                                                <span class="glyphicon glyphicon-remove icon-remove"></span> {{$err}} <br>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div style="padding-top: 10px;">
                                        <div>
                                            <p>Viết thảo luận... <span class="glyphicon glyphicon-pencil"></span></p>
                                            <p>
                                            <textarea name="content" placeholder="Nhập nội dung thảo luận" id="" style="width: 100%;padding: 10px" cols="90" rows="5"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <p>
                                            <input type="submit" class="btn btn-primary" style="float: right;">
                                        </p>
                                    </div>
                                </div>
                            </form>
                        @endif

                        @foreach($comments as $comment)
                            <div class="col-md-11">
                                <div class="media">
                                    <div class="media-left media-top w-1/6">
                                        <img src="{{ Voyager::image($comment->user->avatar) }}" class="media-object" width="60px" height="60px">
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading" style="text-transform: capitalize;">
                                            <b>{{ $comment->user->name }}</b></p>
                                        <p style="font-size: 13px; color: #B3B2B2;">{{ $comment->created_at }}</p>
                                        <p style="color: #F9CA0D;margin-top: 10px;margin-bottom: 0px">
                                        </p>
                                        <p>{{ $comment->content }} </p><br>
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
                                <p><textarea name="" id="" cols="30" rows="10" placeholder="Nhập nội dung"></textarea>
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
@stop

