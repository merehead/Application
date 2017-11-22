<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-money" aria-hidden="true"></i>
          </span>
        payouts to carers
    </h2>
    <div class="panelHead">
        {!! Form::open(['method'=>'GET','route'=>'PayoutsToCarers']) !!}
        <div class="filterBox">
            <div class="formField formField--search">
                <div class="fieldWrap">
                    {!! Form::text('userName',null,['class'=>'formItem formItem--input formItem--search','maxlength'=>'60','placeholder'=>'Name']) !!}
                </div>

            </div>
            {!! Form::submit('filter',['class'=>'actionsBtn actionsBtn--filter actionsBtn--bigger']) !!}
        </div>
        {!! Form::close()!!}
        <div class="panelHead__group">
            <a href="#" class="print">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <div class="tableWrap tableWrap--margin-t">
        <table class="adminTable">
            <thead>
                <tr>
                    <td class=" ordninary-td no-padding-l">
                      <span class="td-title td-title--transaction">
                        transaction id
                      </span>
                    </td>
                    <td class=" ordninary-td ordninary-td--wider no-padding-l">
                      <span class="td-title td-title--orange">
                      carer
                      </span>
                    </td>
                    <td class="bigger-td bigger-td--middle">
                      <span class="td-title td-title--booking ">
                        booking
                      </span>
                    </td>
                </tr>
                <tr class="extra-tr">
                    <td></td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="idField">
                                    <span class="extraTitle">id</span>
                                </td>
                                <td class="nameField">
                                    <span class="extraTitle">name</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="">
                                    <span class="extraTitle">total</span>
                                </td>
                                <td class="">
                                    <span class="extraTitle">actions</span>
                                </td>
                                <td class="">
                                    <span class="extraTitle">payout status</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </thead>
            <tbody>
            @if($transfers->count() > 0 || count($potentialPayouts) > 0)
                @foreach($potentialPayouts as $potentialPayout)
                    <tr>
                        <td align="center">
                            -
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span>{{$potentialPayout->carer_id}}</span>
                                    </td>
                                    <td class="nameField">
                                        <a href="#" class="tableLink">{{$potentialPayout->first_name.' '.$potentialPayout->family_name}}</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="">
                                        <span><i class="fa fa-gbp" aria-hidden="true"></i> {{$potentialPayout->total}}</span>
                                    </td>
                                    <td class="nameField">
                                        <div class="actionsGroup">
                                            <button data-booking_id="{{$potentialPayout->booking_id}}" class="makePayout actionsBtn actionsBtn--accept">
                                                payout bookings
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="profStatus profStatus--left">
                                            <span class="profStatus__item profStatus__item--progress">pending</span>

                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                @foreach($transfers as $transfer)
                <tr>
                    <td  align="center">
                        {{$transfer->id}}
                    </td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="idField">
                                    <span>{{$transfer->booking->bookingCarer->id}}</span>
                                </td>
                                <td class="nameField">
                                    <a href="#" class="tableLink">{{$transfer->booking->bookingCarerProfile->full_name}}</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td class="for-inner">
                        <table class="innerTable ">
                            <tbody><tr>
                                <td class="">
                                    <span><i class="fa fa-gbp" aria-hidden="true"></i> {{$transfer->amount/100}}</span>
                                </td>
                                <td class="nameField">
                                    <div class="actionsGroup">
                                        {{--<a href="#" class="actionsBtn actionsBtn--accept">--}}
                                            {{--payout bookings--}}
                                        {{--</a>--}}
                                        -
                                    </div>
                                </td>
                                <td>
                                    <div class="profStatus profStatus--left">
                                        <span class="profStatus__item profStatus__item--new">paid</span>

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" align="center">
                        -
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.makePayout').click(function () {
        showSpinner();
        var booking_id = $(this).attr('data-booking_id');
        $.post('/admin/carer-payout/'+booking_id, function (data) {
            if(data.status == 'success'){
                location.reload();
            } else {
                showErrorModal({title: 'Error', description: data.message});
            }

            hideSpinner();
        });
    });
</script>