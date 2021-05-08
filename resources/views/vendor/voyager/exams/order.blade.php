@extends('voyager::master')

@section('page_title', 'Sắp xếp câu hỏi')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i>Sắp xếp câu hỏi
    </h1>
@stop

<style>
    .answer {
        display: flex;
        margin-bottom: 0!important;
    }
    .correct-answer {
        color: red;
    }
</style>

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p class="panel-title" style="color:#777">{{ __('voyager::generic.drag_drop_info') }}</p>
                    </div>

                    <div class="panel-body" style="padding:30px;">
                        <div class="dd">
                            <ol class="dd-list">
                                @foreach ($results as $result)
                                    <li class="dd-item" data-id="{{ $result->getKey() }}">
                                        <div class="dd-handle" style="height:inherit">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! $result->content !!}
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach($result->answers as $key=>$answer)
                                                <div class="col-md-3 answer @if($answer->is_correct) correct-answer @endif">
                                                    <span>{{ chr(65 + $key) }}.</span> {!! $answer->answer !!}
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')

    <script>
        $(document).ready(function () {
            $('.dd').nestable({
                maxDepth: 1
            });

            /**
             * Reorder items
             */
            $('.dd').on('change', function (e) {
                $.post("{{ route('voyager.exams.update-order-question', $id) }}", {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '{{ csrf_token() }}'
                }, function (data) {
                    toastr.success("{{ __('voyager::bread.updated_order') }}");
                });
            });
        });
    </script>
@stop
