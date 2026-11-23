@if ($paginator->hasPages())
    <div class="custom-pagination">

        @if ($paginator->onFirstPage())
            <span class="page-disabled">‹ Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">‹ Previous</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="page-disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Next ›</a>
        @else
            <span class="page-disabled">Next ›</span>
        @endif

    </div>
@endif
