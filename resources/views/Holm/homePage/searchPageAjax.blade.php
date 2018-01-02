@if(env('APP_ENV') != 'production')
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
@endif

@foreach($carerResult as $carerProfile)
    <div class="result">
        <a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}" class="profilePhoto  profilePhoto2">
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
                @if(isset($carerProfile->distance))
                    <div class="result__distance">
                        <p class="location">
                                    <span class="location__value location__value--autoWidth">
                                       {{$carerProfile->distance}}
                                    </span>
                        </p>
                        <span class="subLabel">distance</span>
                    </div>
                @endif
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
