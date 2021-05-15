@extends('voyager::master')
@section('page_title', __('voyager::generic.view').' '.$dataType->getTranslatedAttribute('display_name_singular'))
<style>
    .chitietdethi {
        /*border: 1px solid #000;*/
        text-align: center;
        margin-top: 0px;
        margin-bottom: 50px;
        font-family: "Times New Roman", Times, serif;
        background: #fff;
        color: #000;
    }

    .head h4, h5 {
        font-weight: bold;
        margin-top: 20px;
    }

    .under_gach {
        border-bottom: 1.5px solid #000;
        width: 150px;
        margin: auto;
    }

    .under_gach2 {
        border-bottom: 1.5px solid #000;
        width: 200px;
        margin: auto;
    }

    .dechinhthuc {
        font-size: 15px;
        text-transform: uppercase;
    }

    .tenkythi {
        text-transform: uppercase;
    }

    .head {
        margin-top: 30px;
    }

    .head i {
        font-size: 15px;
    }

    .made {
        padding: 7px 50px;
        border: 2px solid;
        font-weight: bold;
    }

    .noidungdethi {
        margin-bottom: 30px;
    }

    .cauhoidethi {
        margin-top: 10px;
    }

    .noidungdethi .tieudecauhoi {
        text-align: left;
        margin-left: -23px;
        font-size: 16px;
    }

    .thongtindethi {
        font-weight: bold;
        font-size: 17px;
        margin-left: -45px;
    }

    .noidungchitietcauhoi {
        font-size: 16px;
        margin-left: -108px;
        text-align: left;
    }

    .tendapan {
        font-weight: bold;
        margin-right: 5px;
    }

    .ketthucdethi {
        font-weight: bold;
        font-size: 16px;
        margin-top: 30px;
    }

    .noidungdethi, .head {
        margin-left: 20px;
    }

    .design_cauhoi a {
        color: #fff;
    }

    .design_cauhoi .btn-primary {
        margin-right: 5px;
    }

    span p {
        display: inline;
    }

    .tieudecauhoi p {
        display: inline;
    }

    .correct-answer {
        display: flex;
        width: -webkit-fill-available;
    }

    .answer {
        border: 1px solid;
        border-radius: 100%;
        width: 30px;
        height: 30px;
        line-height: 30px;
        margin-right: 10px;
    }

    .bg-gray {
        background: gray;
    }
</style>
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
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="container">
            <div class="container chitietdethi" id="HTMLtoPDF">
                <div class="row head">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>SỞ GIÁO DỤC VÀ ĐÀO TẠO</h4>
                            <p class="under_gach"></p>
                            <h5 class="dechinhthuc">{{ array_flip(\App\Models\Exam::STATUS)[$dataTypeContent->status] }}</h5>
                            <i>Ngày
                                thi: {{ Carbon\Carbon::createFromFormat('Y-m-d', $dataTypeContent->date)->format('d/m/Y') }}</i>
                        </div>
                        <div class="col-md-6">
                            <h4 class="tenkythi">{{ strtoupper($dataTypeContent->semester->name . ' ' . $dataTypeContent->grade->name) }}</h4>
                            <h5 class="dechinhthuc">MÔN: {{ strtoupper($dataTypeContent->subject->name) }}</h5>

                            <i>Thời gian làm bài: {{ $dataTypeContent->time }} phút</i>
                            <p class="under_gach2"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"><span class="made">MÃ ĐỀ: {{ $dataTypeContent->id }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 thongtindethi ">Đề thi gồm {{ $dataTypeContent->num_question }} câu
                            (Từ câu hỏi 1 đến câu hỏi {{ $dataTypeContent->num_question }})
                        </div>
                    </div>
                </div>
                <div class="row noidungdethi">
                    {{-- duyệt mãng ctđề thi --}}
                    @foreach($dataTypeContent->questions as $key=>$question)
                        <div class="cauhoidethi">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 tieudecauhoi">
                                    <span class="tendapan">Câu {{ $key + 1 }}:</span> {!! $question->content !!}
                                </div>
                            </div>
                            <div class="row noidungchitietcauhoi">
                                <div class="col-md-2"></div>
                                @foreach($question->answers as $key=>$answer)
                                    <div class="col-md-2">
                                        <span
                                            class="tendapan">{{ chr(65 + $key) }}. </span><span>{!! $answer->answer !!}</span>
                                    </div>
                                @endforeach
                                <div class="col-md-2"></div>
                            </div>
                        </div>

                    @endforeach

                    <div class="row ketthucdethi">
                        <div class="col-md-12">---------- HẾT ----------</div>
                        <div class="col-md-12">Thí sinh không được sử dụng tài liệu. Cán bộ coi thi không giải
                            thích gì thêm.
                        </div>
                    </div>
                </div>
            </div>

            <div class="container chitietdethi" id="HTMLtoPDF2">
                <div class="row ketthucdethi" style="margin: 0px 50px;">
                    <div class="col-md-12" style="margin-top: 50px">---------- ĐÁP ÁN MÃ ĐỀ {{ $dataTypeContent->id }} ----------
                    </div>
                    @foreach($dataTypeContent->questions as $key=>$question)
                        @if(($key + 1) % 10 == 1)
                            <div class="col-md-3">
                                @endif
                                <div style="display: flex;padding: 10px; align-items: center;">
                                    <span style="width: 15%; text-align: left;">{{ $key + 1 }}. </span>
                                    <div class="correct-answer">
                                        @foreach($question->answers as $key2=>$answer)
                                            <span
                                                class="answer @if($answer->is_correct) bg-gray @endif">{{ chr(65 + $key2) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                @if(($key + 1) % 10 == 0)
                            </div>
                        @endif
                    @endforeach
                        @if(($key + 1) % 10 != 0)
                            </div>
                        @endif
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

        function HTMLtoPDF() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            source = $('#HTMLtoPDF')[0];
            specialElementHandlers = {
                '#bypassme': function (element, renderer) {
                    return true
                }
            }
            margins = {
                top: 50,
                left: 60,
                width: 545
            };
            pdf.fromHTML(
                source // HTML string or DOM elem ref.
                , margins.left // x coord
                , margins.top // y coord
                , {
                    'width': margins.width // max width of content on PDF
                    , 'elementHandlers': specialElementHandlers
                },
                function (dispose) {
                    // dispose: object with X, Y of the last line add to the PDF
                    //          this allow the insertion of new lines after html
                    pdf.save('html2pdf.pdf');
                }
            )
        }
    </script>
@stop
