<tr>
{{--    <td>

    </td>--}}
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$booking->purchaser_id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">{{$booking->bookingPurchaser->name}}</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$booking->service_user_id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">{{$booking->bookingServiceUser->name}}</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class="idField">
                    <span>{{$booking->carer_id}}</span>
                </td>
                <td class="nameField">
                    <a href="#" class="tableLink">{{$booking->bookingCarer->name}}</a>
                </td>
            </tr>
        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class=" ">
                    <span>{{$booking->id}}</span>
                </td>
                <td class=" ">
                    <span>{{$booking->date_start}}</span>
                </td>
                <td class=" ">
                    <span>{{$booking->date_end}}</span>
                </td>
                <td class=" ">
                    <span>{{$booking->frequency->name}}</span>
                </td>
                <td class=" ">
                    <div class="profStatus profStatus--left">
                        <span class="profStatus__item profStatus__item--{{$booking->bookingStatus->css_name}}">{{$booking->bookingStatus->name}}</span>
                    </div>
                </td>
                <td class=" ">
                    <div class="profStatus profStatus--left">
                        <span class="profStatus__item profStatus__item--{{$booking->bookingStatusCarer->css_name}}">{{$booking->bookingStatusCarer->name}}</span>
                    </div>
                </td>
                <td class=" ">
                    <div class="profStatus profStatus--left">
                        <span class="profStatus__item profStatus__item--{{$booking->bookingStatusPurchaser->css_name}}">{{$booking->bookingStatusPurchaser->name}}</span>
                    </div>
                </td>

            </tr>

        </table>
    </td>
    <td class="for-inner">
        <table class="innerTable ">
            @foreach($booking->appointments as $appointment)
                @include(config('settings.theme').'.bookingsDetails.mainTableAppointmentRow')
            @endforeach
        </table>
    </td>

</tr>