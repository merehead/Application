@if (Auth::check())
    @if(Auth::user()->isReregistrationCompleted())
    <a href="/{{Auth::user()->isCarer()? 'carer-settings' : 'purchaser-settings' }}" class="registeredCarer">
        <div class="profilePhoto registeredCarer__img">
            <img src="./img/no_photo.png" alt="">
        </div>
        <h2 class="profileName">
            {!! Auth::user()->userName() !!}
        </h2>
        <span class="registeredCarer__ico">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
            </span>
    </a>
    @else
        <a href="/{{Auth::user()->isCarer()? 'im-carer' : 'purchaser-registration' }}" class="registeredCarer">
            <h2 class="profileName" style="padding-left:20px; ">continue sighup</h2>
        </a>
    @endif
@else
    <div class="loginBox">
        <a href="/login" class=" centeredLink loginBox__link"
           data-toggle="modal" data-target="#login"
                {{--onclick="event.preventDefault();document.getElementById('login').style.display = 'block';"--}}
        >
            Login
        </a>
        <a href="/" id = "sign_up_button" class=" centeredLink loginBox__link loginBox__link--active"
           data-toggle="modal" data-target="#signUpdiv"
                {{--onclick="event.preventDefault();document.getElementById('sign_up_div').style.display = 'block';"--}}
        >
            Sign up
        </a>
    </div>

@endif