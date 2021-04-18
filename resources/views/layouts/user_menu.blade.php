@foreach($items as $menuItem)
    <p><a class="flex items-center justify-between px-10" href="{{ $menuItem->link() }}"><b>{{ $menuItem->title }}</b> <i class="fas fa-chevron-right"></i></a></p>
@endforeach
