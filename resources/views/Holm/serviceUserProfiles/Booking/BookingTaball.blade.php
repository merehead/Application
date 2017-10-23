@include(config('settings.frontTheme').'.serviceUserProfiles.Booking.BookingTabHeader')
<section class="mainSection">
    <div class="container">
        <div class="justifyContainer justifyContainer--smColumn">
            <div class="bookingNav">
                <a href="/serviceUser-settings/booking/{{$serviceUser->id}}/all" class="bookingNav__link centeredLink">
                    <span class="bookingNav__text">
                      ALL
                    </span>
                </a>
                <a href="/serviceUser-settings/booking/{{$serviceUser->id}}/pending" class="bookingNav__link centeredLink">
                    <span class="bookingNav__text">
                      pending
                    </span>
                </a>
                <a href="/serviceUser-settings/booking/{{$serviceUser->id}}/progress" class="bookingNav__link centeredLink">
                    <span class="bookingNav__text">
                      in progress
                    </span>
                </a>
                <a href="/serviceUser-settings/booking/{{$serviceUser->id}}/completed" class="bookingNav__link centeredLink">
                    <span class="bookingNav__text">
                      completed
                    </span>
                </a>
                <a href="/serviceUser-settings/booking/{{$serviceUser->id}}/canceled" class="bookingNav__link centeredLink">
                    <span class="bookingNav__text">
                      cancelled
                    </span>
                </a>
            </div>
            <a href="javascript: window.print();" class="printIco">
                <img src="/img/print.png"  alt="">
            </a>
        </div>

        <div class="bookings">
            @if($status == 'all' || $status == 'pending')
                <div class="bookingCard bookingCard--new">
                    <div class="bookingCard__header bookingCard__header">
                        <h2>pending</h2>
                    </div>
                    @if($newBookings->count() > 0)
                        @foreach($newBookings as $booking)
                            <div class="bookingCard__body bookInfo">
                                <div class="bookInfo__profile">
                                    <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="profilePhoto bookInfo__photo">
                                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" alt="">
                                    </a>
                                    <div class="bookInfo__text">
                                        <p>You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->full_name}}</a></p>
                                        <a href="{{url('bookings/'.$booking->id.'/details')}}" class="">view details</a>
                                    </div>

                                </div>
                                <div class="bookInfo__date">
                                    <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
                                    <p class="hourPrice">
                                        {{$booking->hours}}h / <span>£{{$booking->price}}</span>

                                    </p>
                                </div>
                                <div class="bookInfo__btns">
                                    <div class="roundedBtn">
                                        <button {{!in_array($booking->purchaser_status_id, [2]) ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}" data-status = "accept"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                                            accept
                                        </button>
                                    </div>
                                    <div class="roundedBtn">
                                        <button {{!in_array($booking->purchaser_status_id, [2]) ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}" data-status = "reject" class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--reject">
                                            reject
                                        </button>
                                    </div>
                                    <div class="roundedBtn">
                                        <button {{!in_array($booking->purchaser_status_id, [2]) ? 'disabled' : ''}} data-id="{{$booking->id}}"  class="roundedBtn__item   roundedBtn__item--alternative-smal">
                                            OFFER ALTERNATIVE TIME
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p align="center" class="bookDate">You do not have bookings yet</p>
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
                                    <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="profilePhoto bookInfo__photo">
                                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" alt="">
                                    </a>
                                    <div class="bookInfo__text">
                                        <p>You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->full_name}}</a></p>
                                        <a href="{{url('bookings/'.$booking->id.'/details')}}" class="">view details</a>
                                    </div>

                                </div>
                                <div class="bookInfo__date">
                                    <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
                                    <p class="hourPrice">
                                        {{$booking->hours}}h / <span>£{{$booking->price}}</span>

                                    </p>
                                </div>
                                <div class="bookInfo__btns">
                                    <div class="roundedBtn">
                                        <button  {{!in_array($booking->purchaser_status_id, [3, 5]) ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "cancel"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--cancel">
                                            cancel
                                            </a>
                                    </div>
                                    <div class="roundedBtn">
                                        <button  {{!in_array($booking->purchaser_status_id, [3, 5]) || $booking->has_active_appointments ? 'disabled' : ''}}   data-booking_id = "{{$booking->id}}"  data-status = "completed"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                                            completed
                                        </button>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @else
                        <p align="center" class="bookDate">You do not have bookings yet</p>
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
                                    <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="profilePhoto bookInfo__photo">
                                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" alt="">
                                    </a>
                                    <div class="bookInfo__text">
                                        <p>You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->full_name}}</a></p>
                                        <a href="{{url('bookings/'.$booking->id.'/details')}}" class="">view details</a>
                                    </div>

                                </div>
                                <div class="bookInfo__date">
                                    <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
                                    <p class="hourPrice">
                                        {{$booking->hours}}h / <span>£{{$booking->price}}</span>
                                    </p>
                                    <div class="roundedBtn">
                                        <button {{$booking->overviews()->get()->count() ? 'disabled' : ''}} onclick="location.replace('{{url('/bookings/'.$booking->id.'/leave_review')}}')" class="roundedBtn__item roundedBtn__item--smalest roundedBtn__item--forReview">
                                            leave review
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p align="center" class="bookDate">You do not have bookings yet</p>
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

            @if($status == 'all' || $status == 'canceled')
                <div class="bookingCard bookingCard--complete">
                    <div class="bookingCard__header bookingCard__header">
                        <h2>cancelled</h2>
                    </div>
                    @if($canceledBookings->count() > 0)
                        @foreach($canceledBookings as $booking)
                            <div class="bookingCard__body bookInfo">
                                <div class="bookInfo__profile">
                                    <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="profilePhoto bookInfo__photo">
                                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" alt="">
                                    </a>
                                    <div class="bookInfo__text">
                                        <p>You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->full_name}}</a></p>
                                        <a href="{{url('bookings/'.$booking->id.'/details')}}" class="">view details</a>
                                    </div>

                                </div>
                                <div class="bookInfo__date">
                                    <span class="bookDate">{{$booking->appointments()->get()->count()}} Appointment{{$booking->appointments()->get()->count() > 1 ? 's':''}}</span>
                                    <p class="hourPrice">
                                        {{$booking->hours}}h / <span>£{{$booking->price}}</span>

                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p align="center" class="bookDate">You do not have bookings yet</p>
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

<script>
    $('.changeBookingStatus').click(function () {
        var booking_id = $(this).attr('data-booking_id');
        var status = $(this).attr('data-status');
        $.post('/bookings/'+booking_id+'/'+status, function (data) {
            if(data.status == 'success'){
                location.reload();
            }
        });
    });

</script>