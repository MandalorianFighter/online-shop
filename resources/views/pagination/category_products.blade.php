<div class="shop_page_nav d-flex flex-row">
@if ($paginator->hasPages())
    
       
        @if ($paginator->onFirstPage())
        <div class="disabled page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
        @else
            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-chevron-left"></i></a></div>
        @endif

        <ul class="page_nav d-flex flex-row">
      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a>{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        </ul>
        
        @if ($paginator->hasMorePages())
            <div class="page_next d-flex flex-column align-items-center justify-content-center"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-chevron-right"></i></a></div>
        @else
            <div class="disabled page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
        @endif
    
@endif 
</div>
