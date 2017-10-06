@extends(config('settings.frontTheme').'.layouts.carerPrivateProfile',['title'=>''])
@section('header')
    @include(config('settings.frontTheme').'.headers.baseHeader')

    @endsection
@section('content')
<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">&gt;</span>
            <a href="{{ route('password.request') }}" class="breadcrumbs__item">
                Forgotten password
            </a>

        </div>
        @if (!session('status'))

            <div class="forgottenBox">
                <div class="forgotPass">
                    <div class="forgotPass__title">
                        <h2>
                            Forgotten password
                        </h2>
                    </div>
                    <p class="forgot-p forgot-p--center">
                        Please enter the email address of your account
                    </p>
                    <form class="forgotPass__form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="formField">
                            <div class="inputWrap">
                                <input type="text" name="email" class="formInput forgotPass__input" placeholder="Your email">
                                <span class="forgotPass__ico inputIco"><i class="fa fa-envelope"></i></span>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="roundedBtn roundedBtn--center roundedBtn--margin-top">
                            <button class="roundedBtn__item roundedBtn__item--contact">
                                Reset password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @else
        <div class="forgottenBox">
            <div class="forgotPass forgotPass--success">

          <span class="successIco">
            <i class="fa fa-handshake-o" aria-hidden="true"></i>
          </span>
                <span class="statusMessage">
            Successful
          </span>
                <p class="forgot-p forgot-p--center">
                    We have sent an email to <span class="successMail">{{session('email')}}.</span> Please click the link in that email to reset your password.
                </p>

            </div>
        </div>
        @endif
    </div>
</section>
@endsection
@section('footer')
    @include(config('settings.frontTheme').'.footers.baseFooter')
@endsection
@section('modals')
    @include(config('settings.frontTheme').'.includes.modals')
@endsection