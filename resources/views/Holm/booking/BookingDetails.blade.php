<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.html" class="breadcrumbs__item">
                Home
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="Carer_Private_profile_page.html" class="breadcrumbs__item">
                My profile
            </a>
            <span class="breadcrumbs__arrow">></span>
            <a href="MY_BOOKINGS_TAB_CARER_All.html" class="breadcrumbs__item">
                My Bookings
            </a>

            <span class="breadcrumbs__arrow">></span>
            <p class="breadcrumbs__item">
                Booking
            </p>
        </div>


    </div>
    <div class="bookingRow">
        <div class="container">
            <div class="orderInfo">
                @if($user->user_type_id == 1)
                    <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="profilePhoto orderInfo__photo">
                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" alt="">
                    </a>
                    <div class="orderInfo__item orderInfo__item--rightPadding">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger"><a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->full_name}}</a></span>
                        </h2>
                        <div class="viewProfile">
                            <a href="{{$booking->bookingCarer()->first()->profile_link}}" class="viewProfile__item centeredLink">
                                view profile
                            </a>
                        </div>
                    </div>
                    <div class="orderInfo__separate"></div>
                    <div class="orderInfo__item ">
                        <div class="orderOptions">
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text ordinaryTitle__text--bigger">DATE</span>
                            </h2>
                            <span class="orderOptions__value">{{\Carbon\Carbon::parse($booking->created_at)->toFormattedDateString()}}</span>
                        </div>
                        <div class="orderOptions">
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text ordinaryTitle__text--bigger">Time</span>
                            </h2>
                            <span class="orderOptions__value">{{\Carbon\Carbon::parse($booking->created_at)->format("h:i A")}}</span>
                        </div>
                        <div class="orderOptions">
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text ordinaryTitle__text--bigger">Distance</span>
                            </h2>
                            <span id="distance" class="orderOptions__value">12 (miles)</span>
                        </div>
                        <div class="orderOptions">
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text ordinaryTitle__text--bigger">By car</span>
                            </h2>
                            <span id="duration" class="orderOptions__value">30 (min)</span>
                        </div>
                    </div>
                    <div class="orderInfo__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.71192633547!2d-0.3818036193070037!3d51.52873519756609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1497972116028"   frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            @else
                <a href="{{$booking->bookingServiceUser()->first()->profile_link}}" class="profilePhoto orderInfo__photo">
                    <img src="{{asset('img/service_user_profile_photos/'.$booking->bookingServiceUser()->first()->id.'.png')}}" alt="">
                </a>
                <div class="orderInfo__item orderInfo__item--rightPadding">
                    <h2 class="ordinaryTitle">
                        <span class="ordinaryTitle__text ordinaryTitle__text--bigger"><a href="{{$booking->bookingServiceUser()->first()->profile_link}}">{{$booking->bookingServiceUser()->first()->full_name}}</a></span>
                    </h2>
                    <div class="viewProfile">
                        <a href="{{$booking->bookingServiceUser()->first()->profile_link}}" class="viewProfile__item centeredLink">
                            view profile
                        </a>
                    </div>
                </div>
                <div class="orderInfo__separate"></div>
                <div class="orderInfo__item ">
                    <div class="orderOptions">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger">DATE</span>
                        </h2>
                        <span class="orderOptions__value">15 May 2017</span>
                    </div>
                    <div class="orderOptions">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger">Time</span>
                        </h2>
                        <span class="orderOptions__value">12:00 PM - 5:00 PM</span>
                    </div>
                    <div class="orderOptions">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger">Distance</span>
                        </h2>
                        <span id="distance" class="orderOptions__value">12 (miles)</span>
                    </div>
                    <div class="orderOptions">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger">By car</span>
                        </h2>
                        <span id="duration" class="orderOptions__value">30 (min)</span>
                    </div>
                </div>
                <div class="orderInfo__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.71192633547!2d-0.3818036193070037!3d51.52873519756609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1497972116028"   frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
        </div>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="bookingRow bookingRow--moreMargin">
            <div class="bookingRow__content">
                <h2 class="ordinaryTitle">
                    <span class="ordinaryTitle__text ordinaryTitle__text--bigger">Type of Care requested:</span>
                </h2>
                <div class="careRequested">
                    <div class="careRequested__item">
                    @php($i = 0)
                    @foreach($booking->assistance_types()->get() as $type)
                        @if($i == 2)
                        </div>
                        <div class="careRequested__item">
                        @endif
                        <p>{{$type->name}}</p>
                        @php(++$i)
                    @endforeach
                    </div>
                </div>
            </div>

        </div>

        <div class="innerContainer">
            <div class="orderConfirm">
                <div class="orderConfirm__btns">
                    @if($user->user_type_id == 3)
                        @if($booking->status_id == 2)
                            <div class="roundedBtn">
                                <button   {{!in_array($booking->carer_status_id, [2]) ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "accept"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smaller roundedBtn__item--accept">
                                    accept
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button {{!in_array($booking->carer_status_id, [2]) ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "accept"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smaller roundedBtn__item--reject">
                                    reject
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button  class="roundedBtn__item   roundedBtn__item--alternative">
                                    OFFER ALTERNATIVE TIME
                                </button>
                            </div>
                        @elseif($booking->status_id == 5)
                            <div class="roundedBtn">
                                <button {{!in_array($booking->carer_status_id, [5]) ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}" data-status = "cancel"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--cancel">
                                    cancel
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button {{!in_array($booking->carer_status_id, [5]) || $booking->has_active_appointments ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "completed"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                                    completed
                                </button>
                            </div>
                        @endif
                    @else
                        @if($booking->status_id == 2)
                            <div class="roundedBtn">
                                <button  {{!in_array($booking->purchaser_status_id, [2]) ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}" data-status = "accept"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smaller roundedBtn__item--accept">
                                    accept
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button {{!in_array($booking->purchaser_status_id, [1, 2]) ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}" data-status = "cancel" class="changeBookingStatus roundedBtn__item roundedBtn__item--smaller roundedBtn__item--reject">
                                    cancel
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button  class="roundedBtn__item   roundedBtn__item--alternative">
                                    OFFER ALTERNATIVE TIME
                                </button>
                            </div>
                        @elseif($booking->status_id == 5)
                            <div class="roundedBtn">
                                <button {{!in_array($booking->purchaser_status_id, [5]) ? 'disabled' : ''}} data-booking_id = "{{$booking->id}}" data-status = "cancel"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--cancel">
                                    cancel
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button {{!in_array($booking->purchaser_status_id, [5]) || $booking->has_active_appointments ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "completed"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                                    completed
                                </button>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="total">
                    <div class="total__item  totalBox">
                        <div class="totalTitle">
                            <p>Total </p>
                            <span>{{$booking->hours}} hours</span>
                        </div>
                        <p class="totalPrice">£{{$booking->hour_price * $booking->hours}}</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="bookStatus">
            <p class="">
                Current booking staus
            </p>
        <span>
            @if($booking->status_id == 2)
                BOOKING AWAITING CONFIRMATION
            @elseif($booking->status_id == 4)
                BOOKING CANCELLED
            @elseif($booking->status_id == 5)
                BOOKING IN DISPUTE
            @elseif($booking->status_id == 7)
                BOOKING COMPLETED
            @endif
        </span>
        </div>
        <div class="bookConfirm">
            <p class="bookConfirm__info ">
                Please      <a href="{{route('ContactPage')}}" > Contact us   </a>
                if there is a problem with the booking

            </p>
        </div>





        <div class="appointmentSliderWrap">
            <h2 class="ordinaryTitle ">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">Appointments:</span>
            </h2>
            <div class="sliderContainer ">
                <!-- <a href="" class="sliderArrow sliderArrow--left centeredLink">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="" class="sliderArrow sliderArrow--right centeredLink">
                    <i class="fa fa-angle-right"></i>
                </a> -->
                <div class="appointmentSliderBox">
                    <div class="appointmentSlider owl-carousel">
                        @php($i = 1)
                        @foreach($booking->appointments()->get() as $appointment)
                            <div class="singleAppointment singleAppointment--{{(in_array($appointment->status_id, [1, 2, 3]) && \Carbon\Carbon::parse($appointment->date_start)->isToday()) ? 'progress' : 'done'}}">
                                <div class="singleAppointment__header">
                                  <span>
                                    #{{$i}}
                                  </span>
                                    <h2>
                                        {{in_array($appointment->status_id, [1]) ? 'new' : ''}}
                                        {{in_array($appointment->status_id, [4]) ? 'completed' : ''}}
                                        {{in_array($appointment->status_id, [2, 3]) ? 'in progress' : ''}}
                                    </h2>
                                </div>
                                <div class="singleAppointment__body">
                                    <p>
                                        <span>Date: </span> {{$appointment->formatted_date_start}}
                                    </p>
                                    <p>
                                        <span>Time: </span>  {{$appointment->time_from}} - {{$appointment->time_to}}
                                    </p>
                                    <div class="appointmentBtn">
                                        @php($field = $user->user_type_id == 1 ? 'purchaser_status_id' : 'carer_status_id')
                                        <button {{!in_array($appointment->{$field}, [1]) ? 'disabled' : ''}}  data-appointment_id = "{{$appointment->id}}" data-status = "completed"  class="changeAppointmentStatus appointmentBtn__item appointmentBtn__item--compl">
                                            Completed
                                        </button>
                                        <button {{!in_array($appointment->{$field}, [1]) ? 'disabled' : ''}}  data-appointment_id = "{{$appointment->id}}" data-status = "reject"  class="changeAppointmentStatus appointmentBtn__item appointmentBtn__item--rej">
                                            Reject
                                        </button>
                                        {{--{{$field .' '. $appointment->{$field} }}--}}
                                    </div>
                                </div>
                            </div>
                            @php(++$i)
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="comments">
            <div class="comments__forMessage">
                <form method="post" action="{{url('bookings/'.$booking->id.'/message')}}">
                    <div class="messageBox">
                        <h2 class="formLabel">
                            <a name="comments"></a>
                            Your Message
                        </h2>
                        <textarea name="message" class="messageBox__item"  placeholder="Type your message"></textarea>
                        <div class="roundedBtn roundedBtn--center">
                            <button type="submit" class=" roundedBtn__item roundedBtn__item--send
                      roundedBtn__item--smaller">
                                send
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="innerContainer">
                @foreach($bookingMessage as $message)
                    @if($message->type == 'message')
                        <div class="comment">
                            @if($message->sender == 'carer')
                            <a href="Service_user_Public_profile_page.html" class="profilePhoto comment__photo">
                                <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" alt="">
                            </a>
                            @elseif($message->sender == 'service_user')
                            <a href="Service_user_Public_profile_page.html" class="profilePhoto comment__photo">
                                <img src="{{asset('img/service_user_profile_photos/'.$booking->bookingServiceUser()->first()->id.'.png')}}" alt="">
                            </a>
                            @endif
                            <div class="comment__info">
                                <div class="commentHeader">
                                    <h2 class="profileName">
                                        @if($message->sender == 'carer')
                                            <a href="{{$booking->bookingCarer()->first()->profile_link}}">
                                                {{$booking->bookingCarer()->first()->full_name}}
                                            </a>
                                        @elseif($message->sender == 'service_user')
                                            <a href="Service_user_Public_profile_page.html">
                                                {{$booking->bookingServiceUser()->first()->full_name}}
                                            </a>
                                        @endif
                                    </h2>
                                    <p class="commentHeader__date">
                                        <span>{{Carbon\Carbon::parse($message->created_at)->format('g:i A')}}</span>
                                        <span>{{Carbon\Carbon::parse($message->created_at)->format('d.m.Y')}}</span>
                                    </p>
                                </div>
                                <div class="commentText">
                                    <p>
                                        {{$message->text}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($message->type == 'status_change')
                        <div class="bookConfirm bookConfirm--with-time bookConfirm--with-border">
                            <h2 class="bookConfirm__title">
                                <span><i class="fa fa-check"></i></span>
                                @if($message->new_status == 'pending')
                                    booking awaiting confirmation
                                @elseif($message->new_status == 'in_progress')
                                    booking confirmed
                                @elseif($message->new_status == 'completed')
                                    booking completed
                                @endif
                            </h2>
                            <p class="bookConfirm__time">
                                <span>{{Carbon\Carbon::parse($message->created_at)->format('g:i A')}}</span>
                                <span>{{Carbon\Carbon::parse($message->created_at)->format('d.m.Y')}}</span>
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M"></script>
<script>
    $('.changeAppointmentStatus').click(function () {
        var appointment_id = $(this).attr('data-appointment_id');
        var status = $(this).attr('data-status');
        $.post('/appointments/'+appointment_id+'/'+status, function (data) {
            if(data.status == 'success'){
                location.reload();
            }
        });
    });

    function DistanceMatrixService() {
      var origin1 = '{{$carerProfile->address_line1}}';
      var destinationA = '{{$serviceUserProfile->address_line1}}';

      var service = new google.maps.DistanceMatrixService();
      service.getDistanceMatrix(
        {
          origins: [origin1],
          destinations: [destinationA],
          travelMode: 'DRIVING',
        }, callback);

      function callback(response, status) {
        $('#distance').html(response.rows[0].elements[0].distance.text)
        $('#duration').html(response.rows[0].elements[0].duration.text)
      }
    }

    $(document).ready(function(){
        DistanceMatrixService();
    });

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
