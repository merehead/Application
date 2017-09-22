<div class="resultHeader nhide">
    <p>No results found.</p>
    <p>
        Recommendations:
    </p>
    <ul>
        <li>Make sure all words are spelled correctly.</li>
        <li>Try using different keywords.</li>
        <li>Try using more popular keywords.</li>
        <li>Try reducing the number of words in the query.</li>
    </ul>
</div>

@foreach($carerResult as $carerProfile)
    <div class="result">
        <a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}" class="profilePhoto  profilePhoto2">
            <img id="profile_photo" class="set_preview_profile_photo" src="/img/profile_photos/{{$carerProfile->id}}.png"
                 onerror="this.src='/img/no_photo.png'" alt="avatar">
        </a>
        <div class="result__info">
            <div class="justifyContainer">
                <h2 class="profileName profileName--biger"><a href="{{route('carerPublicProfile',['user_id'=>$carerProfile->id])}}"> {{$carerProfile->first_name}} {{$carerProfile->family_name}}</a></h2>
                <p class="hourPrice hourPrice">
                    <span class="hourPrice__price"> £ 12</span>
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
                        <span class="profileRating__item"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item"><i class="fa fa-heart"></i></span>
                    </div>
                    <span class="subLabel">(0 reviews)</span>
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