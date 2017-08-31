<header class="header">
    <div class="container">
        <div class="headerContainer">
            <a href="/" class="themeLogo">

            </a>
            <a href="index.html" class="xsNav">
        <span class="">
          <i class="fa fa-navicon"></i>
        </span>
            </a>
            <div class="collapseBox">
                <a href="{{ route('ImCarerPage') }}" class="carerSelf">
                    i am a carer
                </a>
                <div class="headerNav_container">
                    <div class="headerNav">
                        <a href="#" class="  headerNav__link">
                            find a carer
                        </a>
                        <a href="#" class=" headerNav__link">
                            about us
                        </a>
                    </div>
                    <div class="headerSocial">
                        <a href="https://www.facebook.com/HolmCareUK/" class="centeredLink headerSocial__link headerSocial__link--facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/holmcare" class="centeredLink headerSocial__link headerSocial__link--twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </div>


                    @if (Route::has('login'))
                        <div class="top-right links">
                            @if (Auth::check())
                                <a href="/carer-registration" class="registeredCarer">
                                    <div class="profilePhoto registeredCarer__img">
                                        <img src="./img/profile4.png" alt="">
                                    </div>
                                    <h2 class="profileName">
                                        Rosie P.
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
                                    <a href="" class=" centeredLink loginBox__link loginBox__link--active">
                                        Sign up
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif


                </div>
            </div>



        </div>
    </div>
</header>
