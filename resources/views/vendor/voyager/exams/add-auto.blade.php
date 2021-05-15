@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Thêm Đề thi')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-file-text"></i>
        {{ 'Thêm Đề thi' }}
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered panel-success">
                    <!-- form start -->
                    <form role="form"
                          class="form-edit-add"
                          action="{{ route('voyager.exams.create-auto', $data->id) }}"
                          method="POST" enctype="multipart/form-data">

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div style="color:#000">
                                <table style="margin: auto">
                                    <tr>
                                        <td colspan="2" style="text-align: center;font-size: large; font-weight: 700; padding-bottom: 20px">LỰA CHỌN SỐ LƯỢNG CÂU HỎI</td>
                                    </tr>
                                    @foreach($questions as $key=>$level)
                                        <tr>
                                            <td style="width:30%; padding: 7px 0;font-weight: 600;">{{ \App\Models\Level::find($key)->name }}</td>
                                            <td style="padding: 7px 0;"><input type="number" name="{{ $key }}" max="{{ $level }}" style="width: 50%; text-align: center" value="1"/> / {{ $level }} câu có sẵn</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2" style="text-align: center">Số lượng câu cần thiết lập: {{ $data->num_question }} câu</td>
                                    </tr>
                                </table>
                            </div>
                                @section('submit-buttons')
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary save" style="margin-top: 20px; padding: 6px 80px;">
                                            Tạo đề
                                        </button>
                                    </div>
                                @stop
                                @yield('submit-buttons')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

