<script>
    $(document).ready(function () {
        var geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 17,
            center: {lat: -34.397, lng: 150.644}
        });
        geocodeAddress(geocoder, map);
    });
</script>
<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
                Home
            </a>


            @if(Auth::user()->isCarer()||Auth::user()->isPurchaser())
                <span class="breadcrumbs__arrow">></span>
                <a href="@if(Auth::user()->isCarer()){{route('carerSettings')}}@else{{route('purchaserSettings')}}@endif" class="breadcrumbs__item">
                    My profile
                </a>
            @else
                <span class="breadcrumbs__arrow">&gt;</span>
                <a href="{{route('ServiceUserSetting',['serviceUserProfile'=>$serviceUsers])}}" class="breadcrumbs__item">
                    My profile
                </a>
            @endif


            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{route('ServiceUserProfilePublic',['serviceUserProfile'=>$serviceUsers->id])}}"
               class="breadcrumbs__item">
                {{$serviceUsers->first_name.' '.mb_substr($serviceUsers->family_name,0,1)}}.
            </a>
        </div>
        {!! Form::hidden('address_line1',$serviceUsers->address_line1) !!}
        {!! Form::hidden('town',$serviceUsers->town) !!}
        <div class="profileWrap">
            <div class="row">
                <div class="col-md-8">
                    <div class="profileMain">
                        <div class="carer">
                            <div class="profileInfo">
                                <div class="profilePhoto profilePhoto2 ">
                                    <img id="profile_photo"
                                         src="/img/service_user_profile_photos/{{$serviceUsers->id}}.png"
                                         onerror="this.src='/img/no_photo.png'" alt="avatar">

                                </div>
                                <div class="profileInfo__item">
                                    <h2 class="profileName profileName--big">
                                        {{$serviceUsers->first_name}}&nbsp{{mb_substr($serviceUsers->family_name,0,1)}}.
                                    </h2>

                                    <p>
                                        {{$serviceUsers->one_line_about}}
                                    </p>
                                </div>
                            </div>

                            <div class="carerExtraInfo">
                                <p class="carerCheck">
                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                    payment Verified
                                </p>

                                <div class="locationBox">
                                    <p class="location">
                                        <span class="location__title">town/city</span>
                                        <span class="location__value">{{$serviceUsers->town}}</span>
                                    </p>
                                    <p class="location">
                                        <span class="location__title">post code</span>
                                        <span class="location__value">{{$serviceUsers->postcode}}</span>
                                    </p>
                                    @if(!$restrictedAccess)
                                        <p class="location">
                                            <span class="location__title">Address Line 1</span>
                                            <span class="location__value">{{$serviceUsers->address_line1}}</span>
                                        </p>
                                        <p class="location">
                                            <span class="location__title">I like to be called</span>
                                            <span class="location__value">{{$serviceUsers->like_name}}</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profileSide">
                        <div class="profilePricing profilePricing--user">
                            @if($user->user_type_id == 3)
                                <div class="roundedBtn">
                                    <a href="{{url('/bookings/'.$serviceUsers->Bookings()->where('carer_id', $user->id)->get()->last()->id.'/details#comments')}}"
                                       class="roundedBtn__item roundedBtn__item--message">
                                        send a message
                                    </a>
                                </div>
                            @else
                                <div class="roundedBtn">
                                    <button disabled class="roundedBtn__item roundedBtn__item--message">
                                        send a message
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="extraRow">
                <div class="userBox">
                    <div class="profileMap map" style="width:100%;height:400px">
                        <div id="map_canvas" style="clear:both; height:400px;"></div>
                    </div>
                </div>

                <div class="userAbout" {!!  (is_null($serviceUsers->one_line_about) )? ' style="display:none"' : ''!!}>
                    <p>{{$serviceUsers->one_line_about}}</p>
                </div>

                <div class="userBox">
                    <h2 class="profileTitle">
                        TYPE OF CARE NEEDED
                    </h2>
                    <div class="userContainer">
                        <div class="serviceRow">
                            <div class="serviceColumn serviceColumn--typeCare">
                                @foreach($serviceUsers->ServicesTypes as $type)
                                    <p class="userOption userOption--less-padding">
                                        @if($type->name!='MEDICATION / TREATMENTS')
                                        {{$type->name}}
                                            @endif
                                    </p>
                                @endforeach
                            </div>

                            @foreach ($serviceUsers->AssistantsTypes->chunk(3) as $chunk)
                                <div class="serviceColumn serviceColumn--typeCare">
                                    @foreach ($chunk as $item)
                                        <p class="userOption userOption--less-padding">
                                            {{$item->name}}
                                        </p>
                                    @endforeach
                                </div>
                            @endforeach

                            {{--
                                                        <div class="serviceColumn serviceColumn--typeCare">
                                                            @foreach($typeCare as $type)
                                                                <p class="userOption userOption--less-padding">
                                                                    {{$type->name}}
                                                                </p>
                                                                @if($loop->iteration%3==0)
                                                        </div>
                                                        <div class="serviceColumn serviceColumn--typeCare">
                                                            @endif
                                                            @endforeach
                                                        </div>--}}


                        </div>
                    </div>
                </div>
                <div class="userBox">
                    <h2 class="profileTitle">
                        health
                    </h2>
                    <div class="grid">
                        <!-- <div class="row"> -->
                        <!-- <div class="col-sm-6"> -->


                        @if(count($serviceUserConditions))

                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Conditions</span>
                                </h2>
                                @foreach($serviceUserConditions as $serviceRow)
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                {{$serviceRow->name}}
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">
                                                yes
                                            </span>
                                            <span class="serviceValue ">
                                                {{$serviceUsers->other_behaviour}}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="userContainer" {!! (($serviceUsersProfile->assistance_with_personal_hygiene == 'No' || is_null($serviceUsersProfile->assistance_with_personal_hygiene))
                                                    && ($serviceUsersProfile->appropriate_clothes == 'No' || is_null($serviceUsersProfile->appropriate_clothes))
                                                    && ($serviceUsersProfile->assistance_getting_dressed == 'No' || is_null($serviceUsersProfile->assistance_getting_dressed))
                                                    && ($serviceUsersProfile->assistance_with_bathing == 'No' || is_null($serviceUsersProfile->assistance_with_bathing))
                                                    && ($serviceUsersProfile->managing_toilet_needs == 'No' || is_null($serviceUsersProfile->managing_toilet_needs))
                                                    && ($serviceUsersProfile->mobilising_to_toilet == 'No' || is_null($serviceUsersProfile->mobilising_to_toilet))
                                                    && ($serviceUsersProfile->cleaning_themselves == 'No' || is_null($serviceUsersProfile->cleaning_themselves))
                                                    && ($serviceUsersProfile->mobilising_to_toilet == 'No' || is_null($serviceUsersProfile->mobilising_to_toilet))
                                                    && ($serviceUsersProfile->have_incontinence == 'No' || is_null($serviceUsersProfile->have_incontinence))
                                                    && ($serviceUsersProfile->incontinence_wear == 'No' || is_null($serviceUsersProfile->incontinence_wear))) ? ' style="display:none"' : ''!!}>
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text">Personal Hygiene</span>
                            </h2>
                            <div class="serviceRow" {!!  ($serviceUsersProfile->assistance_with_personal_hygiene == 'No' || is_null($serviceUsersProfile->assistance_with_personal_hygiene) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Require assistance in getting dressed / bathing or toileting:
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <span class="serviceValue ">{{$serviceUsers->assistance_with_personal_hygiene}}</span>
                                    <span class="serviceValue">{{$serviceUsers->assistance_with_personal_hygiene_detail}}</span>
                                </div>
                            </div>
                            <div class="serviceRow" {!!  ($serviceUsersProfile->appropriate_clothes == 'No' || is_null($serviceUsersProfile->appropriate_clothes) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Needs assistance in choosing appropriate clothes:
                                    </p>
                                </div>
                                <div class="serviceColumn ">
                                    <span class="serviceValue ">{{$serviceUsers->appropriate_clothes}}</span>
                                    <span class="serviceValue ">{{$serviceUsers->appropriate_clothes_assistance_detail}}</span>
                                </div>
                            </div>
                            {{--                                <div class="serviceRow" {!!  ($serviceUsersProfile->appropriate_clothes == 'No' || is_null($serviceUsersProfile->appropriate_clothes) )? ' style="display:none"' : ''!!}>
                                                                <div class="serviceColumn serviceColumn--midSize">
                                                                    <p class="userOption">
                                                                        Needs assistance in choosing appropriate clothes:
                                                                    </p>
                                                                </div>
                                                                <div class="serviceColumn"><span class="serviceValue ">{{$serviceUsers->appropriate_clothes}}</span>
                                                                    <span class="serviceValue serviceValue--comment ">{{$serviceUsers->appropriate_clothes_assistance_detail}}</span>
                                                                </div>
                                                            </div>--}}
                            @if(!$restrictedAccess)
                                <div class="serviceRow" {!!  ($serviceUsersProfile->assistance_getting_dressed == 'No' || is_null($serviceUsersProfile->assistance_getting_dressed) )? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs assistance getting dressed / undressed:
                                        </p>
                                    </div>
                                    <div class="serviceColumn"><span
                                                class="serviceValue ">{{$serviceUsers->assistance_getting_dressed}}</span>
                                        <span class="serviceValue ">{{$serviceUsers->assistance_getting_dressed_detail}}</span>
                                    </div>
                                </div>
                            @endif
                            @if(!$restrictedAccess)
                            <div class="serviceRow" {!!  ($serviceUsersProfile->assistance_with_bathing == 'No' || is_null($serviceUsersProfile->assistance_with_bathing) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Needs assistance with bathing / showering:
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <span class="serviceValue ">{{$serviceUsers->assistance_with_bathing}}</span>
                                    {{--<span class="serviceValue serviceValue--comment ">{{$serviceUsers->assistance_with_bathing}}</span>--}}
                                </div>
                            </div>
                            @endif
                            <div class="serviceRow" {!!  ($serviceUsersProfile->managing_toilet_needs == 'No' || is_null($serviceUsersProfile->managing_toilet_needs) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Needs assistance managing their toilet needs:
                                    </p>
                                </div>
                                <div class="serviceColumn"><span
                                            class="serviceValue ">{{$serviceUsers->managing_toilet_needs}}</span>
                                    <span class="serviceValue ">{{$serviceUsers->managing_toilet_needs_detail}}</span>
                                </div>
                            </div>
                            <div class="serviceRow" {!!  ($serviceUsersProfile->mobilising_to_toilet == 'No' || is_null($serviceUsersProfile->mobilising_to_toilet) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Needs help mobilising themselves to the toilet:
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <span class="serviceValue ">{{$serviceUsers->mobilising_to_toilet}}</span>
                                    <span class="serviceValue ">{{$serviceUsers->mobilising_to_toilet_detail}}</span>
                                </div>
                            </div>
                            <div class="serviceRow" {!!  ($serviceUsersProfile->cleaning_themselves == 'No' || is_null($serviceUsersProfile->cleaning_themselves) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Needs help cleaning themselves when using the toilet:
                                    </p>
                                </div>
                                <div class="serviceColumn"><span
                                            class="serviceValue ">{{$serviceUsers->cleaning_themselves}}</span>
                                    <span class="serviceValue ">{{$serviceUsers->cleaning_themselves_detail}}</span>
                                </div>
                            </div>
                            <div class="serviceRow" {!!  ($serviceUsersProfile->mobilising_to_toilet == 'No' || is_null($serviceUsersProfile->mobilising_to_toilet) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Needs help mobilising themselves to the toilet:
                                    </p>
                                </div>
                                <div class="serviceColumn"><span
                                            class="serviceValue ">{{$serviceUsers->mobilising_to_toilet}}</span>
                                    <span class="serviceValue ">{{$serviceUsers->mobilising_to_toilet_detail}}</span>
                                </div>
                            </div>
                            @if(!$restrictedAccess)
                                <div class="serviceRow" {!!  ($serviceUsersProfile->have_incontinence == 'No' || is_null($serviceUsersProfile->have_incontinence) )? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has incontinence:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{$serviceUsers->have_incontinence}}</span>
                                        <span class="serviceValue ">{{$serviceUsers->kind_of_incontinence}}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="serviceRow" {!!  ($serviceUsersProfile->choosing_incontinence_products == 'No' || is_null($serviceUsersProfile->choosing_incontinence_products) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Needs help in choosing incontinence products:
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <span class="serviceValue ">{{$serviceUsers->choosing_incontinence_products}}</span>
                                    <span class="serviceValue ">{{$serviceUsers->choosing_incontinence_products_detail}}</span>
                                </div>
                            </div>
                            <div class="serviceRow" {!!  ($serviceUsersProfile->incontinence_wear == 'No' || is_null($serviceUsersProfile->incontinence_wear) )? ' style="display:none"' : ''!!}>
                                <div class="serviceColumn serviceColumn--midSize">
                                    <p class="userOption">
                                        Has own supply of incontinence wear:
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <span class="serviceValue ">{{$serviceUsers->incontinence_wear}}</span>
                                    <span class="serviceValue ">{{$serviceUsers->incontinence_detail}}</span>
                                </div>
                            </div>
                            @if(!$restrictedAccess)
                                <div class="serviceRow" {!!  (strlen($serviceUsers->incontinence_products_stored)==0 || $serviceUsersProfile->incontinence_wear == 'No' || is_null($serviceUsersProfile->incontinence_wear ) )? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            THE INCONTINENCE PRODUCTS ARE STORED
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{$serviceUsers->incontinence_products_stored}}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- </div> -->


                        <!-- <div class="col-sm-6"> -->
                        @if(!$restrictedAccess)
                            <div class="userContainer" {!!  ($serviceUsersProfile->assistance_in_medication == 'No' || is_null($serviceUsersProfile->assistance_in_medication) )? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Medication</span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Requires assistance in taking medication / treatments:
                                        </p>
                                    </div>
                                    <div class="serviceColumn"><span
                                                class="serviceValue ">{{$serviceUsers->assistance_in_medication}}</span>
                                        <span class="serviceValue ">{{$serviceUsers->in_medication_detail}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!$restrictedAccess)
                            <div class="userContainer" {!! (($serviceUsersProfile->skin_scores == 'No' || is_null($serviceUsersProfile->skin_scores))
                                                    && ($serviceUsersProfile->assistance_with_dressings == 'No' || is_null($serviceUsersProfile->assistance_with_dressings))
                                                    && ($serviceUsersProfile->have_any_allergies == 'No' || is_null($serviceUsersProfile->have_any_allergies))
                                                    && ($serviceUsersProfile->hearing == 'No' || is_null($serviceUsersProfile->hearing))
                                                    && ($serviceUsersProfile->vision == 'No' || is_null($serviceUsersProfile->vision))
                                                    && ($serviceUsersProfile->speech == 'No' || is_null($serviceUsersProfile->speech))
                                                    && ($serviceUsersProfile->communication == 'No' || is_null($serviceUsersProfile->communication))
                                                    && ($serviceUsersProfile->comprehension == 'No' || is_null($serviceUsersProfile->comprehension))) ? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Communication</span>
                                </h2>
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!!  ($serviceUsersProfile->comprehension == 'No' || is_null($serviceUsersProfile->comprehension) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has problems understanding other people:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->comprehension}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->comprehension_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!!  ($serviceUsersProfile->communication == 'No' || is_null($serviceUsersProfile->communication) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has difficulties understanding or communicating with other:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->communication}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->common_communication_details}}</span>
                                        </div>
                                    </div>
                                @endif
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!!  ($serviceUsersProfile->speech == 'No' || is_null($serviceUsersProfile->speech) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Needs help with speech:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->speech}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->speech_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!!  ($serviceUsersProfile->vision == 'No' || is_null($serviceUsersProfile->vision) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has serious impediments seeing:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->vision}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->vision_detail}}</span>
                                        </div>
                                    </div>
                                @endif

                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!!  ($serviceUsersProfile->hearing == 'No' || is_null($serviceUsersProfile->hearing) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has serious impediments hearing:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->hearing}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->hearing_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @if(!$restrictedAccess)
                            <div
                                    class="userContainer" {!! ($serviceUsersProfile->have_any_allergies == 'No' || is_null($serviceUsersProfile->have_any_allergies) )? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Allergies</span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has allergies to food / medication / anything else:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{$serviceUsers->have_any_allergies}}</span>

                                        <span class="serviceValue ">{{$serviceUsers->allergies_detail}}</span>

                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!$restrictedAccess)
                            <div class="userContainer" {!! (($serviceUsersProfile->skin_scores == 'No' || is_null($serviceUsersProfile->skin_scores)) && ($serviceUsersProfile->assistance_with_dressings == 'No' || is_null($serviceUsersProfile->assistance_with_dressings))) ? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Skin</span>
                                </h2>
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->skin_scores == 'No' || is_null($serviceUsersProfile->skin_scores) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has risk of developing pressure sores on their skin:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->skin_scores}}</span>

                                            <span class="serviceValue ">{{$serviceUsers->skin_scores_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->assistance_with_dressings == 'No' || is_null($serviceUsersProfile->assistance_with_dressings) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Needs assistance with changing wound dressings:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->assistance_with_dressings}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->dressings_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @if(!$restrictedAccess)
                            <div class="userContainer" {!! (($serviceUsersProfile->help_with_mobility == 'No' || is_null($serviceUsersProfile->help_with_mobility))
                                                    && ($serviceUsersProfile->mobility_home == 'No' || is_null($serviceUsersProfile->mobility_home))
                                                    && ($serviceUsersProfile->mobility_bed == 'No' || is_null($serviceUsersProfile->mobility_bed))
                                                    && ($serviceUsersProfile->history_of_falls == 'No' || is_null($serviceUsersProfile->history_of_falls))) ? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">MOBILITY</span>
                                </h2>
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->help_with_mobility == 'No' || is_null($serviceUsersProfile->help_with_mobility) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Requires help with mobility:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->help_with_mobility}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->common_mobility_details}}</span>
                                        </div>
                                    </div>
                                @endif
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->mobility_home == 'No' || is_null($serviceUsersProfile->mobility_home) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Needs help moving around home:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->mobility_home}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->mobility_home_detail}}</span>
                                        </div>
                                    </div>
                                @endif

                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->mobility_bed == 'No' || is_null($serviceUsersProfile->mobility_bed) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Needs help getting in / out of bed:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->mobility_bed}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->mobility_bed_detail}}</span>
                                        </div>
                                    </div>
                                @endif

                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->history_of_falls == 'No' || is_null($serviceUsersProfile->history_of_falls) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has a history of falls:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->history_of_falls}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->falls_detail}}</span>
                                        </div>
                                    </div>
                                @endif

                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->mobility_shopping == 'No' || is_null($serviceUsersProfile->mobility_shopping) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Needs help going shopping, or to other local facilities / events:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->mobility_shopping}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->mobility_shopping_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @if(!$restrictedAccess)
                            <div class="userContainer" {!! (($serviceUsersProfile->assistance_with_eating == 'No' || is_null($serviceUsersProfile->assistance_with_eating))
                                                    && ($serviceUsersProfile->prepare_food == 'No' || is_null($serviceUsersProfile->prepare_food))
                                                    && ($serviceUsersProfile->assistance_with_preparing_food == 'No' || is_null($serviceUsersProfile->assistance_with_preparing_food))
                                                    && ($serviceUsersProfile->dietary_requirements == 'No' || is_null($serviceUsersProfile->dietary_requirements))) ? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Nutrition</span>
                                </h2>
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->assistance_with_eating == 'No' || is_null($serviceUsersProfile->assistance_with_eating) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Require assistance with eating / drinking:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->assistance_with_eating}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->assistance_with_eating_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->prepare_food == 'No' || is_null($serviceUsersProfile->prepare_food) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Can prepare food for themselves:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->prepare_food}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->prepare_food_details}}</span>
                                        </div>
                                    </div>
                                @endif
                                @if(!$restrictedAccess)

                                    <div class="serviceRow" {!! ($serviceUsersProfile->assistance_with_preparing_food == 'No' || is_null($serviceUsersProfile->assistance_with_preparing_food) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Would like assistance with preparing meals:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->assistance_with_preparing_food}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->assistance_prepare_food_details}}</span>
                                        </div>
                                    </div>
                                @endif

                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->dietary_requirements == 'No' || is_null($serviceUsersProfile->dietary_requirements) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has special nutritional or belief based dietary requirements:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->dietary_requirements}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->dietary_requirements_interaction}}</span>
                                        </div>
                                    </div>
                                @endif

                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->special_dietary_requirements == 'No' || is_null($serviceUsersProfile->special_dietary_requirements) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has other special dietary requirements:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->special_dietary_requirements}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->special_dietary_requirements_detail}}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>


                <div class="userBox">
                    <h2 class="profileTitle">
                        Languages
                    </h2>
                    <div class="userContainer">
                        <div class="serviceRow">
                            <div class="serviceColumn serviceColumn--language ">
                                <?php $other = false;?>
                                @foreach($languages as $language)

                                    @if($language->carer_language != 'OTHER')
                                        <p class="userOption userOption--language">    {{$language->carer_language}}</p>
                                    @else<?php $other = true;?>
                                    @endif
                                        @if($loop->iteration%3==0)
                                    </div> <div class="serviceColumn serviceColumn--language ">
                                @endif
                                @endforeach

                                @if($other)
                                    <p class="userOption userOption--language">

                                        {{$serviceUsers->other_languages}}
                                    </p>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="userBox">
                        <h2 class="profileTitle">
                            home
                        </h2>
                        <div class="grid">
                            <!-- <div class="row"> -->
                            <!-- <div class="col-sm-6"> -->
                            <div class="userContainer">
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            HOUSE is a:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue">{{$serviceUsers->kind_of_building}}</span>
                                    </div>
                                </div>

                                <div class="serviceRow" {!! ($serviceUsersProfile->kind_of_building != 'FLAT')? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            The flat is on floor:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{(isset($floor->name)?$floor->name:'')}}</span>
                                    </div>
                                </div>

                                <div class="serviceRow" {!! ($serviceUsersProfile->kind_of_building != 'FLAT')? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            There is a lift to the flat:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{$serviceUsers->lift_available}}</span>
                                    </div>
                                </div>

                                <div class="serviceRow" {!! ($serviceUsersProfile->assistance_moving == 'No' || is_null($serviceUsersProfile->assistance_moving) )? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Requires assistance moving around home:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue  ">{{$serviceUsers->assistance_moving}}</span>
                                        {{-- <span class="serviceValue serviceValue--comment ">{{$serviceUsers->assistance_moving}}</span>--}}
                                    </div>
                                </div>


                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->home_safe == 'No' || is_null($serviceUsersProfile->home_safe) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Can keep the home safe and clean by themself:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue  ">{{$serviceUsers->home_safe}}</span>
                                            <span class="serviceValue "></span>
                                        </div>
                                    </div>


                                @endif
                                <div class="serviceRow" {!! ($serviceUsersProfile->assistance_keeping == 'No' || is_null($serviceUsersProfile->assistance_keeping) )? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Requires assistance keeping the home safe and clean:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue  ">{{$serviceUsers->assistance_keeping}}</span>
                                        <span class="serviceValue "></span>
                                    </div>
                                </div>

                            </div>
                            @if(!$restrictedAccess)
                                <div class="userContainer"{!! (($serviceUsersProfile->anyone_else_live == 'No' || is_null($serviceUsersProfile->anyone_else_live))
                                                    && ($serviceUsersProfile->anyone_friendly == 'No' || is_null($serviceUsersProfile->anyone_friendly))) ? ' style="display:none"' : ''!!}>
                                    <h2 class="ordinaryTitle">
                                        <span class="ordinaryTitle__text">Other inhabitants</span>
                                    </h2>
                                    @if(!$restrictedAccess)
                                        <div class="serviceRow" {!! ($serviceUsersProfile->anyone_else_live == 'No' || is_null($serviceUsersProfile->anyone_else_live) )? ' style="display:none"' : ''!!}>
                                            <div class="serviceColumn serviceColumn--midSize">
                                                <p class="userOption">
                                                    Somebody lives with the Service User:
                                                </p>
                                            </div>
                                            <div class="serviceColumn">
                                                <span class="serviceValue">{{$serviceUsers->anyone_else_live}}</span>
                                                <span class="serviceValue ">{{$serviceUsers->anyone_detail}}</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!$restrictedAccess)
                                        <div class="serviceRow" {!! ($serviceUsersProfile->anyone_friendly == 'No' || is_null($serviceUsersProfile->anyone_friendly) )? ' style="display:none"' : ''!!}>
                                            <div class="serviceColumn serviceColumn--midSize">
                                                <p class="userOption">
                                                    Is the other person likely to be home during care visits:
                                                </p>
                                            </div>
                                            <div class="serviceColumn">
                                                <span class="serviceValue ">{{$serviceUsers->anyone_friendly}}</span>
                                                <span class="serviceValue "></span>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                            @endif
                            <div class="userContainer" {!! (($serviceUsersProfile->social_interaction == 'No' || is_null($serviceUsersProfile->social_interaction))
                                                    && ($serviceUsersProfile->visit_for_companionship == 'No' || is_null($serviceUsersProfile->visit_for_companionship))) ? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Companionship</span>
                                </h2>

                                @if(!$restrictedAccess)
                                    <div class="serviceRow" {!! ($serviceUsersProfile->social_interaction == 'No' || is_null($serviceUsersProfile->social_interaction) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has regular social interaction with friends / family:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue">{{$serviceUsers->social_interaction}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->companionship_interaction_details}}</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="serviceRow" {!! ($serviceUsersProfile->visit_for_companionship == 'No' || is_null($serviceUsersProfile->visit_for_companionship) )? ' style="display:none"' : ''!!}>
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Would the service user like someone to visit regularly for companionship
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{$serviceUsers->visit_for_companionship}}</span>
                                        <span class="serviceValue ">{{$serviceUsers->companionship_visit_details}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->

                            <!-- <div class="col-sm-6"> -->

                            @if(!$restrictedAccess)
                                <div class="userContainer" {!! (strlen($serviceUsers->carer_enter)==0)? ' style="display:none"' : ''!!}>
                                    <h2 class="ordinaryTitle">
                                        <span class="ordinaryTitle__text">Entry</span>
                                    </h2>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                How should the carer enter the Service User’s home?
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->carer_enter}}</span>
                                        </div>
                                    </div>

                                </div>
                            @endif

                            @if(!$restrictedAccess)
                            <div class="userContainer" {!! (strlen($serviceUsers->other_detail)==0 || ($serviceUsersProfile->entering_aware == 'No' || is_null($serviceUsersProfile->entering_aware))  )? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Other home information</span>
                                </h2>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Is there anything else the Carer should be aware of when entering the
                                                home?
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->entering_aware}}</span>
                                            <span class="serviceValue ">{{$serviceUsers->other_detail}}</span>
                                        </div>
                                    </div>

                            </div>
                            @endif

                            <div class="userContainer" {!! (($serviceUsersProfile->own_pets == 'No' || is_null($serviceUsersProfile->own_pets))  )? ' style="display:none"' : ''!!}>
                                <h2 class="ordinaryTitle">
                                    <span class="ordinaryTitle__text">Pets</span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has pets:
                                        </p>
                                        <span class="serviceValue ">{{$serviceUsers->pet_detail}}</span>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{$serviceUsers->own_pets}}</span>

                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Pets friendly with strangers:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                                        <span class="serviceValue ">{{$serviceUsers->pet_friendly}}</span>
                                    </div>
                                </div>

                            </div>


                            <!-- </div> -->
                        </div>
                    </div>


                    @if(!$behaviour->contains('id','1'))
                        @if(count($behaviour))
                            @if(!(count($behaviour) == 1 && $behaviour[0]->name == 'None') )


                                <div class="userBox">
                                    <h2 class="profileTitle">
                                        Behaviour
                                    </h2>
                                    <div class="userContainer">
                                        <div class="serviceRow serviceRow--forLabel">

                                            @foreach($behaviour as $beh)
                                                @if($beh->name == 'other')
                                                    <p class="advantage_label">
                                                        <i class="fa fa-check"></i>
                                                        {{$serviceUsers->other_behaviour}}
                                                    </p>
                                                @else
                                                    <div class="serviceColumn">
                                                        <p class="advantage_label">
                                                            <i class="fa fa-check"></i>
                                                            {{$beh->name}}
                                                        </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @if(!$restrictedAccess)
                                        <div>
                                            <h2 class="ordinaryTitle">
                                                <span class="ordinaryTitle__text">Has a doctor's note or court order saying that they are not able to give consent</span>
                                            </h2>
                                            <p>
                                                {{$serviceUsers->consent_details}}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endif
                    @endif
                    @if(!$restrictedAccess)
                    <div class="userBox">

                        <div class="row">


                            <div class="col-sm-6" {!! (($serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night))
                                                    && ($serviceUsersProfile->getting_dressed_for_bed == 'No' || is_null($serviceUsersProfile->getting_dressed_for_bed))

                                                    && ($serviceUsersProfile->toilet_at_night == 'No' || is_null($serviceUsersProfile->toilet_at_night))) ? ' style="display:none"' : ''!!}>
                                <h2 class="profileTitle">
                                    Night-time
                                </h2>
                                <div class="userContainer">
                                    <div class="serviceRow" {!! ($serviceUsersProfile->getting_dressed_for_bed == 'No' || is_null($serviceUsersProfile->getting_dressed_for_bed) )? ' style="display:none"' : ''!!}>
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">Has problems getting dressed for bed:</p>
                                        </div>
                                        <div class="serviceColumn">
                                            <span class="serviceValue ">{{$serviceUsers->getting_dressed_for_bed}}</span>

                                        </div>
                                    </div>
                                    @if(!$restrictedAccess)
                                        <div class="serviceRow" {!! ($serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night) )? ' style="display:none"' : ''!!}>
                                            <div class="serviceColumn serviceColumn--midSize">
                                                <p class="userOption">
                                                    What time would they like someone to come and help?
                                                </p>
                                            </div>
                                            <div class="serviceColumn">
                                                <span class="serviceValue "><i
                                                            class="fa fa-clock-o"></i> {{$serviceUsersProfile->time_to_bed}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!$restrictedAccess)
                                        <div class="serviceRow" {!! ($serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night) )? ' style="display:none"' : ''!!}>
                                            <div class="serviceColumn serviceColumn--midSize">
                                                <p class="userOption">
                                                    Needs assistance keeping safe at night:
                                                </p>
                                            </div>
                                            <div class="serviceColumn">
                                                <span class="serviceValue ">{{$serviceUsers->keeping_safe_at_night}}</span>
                                                <span class="serviceValue ">{{$serviceUsers->keeping_safe_at_night_details}}</span>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!$restrictedAccess)
                                        <div class="serviceRow" {!! ($serviceUsersProfile->keeping_safe_at_night == 'No' || is_null($serviceUsersProfile->keeping_safe_at_night) )? ' style="display:none"' : ''!!}>
                                            <div class="serviceColumn serviceColumn--midSize">
                                                <p class="userOption">
                                                    What time would they like someone to come to help?
                                                </p>
                                            </div>
                                            <div class="serviceColumn">
                                                <span class="serviceValue "><i
                                                            class="fa fa-clock-o"></i> {{$serviceUsersProfile->time_to_night_helping}}</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!$restrictedAccess)
                                        <div class="serviceRow" {!! ($serviceUsersProfile->toilet_at_night == 'No' || is_null($serviceUsersProfile->toilet_at_night) )? ' style="display:none"' : ''!!}>
                                            <div class="serviceColumn serviceColumn--midSize">
                                                <p class="userOption">
                                                    Needs help going to the toilet at night:
                                                </p>
                                            </div>
                                            <div class="serviceColumn">
                                                <span class="serviceValue ">{{$serviceUsers->toilet_at_night}}</span>
                                                <span class="serviceValue ">{{$serviceUsers->toiled_help_details}}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if(!$restrictedAccess)
                                <div class="col-sm-6" {!! (($serviceUsersProfile->religious_beliefs == 'No' || is_null($serviceUsersProfile->religious_beliefs))
                                                    && ($serviceUsersProfile->particular_likes == 'No' || is_null($serviceUsersProfile->particular_likes))
                                                    && ($serviceUsersProfile->socialising_with_other == 'No' || is_null($serviceUsersProfile->socialising_with_other))
                                                    && ($serviceUsersProfile->interests_hobbies == 'No' || is_null($serviceUsersProfile->interests_hobbies))) ? ' style="display:none"' : ''!!}>
                                    <h2 class="profileTitle">
                                        OTHER
                                    </h2>
                                    <div class="userContainer">
                                        @if(!$restrictedAccess)
                                            <div class="serviceRow" {!! ($serviceUsersProfile->religious_beliefs == 'No' || is_null($serviceUsersProfile->religious_beliefs) )? ' style="display:none"' : ''!!}>
                                                <div class="serviceColumn serviceColumn--midSize">
                                                    <p class="userOption">
                                                        Has political, religious or other beliefs
                                                    </p>
                                                </div>
                                                <div class="serviceColumn">
                                                    <span class="serviceValue ">{{$serviceUsers->religious_beliefs}}</span>
                                                    <span class="serviceValue ">{{$serviceUsers->religious_beliefs_details}}</span>
                                                </div>
                                            </div>
                                        @endif
                                        @if(!$restrictedAccess)
                                            <div class="serviceRow" {!! ($serviceUsersProfile->particular_likes == 'No' || is_null($serviceUsersProfile->particular_likes) )? ' style="display:none"' : ''!!}>
                                                <div class="serviceColumn serviceColumn--midSize">
                                                    <p class="userOption">
                                                        Has particular likes or dislikes:
                                                    </p>
                                                </div>
                                                <div class="serviceColumn"><span
                                                            class="serviceValue ">{{$serviceUsers->particular_likes}}</span>
                                                    <span class="serviceValue ">{{$serviceUsers->particular_likes_details}}</span>
                                                </div>
                                            </div>
                                        @endif
                                        @if(!$restrictedAccess)
                                            <div class="serviceRow" {!! ($serviceUsersProfile->socialising_with_other == 'No' || is_null($serviceUsersProfile->socialising_with_other) )? ' style="display:none"' : ''!!}>
                                                <div class="serviceColumn serviceColumn--midSize">
                                                    <p class="userOption">
                                                        Likes socialising with other people / groups:
                                                    </p>
                                                </div>
                                                <div class="serviceColumn">
                                                    <span class="serviceValue ">{{$serviceUsers->socialising_with_other}}</span>
                                                    {{--<span class="serviceValue ">{{$serviceUsers->socialising_with_other_details}}</span>--}}
                                                </div>
                                            </div>
                                        @endif
                                        @if(!$restrictedAccess)
                                            <div class="serviceRow"{!! ($serviceUsersProfile->interests_hobbies == 'No' || is_null($serviceUsersProfile->interests_hobbies) )? ' style="display:none"' : ''!!}>
                                                <div class="serviceColumn serviceColumn--midSize">
                                                    <p class="userOption">
                                                        Has interests or hobbies which they enjoy:
                                                    </p>
                                                </div>
                                                <div class="serviceColumn">
                                                    <span class="serviceValue ">{{$serviceUsers->interests_hobbies}}</span>

                                                    <span class="serviceValue ">{{$serviceUsers->interests_hobbies_details}}</span>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

</section>
