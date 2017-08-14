<tr>
    <td class=" ">
        <span>{{$appointment->transaction_id}}</span>
    </td>
    <td class=" ">
        {{$appointment->id}}
    </td>
    <td class=" ">
        <span>{{$appointment->date_start}}</span>
    </td>
    <td class=" ">
        <span>{{$appointment->date_end}}</span>

    </td>
    <td class="">
        {{$appointment->amount}}
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