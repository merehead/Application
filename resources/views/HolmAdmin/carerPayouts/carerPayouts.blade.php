<div class="mainPanel">
    <h2 class="categoryTitle"><span class="categoryTitle__ico"><i class="fa fa-money" aria-hidden="true"></i></span>payouts to carers</h2>
    {!! Form::open(['method'=>'GET','action'=>'Admin\CarerPayout\CarerPayoutController@index','id'=>'user_filter']) !!}
    <div class="panelHead">
        <div class="panelHead__group">
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    sort by
                </h2>
                <div class="formField formField--fixed">
                    {!! Form::select('status_id',[''=>'Any']+$appointmentStatus,null,['class'=>'formItem formItem--select']) !!}
                </div>
            </div>
            <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger" onclick="event.preventDefault();document.getElementById('user_filter').submit();">
                filter
            </a>
        </div>
        <div class="panelHead__group">
            <a href="javascript: window.print();" class="print">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    {!! Form::close()!!}
    @include(config('settings.theme').'.carerPayouts.mainTable')


</div>
