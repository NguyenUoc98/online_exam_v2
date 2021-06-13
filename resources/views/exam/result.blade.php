@extends('layouts.master')

@section('body')

    <div class="bg-white container my-10 pt-20 p-10">
        <h1 class="font-bold mb-10 text-5xl text-center">KẾT QUẢ BÀI THI</h1>

        <div class="flex">
            <div class="border max-h-screen mr-10 overflow-y-scroll py-20 w-2/3 bg-white">
                <div class="chitietdethi" style="max-width: 900px;padding: 0 50px;">
                    <div class="head">
                        <div style="display: flex;justify-content: space-between;">
                            <div>
                                <h4 class="m-0 text-2xl">SỞ GIÁO DỤC VÀ ĐÀO TẠO</h4>
                                <p class="under_gach"></p>
                                <h5 class="dechinhthuc m-0">{{ array_flip(\App\Models\Exam::STATUS)[$exam->status] }}</h5>
                                <i>Ngày
                                    thi: {{ Carbon\Carbon::createFromFormat('Y-m-d', $exam->date)->format('d/m/Y') }}</i>
                            </div>
                            <div>
                                <h4 class="tenkythi m-0 text-2xl">{{ strtoupper($exam->semester->name . ' ' . $exam->grade->name) }}</h4>
                                <h5 class="dechinhthuc m-0">MÔN: {{ strtoupper($exam->subject->name) }}</h5>

                                <i>Thời gian làm bài: {{ $exam->time }} phút</i>
                                <p class="under_gach2"></p>
                                <span class="made">MÃ ĐỀ: {{ $exam->id }}</span>
                            </div>
                        </div>

                        <div class="thongtindethi ">Đề thi gồm {{ $exam->num_question }} câu
                            (Từ câu hỏi 1 đến câu hỏi {{ $exam->num_question }})
                        </div>
                    </div>
                    <table class="noidungdethi">
                        @foreach($exam->questions as $key=>$question)
                            <tr>
                                <td class="tieudecauhoi" colspan="6">
                                    <span class="tendapan">Câu {{ $key + 1 }}:</span> {!! $question->content !!}
                                </td>
                            </tr>
                            <tr class="noidungchitietcauhoi">
                                @foreach($question->answers as $key=>$answer)
                                    <td style="padding-bottom: 25px;" class="relative w-1/4">
                                        @if(isset($userAnswer[$question->id]) && $userAnswer[$question->id] == $answer->id)
                                            <span class="answer p-3">{{ chr(65 + $key) }} </span><span>{!! $answer->answer !!}</span>
                                            @if($answer->is_correct)
                                                <img style="top: -9px; left: 14px;" class="absolute w-10" src="/imgs/tick.png">
                                            @else
                                                <img style="top: -5px; left: 8px;" class="absolute w-10" src="/imgs/x.png">
                                            @endif
                                        @else
                                            <span class="tendapan">{{ chr(65 + $key) }}. </span><span>{!! $answer->answer !!}</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                    <div class="ketthucdethi">
                        <p>---------- HẾT ----------</p>
                        <p>Thí sinh không được sử dụng tài liệu. Cán bộ coi thi không giải thích gì thêm.</p>
                    </div>
                </div>
            </div>

            <div class="w-1/3">
                <table class="bg-gray-400 bg-opacity-50 max-w-3xl mx-auto shadow-2xl table table-bordered text-2xl">
                    <tbody>
                    <tr>
                        <td class="font-bold">Thí sinh</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Kỳ Thi</td>
                        <td>{{ $exam->semester->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Môn Thi</td>
                        <td>{{ $exam->subject->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Điểm</td>
                        <td>{{ $result->score }} điểm</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Số câu đúng</td>
                        <td>{{ $result->num_correct }}/{{ $exam->num_question }} câu</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Hoàn thành</td>
                        <td>{{ $result->score * 10 }}%</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Xếp loại</td>
                        <td>{{ \App\Models\Result::ACADEMIC_POWER[$result->academic_power]['name'] }}</td>
                    </tr>
                    </tbody>
                </table>
                <p class="text-4xl text-center text-red-600">
                    @if($result->academic_power <= 5)
                        Cần cố gắng hơn nữa!!
                    @elseif($result->academic_power > 5 && $result->academic_power < 8)
                        Cần cố gắng!
                    @elseif($result->academic_power >= 8)
                        Làm tốt lắm !!!
                    @endif
                </p>
            </div>
        </div>
    </div>
@stop
