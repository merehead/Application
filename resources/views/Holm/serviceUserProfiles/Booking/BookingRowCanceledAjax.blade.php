@foreach($canceledBookings as $booking)
    <div class="bookingCard__body bookInfo">
        <div class="bookInfo__profile">
            <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="profilePhoto bookInfo__photo">
                <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" alt="">
            </a>
            <div class="bookInfo__text">
                <p>You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->short_full_name}}</a></p>
                <a href="{{url('bookings/'.$booking->id.'/details')}}" class="">view details</a>
            </div>

        </div>
        <div class="bookInfo__date">
            <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
            <p class="hourPrice">
                {{$booking->hours}}h / <span>£{{number_format($booking->price,2,'.',' ')}}</span>

            </p>
        </div>
    </div>
@endforeach