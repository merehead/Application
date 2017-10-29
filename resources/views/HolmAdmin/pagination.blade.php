@if ($paginator->hasPages())
    <div class="paginationContainer">
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="paginationArrow paginationArrow--left disabled"><span><i class="fa fa-angle-left"></i></span></a>
        @else
            <a><a class="paginationArrow paginationArrow--left" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="pagination__item disabled"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="pagination__item act"><span>{{ $page }}</span></a>
                    @else
                        <a><a class="pagination__item" href="{{ $url }}">{{ $page }}</a></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a><a class="pagination__item" href="{{ $paginator->nextPageUrl() }}" rel="next"><span><i class="fa fa-angle-right"></i></span></a></a>
        @else
            <a class="pagination__item disabled"><span><span><i class="fa fa-angle-right"></i></span></span></a>
        @endif
    </div>
    </div>
@endif