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


        <div class="actionsGroup">
            <a href="{{route('DisputePayoutToCarer',[$appointment->booking->purchaser_id,$appointment->amount_for_carer])}}" class="actionsBtn actionsBtn--accept actionsBtn--wider">
                pay out to carer
            </a>
            <a href="{{route('DisputePayoutToPurchaser',[$appointment->booking->carer_id,$appointment->amount_for_purchaser])}}" class="actionsBtn actionsBtn--view actionsBtn--wider">
                pay out to purchaser
            </a>
        </div>

    </td>
    <td>
        <div class="profStatus profStatus--left">
            <span class="profStatus__item profStatus__item--new">PAID TO Purchaser</span>
            <span class="profStatus__item profStatus__item--progress"> PAID TO Carer</span>

        </div>
    </td>

</tr>