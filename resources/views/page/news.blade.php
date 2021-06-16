@extends('layouts.master')
@section('body')
    <div class="container-fluid tintuc">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tieudetintuc">
                    <h3> TIN TỨC VÀ SỰ KIỆN</h3>
                </div>
            </div>

            @forelse($news as $new)
                <div class="row tintuc_first">
                    <div class="col-md-2 col_ngaydang">
                        <span class="ngaydang">{{ \Carbon\Carbon::parse($new->created_at)->format('M d,Y') }}</span>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ $new->link }}"><img src="{{ Voyager::image($new->image) }}" class="img_tintuc" alt=""></a>
                    </div>
                    <div class="col-md-5 trichdoan">
                        <a href="{{ $new->link }}" style="color: #000">
                            <h4>{{ $new->title }}</h4>
                        </a>
                        <p>{{ $new->description }}</p>
                    </div>
                </div>
            @empty
                <div class="bg-gray-200 col-span-5 flex h-60 items-center justify-center mt-2 w-full">
                    Không có nội dung
                </div>
            @endforelse

            {!! $news->links() !!}
        </div>
    </div>

@stop

