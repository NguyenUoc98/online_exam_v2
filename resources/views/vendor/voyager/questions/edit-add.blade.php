@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered panel-success">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

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

                            <!-- Adding / Editing -->

                            @if ($add)
                            <div class="row col-md-12">
                                <div class="form-group col-md-4">
                                    <label>Số lượng đáp án</label>
                                    <div style="display: inline-flex; align-items: center;">
                                        <input class="form-control" type="number" id="num_answer" min="2" value="{{ $num_answer }}">
                                        <button type="button" class="btn btn-dark" id="add-answer" style="margin-left: 15px">
                                            <i class="voyager-plus"></i> Thêm đáp án
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                                $formFields = [];
                                if(in_array("App\Traits\FormLayoutTrait", class_uses($dataTypeContent))){
                                    $formFields = $dataTypeContent->formFields();
                                }
                            @endphp

                            @if(!empty($formFields))
                                @foreach($formFields as $field)
                                    @php
                                        $type = $field['type'];
                                    @endphp

                                    @if($type == 'subView')
                                        @include($field['name'], $field['params'])
                                    @elseif($type == 'html')
                                        {!! $field['content'] !!}
                                    @elseif ($type != ':voyager')
                                        @php
                                            $isEnd = $field['isEnd'];

                                            if(!$isEnd){
                                                $attributes = isset($field['options']) ? collect($field['options'])->map(function($value, $key) {
                                                    return "$key='$value'";
                                                })->implode(' ') : '';

                                                $text = isset($field['text']) ? $field['text'] : '';
                                                echo "<$type $attributes>$text";

                                            }else{
                                                echo "</$type>";
                                            }
                                        @endphp
                                    @else
                                        @php
                                            $row = $dataTypeRows->filter(function ($row, $key) use ($field) {
                                                return $field['name'] === $row->field;
                                            })->first();
                                            if (!$row) {
                                                continue;
                                            }
                                            $display_options = $row->details->display ?? NULL;
                                            if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                                $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                            }
                                        @endphp
                                        @if (isset($row->details->legend) && isset($row->details->legend->text))
                                            <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                        @endif

                                        <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $field['grid'] ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            {{ $row->slugify }}
                                            <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if (isset($row->details->view))
                                                @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add')])
                                            @elseif ($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', ['view' => $edit ? 'edit' : 'add', 'options' => $row->details])
                                            @else
                                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            @endif

                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                            @endforeach
                                            @if ($errors->has($row->field))
                                                @foreach ($errors->get($row->field) as $error)
                                                    <span class="help-block">{{ $error }}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                @foreach($dataTypeRows as $row)
                                    @php
                                        $display_options = $row->details->display ?? NULL;
                                        if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                            $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                        }
                                    @endphp
                                    @if (isset($row->details->legend) && isset($row->details->legend->text))
                                        <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                    @endif

                                    <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $field['grid'] ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        {{ $row->slugify }}
                                        <label class="control-label" for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if (isset($row->details->view))
                                            @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add')])
                                        @elseif ($row->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['options' => $row->details])
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                        @if ($errors->has($row->field))
                                            @foreach ($errors->get($row->field) as $error)
                                                <span class="help-block">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            @endif

                            @if($add)
                                @for($i=1; $i<=$num_answer; $i++)
                                    <div class="form-group col-md-6">
                                        <div style="color: #000;display: inline-flex;align-items: center;margin-bottom: 7px;">
                                            <span style="margin-right: 15px;">Đáp án {{$i}}</span>
                                            @include('voyager::formfields.checkbox', ['row' => (object)['field' => "answer[$i][is_correct]"], 'options' => (object)['on' => 'Đúng', 'off' => 'Sai', 'checked' => false]])
                                        </div>
                                        @php
                                            $option1 = new stdClass();
                                            $option1->height = 100;
                                            $option1->min_height = 100;
                                            $option1->resize = false;
                                            $option['tinymceOptions'] = $option1;
                                        @endphp
                                        @include('voyager::formfields.rich_text_box', ['row' => (object)['field' => "answer[$i][answer]"], 'options' => (object) $option])
                                    </div>
                                @endfor
                            @else
                                @foreach($answers as $key=>$answer)
                                    <div class="form-group col-md-6">
                                        <div style="color: #000;display: inline-flex;align-items: center;margin-bottom: 7px;">
                                            <span style="margin-right: 15px;">Đáp án {{ $key+1 }}</span>
                                            @php
                                            if($answer->is_correct) {
                                                $options = ['on' => 'Đúng', 'off' => 'Sai', 'checked' => true];
                                            } else {
                                                $options = ['on' => 'Đúng', 'off' => 'Sai', 'checked' => false];
                                            }
                                            @endphp
                                            @include('voyager::formfields.checkbox', ['row' => (object)['field' => "answer[$key][is_correct]"], 'options' => (object) $options])
                                        </div>
                                        @php
                                            $option1 = new stdClass();
                                            $option1->height = 100;
                                            $option1->min_height = 100;
                                            $option1->resize = false;
                                            $option['tinymceOptions'] = $option1;
                                            $dataTypeContent['answer[' . $key . '][answer]'] = $answer->answer;
                                        @endphp
                                        @include('voyager::formfields.rich_text_box', ['row' => (object)['field' => "answer[$key][answer]"], 'options' => (object) $option, 'dataTypeContent' => (object) $dataTypeContent])
                                    </div>
                                @endforeach
                            @endif

                            @section('submit-buttons')
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary save pull-right" style="margin-top: 20px">
                                        {{ __('voyager::generic.save') }}
                                    </button>
                                </div>
                            @stop
                            @yield('submit-buttons')
                        </div><!-- panel-body -->
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.'.$dataType->slug.'.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });

        $('#add-answer').click(function () {
            var url = "{{ route('voyager.questions.create') }}" + '?num_answer=' + $('#num_answer').val();
            location.replace(url);
        });
    </script>
@stop
