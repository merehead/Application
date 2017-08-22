        <div class="mainPanel">
            <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
                dispute payouts
            </h2>
            <div class="panelHead">
                {{--   <div class="filterGroup">
                       <div class="filterBox">
                           <h2 class="filterBox__title themeTitle">
                   <span class="categoryTitle__ico">
                     <i class="fa fa-check-square" aria-hidden="true"></i>
                   </span>
                               dispute payouts

                           </h2>
                           <div class="formField ">
                   <span class="dateValue">
                     30 JUN 2017
                   </span>
                           </div>

                       </div>
                       <div class="filterBox">
                           <h2 class="filterBox__title themeTitle">
                               £ 1000
                           </h2>
                       </div>--}}
{{--                    <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger">
                        filter
                    </a>--}}
{{--                    <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger">
                        payout all
                    </a>
                </div>--}}

                <div class="panelHead__group">
                    {!! Form::open(['method'=>'GET','route'=>'dispute-payout.index']) !!}
                    <div class="filterBox">
                        <h2 class="filterBox__title themeTitle">
                            sort by
                        </h2>
                        <div class="formField formField--fixed">
{{--                            <select class="formItem formItem--select">
                                <option value="#">
                                    --Text--
                                </option>
                            </select>--}}
                            {!! Form::select('filter',['0'=>'ALL','1'=>'PAID TO CARER','2'=>'PAID TO PURCHASER','3'=>'NEW'],
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

            @include(config('settings.theme').'.disputePayouts.mainTable')


        </div>
