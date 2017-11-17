<div class="carer">
    <div class="profileInfo">

        <a href="#" class="profilePhoto profilePhoto2 invite__photo ">
            <img id="profile_photo" alt="avatar"
              @if (file_exists(public_path('img/profile_photos/' . $carerProfile->id . '.png')))
                src="img/profile_photos/{{$carerProfile->id}}.png"
                 @else
                src="/img/no_photo.png"
              @endif />
        </a>
        <div class="profileInfo__item">
            <h2 class="profileName profileName--big">
                <a href="#">
                    {{$carerProfile->first_name}} {{mb_substr($carerProfile->family_name,0,1)}}.</a>
            </h2>
            <div class="userRating">
                <div class="avarageRate">
                    <div class="profileRating ">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="profileRating__item {{$carerProfile->rate->avg_total >= $i ? 'active' : ''}}"><i class="fa fa-heart"></i></span>
                        @endfor
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
        {{--{{dd($carerProfile->rate)}}--}}
        <div class="userRating__item">
            <p class="userRating__name">
                <span>Punctuality</span>
            </p>
            <div class="profileRating ">
                @for($i = 1; $i <= 5; $i++)
                    <span class="profileRating__item {{$carerProfile->rate->avg_punctuality >= $i ? 'active' : ''}}"><i class="fa fa-heart"></i></span>
                @endfor
            </div>
        </div>
        <div class="userRating__item">

            <p class="userRating__name">
                <span>Friendliness</span>s
            </p>
            <div class="profileRating ">
                @for($i = 1; $i <= 5; $i++)
                    <span class="profileRating__item {{$carerProfile->rate->avg_friendliness >= $i ? 'active' : ''}}"><i class="fa fa-heart"></i></span>
                @endfor
            </div>
        </div>
        <div class="userRating__item">

            <p class="userRating__name">
                <span>Communication</span>
            </p>
            <div class="profileRating ">
                @for($i = 1; $i <= 5; $i++)
                    <span class="profileRating__item {{$carerProfile->rate->avg_communication >= $i ? 'active' : ''}}"><i class="fa fa-heart"></i></span>
                @endfor
            </div>
        </div>
        <div class="userRating__item">

            <p class="userRating__name">
                <span>Performance</span>
            </p>
            <div class="profileRating ">
                @for($i = 1; $i <= 5; $i++)
                    <span class="profileRating__item {{$carerProfile->rate->avg_performance >= $i ? 'active' : ''}}"><i class="fa fa-heart"></i></span>
                @endfor
            </div>
        </div>
    </div>

</div>
<input type="hidden" name="address_line1" value="{{$carerProfile->address_line1}}">
<input type="hidden" name="town" value="{{$carerProfile->town}}">
<div class="profileMap" style="width:100%;height:450px;">
    <div id="map_canvas" style="clear:both; height:450px;"></div>
</div>
<div class="profileExtraInfo">
    <h2 class="profileTitle">
        About
    </h2>
    <p class="info-p">
        {{$carerProfile->description_yourself}}
    </p>
</div>

@if($documents['nvq']->count()>0||
$documents['care_certificate']->count()>0||
$documents['health_and_social']->count()>0||
$documents['training_certificate']->count()>0||
$documents['additional_training_course']->count()>0 ||
$documents['other_relevant_qualification']->count()>0)
    <div class="profileExtraInfo">
    <h2 class="profileTitle">
        QUALIFICATIONS
    </h2>

    <div class="profileAdvantages">

        @foreach($documents_type as $dt)

            @if(isset($documents[$dt]) && !empty($documents[$dt]->count()))

                <div class="profileAdvantages__row">
                <!-- <div class="advantageColumn">
                    <h2>
                        {{$documents_name[$dt]}}
                    </h2>
                </div> -->
                <div class="advantageColumn">
                    @foreach($documents[$dt] as $item)
                      <p class="advantage_label">
                          <i class="fa fa-check"></i>
                          {{$item->title}}
                      </p>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach

    </div>
</div>
    @endif
@if($typeCare->count()!=0)
<div class="profileExtraInfo">
    <h2 class="profileTitle">
        Types of Care Provided
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            <div class="advantageColumn">
                @foreach($carerProfile->ServicesTypes as $item)
                    <p class="advantage_label">
                        <i class="fa fa-check"></i>
                        {{$item->name}}
                    </p>
                @endforeach
            </div>
            <div class="advantageColumn">
                @foreach($typeCare as $item)
                    <p class="advantage_label">
                        <i class="fa fa-check"></i>
                        {{$item->name}}
                    </p>
                @if($loop->iteration%3==0)
                    </div> <div class="advantageColumn">
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
{{--@if($carerProfile->work_with_pets=='Yes')--}}
<div class="profileExtraInfo">
    <h2 class="profileTitle">
        ADDITIONAL
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            <div class="advantageColumn advantageColumn--full-row">
                @if($carerProfile->work_with_pets=='Yes')
                    <p class="advantage_label">
                        <i class="fa fa-check"></i>
                        Works with pets
                    </p>
                @endif
                @if($carerProfile->work_with_pets=='No')
                    <p class="advantage_label">
                        <i class="fa fa-check"></i>
                        Doesn't work with pets
                    </p>
                @endif
                @if($carerProfile->work_with_pets=='It Depends')
                    <p class="advantage_label">
                        <i class="fa fa-check"></i>
                        Work with pets, depends on: {{$carerProfile->pets_description}}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
{{--
@endif
--}}

@if($languages->count()!=0 || !empty($carerProfile->language_additional))
<div class="profileExtraInfo">
    <h2 class="profileTitle">
        Languages
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            <div class="advantageColumn">
                @foreach($languages as $item)
                    <p class="advantage_label">
                        <i class="fa fa-check"></i>
                        @if($item->carer_language!='OTHER')
                            {{$item->carer_language}}
                        @else
                            Language additional:  {{$carerProfile->language_additional}}
                        @endif
                    </p>
                    @if($loop->iteration%3==0)
            </div> <div class="advantageColumn">
                @endif
                @endforeach


            </div>

        </div>
    </div>
</div>
@endif
@if($carerProfile->have_car=='Yes'||$carerProfile->use_car=='Yes'||$carerProfile->driving_licence=='Yes')
<div class="profileExtraInfo">
    <h2 class="profileTitle">
        Transport
    </h2>
    <div class="profileAdvantages">
        <div class="profileAdvantages__row">
            @if($carerProfile->use_car=='Yes')
            <div class="advantageColumn advantageColumn--transport">

                <p class="advantage_label">
                    <i class="fa fa-check "></i>
                    Transport clients to the shop or for short trips
                </p>
            </div>
            @endif
            <div class="advantageColumn wider">
                @if($carerProfile->have_car=='Yes')
                <p class="advantage_label">
                    <i class="fa fa-check "></i>
                    has a car for work
                </p>
                @endif
                    @if($carerProfile->driving_licence=='Yes')
                <p class="advantage_label">
                    <i class="fa fa-check "></i>
                    has a UK/EEA Driving Licence
                </p>
                    @endif
            </div>

        </div>
    </div>
</div>
@endif
