@extends('layouts.master')

@section('body')
    <div class="bg-white container my-10 p-10">
        <h1 class="font-bold mb-10 text-4xl text-center">KẾT QUẢ BÀI THI</h1>
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
@stop
