
    @if (Auth::check())
    <a href="/im-carer" class="registeredCarer">
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
    <div class="loginBox">
        <a href="/login" class=" centeredLink loginBox__link"
           data-toggle="modal" data-target="#login"
           {{--onclick="event.preventDefault();document.getElementById('login').style.display = 'block';"--}}
        >
            Login
        </a>
        <a href="/" id = "sign_up_button" class=" centeredLink loginBox__link loginBox__link--active"
           data-toggle="modal" data-target="#sign_up_div"
           {{--onclick="event.preventDefault();document.getElementById('sign_up_div').style.display = 'block';"--}}
        >
            Sign up
        </a>
    </div>

    @endif
