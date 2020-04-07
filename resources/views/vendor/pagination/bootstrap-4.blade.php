@if ($paginator->hasPages())
    <nav class="blog-pagination justify-content-center d-flex">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

                <li class="page-item">
                    <a class="page-link" aria-label="Previous">
                            <span aria-hidden="true">
                                    <i class="ti-angle-left"></i>
                            </span>
                     </a>
                </li>
    
            @else
            
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"  rel="prev" aria-label="Previous">
                            <span aria-hidden="true">
                                    <i class="ti-angle-left"></i>
                            </span>
                     </a>
                </li>


           @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))

                <li class="page-item disabled"><a href="#" class="page-link">{{ $element }}</a></li>

                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            
                            <li class="page-item active"><a href="#" class="page-link">{{ $page }}</a></li>

                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

            <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="Next">
                        <span aria-hidden="true">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
            </li>
            @else

            <li class="page-item disabled">
                    <a class="page-link" rel="next" aria-label="Next">
                        <span aria-hidden="true">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
            </li>
              
            @endif
        </ul>
    </nav>
@endif

