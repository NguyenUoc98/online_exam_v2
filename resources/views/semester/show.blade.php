@extends('admin.layout.index');
@section('body')
    <div class="container thiTHPTQG">
        <div class="row main_test">
            <div class="col-md-12">
                <div class="col-md-12 tieudetintuc">
                    <h3>{{ $semester->name }}</h3>
                </div>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="row hinhanh">
                            @foreach($exams as $exam)
                                <a href="{{ route('exam.show', $exam->id) }}" style="color: #000">
                                    <div class="col-md-3 dethi">
                                        <img src="{{ Voyager::image($exam->subject->image) }}" width="199" height="150" alt="">
                                        <p class="tenmon">{{ $exam->subject->name }}</p>
                                        <p class="title">Đề thi {{ $semester->name }} gồm {{ $exam->num_question }} câu, thời gian
                                            thi {{ $exam->time }} phút</p>
                                        <p class="danhgia">

                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="far fa-star"></i>
                                            <i class="fas fa-users hscmt"></i> 134
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="phantrangtintuc">
            {{ $exams->links() }}
        </div>
    </div>
@stop
