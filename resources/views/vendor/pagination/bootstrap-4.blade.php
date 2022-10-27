@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">

            {{-- Previous Page Arrow Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled m-1" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="btn btn-secondary" aria-hidden="true">
                        <i class="fa fa-arrow-left" style="text-shadow: 2px 2px black;"></i>
                    </span>
                </li>
            @else
                <li class="page-item m-1">
                    <a class="btn btn-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="fa fa-arrow-left" style="text-shadow: 2px 2px black;"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        {{-- First Page Link --}}
                        @if ($loop->first)
                            <li class="page-item m-1">
                                <a class="btn btn-secondary" href="{{ $paginator->url(1) }}" style="text-shadow: 2px 2px black;">First</a>
                            </li>
                        @endif

                        @if ($page == $paginator->currentPage())
                            {{--If we are not on the first page, display the previous page number button--}}
                            @if (!$paginator->onFirstPage())
                                <li class="page-item m-1">
                                    <a class="btn btn-secondary" href="{{ $paginator->url($page - 1) }}" style="text-shadow: 2px 2px black;">{{ $page - 1 }}</a>
                                </li>
                            @endif
                            
                            {{-- Display the current page number button --}}
                            <li class="page-item active m-1" aria-current="page">
                                <span class="btn btn-primary text-white" style="text-shadow: 2px 2px black;">{{ $page }}</span>
                            </li>

                            {{--If we are not on the last page, display the next page number button--}}
                            @if ($paginator->currentPage() != count($element))
                                <li class="page-item m-1">
                                    <a class="btn btn-secondary" href="{{ $paginator->url($page + 1) }}" style="text-shadow: 2px 2px black;">{{ $page + 1}}</a>
                                </li>
                            @endif
                        @endif

                        {{-- Last Page Link --}}
                        @if ($loop->last)
                            <li class="page-item m-1">
                                <a class="btn btn-secondary" href="{{ $paginator->url(count($element)) }}" style="text-shadow: 2px 2px black;">Last</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item m-1">
                    <a class="btn btn-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="fa fa-arrow-right" style="text-shadow: 2px 2px black;"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled m-1" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="btn btn-secondary" aria-hidden="true">
                        <i class="fa fa-arrow-right" style="text-shadow: 2px 2px black;"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
