@if (Auth::check())
    <div class="dropdownUser">

        @if(Auth::user()->isAdmin())

            <div class="registeredCarer">
                <div class="profilePhoto registeredCarer__img">
                    <img class="set_preview_profile_photo" src="/img/profile_photos/{{Auth::user()->id}}.png" onerror="this.src='/img/no_photo.png'" alt="">
                </div>
                <a href="" class="profileName">admin</a>
                <span class="registeredCarer__ico">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </span>
            </div>

        @else

            @if(Auth::user()->isReregistrationCompleted())
                <div  class="registeredCarer">
                    @if(Auth::user()->isCarer())
                    <div class="profilePhoto registeredCarer__img">
                        <img class="set_preview_profile_photo" src="/img/profile_photos/{{Auth::user()->id}}.png"
                             onerror="this.src='/img/no_photo.png'" alt="">
                    </div>
                    @endif
                    @if(!Auth::user()->isCarer()&& empty(Auth::user()->userPurchaserProfile->active_user))
                        <div class="profilePhoto registeredCarer__img">
                            <img class="set_preview_profile_photo" src="/img/profile_photos/{{Auth::user()->id}}.png"
                                 onerror="this.src='/img/no_photo.png'" alt="">
                        </div>
                    @endif
                    @if(!Auth::user()->isCarer()&& !empty(Auth::user()->userPurchaserProfile->active_user))
                        <div class="profilePhoto registeredCarer__img">
                            <img class="set_preview_profile_photo" src="/img/service_user_profile_photos/{{Auth::user()->userPurchaserProfile->active_user}}.png"
                                 onerror="this.src='/img/no_photo.png'" alt="">
                        </div>
                    @endif
                    @if(Auth::user()->isCarer())
                    <a data-id="" data-type="" href="/{{Auth::user()->isCarer()? 'carer-settings' : 'purchaser-settings'
                    }}"
                        class="profileName">{!! Auth::user()->userName() !!}<span class="registeredCarer__type">
                      <i class="fa {{Auth::user()->isCarer()? ' ' : 'fa-exchange' }} " aria-hidden="true"></i>
                            {{Auth::user()->isCarer()? 'carer' : 'purchaser' }}
                      </span>
                    </a>
                    @endif
                    @if(!Auth::user()->isCarer() && empty(Auth::user()->userPurchaserProfile->active_user))
                    <a  data-id="{{Auth::user()->id}}" data-type="purchaser"  href="/{{Auth::user()->isCarer()?
                    'carer-settings' :
                    'purchaser-settings' }}"
                        class="profileName">{!! Auth::user()->userName() !!}<span class="registeredCarer__type">
                      <i class="fa {{Auth::user()->isCarer()? ' ' : 'fa-exchange' }} " aria-hidden="true"></i>
                            {{Auth::user()->isCarer()? 'carer' : 'purchaser' }}
                      </span>
                    </a>
                    @else
                    @if( !empty(\App\PurchasersProfile::find(Auth::user()->id)->active_user) )
                    <a data-id="{{Auth::user()
                                     ->userPurchaserProfile->active_user}}" data-type="service_user"  href="{{
                                     Auth::user()->userPurchaserProfile->serviceUsers()
                    ->find(Auth::user()
                    ->userPurchaserProfile->active_user)->registration_progress!='61'
                                    ? route('ServiceUserRegistration', ['serviceUserProfile' => Auth::user()->userPurchaserProfile->active_user])
                                    : route('ServiceUserSetting',['id'=>Auth::user()->userPurchaserProfile->active_user])}}" class="profileName">{!!
                                     Auth::user()->userPurchaserProfile->serviceUsers()->find(Auth::user()
                                     ->userPurchaserProfile->active_user)->first_name !!} <span class="type-of-user">Service user</span>
                    </a>
                        @endif
                    @endif
                    <span class="registeredCarer__ico">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </span>
                </div>
            @else



                <div
                   class="registeredCarer">
                    <a href="/{{Auth::user()->isCarer()? 'carer-settings' : 'purchaser-registration' }}" class="profileName" style="padding-left:45px; font-size: 70%">continue sign up</a>
                </div>





            @endif

        @endif

        <div class="dropdownUser__list">




            @if(!Auth::user()->isCarer() )

                @if(count(Auth::user()->userPurchaserProfile) && count(Auth::user()->userPurchaserProfile->serviceUsers))

                    @foreach(Auth::user()->userPurchaserProfile->serviceUsers as $serviceUser)

                        @if(!$serviceUser->isDeleted())

                            @if(strlen($serviceUser->first_name)>0 &&
                            Auth::user()->userPurchaserProfile->active_user!=$serviceUser->id)

                                <a href="{{ $serviceUser->registration_progress!='61'
                                    ? route('ServiceUserRegistration', ['serviceUserProfile' => $serviceUser->id])
                                    : route('ServiceUserSetting',['id'=>$serviceUser->id])}}"
                                   class="dropdownUser__item">
                                    <div class="profilePhoto dropdownUser__img">
                                        <img id="pf-{{$serviceUser->id}}" class="profile_photo_service_user" src="/img/service_user_profile_photos/{{$serviceUser->id}}.png" onerror="this.src='/img/no_photo.png'" alt="">
                                    </div>
                                    <h2 class="profileName">
                                        {!! $serviceUser->first_name.' '.mb_substr($serviceUser->family_name,0,1).'.' !!}
                                        <span class="type-of-user">Service user</span>
                                    </h2>
                                    <span class="dropdownUser__ico"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                </a>

                            @endif

                        @endif

                    @endforeach

                @endif
                @if( !empty(Auth::user()->userPurchaserProfile->active_user))
                        <a href="/purchaser-settings"
                           class="dropdownUser__item">
                            <div class="profilePhoto dropdownUser__img">
                                <img id="pf-{{Auth::user()->id}}" class="profile_photo_service_user" src="/img/profile_photos/{{Auth::user()->id}}.png" onerror="this.src='/img/no_photo.png'" alt="">
                            </div>
                            <h2 class="profileName">
                                {!! Auth::user()->userName() !!}
                                <span class="registeredCarer__type">
                      <i class="fa {{Auth::user()->isCarer()? ' ' : 'fa-exchange' }} " aria-hidden="true"></i>
                                    {{Auth::user()->isCarer()? 'carer' : 'purchaser' }}
                      </span>
                            </h2>
                            <span class="dropdownUser__ico"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    @endif
            @endif

                @if(Auth::user()->isAdmin())
                <div class="dropdownLogout">
                    <a href="{{ url('/admin') }}" class="dropdownLogout__item">
                        Admin Panel
                    </a>
                </div>
                @endif

                <div class="dropdownLogout">
                    <a href="{{ route('logout') }}" class="dropdownLogout__item"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>

        </div>


    </div>



@else

    <div class="loginBox">
        <a href="/login" class=" centeredLink loginBox__link" data-toggle="modal" data-target="#login">
            Login
        </a>
        <a href="/" id="sign_up_button" class=" centeredLink loginBox__link loginBox__link--active" data-toggle="modal" data-target="#signUpdiv">
            Sign up
        </a>
    </div>

@endif
