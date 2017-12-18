@foreach($inProgressBookings as $booking)
    <div class="bookingCard__body bookInfo">
        <div class="bookInfo__profile">
            <a href="{{$booking->bookingServiceUser()->first()->profile_link}}" class="profilePhoto bookInfo__photo">
                <img src="{{asset('img/service_user_profile_photos/'.$booking->bookingServiceUser()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" alt="">
            </a>
            <div class="bookInfo__text">
                <p><a href="{{$booking->bookingServiceUser()->first()->profile_link}}">{{$booking->bookingServiceUser()->first()->short_full_name}}</a> booked you</p>
                <a href="{{url('bookings/'.$booking->id.'/details')}}" class="">view details</a>
            </div>

        </div>
        <div class="bookInfo__date">
            <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
            <p class="hourPrice">
                {{$booking->hours}}h / <span>£{{number_format($booking->price,2,'.',' ')}}</span>

            </p>
        </div>
        <div class="bookInfo__btns">
            <div class="roundedBtn">
                <button {{!in_array($booking->carer_status_id, [3, 5]) ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}" data-status = "cancel"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--cancel">
                    cancel
                </button>
            </div>
            <div class="roundedBtn">
                <button {{!in_array($booking->carer_status_id, [3, 5]) || $booking->has_active_appointments ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}"  data-status = "completed"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                    completed
                </button>
            </div>

        </div>

    </div>
@endforeach