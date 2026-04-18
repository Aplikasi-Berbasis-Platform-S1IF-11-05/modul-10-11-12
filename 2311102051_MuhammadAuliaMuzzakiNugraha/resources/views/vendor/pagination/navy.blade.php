@if ($paginator->hasPages())
    <nav class="pager-shell" role="navigation" aria-label="Pagination Navigation">
        <div class="pager-wrap">
            <p class="pager-info">
                {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }} entries
            </p>

            <div class="pager-nav">
                @if ($paginator->onFirstPage())
                    <span class="pager-btn is-disabled" aria-disabled="true">&lt; Prev</span>
                @else
                    <a class="pager-btn" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt; Prev</a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="pager-ellipsis">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="pager-btn is-active" aria-current="page">{{ $page }}</span>
                            @else
                                <a class="pager-btn" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a class="pager-btn" href="{{ $paginator->nextPageUrl() }}" rel="next">Next &gt;</a>
                @else
                    <span class="pager-btn is-disabled" aria-disabled="true">Next &gt;</span>
                @endif
            </div>
        </div>
    </nav>
@endif
