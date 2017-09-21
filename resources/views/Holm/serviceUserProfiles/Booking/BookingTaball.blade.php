@include(config('settings.frontTheme').'.serviceUserProfiles.Booking.BookingTabHeader')
<div class="justifyContainer justifyContainer--smColumn">
    <div class="bookingNav">
        <a href="/purchaser-settings/booking/all" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              ALL
            </span>
        </a>
        <a href="/purchaser-settings/booking/new" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              new
            </span>
        </a>
        <a href="/purchaser-settings/booking/progress" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              in progress
            </span>
        </a>
        <a href="/purchaser-settings/booking/completed" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              completed
            </span>
        </a>
    </div>
    <a href="#" class="printIco">
        <img src="/img/print.png" alt="">
    </a>
</div>

<div class="bookings">
    @if($status == 'all' || $status == 'new')
        <div class="bookingCard bookingCard--new">
            <div class="bookingCard__header bookingCard__header">
                <h2>new</h2>
            </div>
            @if($newBookings->count() > 0)
                @foreach($newBookings as $booking)
                    <div class="bookingCard__body bookInfo">
                        <div class="bookInfo__profile">
                            <a href="Service_user_Public_profile_page.html" class="profilePhoto bookInfo__photo">
                                <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" alt="">
                            </a>
                            <div class="bookInfo__text">
                                <p>You booked <a href="Service_user_Public_profile_page.html">{{$booking->bookingCarer()->first()->full_name}}</a></p>
                                <a href="NewAnAppointment_New.html" class="">view details</a>
                            </div>

                        </div>
                        <div class="bookInfo__date">
                            <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
                            <p class="hourPrice">
                                {{$booking->hours}}h / <span>£{{$booking->hour_price * $booking->hours}}</span>

                            </p>
                        </div>
                        <div class="bookInfo__btns">
                            <div class="roundedBtn">
                                <a href="#" class="roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                                    accept
                                </a>
                            </div>
                            <div class="roundedBtn">
                                <a href="#" class="roundedBtn__item roundedBtn__item--smalest roundedBtn__item--reject">
                                    reject
                                </a>
                            </div>
                            <div class="roundedBtn">
                                <a href="#" class="roundedBtn__item   roundedBtn__item--alternative-smal">
                                    OFFER ALTERNATIVE TIME
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                -
            @endif
        </div>
    @endif


    @if($status == 'all' || $status == 'progress')
        <div class="bookingCard bookingCard--progress">
            <div class="bookingCard__header bookingCard__header">
                <h2>in progress</h2>
            </div>
            @if($inProgressBookings->count() > 0)
                @foreach($inProgressBookings as $booking)
                    <div class="bookingCard__body bookInfo">
                        <div class="bookInfo__profile">
                            <a href="Service_user_Public_profile_page.html" class="profilePhoto bookInfo__photo">
                                <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" alt="">
                            </a>
                            <div class="bookInfo__text">
                                <p>You booked <a href="Service_user_Public_profile_page.html">{{$booking->bookingCarer()->first()->full_name}}</a></p>
                                <a href="NewAnAppointment_New.html" class="">view details</a>
                            </div>

                        </div>
                        <div class="bookInfo__date">
                            <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
                            <p class="hourPrice">
                                {{$booking->hours}}h / <span>£{{$booking->hour_price * $booking->hours}}</span>

                            </p>
                        </div>
                        <div class="bookInfo__btns">
                            <div class="roundedBtn">
                                <a href="#" class="roundedBtn__item roundedBtn__item--smalest roundedBtn__item--cancel">
                                    cancel
                                </a>
                            </div>
                            <div class="roundedBtn">
                                <a href="#" class="roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                                    completed
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            @else
                -
            @endif
            @if($inProgressBookings->count() > 3)
                <div class="moreBtn moreBtn--book ">
                    <a href="" class="moreBtn__item moreBtn__item--book centeredLink">
                        Load More
                    </a>
                </div>
            @endif
        </div>
    @endif



    @if($status == 'all' || $status == 'completed')
        <div class="bookingCard bookingCard--complete">
            <div class="bookingCard__header bookingCard__header">
                <h2>completed</h2>
            </div>
            @if($completedBookings->count() > 0)
                @foreach($completedBookings as $booking)
                    <div class="bookingCard__body bookInfo">
                        <div class="bookInfo__profile">
                            <a href="Service_user_Public_profile_page.html" class="profilePhoto bookInfo__photo">
                                <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" alt="">
                            </a>
                            <div class="bookInfo__text">
                                <p>You booked <a href="Service_user_Public_profile_page.html">{{$booking->bookingCarer()->first()->full_name}}</a></p>
                                <a href="NewAnAppointment_New.html" class="">view details</a>
                            </div>

                        </div>
                        <div class="bookInfo__date">
                            <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
                            <p class="hourPrice">
                                {{$booking->hours}}h / <span>£{{$booking->hour_price * $booking->hours}}</span>

                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                -
            @endif
            @if($completedBookings->count() > 3)
                <div class="moreBtn moreBtn--book ">
                    <a href="" class="moreBtn__item moreBtn__item--book centeredLink">
                        Load More
                    </a>
                </div>
            @endif
        </div>
    @endif
</div>

</div>
</section>