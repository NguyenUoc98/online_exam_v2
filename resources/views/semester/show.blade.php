@extends('layouts.master');
@section('body')
    <div class="container thiTHPTQG">
        <div class="main_test">
            <div class="tieudetintuc">
                <h3>{{ $semester->name }}</h3>
            </div>
        </div>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active mb-20">
                @livewire('semester-exams', ['semester' => $semester])
            </div>
        </div>
    </div>
@stop
