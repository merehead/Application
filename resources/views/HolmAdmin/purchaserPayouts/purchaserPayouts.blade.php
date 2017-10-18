<div class="mainPanel">
    <h2 class="categoryTitle"><span class="categoryTitle__ico"><i class="fa fa-money" aria-hidden="true"></i></span>payouts
        to purchasers</h2>
    {!! Form::open(['method'=>'GET','action'=>'Admin\PurchaserPayout\PurchaserPayoutController@index','id'=>'user_filter']) !!}

    <div class="panelHead">
        <div class="filterBox">
            <h2 class="filterBox__title themeTitle">filter by</h2>
            <div class="formField formField--fixed">
                {!! Form::select('status_id',[''=>'Any']+$bookingStatus,null,['class'=>'formItem formItem--select']) !!}
            </div>
            <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger">filter</a>
        </div>
        <div class="panelHead__group">
            <a href="#" class="print"><i class="fa fa-print" aria-hidden="true"></i></a>
        </div>
    </div>
    {!! Form::close()!!}
    @include(config('settings.theme').'.purchaserPayouts.mainTable')
</div>
