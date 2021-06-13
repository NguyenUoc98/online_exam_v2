@extends('layouts.master');
@section('body')
    <div class="container-fluid tintuc">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tieudetintuc">
                    <h3> TÀI LIỆU</h3>
                </div>
            </div>

            @forelse($documents as $document)
            <div class="row tintuc_first">
                <div class="col-md-2 col_ngaydang">
                    <span class="ngaydang">{{ \Carbon\Carbon::parse($document->created_at)->format('M d,Y') }}</span>
                </div>
                <div class="col-md-4">
                    <a href="{{ $document->link }}"><img src="{{ Voyager::image($document->image) }}" class="img_tintuc" alt=""></a>
                </div>
                <div class="col-md-5 trichdoan">
                    <a href="{{ $document->link }}" style="color: #000">
                        <h4>{{ $document->title }}</h4>
                    </a>
                    <p>{{ $document->description }}</p>
                </div>
            </div>
            @empty
                <div class="bg-gray-200 col-span-5 flex h-60 items-center justify-center mt-2 w-full">
                    Không có nội dung
                </div>
            @endforelse

            {!! $documents->links() !!}
        </div>
    </div>

@stop

