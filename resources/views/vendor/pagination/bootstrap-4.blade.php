@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-md d-flex justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled mr-2" aria-disabled="true" aria-label="@lang('pagination.previous')" >
                    <span class="page-link" aria-hidden="true" >&lsaquo;</span>
                </li>
            @else
                <li class="page-item mr-2">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="color:black">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled mr-2" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active mr-2" aria-current="page"><span class="page-link" style="color:black;background-color:yellow;border-color:yellow;">{{ $page }}</span></li>
                        @else
                            <li class="page-item mr-2" ><a class="page-link" href="{{ $url }}"  style="color:black">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item mr-2">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="color:black">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled mr-2" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

