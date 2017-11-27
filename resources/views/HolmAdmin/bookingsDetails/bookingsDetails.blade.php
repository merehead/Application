        <div class="mainPanel">
            <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                booking details
            </h2>
            <div class="panelHead">

                <div class="panelHead__group">
                    {!! Form::open(['method'=>'GET','route'=>'booking.index']) !!}
                    <div class="filterBox">
                        <div class="formField formField--fix-biger"style="margin-right: 10px">
                            <div class="fieldWrap">
                                {!! Form::text('userName',null,['class'=>'formItem formItem--input formItem--search','maxlength'=>'60','placeholder'=>'Search name']) !!}
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <h2 class="filterBox__title themeTitle">
                            filter by
                        </h2>

                        <div class="formField formField--fixed">
                            {!! Form::select('filter',['0'=>'ALL']+$bookingStatuses,
                            null,['class'=>'formItem formItem--select','style'=>'text-transform:uppercase']) !!}
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

