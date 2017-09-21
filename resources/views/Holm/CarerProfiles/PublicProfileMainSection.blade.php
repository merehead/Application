<div class="carer">
    <div class="profileInfo">

        <a href="#" class="profilePhoto profilePhoto2 invite__photo ">
            <img id="profile_photo" src="img/profile_photos/{{$carerProfile->id}}.png" onerror="this.src='/img/no_photo.png'" alt="avatar">
        </a>
        <div class="profileInfo__item">
            <h2 class="profileName profileName--big">
                <a href="#">
                    {{$carerProfile->first_name}} {{$carerProfile->family_name}}</a>
            </h2>
            <div class="userRating">
                <div class="avarageRate">
                    <div class="profileRating ">
                        <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                        <span class="profileRating__item active"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
            <p>
                {{$carerProfile->sentence_yourself}}
            </p>
        </div>
    </div>

    <div class="carerExtraInfo">
        <p class="carerCheck">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
            Verified Carer
        </p>
        <p class="carerCheck">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
            Criminal Record Checked
        </p>
        <div class="locationBox">
            <p class="location">
                <span class="location__title">town/city</span>
                <span class="location__value">{{$carerProfile->town}}</span>
            </p>
            <p class="location">
                <span class="location__title">post code</span>
                <span class="location__value">{{$carerProfile->postcode}}</span>
            </p>
        </div>
    </div>
</div>


<div class="userRating">

    <div class="otherRate">
        <div class="userRating__item">

            <p class="userRating__name">
                <span>Punctuality</span>
            </p>
            <div class="profileRating ">
<span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
            </div>
        </div>
        <div class="userRating__item">

            <p class="userRating__name">
                <span>Friendliness</span>s
            </p>
            <div class="profileRating ">
<span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
            </div>
        </div>
        <div class="userRating__item">

            <p class="userRating__name">
                <span>Communication</span>
            </p>
            <div class="profileRating ">
<span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item">
<i class="fa fa-heart"></i>
</span>
            </div>
        </div>
        <div class="userRating__item">

            <p class="userRating__name">
                <span>Performance</span>
            </p>
            <div class="profileRating ">
<span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item active">
<i class="fa fa-heart"></i>
</span>
                <span class="profileRating__item">
<i class="fa fa-heart"></i>
</span>
            </div>
        </div>
    </div>

</div>

<div class="profileExtraInfo">
    <h2 class="profileTitle">
        About
    </h2>
    <p class="info-p">
        {{$carerProfile->description_yourself}}
    </p>
</div>
<div class="profileExtraInfo">
    <h2 class="profileTitle">
        QUALIFICATIONS
    </h2>
    <div class="profileAdvantages">
        @foreach($documents_type as $dt)
            @if(isset($documents[$dt])&&!empty($documents[$dt]->count()))
            <div class="profileAdvantages__row">
                <div class="advantageColumn">
                    <h2>
                        {{$documents_name[$dt]}}
                    </h2>
                </div>
                <div class="advantageColumn">
                    @foreach($documents[$dt] as $item)
                        <p  class="advantageColumn">
                            {{$item->title}}
                        </p>
                    @endif
                </div>
            </div>
            @endif
        @endforeach

    </div>
</div>

<div class="profileExtraInfo">
    <h2 class="profileTitle">
        TYPE OF CARE
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            <div class="advantageColumn">
                @foreach($typeCare as $item)
                <p>
                    {{$item->name}}
                </p>
                @endforeach


            </div>
        </div>
    </div>
</div>

<div class="profileExtraInfo">
    <h2 class="profileTitle">
        ADDITIONAL
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            <div class="advantageColumn">

                <p class="advantage_label">
                    <i class="fa @if($carerProfile->work_with_pets=='Yes')fa-check @else  fa-ban @endif"></i>
                    Works with pets
                </p>
            </div>
            <div class="advantageColumn">

            </div>
            <div class="advantageColumn">

            </div>
        </div>
    </div>
</div>


<div class="profileExtraInfo">
    <h2 class="profileTitle">
        Languages
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            <div class="advantageColumn">
                @foreach($languages as $item)
                    <h2>
                        @if($item->carer_language!='OTHER')
                        {{$item->carer_language}}
                            @else
                            {{$carerProfile->language_additional}}
                        @endif
                    </h2>
                @endforeach

                <!-- <h2>
                Spanish
                </h2>
                <h2>
                German
                </h2>
                </div>
                <div class="advantageColumn centerText">
                <h2>
                English
                </h2>
                <h2>
                Spanish
                </h2>
                <h2>
                German
                </h2>
                </div>
                <div class="advantageColumn rightText">
                <h2>
                English
                </h2>
                <h2>
                Spanish
                </h2>
                <h2>
                German
                </h2>-->
            </div>

        </div>
    </div>
</div>

<div class="profileExtraInfo">
    <h2 class="profileTitle">
        Transport
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            <div class="advantageColumn advantageColumn--transport">

                <p class="advantage_label">
                    <i class="fa @if($carerProfile->use_car=='Yes')fa-check @else  fa-ban @endif"></i>
                    Transport clients to the shop or for short trips
                </p>
            </div>
            <div class="advantageColumn wider">
                <p class="advantage_label">
                    <i class="fa @if($carerProfile->have_car=='Yes')fa-check @else  fa-ban @endif"></i>
                    have a car for work
                </p>
                <p class="advantage_label">
                    <i class="fa @if($carerProfile->driving_licence=='Yes')fa-check @else  fa-ban @endif"></i>
                    have UK/EEA Driving Licence
                </p>
            </div>

        </div>
    </div>
</div>
