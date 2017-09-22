
<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{route('mainHomePage')}}" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{route('ServiceUserSetting',['serviceUserProfile'=>$serviceUsers])}}" class="breadcrumbs__item">
                My profile
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{route('ServiceUserProfilePublic',['serviceUserProfile'=>$serviceUsers->id])}}" class="breadcrumbs__item">
                {{$serviceUsers->family_name}} {{$serviceUsers->first_name}}
            </a>
        </div>

        <!-- <div class="backBtn">
           <a href="#" class="backBtn__item ">
             <i class="fa fa-arrow-left"></i>
             BACK TO SEARCH RESULTS
           </a>
         </div>
   -->
        <div class="profileWrap">
            <div class="row">
                <div class="col-md-8">
                    <div class="profileMain">
                        <div class="carer">
                            <div class="profileInfo">
                                <div class="profilePhoto profilePhoto2 ">
                                    <img id="profile_photo" src="/img/service_user_profile_photos/{{$serviceUsers->id}}.png"
                                         onerror="this.src='/img/no_photo.png'" alt="avatar">

                                </div>
                                <div class="profileInfo__item">
                                    <h2 class="profileName profileName--big">
                                        {{$serviceUsers->family_name}} {{$serviceUsers->first_name}}
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profileSide">
                        <div class="profilePricing profilePricing--user">

                            <div class="roundedBtn">
                                <a href="NewAnAppointment.html" class="roundedBtn__item roundedBtn__item--message"  data-toggle="modal" data-target="#message-carer">
                                    send a message
                                </a>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="extraRow">
                <div class="userAbout">
                    <p></p>
                </div>

                <div class="userBox">
                    <h2 class="profileTitle">
                        TYPE OF CARE NEEDED
                    </h2>
                    <div class="userContainer">
                        <div class="serviceRow">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="userBox">
                    <h2 class="profileTitle">
                        health
                    </h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Conditions
                    </span>
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
                                            <span class="serviceValue serviceValue--comment ">
                         {{$serviceUsers->other_behaviour}}
                       </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Personal Hygiene
                    </span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Require assistance in getting dressed / bathing or toileting:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         {{$serviceUsers->assistance_with_personal_hygiene}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                                                  {{$serviceUsers->assistance_with_personal_hygiene_detail}}
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs assistance in choosing appropriate clothes:
                                        </p>
                                    </div>
                                    <div class="serviceColumn ">
                          <span class="serviceValue ">
                              {{$serviceUsers->appropriate_clothes}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         {{$serviceUsers->appropriate_clothes_assistance_detail}}
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs assistance in choosing appropriate clothes:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         {{$serviceUsers->appropriate_clothes}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                        {{$serviceUsers->appropriate_clothes_assistance_detail}}
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs assistance getting dressed / undressed:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                             <span class="serviceValue ">
                         {{$serviceUsers->assistance_getting_dressed}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         {{$serviceUsers->assistance_getting_dressed_detail}}
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs assistance with bathing / showering:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         {{$serviceUsers->assistance_with_bathing}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         {{$serviceUsers->assistance_with_bathing}}
                       </span>

                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs assistance managing their toilet needs:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         {{$serviceUsers->managing_toilet_needs}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         {{$serviceUsers->managing_toilet_needs_detail}}
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help mobilising themselves to the toilet:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         {{$serviceUsers->mobilising_to_toilet}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         {{$serviceUsers->mobilising_to_toilet_detail}}
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help cleaning themselves when using the toilet:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         {{$serviceUsers->cleaning_themselves}}
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                          {{$serviceUsers->cleaning_themselves_detail}}
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help mobilising themselves to the toilet:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                        <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has incontinence:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                             <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help in choosing incontinence products:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has own supply of incontinence wear:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            THE INCONTINENCE PRODUCTS ARE STORED
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                        <span class="serviceValue serviceValue--comment">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran

                        </span>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="col-sm-6">
                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Medication
                    </span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Requires assistance in taking medication / treatments:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                            </div>

                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Communication
                    </span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has problems understanding other people:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has difficulties understanding or communicating with other:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help with speech:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has serious impediments seeing:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has serious impediments hearing:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                        <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                            </div>

                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Allergies
                    </span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has allergies to food / medication / anything else:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has nutrition allegies:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                            </div>

                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Skin
                    </span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has risk of developing pressure sores on their skin:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                           <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs assistance with changing wound dressings:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                            </div>


                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      MOBILITY
                    </span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Requires help with mobility:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help moving around home:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help getting in / out of bed:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has a history of falls:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Needs help going shopping, or to other local facilities / events:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                            <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                            </div>

                            <div class="userContainer">
                                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Nutrition
                    </span>
                                </h2>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Require assistance with eating / drinking:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>
                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Can prepare food for themselves:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has special nutritional or belief based dietary requirements:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                                <div class="serviceRow">
                                    <div class="serviceColumn serviceColumn--midSize">
                                        <p class="userOption">
                                            Has other special dietary requirements:
                                        </p>
                                    </div>
                                    <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                        <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="userBox">
                    <h2 class="profileTitle">
                        Languages
                    </h2>
                    <div class="userContainer">
                        <div class="serviceRow">
                            <div class="serviceColumn serviceColumn--language">
                                <p class="userOption userOption--language">
                                    English
                                </p>
                            </div>
                            <!--  <div class="serviceColumn serviceColumn--language">
                                <p class="userOption userOption--language">
                                  Spanish
                                </p>
                              </div>
                              <div class="serviceColumn serviceColumn--language">
                                <p class="userOption userOption--language">
                                  English
                                </p>
                              </div>
                            </div>
                            <div class="serviceRow">
                              <div class="serviceColumn serviceColumn--language">
                                <p class="userOption userOption--language">
                                  English
                                </p>
                              </div>
                              <div class="serviceColumn serviceColumn--language">
                                <p class="userOption userOption--language">
                                  Spanish
                                </p>
                              </div>
                              <div class="serviceColumn serviceColumn--language">
                                <p class="userOption userOption--language">
                                  English
                                </p>
                              </div>
                            </div>
              -->
                        </div>

                    </div>

                    <div class="userBox">
                        <h2 class="profileTitle">
                            home
                        </h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="userContainer">
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                HOUSE is a:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue">
                         flat
                       </span>
                                        </div>
                                    </div>

                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                The flat is on floor:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue serviceValue--comment">
                         15
                       </span>
                                        </div>
                                    </div>


                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                There is a lift to the flat:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue ">
                         yes
                       </span>

                                        </div>


                                    </div>


                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Requires assistance moving around home:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue  ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Requires assistance keeping the home safe and clean:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue  ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="userContainer">
                                    <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                     Other inhabitants
                    </span>
                                    </h2>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Somebody lives with the Service User:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Is the other person likely to be home during care visits:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                </div>


                                <div class="userContainer">
                                    <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                     Companionship
                    </span>
                                    </h2>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has regular social interaction with friends / family:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Would the service user like someone to visit regularly for companionship
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="col-sm-6">
                                <div class="userContainer">
                                    <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Entry
                    </span>
                                    </h2>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                How should the carer enter the Service User’s home?
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue serviceValue--comment">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol ve
                       </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="userContainer">
                                    <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Other home information
                    </span>
                                    </h2>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Is there anything else the Carer should be aware of when entering the
                                                home?
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
     <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol ve
                       </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="userContainer">
                                    <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text">
                      Pets
                    </span>
                                    </h2>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has pets:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                       <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Pets friendly with strangers:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                      <span class="serviceValue ">
                        normaly
                      </span>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="userBox">
                        <h2 class="profileTitle">
                            Behaviour
                        </h2>
                        <div class="userContainer">
                            <div class="serviceRow serviceRow--forLabel">
                                <div class="serviceColumn">
                                    <p class="advantage_label">
                                        <i class="fa fa-check"></i>
                                        Agression
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <p class="advantage_label">
                                        <i class="fa fa-check"></i>
                                        Anxiety
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <p class="advantage_label">
                                        <i class="fa fa-check"></i>
                                        Violence
                                    </p>
                                </div>


                                <div class="serviceColumn">
                                    <p class="advantage_label">
                                        <i class="fa fa-check"></i>
                                        Confusion
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <p class="advantage_label">
                                        <i class="fa fa-check"></i>
                                        Agitation
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <p class="advantage_label">
                                        <i class="fa fa-check"></i>
                                        Inappropriate sexual behaviour
                                    </p>
                                </div>
                                <div class="serviceColumn">
                                    <p class="advantage_label">
                                        <i class="fa fa-check"></i>
                                        Antisocial behaviour
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="userBox">

                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="profileTitle">
                                    Night-time
                                </h2>
                                <div class="userContainer">
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Needs assistance keeping safe at night:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                What time would they like someone to come and help?
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                      <span class="serviceValue ">
                        <i class="fa fa-clock-o"></i>   12:00 Am - 5:00 Pm
                      </span>
                                        </div>
                                    </div>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has problems getting dressed for bed:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Needs help going to the toilet at night:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-6">
                                <h2 class="profileTitle">
                                    OTHER
                                </h2>
                                <div class="userContainer">
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has political, religious or other beliefs
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has particular likes or dislikes:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Likes socialising with other people / groups:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                         <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>
                                    <div class="serviceRow">
                                        <div class="serviceColumn serviceColumn--midSize">
                                            <p class="userOption">
                                                Has interests or hobbies which they enjoy:
                                            </p>
                                        </div>
                                        <div class="serviceColumn">
                          <span class="serviceValue ">
                         yes
                       </span>
                                            <span class="serviceValue serviceValue--comment ">
                         Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran
                       </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>