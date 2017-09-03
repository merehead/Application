<tr>
    <td>

    </td>
    <td>

    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$user->id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">{{$user->email}}</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        @if(count($user->userPurchaser))
        <table class="innerTable ">
            @foreach($user->userPurchaser as $item)
            <tr>
                <td class="">
                    <span>{{$item->amount_for_carer}}</span>
                </td>
                @if($item->status_id==4 || $item->status_id==8 || $item->status_id==9)
                    <td class="nameField"></td>
                    <td>
                        <div class="profStatus profStatus--left">
                            @if($item->status_id==8)
                                <span class="profStatus__item profStatus__item--new">PAID</span>
                            @endif
                            @if($item->status_id==4)
                                <span class="profStatus__item profStatus__item--canceled">canceled</span>
                            @endif
                            @if($item->status_id==9)
                                <span class="profStatus__item profStatus__item--progress"> delayed</span>
                            @endif
                        </div>
                    </td>

                @else

                    <td class="nameField">
                        <div class="actionsGroup">
                            <a href="{{route('BookingPayoutToCarer',['pay',$item->id,$item->amount_for_carer])}}"
                               class="actionsBtn actionsBtn--accept">
                                payout bookings
                            </a>
                            <a href="{{route('BookingPayoutToCarer',['cancel',$item->id,$item->amount_for_carer])}}"
                               class="actionsBtn actionsBtn--reject">
                                cancel booking
                            </a>
                            <a href="{{route('BookingPayoutToCarer',['delay',$item->id,$item->amount_for_carer])}}"
                               class="actionsBtn actionsBtn--accept">
                                delay booking
                            </a>

                        </div>

                    </td>
                    <td></td>



                @endif
            </tr>
            @endforeach
        </table>
        @endif
    </td>
    <td class="for-inner">
        @if(count($user->bonusAcceptors))
            <table class="innerTable ">

                @foreach($user->bonusAcceptors as $item)

                    <tr>
                        <td class="">
                            <span>{{$item->amount}}</span>
                        </td>

                        @if($item->payment_status == 'NEW')
                            <td class="">
                                <div class="actionsGroup">
                                    <a href="{{route('BonusPayoutToPurchaser',['pay',$item->id,$item->amount])}}"
                                       class="actionsBtn actionsBtn--accept">
                                        payout
                                    </a>
                                    <a href="{{route('BonusPayoutToPurchaser',['cancel',$item->id,$item->amount])}}"
                                       class="actionsBtn actionsBtn--reject">
                                        cancel
                                    </a>
                                    <a href="{{route('BonusPayoutToPurchaser',['delay',$item->id,$item->amount])}}"
                                       class="actionsBtn actionsBtn--accept">
                                        delay
                                    </a>
                                </div>
                            </td>
                            <td></td>
                        @else
                            <td></td>
                            <td>
                                <div class="profStatus profStatus--left">
                                    @if($item->payment_status == 'PAID')
                                        <span class="profStatus__item profStatus__item--new">PAID</span>
                                    @endif
                                    @if($item->payment_status == 'CANCELLED')
                                        <span class="profStatus__item profStatus__item--canceled">canceled  </span>
                                    @endif
                                    @if($item->payment_status == 'DELAYED')
                                        <span class="profStatus__item profStatus__item--progress"> delayed</span>
                                    @endif
                                </div>
                            </td>
                        @endif
                    </tr>

                @endforeach
            </table>
        @endif
    </td>


</tr>
