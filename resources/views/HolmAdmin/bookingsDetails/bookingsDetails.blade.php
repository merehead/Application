        <div class="mainPanel">
            <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                booking details
            </h2>
            <div class="panelHead">
{{--
                <div class="filterGroup">
                    <div class="filterBox">
                        <h2 class="filterBox__title themeTitle">
                            booking details
                        </h2>
--}}
{{--                        <div class="formField ">
                <span class="dateValue">
                  30 JUN 2017
                </span>
                        </div>--}}{{--


                    </div>



                </div>
--}}

                <div class="panelHead__group">
                    {!! Form::open(['method'=>'GET','route'=>'booking.index']) !!}
                    <div class="filterBox">
                        <h2 class="filterBox__title themeTitle">
                            filter by
                        </h2>
                        <div class="formField formField--fixed">
{{--                            <select class="formItem formItem--select">
                                <option value="#">
                                    --Text--
                                </option>
                            </select>--}}
                            {!! Form::select('filter',['0'=>'ALL','1'=>'NEW','2'=>'COMPLETED','3'=>'IN PROGRESS','4'=>'CANCELLED','5'=>'DISPUTE'],
                            null,['class'=>'formItem formItem--select']) !!}
                        </div>

                        {!! Form::submit('filter',['class'=>'actionsBtn actionsBtn--filter actionsBtn--bigger']) !!}
                    </div>
                    {!! Form::close()!!}

                </div>
                <a href="#" class="print">
                    <i class="fa fa-print" aria-hidden="true"></i>
                </a>

            </div>
            @include(config('settings.theme').'.bookingsDetails.mainTable')

        </div>

