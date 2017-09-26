@if (Auth::check())
    <div class="dropdownUser">

        @if(Auth::user()->isAdmin())

            <a href=""
               class="registeredCarer">
                <div class="profilePhoto registeredCarer__img">
                    <img src="./img/no_photo.png" alt="">
                </div>
                <h2 class="profileName">admin</h2>
                <span class="registeredCarer__ico">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </span>
            </a>

        @else

            @if(Auth::user()->isReregistrationCompleted())


                <a href="/{{Auth::user()->isCarer()? 'carer-settings' : 'purchaser-settings' }}" class="registeredCarer">
                    <div class="profilePhoto registeredCarer__img">
                        <img class="set_preview_profile_photo" src="/img/profile_photos/{{Auth::user()->id}}.png" onerror="this.src='/img/no_photo.png'" alt="">
                    </div>
                    <h2 class="profileName">{!! Auth::user()->userName() !!}<span class="registeredCarer__type">
                      <i class="fa {{Auth::user()->isCarer()? ' ' : 'fa-exchange' }} " aria-hidden="true"></i>
                            {{Auth::user()->isCarer()? 'carer' : 'purchaser' }}
                      </span>
                    </h2>
                    <span class="registeredCarer__ico">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </span>
                </a>
            @else



                <a href="/{{Auth::user()->isCarer()? 'carer-settings' : 'purchaser-registration' }}"
                   class="registeredCarer">
                    <h2 class="profileName" style="padding-left:45px; font-size: 70%">continue sign up</h2>
                </a>





            @endif

        @endif

        <div class="dropdownUser__list">




            @if(!Auth::user()->isCarer() )

                @if(count(Auth::user()->userPurchaserProfile) && count(Auth::user()->userPurchaserProfile->serviceUsers))

                    @foreach(Auth::user()->userPurchaserProfile->serviceUsers as $serviceUser)

                        @if(strlen($serviceUser->first_name)>0)

                            <a href="{{ $serviceUser->registration_progress!='61'
                                ? route('ServiceUserRegistration', ['serviceUserProfile' => $serviceUser->id])
                                : route('ServiceUserSetting',['id'=>$serviceUser->id])}}"
                               class="dropdownUser__item">
                                <div class="profilePhoto dropdownUser__img">
                                    <img src="/img/service_user_profile_photos/{{$serviceUser->id}}.png" onerror="this.src='/img/no_photo.png'" alt="">
                                </div>
                                <h2 class="profileName">
                                    {!! $serviceUser->first_name.'&nbsp'.mb_substr($serviceUser->family_name,0,1).'.' !!}
                                </h2>
                                <span class="dropdownUser__ico"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                            </a>

                        @endif

                    @endforeach

                @endif

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
        <a href="/login" class=" centeredLink loginBox__link"
           data-toggle="modal" data-target="#login"
                {{--onclick="event.preventDefault();document.getElementById('login').style.display = 'block';"--}}
        >
            Login
        </a>
        <a href="/" id="sign_up_button" class=" centeredLink loginBox__link loginBox__link--active"
           data-toggle="modal" data-target="#signUpdiv"
                {{--onclick="event.preventDefault();document.getElementById('sign_up_div').style.display = 'block';"--}}
        >
            Sign up
        </a>
    </div>

@endif
