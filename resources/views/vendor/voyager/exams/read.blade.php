@extends('voyager::master')
@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))
@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->getTranslatedAttribute('display_name_singular')) }}

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager::generic.edit') }}
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}"
                   title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore"
                   data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span
                        class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
                <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete"
                   data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span
                        class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                </a>
            @endif
        @endcan
        @can('browse', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                {{ __('voyager::generic.return_to_list') }}
            </a>
        @endcan
        @can('browse', $dataTypeContent)
            <button class="btn btn-dark" id="print-exam" type="button">In đề</button>
            <button class="btn btn-dark" id="print-answer" type="button">In đáp án</button>
        @endcan
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="container">
            <div style="background: #fff;padding: 50px 0;margin-bottom: 30px;">
                <div class="chitietdethi" id="HTMLtoPDF-exam" style="max-width: 900px;padding: 0 50px;">
                    <div class="head">
                        <div style="display: flex;justify-content: space-between;">
                            <div>
                                <h4>SỞ GIÁO DỤC VÀ ĐÀO TẠO</h4>
                                <p class="under_gach"></p>
                                <h5 class="dechinhthuc">{{ array_flip(\App\Models\Exam::STATUS)[$dataTypeContent->status] }}</h5>
                                <i>Ngày
                                    thi: {{ Carbon\Carbon::createFromFormat('Y-m-d', $dataTypeContent->date)->format('d/m/Y') }}</i>
                            </div>
                            <div>
                                <h4 class="tenkythi">{{ strtoupper($dataTypeContent->semester->name . ' ' . $dataTypeContent->grade->name) }}</h4>
                                <h5 class="dechinhthuc">MÔN: {{ strtoupper($dataTypeContent->subject->name) }}</h5>

                                <i>Thời gian làm bài: {{ $dataTypeContent->time }} phút</i>
                                <p class="under_gach2"></p>
                                <span class="made">MÃ ĐỀ: {{ $dataTypeContent->id }}</span>
                            </div>
                        </div>

                        <div class="thongtindethi ">Đề thi gồm {{ $dataTypeContent->num_question }} câu
                            (Từ câu hỏi 1 đến câu hỏi {{ $dataTypeContent->num_question }})
                        </div>
                    </div>
                    <table class="noidungdethi">
                        @foreach($dataTypeContent->questions as $key=>$question)
                            <tr>
                                <td class="tieudecauhoi" colspan="6">
                                    <span class="tendapan">Câu {{ $key + 1 }}:</span> {!! $question->content !!}
                                </td>
                            </tr>
                            <tr class="noidungchitietcauhoi">
                                @foreach($question->answers as $key=>$answer)
                                    <td style="padding-bottom: 25px;">
                                        <span class="tendapan">{{ chr(65 + $key) }}. </span><span>{!! $answer->answer !!}</span>
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

            <div style="background: #fff;padding: 50px 0;margin-bottom: 30px;">
                <div class="chitietdethi" style="padding: 0 50px;" id="HTMLtoPDF-answer">
                    <div class="row ketthucdethi">
                        <p style="font-size: 25px;">---------- ĐÁP ÁN MÃ ĐỀ {{ $dataTypeContent->id }} ----------</p>
                        @foreach($dataTypeContent->questions as $key=>$question)
                            @if(($key + 1) % 15 == 1)
                                <div class="col-md-3">
                                    @endif
                                    <div style="display: flex;padding: 10px; align-items: center;">
                                        <span style="width: 15%; text-align: left;">{{ $key + 1 }}. </span>
                                        <div class="correct-answer">
                                            @foreach($question->answers as $key2=>$answer)
                                                @if($answer->is_correct)
                                                <div style="position: relative;margin-right: 10px;">
                                                    <span class="answer" style="position: absolute">{{ chr(65 + $key2) }}</span>
                                                    <img style="width: 30px;height: 30px;border-radius: 100%;" src="/imgs/bg-gray.png">
                                                </div>
                                                @else
                                                    <span class="answer">{{ chr(65 + $key2) }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @if(($key + 1) % 15 == 0)
                                </div>
                            @endif
                        @endforeach
                        @if(($key + 1) % 15 != 0)
                    </div>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}
                        ?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

        $('#print-exam').click(function() {
            var mode = "iframe";
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $('#HTMLtoPDF-exam').printArea(options);
        });

        $('#print-answer').click(function() {
            var mode = "iframe";
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $('#HTMLtoPDF-answer').printArea(options);
        });
    </script>
@stop
