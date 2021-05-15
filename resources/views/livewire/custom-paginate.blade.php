@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span class="rounded-full mx-1 cursor-pointer">&laquo;</span></li>
        @else
            <li><a wire:click="previousPage" rel="prev" class="cursor-pointer rounded-full mx-1 hover:bg-blue-400 hover:border-blue-400 hover:text-white">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span class="rounded-full mx-1 cursor-pointer">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="rounded-full mx-1 bg-blue-800 border-blue-800 text-white font-bold text-center hover:bg-blue-400 hover:border-blue-400 cursor-pointer">{{ $page }}</span></li>
                    @else
                        <li><a wire:click="gotoPage({{$page}})" class="cursor-pointer rounded-full mx-1 hover:bg-blue-400 hover:border-blue-400 hover:text-white">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a wire:click="nextPage" rel="next" class="cursor-pointer rounded-full mx-1 hover:bg-blue-400 hover:border-blue-400 hover:text-white">&raquo;</a></li>
        @else
            <li class="disabled"><span class="rounded-full mx-1 cursor-pointer">&raquo;</span></li>
        @endif
    </ul>
@endif
