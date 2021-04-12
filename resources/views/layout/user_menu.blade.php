@foreach($items as $menuItem)
    <p><a href="{{ $menuItem->link() }}"><b>{{ $menuItem->title }}</b> <i class="fas fa-chevron-right"></i></a></p>
@endforeach
