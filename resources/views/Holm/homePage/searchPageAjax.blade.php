<div class="card error-text result {{count($carerResult)>0?"nhide":""}}">
    <div class="card-block">
        <p class="text-uppercase">No carers found.</p><br>
        <spanp class="text-left">
            Recommendations:
        </spanp><br>
        <div class="checkBox_item">
        <ul class="text-left">
            <li class="list-inline checkBox_item">Make sure all words are spelled correctly.</li>
            <li class="list-inline checkBox_item">Try using different keywords.</li>
            <li class="list-inline checkBox_item">Try using more popular keywords.</li>
            <li class="list-inline checkBox_item">Try reducing the number of words in the query.</li>
        </ul>
        </div>
    </div>
</div>

@foreach($carerResult as $carerProfile)
    <div class="result">
        <a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}" class="profilePhoto  profilePhoto2">
            <img id="profile_photo" class="set_preview_profile_photo" src="/img/profile_photos/{{$carerProfile->id}}.png"
                 onerror="this.src='/img/no_photo.png'" alt="avatar">
        </a>
        <div class="result__info">
            <div class="justifyContainer">
                <h2 class="profileName profileName--biger"><a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}"> {{$carerProfile->first_name}}&nbsp{{mb_substr($carerProfile->family_name,0,1)}}.</a></h2>
                <p class="hourPrice hourPrice">
                    <span class="hourPrice__price">From £ 12</span>
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