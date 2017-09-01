<tr>
    <td>

    </td>
    <td>

    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$appointment->booking->carer_id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">{{$appointment->booking->bookingCarer->id}}</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="">
                    <span>1000</span>
                </td>
                <td class="nameField">
                    <div class="actionsGroup">
                        <a href="#" class="actionsBtn actionsBtn--accept">
                            payout bookings
                        </a>
                        <a href="#" class="actionsBtn actionsBtn--reject">
                            cancel booking
                        </a>
                        <a href="#" class="actionsBtn actionsBtn--accept">
                            delay booking
                        </a>
                    </div>

                </td>
                <td>
                    <div class="profStatus profStatus--left">
                        <span class="profStatus__item profStatus__item--new">PAID  r</span>
                        <span class="profStatus__item profStatus__item--canceled">canceled  </span>
                        <span class="profStatus__item profStatus__item--progress"> delayed</span>

                    </div>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="">
                    <span>1000</span>
                </td>
                <td class="">
                    <div class="actionsGroup">
                        <a href="#" class="actionsBtn actionsBtn--accept">
                            payout bookings
                        </a>
                        <a href="#" class="actionsBtn actionsBtn--reject">
                            cancel booking
                        </a>
                        <a href="#" class="actionsBtn actionsBtn--accept">
                            delay booking
                        </a>
                    </div>

                </td>
                <td>
                    <div class="profStatus profStatus--left">
                        <span class="profStatus__item profStatus__item--new">PAID  r</span>
                        <span class="profStatus__item profStatus__item--canceled">canceled  </span>
                        <span class="profStatus__item profStatus__item--progress"> delayed</span>

                    </div>
                </td>
            </tr>
        </table>
    </td>


</tr>



{{--

<tr>
    <td>

    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$appointment->booking->purchaser_id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">{{$appointment->booking->bookingPurchaser->fname}}</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$appointment->booking->carer_id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">{{$appointment->booking->bookingCarer->fname}}</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$appointment->booking->id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">some room</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class=" ">
                    @if(!empty($appointment->transaction))
                        {{$appointment->transaction->id}}
                    @else
                        <span></span>
                    @endif
                </td>
            </tr>

        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class=" ">
                    <span>{{$appointment->id}}</span>
                </td>

                <td class=" ">
                    <span>{{$appointment->date_start}}</span>
                </td>
                <td class=" ">
                    <span>{{$appointment->date_end}}</span>

                </td>
                <td class="">
                    <span>{{$appointment->amount}}</span>
                </td>


            </tr>

        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class=" ">
                    <span>some details</span>
                </td>
                <td class=" ">
                    <span>some details</span>
                </td>
            </tr>

        </table>
    </td>
    <td>


        @if(empty($appointment->disputePayment))
        <div class="actionsGroup">
            <a href="{{route('DisputePayoutToCarer',[$appointment->id,$appointment->booking->purchaser_id,$appointment->amount_for_carer])}}" class="actionsBtn actionsBtn--accept actionsBtn--wider">
                pay out to carer
            </a>
            <a href="{{route('DisputePayoutToPurchaser',[$appointment->id,$appointment->booking->carer_id,$appointment->amount_for_purchaser])}}" class="actionsBtn actionsBtn--view actionsBtn--wider">
                pay out to purchaser
            </a>
        </div>
        @endif
    </td>
    <td>
        @if(!empty($appointment->disputePayment))
        <div class="profStatus profStatus--left">
--}}
{{--
            <span class="profStatus__item profStatus__item--new">PAID TO Purchaser</span>
--}}{{--

            <span class="profStatus__item profStatus__item--{{$appointment->disputePayment->css_name}}">{{$appointment->disputePayment->name}}</span>
        </div>
        @endif
    </td>

</tr>
--}}
