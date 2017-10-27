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
                    @if(!empty($booking->bookingPurchaserProfile) && count($booking->bookingPurchaserProfile))
                    <a href="#" class="tableLink">{{$booking->bookingPurchaserProfile->first_name}} {{$booking->bookingPurchaserProfile->family_name}}</a>
                        @endif
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
                    @if(!empty($booking->bookingServiceUser && count($booking->bookingServiceUser)))
                    <a href="#" class="tableLink">{{$booking->bookingServiceUser->first_name}} {{$booking->bookingServiceUser->family_name}}</a>
                        @endif
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
                    @if(!empty($booking->bookingCarerProfile && count($booking->bookingCarerProfile)))
                    <a href="#" class="tableLink">{{$booking->bookingCarerProfile->first_name}} {{$booking->bookingCarerProfile->family_name}}</a>
                        @endif
                </td>
            </tr>
        </table>
    </td>



    <td class="for-inner">
        <table class="innerTable ">
            <tr>
                <td class=" ">
                    <span><a href="{{url('/bookings/'.$booking->id.'/details')}}" target="_blank">{{$booking->id}}</a></span>
                </td>
                <td class=" ">
                    <span>{{$booking->date_start}}</span>
                </td>
                <td class=" ">
                   <span>{{$booking->date_end}}</span>
                </td>
{{--                <td class=" ">
                    <span>frequency->name</span>
                </td>--}}
                <td class=" ">
                    <div class="profStatus profStatus--left">
                       <span class="profStatus__item profStatus__item--{{$booking->bookingStatus->css_name}}">{{$booking->bookingStatus->name}}</span>
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