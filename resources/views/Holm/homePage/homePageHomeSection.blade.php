<section class="home_section">
    <div class="container">
        <div class="home">
            <div class="home__title">
                <h1>
                    Holm Care
                </h1>
                <p>
                    Helping you find affordable care quickly and easily
                </p>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="home__search">
                        {!! Form::model(null, ['method'=>'POST','route'=>'searchPagePost','class'=>'homeForm','id'=>'carerSearchForm']) !!}
                        {!! Form::hidden('stage','carerSearch') !!}
                            {{--<input type="text"   class="homeForm__input" placeholder="enter your postcode">--}}
                        {!! Form::text('postCode',null,['autocomplete'=>'off','class'=>'homeForm__input disable','placeholder'=>'enter your postcode','maxlength'=>16,'onkeydown'=>"if(event.keyCode==13){document.getElementById('carerSearchForm').submit();}"]) !!}

                        <button href="#" type="submit" class="homeForm__btn" onclick="event.preventDefault();document.getElementById('carerSearchForm').submit();">
                  <span>
                    <i class="fa fa-search"></i>
                  </span>
                            </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
