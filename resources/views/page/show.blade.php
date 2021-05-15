@extends('layouts.master')
@section('body')
    <div class="container-fluid tintuc">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tieudetintuc">
                    <h3>{{ $page->title }}</h3>
                </div>
            </div>
            {!! $page->body !!}
        </div>
    </div>
@stop
