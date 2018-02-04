@if ($paginator->hasPages())
<div class="tl-pagination-row">
    <!--Pagination Listed Start-->
    <ul class="tl-pagination-listed">
        <li class="prev-btn">
        @if ($paginator->onFirstPage())
        <a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <li class="next-btn">
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        @else
            <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        @endif
        </li>
    </ul><!--Pagination Listed End-->
</div>
@endif
