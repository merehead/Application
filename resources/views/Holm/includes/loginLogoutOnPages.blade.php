@if (Auth::check())
    <div class="dropdownUser">
        @if(Auth::user()->isReregistrationCompleted())
        <a href="/{{Auth::user()->isCarer()? 'carer-settings' : 'purchaser-settings' }}" class="registeredCarer">
            <div class="profilePhoto registeredCarer__img">
                <img src="./img/no_photo.png" alt="">
            </div>
            <h2 class="profileName">
                {!! Auth::user()->userName() !!}
                <span class="registeredCarer__type">
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                    {{Auth::user()->isCarer()? 'carer' : 'purchaser' }}
                  </span>
            </h2>
            <span class="registeredCarer__ico">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
              </span>
        </a>
        @else
            <a href="/{{Auth::user()->isCarer()? 'im-carer' : 'purchaser-registration' }}" class="registeredCarer">
                <h2 class="profileName" style="padding-left:20px; ">continue sigh up</h2>
            </a>
        @endif

        <div class="dropdownUser__list">

            @if(!Auth::user()->isCarer())


                @if(count(Auth::user()->userPurchaserProfile->serviceUsers))
                <a href="/" class="dropdownUser__item">
                    <div class="profilePhoto dropdownUser__img">
                        <img src="./img/no_photo.png" alt="">
                    </div>
                    <h2 class="profileName">
                        {{Auth::user()->userPurchaserProfile->serviceUsers->first()->like_name}}
                    </h2>
                    <span class="dropdownUser__ico">
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </span>
                </a>
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