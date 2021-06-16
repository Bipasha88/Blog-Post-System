@if($paginator->hasPages())

    <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center flex justify-between">
            <li  class="page-item">
                <a  class="page-link" href="{{ url()->previous() }}" rel="prev">Previous</a>
            </li>


            @foreach ($elements as $element)

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ( $page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="{{$paginator->Url($page)}}">{{$page}}
                                        <span class="sr-only">(current)</span></a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{$paginator->Url($page)}}">{{$page}}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif

            @endforeach



            <li class="page-item">
                <a  class="page-link" href="{{  $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        </ul>
    </nav>

@endif
