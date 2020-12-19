@if ($paginator->hasPages())
<ul class="page-navigation">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="first disabled"><a><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a></li>
    @else
        <li class="first"><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a></li>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="first"><a><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="current-page"><a>{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="last"><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></li> --}}
    @else
        <li class="last"><a><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></li> --}}
    @endif
  </ul>
@endif
