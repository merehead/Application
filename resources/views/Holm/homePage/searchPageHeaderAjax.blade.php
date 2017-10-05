
    <p class="resultHeader__info">Showing {{(($page*$perPage)-$perPage==0)?'1':($page*$perPage)-$perPage}}-{{($carerResultCount<$perPage)?$page*$carerResultCount:$page*$perPage}} of {{$carerResultCount}} CARERs</p>
    <div class="sortLink">
        SEARCH BY &nbsp; <a href="#" class="sortLink__item  sort-rating"> <span> </span> rating
        </a>
        <p> &nbsp; - &nbsp; </p>
        {{--@for ($pages = 1; $pages <= ceil($carerResultCount/$perPage); $pages++)--}}
            {{--<a class="sortLink__item {{($pages==$page)?'active':''}} " href="/search/page/{{ $pages }}">--}}
                {{--{{ $pages }}--}}
            {{--</a>--}}
            {{--<span class="sortLink__separate"></span>--}}
    {{--@endfor--}}
    <!--<span class="sortLink__separate">

                        </span>
                        -->
        <a href="#" class="sortLink__item sort-id">
            MOST RECENT
        </a>
    </div>
