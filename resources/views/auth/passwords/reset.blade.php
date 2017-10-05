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
                    set a new password
                </a>

            </div>

            <div class="forgottenBox">
                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="forgotPass">
                        <div class="forgotPass__title">
                            <h2>
                                set a new password
                            </h2>
                        </div>
                        <p class="forgot-p forgot-p--center">
                            Please enter your email and new password
                        </p>

                        @if ($errors->any())
                            <br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="formRow">
                            <div class="formColumn ">
                                <div class="formField">
                                    <h2 class="formLabel">
                                        E-Mail Address
                                    </h2>
                                    <div class="inputWrap {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input minlength="6" name="email" class="formInput registrationForm__input"
                                               placeholder="*********" type="email">
                                        <span class="inputIco registrationForm__ico">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
                                        <span class="inputIco registrationForm__ico registrationForm__ico--right">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </span>

                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="formRow">
                            <div class="formColumn ">
                                <div class="formField">
                                    <h2 class="formLabel">
                                        new password
                                    </h2>
                                    <div class="inputWrap {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input minlength="6" name="password" class="formInput registrationForm__input"
                                               placeholder="*********" type="password">
                                        <span class="inputIco registrationForm__ico">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
                                        <span class="inputIco registrationForm__ico registrationForm__ico--right">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </span>

                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="formRow">
                            <div class="formColumn ">
                                <div class="formField">
                                    <h2 class="formLabel">
                                        repeat password
                                    </h2>
                                    <div class="inputWrap {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <input minlength="6" class="formInput registrationForm__input"
                                               name="password_confirmation"
                                               id="password_confirmation"
                                               placeholder="*********" type="password">
                                        <span class="inputIco registrationForm__ico">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
                                        <span class="inputIco registrationForm__ico registrationForm__ico--right">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </span>

                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="roundedBtn roundedBtn--center roundedBtn--margin-top">
                            <button type="submit"
                                    class="roundedBtn__item roundedBtn__item--full roundedBtn__item--full">
                                Confirm password
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection

@section('footer')
    @include(config('settings.frontTheme').'.footers.baseFooter')
@endsection
@section('modals')
    @include(config('settings.frontTheme').'.includes.modals')
@endsection

{{--@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
