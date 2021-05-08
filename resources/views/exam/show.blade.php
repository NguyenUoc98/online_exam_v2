@extends('admin.layout.index')
<style>
    .stars {
        color: #ffcf18;
    }
</style>
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
                            <table class="w-full lg:w-2/3 table table-bordered">
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
                                <div class="mb-10 lg:w-2/3 flex justify-between">
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
                            <li class="active"><a data-toggle="tab" href="#tab-review">ĐÁNH GIÁ</a></li>
                            <li><a data-toggle="tab" href="#tab-comment">BÌNH LUẬN</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="tab-comment" class="tab-pane fade">
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
                                                    <textarea name="content" placeholder="Nhập nội dung thảo luận"
                                                              class="resize-none"
                                                              style="width: 100%;padding: 10px" cols="90"
                                                              rows="5"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn px-16 text-white bg-primary mt-3">
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
                            <div id="tab-review" class="tab-pane fade in active">
                                <div class="mt-5 w-full">
                                    <div class="well">
                                        <div class="grid lg:grid-cols-2 gap-10">
                                            <div class="text-center text-5xl border-b lg:border-r lg:border-b-0">
                                                <h1 class="rating-num font-bold"
                                                    style="font-size: 7rem!important;">{{ round($rates->avg('rating'), 1) }}</h1>
                                                <div class="rating">
                                                    @php
                                                        $stared = 0;
                                                        for($i=1; $i <= round($rates->avg('rating'), 1); $i++) {
                                                            echo '<i class="fas fa-star"></i>';
                                                            $stared++;
                                                        }
                                                        if(round($rates->avg('rating'), 1) - $stared > 0) {
                                                            echo '<i class="fas fa-star-half-alt"></i>';
                                                            $stared++;
                                                        }
                                                        for($i=1; $i <= (5-$stared); $i++) {
                                                            echo '<i class="far fa-star"></i>';
                                                        }
                                                    @endphp
                                                </div>
                                                <div>
                                                    Tổng: {{ number_format($totalRate) }}
                                                </div>
                                            </div>

                                            <div>
                                                <div class="rating-desc">
                                                    <div class="flex items-center mb-6">
                                                        <p class="w-1/6 text-3xl"><i class="fas fa-star"></i>5</p>
                                                        <div class="progress rounded-full w-5/6 mb-0">
                                                            <div class="progress-bar progress-bar-success rounded-full"
                                                                 role="progressbar" aria-valuemin="0"
                                                                 aria-valuemax="100"
                                                                 style="width: {{ $rating[5] ?? 0 }}%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end 5 -->
                                                    <div class="flex items-center mb-6">
                                                        <p class="w-1/6 text-3xl"><i class="fas fa-star"></i>4</p>
                                                        <div class="progress rounded-full w-5/6 mb-0">
                                                            <div class="progress-bar bg-blue-700 rounded-full"
                                                                 role="progressbar" aria-valuemin="0"
                                                                 aria-valuemax="100"
                                                                 style="width: {{ $rating[4] ?? 0 }}%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end 4 -->
                                                    <div class="flex items-center mb-6">
                                                        <p class="w-1/6 text-3xl"><i class="fas fa-star"></i>3</p>
                                                        <div class="progress rounded-full w-5/6 mb-0">
                                                            <div class="progress-bar progress-bar-info rounded-full"
                                                                 role="progressbar" aria-valuemin="0"
                                                                 aria-valuemax="100"
                                                                 style="width: {{ $rating[3] ?? 0 }}%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end 3 -->
                                                    <div class="flex items-center mb-6">
                                                        <p class="w-1/6 text-3xl"><i class="fas fa-star"></i>2</p>
                                                        <div class="progress rounded-full w-5/6 mb-0">
                                                            <div class="progress-bar bg-yellow-500 rounded-full"
                                                                 role="progressbar" aria-valuemin="0"
                                                                 aria-valuemax="100"
                                                                 style="width: {{ $rating[2] ?? 0 }}%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end 2 -->
                                                    <div class="flex items-center">
                                                        <p class="w-1/6 text-3xl"><i class="fas fa-star"></i>1</p>
                                                        <div class="progress rounded-full w-5/6 mb-0">
                                                            <div class="progress-bar progress-bar-danger rounded-full"
                                                                 role="progressbar" aria-valuemin="0"
                                                                 aria-valuemax="100"
                                                                 style="width: {{ $rating[1] ?? 0 }}%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end 1 -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(Auth::check() && $rateAble)
                                    <form method="post" action="{{ route('rating.store', $exam->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                        <div class="starrr stars text-6xl text-center mt-12 mb-2" data-rating="0"></div>
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
                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                <div>
                                                    <p class="text-2xl">Viết đánh giá... <span
                                                            class="glyphicon glyphicon-pencil"></span></p>
                                                    <textarea name="content" placeholder="Nhập nội dung đánh giá"
                                                              class="resize-none"
                                                              style="width: 100%;padding: 10px" cols="90"
                                                              rows="5"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit" class="btn px-16 text-white bg-primary mt-3">
                                                        Đánh giá
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif

                                @foreach($rates->get() as $rate)
                                    <div class="flex my-10">
                                        <img class="h-24 w-24" src="{{ Voyager::image($rate->user->avatar) }}">
                                        <div class="media-body ml-3">
                                            <div class="bg-gray-200 media-body px-10 py-5 rounded-3xl">
                                                <p class="font-bold text-2xl">
                                                    {{ $rate->user->name }}
                                                    <span class="text-yellow-500">
                                                        @php
                                                            for($i=1; $i <= $rate->rating; $i++) {
                                                                echo '<i class="fas fa-star"></i>';
                                                            }
                                                            for($i=1; $i <= (5-$rate->rating); $i++) {
                                                                echo '<i class="far fa-star"></i>';
                                                            }
                                                        @endphp
                                                    </span>
                                                </p>
                                                <p style="font-size: 13px; color: #B3B2B2;">{{ $rate->created_at->format('d-m-Y H:i:s') }}</p>
                                                <p style="color: #F9CA0D;margin-top: 10px;margin-bottom: 0px">
                                                </p>
                                                <p>{{ $rate->content }} </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white my-10 p-10 lg:w-1/4 md:w-1/3 w-full">
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

    <script>
        var __slice = [].slice;
        (function (e, t) {
            var n;
            n = function () {
                function t(t, n) {
                    var r, i, s, o = this;
                    this.options = e.extend({}, this.defaults, n);
                    this.$el = t;
                    s = this.defaults;
                    for (r in s) {
                        i = s[r];
                        if (this.$el.data(r) != null) {
                            this.options[r] = this.$el.data(r)
                        }
                    }
                    this.createStars();
                    this.syncRating();
                    this.$el.on("mouseover.starrr", "span", function (e) {
                        return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1)
                    });
                    this.$el.on("mouseout.starrr", function () {
                        return o.syncRating()
                    });
                    this.$el.on("click.starrr", "span", function (e) {
                        return o.setRating(o.$el.find("span").index(e.currentTarget) + 1)
                    });
                    this.$el.on("starrr:change", this.options.change)
                }

                t.prototype.defaults = {
                    rating: void 0, numStars: 5, change: function (e, t) {
                    }
                };
                t.prototype.createStars = function () {
                    var e, t, n;
                    n = [];
                    for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) {
                        n.push(this.$el.append("<span class='far fa-star'></span>"))
                    }
                    return n
                };
                t.prototype.setRating = function (e) {
                    if (this.options.rating === e) {
                        e = void 0
                    }
                    this.options.rating = e;
                    this.syncRating();
                    return this.$el.trigger("starrr:change", e)
                };
                t.prototype.syncRating = function (e) {
                    var t, n, r, i;
                    e || (e = this.options.rating);
                    if (e) {
                        for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) {
                            this.$el.find("span").eq(t).removeClass("far").addClass("fas")
                        }
                    }
                    if (e && e < 5) {
                        for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) {
                            this.$el.find("span").eq(t).removeClass("fas").addClass("far")
                        }
                    }
                    if (!e) {
                        return this.$el.find("span").removeClass("fas").addClass("far")
                    }
                };
                return t
            }();
            return e.fn.extend({
                starrr: function () {
                    var t, r;
                    r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                    return this.each(function () {
                        var i;
                        i = e(this).data("star-rating");
                        if (!i) {
                            e(this).data("star-rating", i = new n(e(this), r))
                        }
                        if (typeof r === "string") {
                            return i[r].apply(i, t)
                        }
                    })
                }
            })
        })(window.jQuery, window);
        $(function () {
            return $(".starrr").starrr()
        })

        $(function () {
            $('.starrr').on('starrr:change', function (e, value) {
                $('#ratings-hidden').val(value);
            });
        });
    </script>
@stop

