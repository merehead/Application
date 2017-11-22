@include(config('settings.frontTheme').'.purchaserProfiles.Booking.BookingTabHeader')
<section class="mainSection">
    <div class="container">
        <div class="justifyContainer justifyContainer--smColumn">
            <div class="bookingNav">
                <a href="/purchaser-settings/booking/all" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              ALL
            </span>
                </a>
                <a href="/purchaser-settings/booking/pending" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              pending
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
                <a href="/purchaser-settings/booking/canceled" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              cancelled
            </span>
                </a>
            </div>
            <a href="javascript: window.print();" class="printIco">
                <img src="/img/print.png"  alt="">
            </a>


            @if($status == 'progress')
                <div class="total">
                    <div class="total__item  total__item--smaller totalBox">
                        <div class="totalTitle">
                            <p>Total </p>
                        </div>
                        <p class="totalPrice totalPrice--smaller">£{{$inProgressAmount}}</p>
                    </div>
                </div>
            @endif
            @if($status == 'completed')
                <div class="total">
                    <div class="total__item  total__item--smaller totalBox">
                        <div class="totalTitle">
                            <p>Total </p>
                        </div>
                        <p class="totalPrice totalPrice--smaller">£{{$completedAmount}}</p>
                    </div>
                </div>
            @endif
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
                                    <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'"  alt="">
                                </a>
                                <div class="bookInfo__text">
                                    <p>
                                        You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->short_full_name}}</a>
                                        for <a href="/serviceUser-settings/{{$booking->bookingServiceUser->id}}">{{$booking->bookingServiceUser->short_full_name}}</a>
                                    </p>
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
                                    <button data-booking_id = "{{$booking->id}}" data-status = "cancel" class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--reject">
                                        cancel
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
                    @if($newBookingsAll->count() >= 5)
                        <div class="moreBtn moreBtn--book ">
                            <input type="hidden" name="page" value="{{$page}}">
                            <a href="" id="moreBtnNewBookings" class="moreBtn__item moreBtn__item--book centeredLink">
                                Load More
                            </a>
                        </div>
                    @endif
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
                                    <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" onerror="this.src='/img/no_photo.png'" alt="">
                                </a>
                                <div class="bookInfo__text">
                                    <p>
                                        You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->short_full_name}}</a>
                                        for <a href="/serviceUser-settings/{{$booking->bookingServiceUser->id}}">{{$booking->bookingServiceUser->short_full_name}}</a>
                                    </p>
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
                                    </button>
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
                @if($inProgressBookingsAll->count() > 5)
                    <div class="moreBtn moreBtn--book ">
                        <input type="hidden" name="page" value="{{$page}}">
                        <a href="" id="moreBtnInProgressBookings" class="moreBtn__item moreBtn__item--book centeredLink">
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
                                        <p>
                                            You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->short_full_name}}</a>
                                            for <a href="/serviceUser-settings/{{$booking->bookingServiceUser->id}}">{{$booking->bookingServiceUser->short_full_name}}</a>
                                        </p>
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
                    @if($completedBookingsAll->count() > 5)
                        <div class="moreBtn moreBtn--book ">
                            <input type="hidden" name="page" value="{{$page}}">
                            <a href="" id="moreBtnCompletedBookings" class="moreBtn__item moreBtn__item--book centeredLink">
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
                                        <p>
                                            You booked <a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->short_full_name}}</a>
                                            for <a href="/serviceUser-settings/{{$booking->bookingServiceUser->id}}">{{$booking->bookingServiceUser->short_full_name}}</a>
                                        </p>
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
                    @if($canceledBookingsAll->count() > 5)
                        <div class="moreBtn moreBtn--book ">
                            <input type="hidden" name="page" value="{{$page}}">
                            <a href="" id="moreBtnCanceledBookings" class="moreBtn__item moreBtn__item--book centeredLink">
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
        showSpinner();
        var booking_id = $(this).attr('data-booking_id');
        var status = $(this).attr('data-status');
        $.post('/bookings/'+booking_id+'/'+status, function (data) {
            if(data.status == 'success'){
                location.reload();
            } else {
                showErrorModal({title: 'Error', description: data.message});
            }
            hideSpinner();
        });
    });


    $('#moreBtnNewBookings').on('click', function(e){
        showSpinner();
        var page = parseInt($('#moreBtnNewBookings').parent().find('input[name="page"]').val())+1;
        $('#moreBtnNewBookings').parent().find('input[name="page"]').val(page);
        $.get('/purchaser-settings/booking/new?page='+page, function (data) {
            if(data.result==true){
                $('#moreBtnNewBookings').parent().before(data.content);
            }
            if(data.hideLoadMore) $('#moreBtnNewBookings').hide();
            hideSpinner();
        });
    });

    $('#moreBtnInProgressBookings').on('click', function(e){
        showSpinner();
        var page = parseInt($('#moreBtnInProgressBookings').parent().find('input[name="page"]').val())+1;
        $('#moreBtnInProgressBookings').parent().find('input[name="page"]').val(page);
        $.get('/purchaser-settings/booking/progress?page='+page, function (data) {
            if(data.result==true){
                $('#moreBtnInProgressBookings').parent().before(data.content);
            }
            if(data.hideLoadMore) $('#moreBtnInProgressBookings').hide();
            hideSpinner();
        });
    });

    $('#moreBtnCompletedBookings').on('click', function(e){
        showSpinner();
        var page = parseInt($('#moreBtnCompletedBookings').parent().find('input[name="page"]').val())+1;
        $('#moreBtnCompletedBookings').parent().find('input[name="page"]').val(page);
        $.get('/purchaser-settings/booking/completed?page='+page, function (data) {
            if(data.result==true){
                $('#moreBtnCompletedBookings').parent().before(data.content);
            }
            if(data.hideLoadMore) $('#moreBtnCompletedBookings').hide();
            hideSpinner();
        });
    });
    $('#moreBtnCanceledBookings').on('click', function(e){
        showSpinner();
        var page = parseInt($('#moreBtnCanceledBookings').parent().find('input[name="page"]').val())+1;
        $('#moreBtnCanceledBookings').parent().find('input[name="page"]').val(page);
        $.get('/purchaser-settings/booking/canceled?page='+page, function (data) {
            if(data.result==true){
                $('#moreBtnCanceledBookings').parent().before(data.content);
            }
            if(data.hideLoadMore) $('#moreBtnCanceledBookings').hide();
            hideSpinner();
        });
    });
</script>
