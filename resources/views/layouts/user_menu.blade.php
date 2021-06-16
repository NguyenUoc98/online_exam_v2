@foreach($items as $menuItem)
    <a class="border-b-2 border-black flex items-center justify-between px-10" href="{{ $menuItem->link() }}"><b>{{ $menuItem->title }}</b> <i class="fas fa-chevron-right"></i></a>
@endforeach

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="flex items-center justify-between px-10 ">
    @csrf
    <button type="submit" class="font-bold" style="width: 100%; text-align: left;outline: none; box-shadow: none;">Đăng xuất</button>
    <i class="fas fa-sign-out-alt"></i>
</form>
