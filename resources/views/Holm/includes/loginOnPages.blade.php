
    @if (Auth::check())
    <a href="#" class="registeredCarer">
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
           onclick="event.preventDefault();document.getElementById('login').style.display = 'block';"
        >
            Login
        </a>
        <a href="/" class=" centeredLink loginBox__link loginBox__link--active">
            Sign up
        </a>
    </div>
    @endif
