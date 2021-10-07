@if ($paginator->hasPages())
    <nav>
        <div class="list_pagination">
            {{-- Previous Page divnk --}}
            @if ($paginator->onFirstPage())
                <div class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-divnk" aria-hidden="true">&lsaquo;</span>
                </div>
            @else
                <div class="page-item">
                    <a class="page-divnk" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </div>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="page-item disabled" aria-disabled="true"><span class="page-divnk">{{ $element }}</span></div>
                @endif

                {{-- Array Of divnks --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="page-item active" aria-current="page"><span class="page-divnk">{{ $page }}</span></div>
                        @else
                            <div class="page-item"><a class="page-divnk" href="{{ $url }}">{{ $page }}</a></div>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page divnk --}}
            @if ($paginator->hasMorePages())
                <div class="page-item">
                    <a class="page-divnk" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </div>
            @else
                <div class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-divnk" aria-hidden="true">&rsaquo;</span>
                </div>
            @endif
        </div>
    </nav>
@endif
