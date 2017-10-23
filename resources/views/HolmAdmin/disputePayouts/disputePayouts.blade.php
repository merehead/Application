<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
            <i class="fa fa-check-square" aria-hidden="true"></i>
          </span>
        dispute payouts
    </h2>
    <div class="panelHead">
        <div class="filterGroup">
            <div class="filterBox">
                <div class="formField formField--fix-biger">
                    <div class="fieldWrap">
                        <input type="search" class="formItem formItem--input formItem--search" placeholder="Search...">
                        <button class="searchBtn">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="panelHead__group">
            <div class="filterBox">
                <h2 class="filterBox__title themeTitle">
                    sort by
                </h2>
                <div class="formField formField--fixed">
                    <select class="formItem formItem--select">
                        <option value="#">
                            --Text--
                        </option>
                    </select>
                </div>

            </div>
            <a href="#" class="actionsBtn actionsBtn--filter actionsBtn--bigger">
                filter
            </a>
            <a href="#" class="print">
                <i class="fa fa-print" aria-hidden="true"></i>
            </a>
        </div>

    </div>


    <div class="tableWrap tableWrap--margin-t">
        <table class="adminTable">
            <thead>
            <tr>
                <td class="orderNumber">
                  <span class="td-title td-title--number">
                   №
                  </span>
                </td>
                <td class=" ordninary-td ordninary-td--wider no-padding-l">
                  <span class="td-title td-title--green">
                  purchaser
                  </span>

                </td>

                <td class="ordninary-td ordninary-td--wider">
                  <span class="td-title td-title--orange">
                   carer
                  </span>
                </td>
                <td class="ordninary-td ordninary-td--wider">
                  <span class="td-title td-title--booking ">
                    booking
                  </span>
                </td>
                <td class="ordninary-td">
                  <span class="td-title td-title--transaction ">
                    transaction
                  </span>
                </td>
                <td class="bigger-td bigger-td--middle">
                  <span class="td-title td-title--appointment ">
                    appointment
                  </span>
                </td>
                <td class="ordninary-td  ordninary-td--big">
                  <span class="td-title td-title--admin-comment ">
                    admin comments
                  </span>
                </td>

                <td class="ordninary-td   ">
                  <span class="td-title td-title--actions ">
                    actions
                  </span>
                </td>
                <td class="ordninary-td   ">
                  <span class="td-title td-title--payout-status ">
                    payout status
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

                        </tbody></table>
                </td>
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

                        </tbody></table>
                </td>
                <td class="for-inner">
                    <table class="innerTable innerTable--no-fixed">
                        <tbody><tr>
                            <td class="idField">
                                <span class="extraTitle">id</span>
                            </td>
                            <td class="nameField">
                                <span class="extraTitle">BOOKING WORKROOM</span>
                            </td>

                        </tr>

                        </tbody></table>
                </td>
                <td class="for-inner">
                    <table class="innerTable ">
                        <tbody><tr>
                            <td class=" ">
                                <span class="extraTitle">id</span>
                            </td>
                        </tr>

                        </tbody></table>
                </td>
                <td class="for-inner">
                    <table class="innerTable ">
                        <tbody><tr>

                            <td class=" ">
                                <span class="extraTitle">appointment <br>id</span>
                            </td>
                            <td class=" ">
                                <span class="extraTitle">from</span>
                            </td>
                            <td class=" ">
                                <span class="extraTitle">to</span>
                            </td>
                            <td class="">
                                <span class="extraTitle">ammount carer</span>
                            </td>
                            <td class="">
                                <span class="extraTitle">ammount purchaser</span>
                            </td>
                        </tr>

                        </tbody></table>
                </td>
                <td class="for-inner">
                    <table class="innerTable ">
                        <tbody><tr>
                            <td class="">
                                <span class="extraTitle">Details of <br>dispute</span>
                            </td>
                            <td class=" ">
                                <span class="extraTitle">Details of <br>Dispute Resolution</span>
                            </td>

                        </tr>

                        </tbody></table>
                </td>
                <td>

                </td>
                <td>

                </td>

            </tr>


            </thead>

            <tbody>
                @if($disputePayouts->count() > 0)
                    @foreach($disputePayouts as $disputePayout)
                    <tr>
                        <td align="center">
                            {{$disputePayout->id}}
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span>{{$disputePayout->appointment->booking->bookingPurchaserProfile->id}}</span>
                                    </td>
                                    <td class="nameField">
                                        <a href="#" class="tableLink">{{$disputePayout->appointment->booking->bookingPurchaserProfile->full_name}}</a>
                                    </td>
                                </tr>
                                </tbody></table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span>{{$disputePayout->appointment->booking->bookingCarerProfile->id}}</span>
                                    </td>
                                    <td class="nameField">
                                        <a href="#" class="tableLink">{{$disputePayout->appointment->booking->bookingCarerProfile->full_name}}</a>
                                    </td>
                                </tr>
                                </tbody></table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class="idField">
                                        <span>{{$disputePayout->appointment->booking->id}}</span>
                                    </td>
                                    <td class="nameField">
                                        <a href="{{url('/bookings/'.$disputePayout->appointment->booking->id.'/details')}}" class="tableLink">Go to workroom</a>
                                    </td>
                                </tr>
                                </tbody></table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class=" " style="overflow-x: scroll;">
                                        <span>{{$disputePayout->appointment->booking->transaction->id}}</span>
                                    </td>
                                </tr>

                                </tbody></table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class=" ">
                                        <span>{{$disputePayout->appointment->id}}</span>
                                    </td>

                                    <td class=" ">
                                        <span>
                                            {{\Carbon\Carbon::parse($disputePayout->appointment->date_start)->format("d/m/Y")}}
                                            <br>
                                            {{\Carbon\Carbon::parse($disputePayout->appointment->time_from)->format("h:i A")}}
                                        </span>
                                    </td>
                                    <td class=" ">
                                        <span>{{\Carbon\Carbon::parse($disputePayout->appointment->time_to)->format("h:i A")}}</span>

                                    </td>
                                    <td class="">
                                        <span>{{$disputePayout->appointment->price_for_carer}}</span>
                                    </td>
                                    <td class="">
                                        <span>{{$disputePayout->appointment->price_for_purchaser}}</span>
                                    </td>


                                </tr>

                                </tbody></table>
                        </td>
                        <td class="for-inner">
                            <table class="innerTable ">
                                <tbody><tr>
                                    <td class=" ">
                                        <div class="formField">
                                            <div class="fieldWrap">
                                                <input type="search" data-dispute_payout_id="{{$disputePayout->id}}" class="detailsOfDispute formItem formItem--without-ico " placeholder="Text" value="{{$disputePayout->details_of_dispute}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class=" ">
                                        <div class="formField">
                                            <div class="fieldWrap">
                                                <input type="search" data-dispute_payout_id="{{$disputePayout->id}}" class="detailsOfDisputeResolution formItem formItem--without-ico " placeholder="Text" value="{{$disputePayout->details_of_dispute_resolution}}">
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                </tbody></table>
                        </td>
                        <td>
                            <div class="actionsGroup">
                                @if($disputePayout->status == 'pending')
                                <button data-dispute_payout_id="{{$disputePayout->id}}" class="makePayoutToCarer actionsBtn actionsBtn--accept actionsBtn--wider">
                                    pay out to carer
                                </button>
                                <button data-dispute_payout_id="{{$disputePayout->id}}" class="makePayoutToPurchaser actionsBtn actionsBtn--view actionsBtn--wider">
                                    pay out to purchaser
                                </button>
                                @else
                                -
                                @endif
                            </div>

                        </td>
                        <td>
                            <div class="profStatus profStatus--left">
                                @if($disputePayout->status == 'carer')
                                    <span class="profStatus__item profStatus__item--new">PAID TO Carer</span>
                                @elseif($disputePayout->status == 'purchaser')
                                    <span class="profStatus__item profStatus__item--new">PAID TO Purchaser</span>
                                @else
                                    <span class="profStatus__item profStatus__item--progress">pending</span>
                                @endif
                            </div>
                        </td>

                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" align="center">
                            -
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.detailsOfDispute').on('input', function () {
        var dispute_payout_id = $(this).attr('data-dispute_payout_id');
        var text = $(this).val();
        $.ajax({url :'/admin/dispute-payout/' + dispute_payout_id + '/detailsOfDispute', type: 'PUT', data: {'details_of_dispute': text}});
    });
    $('.detailsOfDisputeResolution').on('input', function () {
        var dispute_payout_id = $(this).attr('data-dispute_payout_id');
        var text = $(this).val();
        $.ajax({url :'/admin/dispute-payout/' + dispute_payout_id + '/detailsOfDisputeResolution', type: 'PUT', data: {'details_of_dispute_resolution': text}});
    });

    $('.makePayoutToCarer').click(function () {
        var dispute_payout_id = $(this).attr('data-dispute_payout_id');
        $.post('/admin/dispute-payout/' + dispute_payout_id + '/payoutToCarer', function (data) {
            if(data.status == 'success'){
                location.reload();
            }
        });
    });
    $('.makePayoutToPurchaser').click(function () {
        var dispute_payout_id = $(this).attr('data-dispute_payout_id');
        $.post('/admin/dispute-payout/' + dispute_payout_id + '/payoutToPurchaser', function (data) {
            if(data.status == 'success'){
                location.reload();
            }
        });
    });
</script>