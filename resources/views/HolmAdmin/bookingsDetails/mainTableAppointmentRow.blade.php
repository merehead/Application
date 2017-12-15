<tr>
    <td class=" ">
        @if(!empty($appointment->transaction))
            {{$appointment->transaction->id}}
        @else
            <span></span>
        @endif
    </td>
    <td class=" ">
        {{$appointment->id}}
    </td>
    <td class=" ">
        <span>{{$appointment->formatted_date_start}} {{$appointment->formatted_time_from}}</span>
    </td>
    <td class=" ">
        <span>{{$appointment->formatted_date_start}} {{$appointment->formatted_time_to}}</span>

    </td>
    <td class="">
        {{$appointment->purchaser_price}}
    </td>
    <td class="">
        {{$appointment->carer_price}}
    </td>
    <td class=" ">
        <div class="profStatus profStatus--left">
            <span class="profStatus__item profStatus__item--{{$appointment->appointmentStatus->css_name}}">{{$appointment->appointmentStatus->name}}</span>
        </div>
    </td>
    <td class=" ">
        <div class="profStatus profStatus--left">
            <span class="profStatus__item profStatus__item--{{$appointment->appointmentStatusCarer->css_name}}">{{$appointment->appointmentStatusCarer->name}}</span>
        </div>
    </td>
    <td class=" ">
        <div class="profStatus profStatus--left">
            <span class="profStatus__item profStatus__item--{{$appointment->appointmentStatusPurchaser->css_name}}">{{$appointment->appointmentStatusPurchaser->name}}</span>
        </div>
    </td>

</tr>