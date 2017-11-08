<script>
    $(document).ready(function(){

        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "+0D",
            maxDate: "+20Y",
            yearRange: "0:+10"
        });

    });
</script>
<section class="searchSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="/search" class="breadcrumbs__item">
                Search results
            </a>

        </div>
        {!! Form::model($carerResult, ['method'=>'POST','route'=>'searchPagePost','id'=>'carerSearchForm']) !!}
        {!! Form::hidden('stage','carerSearch') !!}
        <input type="hidden" name="sort-rating" id="sort-rating" value="0">
        <input type="hidden" name="sort-rating-order" id="sort-rating-order" value="asc">

        <input type="hidden" name="sort-id" id="sort-id" value="0">
        <input type="hidden" name="sort-id-order" id="sort-id-order" value="asc">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="filterHead filterBox">
                    <h2 class="filterHead__title">Filter</h2>
                    <a href="#" class="filterHead__link">
                        Filter by
                        <span><i class="fa fa-angle-down"></i></span>
                    </a>
                </div>
                <div class="searchFilter hiddenFilter filterBox hiddenFilter--visible">
                    <div class="filterGroup">
                        <h2 class="filterGroup__title">
                            type of care
                        </h2>
                        <a href="#" class="filterGroup__link">type of care
                            <span><i class="fa fa-angle-down"></i></span>
                        </a>
                        <div class="filterGroup__box filterGroup__box--active">
                            @foreach($typeCare as $care)
                                <div class="checkBox_item">

                                    {!! Form::checkbox('typeCare['.$care->id.']', null,((isset($requestSearch['typeCare']))&&in_array($care->id,$requestSearch['typeCare'])? 1 : null),
                                                array('class' => 'customCheckbox ','id'=>'typeCarebox'.$care->id,'onclick'=>"$('#load-more').val(0);carerSearchAjax()")) !!}
                                    <label for="typeCarebox{{$care->id}}">{{$care->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filterGroup">
                        <h2 class="filterGroup__title">
                            OTHER PREFERENCES
                        </h2>
                        <a href="#" class="filterGroup__link"> OTHER PREFERENCES
                            <span><i class="fa fa-angle-down"></i></span>
                        </a>
                        <div class="filterGroup__box filterGroup__box--active">
                            <div class="checkBox_item">
                                {!! Form::checkbox('gender[Male]', null,((isset($requestSearch['gender']))&&in_array('Male',$requestSearch['gender'])? 1 : null),
                                                array('class' => 'customCheckbox ','id'=>'boxgender1','onclick'=>"$('#load-more').val(0);carerSearchAjax()")) !!}
                                <label for="boxgender1">male</label>
                            </div>
                            <div class="checkBox_item">

                                {!! Form::checkbox('gender[Female]', null,((isset($requestSearch['gender']))&&in_array('Female',$requestSearch['gender'])? 1 : null),
                                                array('class' => 'customCheckbox ','id'=>'boxgender2','onclick'=>"$('#load-more').val(0);carerSearchAjax()")) !!}
                                <label for="boxgender2">female</label>
                            </div>
                            <div class="checkBox_item">

                                {!! Form::checkbox('have_car', null,((isset($requestSearch['have_car']))? 1 : null),
                                               array('class' => 'customCheckbox ','id'=>'have_car','onclick'=>"$('#load-more').val(0);carerSearchAjax()")) !!}
                                <label for="have_car">HAS OWN TRANSPORT</label>
                            </div>
                            <div class="checkBox_item">
                                {!! Form::checkbox('work_with_pets', null,((isset($requestSearch['work_with_pets']))? 1 : null),
                                               array('class' => 'customCheckbox ','id'=>'work_with_pets','onclick'=>"$('#load-more').val(0);carerSearchAjax()")) !!}
                                <label for="work_with_pets">WORKS WITH PETS</label>
                            </div>
                        </div>
                    </div>
                    <div class="filterGroup filterGroup--languages">
                        <h2 class="filterGroup__title">
                            Languages
                        </h2>
                        <a href="#" class="filterGroup__link"> Languages
                            <span><i class="fa fa-angle-down"></i></span>
                        </a>
                        <div class="filterGroup__box filterGroup__box--active">
                            <div class="scrollFilter">
                                @foreach($languages as $lang)
                                    <div class="checkBox_item">
                                        {!! Form::checkbox('language['.$lang->id.']', null,((isset($requestSearch['language']))&&in_array($lang->id,$requestSearch['language'])? 1 : null),
                                               array('class' => 'customCheckbox ','id'=>'languagebox'.$lang->id,'onclick'=>"$('#load-more').val(0);carerSearchAjax()")) !!}

                                        <label for="languagebox{{$lang->id}}">{{$lang->carer_language}} </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="filterHead filterHead--xs-column filterBox">
                    <a href="#" class="sortLinkXs">sort by <span><i class="fa fa-angle-down"></i></span></a>
                    <div class="sortFilters hiddenSort hiddenSort--visible">
                        <div class="sortFilters__item">
                            {!! Form::text('postCode',(isset($requestSearch['postCode'])?$requestSearch['postCode']:''),['class'=>'sortField disable','placeholder'=>'POST CODE','maxlength'=>16,'onkeydown'=>"if(event.keyCode==13){carerSearchAjax();}"]) !!}
                            <span class="fieldIco"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        </div>
                        <div class="sortFilters__item">
                            <input type="text" name="findDate" onchange="carerSearchAjax();" class="sortField datepicker" placeholder="DATE">
                            <span class="fieldIco"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </div>
                        <div class="sortFilters__item">
                            {!! Form::select('typeService',[''=>'TYPE OF SERVICE','1'=>'SINGLE / REGULAR VISITS','2'=>'LIVE IN CARE','3'=>'RESPITE CARE'],null,['id'=>'typeService','class'=>'formSelect','onchange'=>"$('#load-more').val(0);carerSearchAjax()"]) !!}
                        </div>
                    </div>
                </div>

                <div class="resultHeader Paginator">
                    <p class="resultHeader__info">Showing {{($page*$perPage)<$countAll?$page*$perPage:$countAll}} of {{$countAll}} CARERS</p>
                    <div class="sortLink">
                        SORT BY <a href="#" class="sortLink__item sort-rating"> <span> </span> rating
                        </a>
                        <p> &nbsp; - &nbsp; </p>
                        <a href="#" class="sortLink__item sort-id">
                            MOST RECENT
                        </a>
                    </div>
                </div>
                <div class="card error-text result {{count($carerResult)>0?"nhide":""}}">
                    <div class="card-block">
                    <p class="text-uppercase">Sorry</p>
                        <p class="text-left">
                            No Carers meet your exact criteria.
                            Please try again by deselecting the least important requirements,
                            or <a href="{{route('ContactPage')}}">contact us</a> if you need further help
                        </p>
                        {{--<p>Hi!</p>--}}
                        {{--<p>We’re sorry, but we’re not yet currently taking bookings.--}}
                            {{--You’ll be able to see the best professional carers on this page once we are ready.--}}
                            {{--Please feel free to <a href="/contact">contact us</a> and we’ll let you know when you can find a great carer.--}}
                        {{--</p>--}}
                        {{--<p>See you soon!</p>--}}
                        {{--<p>The Holm Team</p>--}}
                    </div>
                </div>

                <div class="carer-result">
                @foreach($carerResult as $carerProfile)
                    <div class="result">
                        <a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}" class="profilePhoto profilePhoto2">
                            <img id="profile_photo" class="set_preview_profile_photo"
                                 @if (file_exists(public_path('img/profile_photos/' . $carerProfile->id . '.png')))
                                   src="img/profile_photos/{{$carerProfile->id}}.png"
                                 @else
                                 src="/img/no_photo.png"
                                 @endif />

                        </a>
                        <div class="result__info">
                            <div class="justifyContainer">
                                <h2 class="profileName profileName--biger"><a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}"> {{$carerProfile->first_name}} {{mb_substr($carerProfile->family_name,0,1)}}.</a></h2>
                                <p class="hourPrice hourPrice">
                                     <span class="hourPrice__price">From £  {{Auth::check() && Auth::user()->id == $carerProfile->id ?
                     \App\CarersProfile::find($carerProfile->id)->first()->wage :
                     \App\CarersProfile::find($carerProfile->id)->first()->price}}</span>
                                    <span class="hourPrice__timing">/hour</span>
                                </p>
                            </div>
                            <p class="info-p">
                                {{$carerProfile->sentence_yourself}}
                            </p>
                            <div class="justifyContainer justifyContainer--smColumn ">
                                <div class="result__city">
                                    <p class="location">
                                    <span class="location__value location__value--autoWidth">
                                       {{$carerProfile->town}}
                                    </span>
                                    </p>
                                    <span class="subLabel">city</span>
                                </div>
                                <div class="result__rate">
                                    <div class="profileRating ">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="profileRating__item {{$carerProfile->avg_total >= $i ? 'active' : ''}}"><i class="fa fa-heart"></i></span>
                                        @endfor
                                    </div>
                                    <span class="subLabel">({{$carerProfile->creview*1}} reviews)</span>
                                </div>

                                <div class="bookBtn">
                                    <a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}" class="bookBtn__item bookBtn__item--smaller centeredLink">
                                        view carer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="loader" id="loader-search" style="display: none"></div>
                {{--@for ($pages = 1; $pages <= ceil($carerResultCount/$perPage); $pages++)--}}
                    {{--<a class="sortLink__item {{($pages==$page)?'active':''}} " href="/search/page/{{ $pages }}">--}}
                        {{--{{ $pages }}--}}
                    {{--</a>--}}
                    {{--<span class="sortLink__separate"></span>--}}
                {{--@endfor--}}
                @if($countAll>5)
                    <input type="hidden" id="id-carer" name="id" value="{{$carerResult[count($carerResult)-1]->id}}">
                    <input type="hidden" name="load-more" id="load-more" value="0">
                    <input type="hidden" name="page" id="page" value="{{$page}}">
                    <input type="hidden" name="load-more-count" id="load-count" value="{{$load_more_count}}">
                <div class="moreBtn moreBtn--book ">
                    <a href="" class="moreBtn__item moreBtn__item--book centeredLink moreLink">
                        Load More
                    </a>
                </div>
                    @endif
            </div>

        </div>
        {!! Form::close() !!}
    </div>
</section>
