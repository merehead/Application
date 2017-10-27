<section class="mainSection">
    <div class="container">
        <div class="breadcrumbs">
            <a href="/" class="breadcrumbs__item">
                Home
            </a>
            @if(Auth::user()->isCarer()||Auth::user()->isPurchaser())
                <span class="breadcrumbs__arrow">></span>
                <a href="@if(Auth::user()->isCarer()){{'/carer-settings/booking'}}@else{{route('purchaserBookingStatus')}}@endif" class="breadcrumbs__item">
                    My Bookings
                </a>
            @else
                <span class="breadcrumbs__arrow">></span>
                <a href="'/serviceUser-settings/'{{$booking->bookingServiceUser()->first()->id}}" class="breadcrumbs__item">
                    My profile
                </a>
                <span class="breadcrumbs__arrow">></span>
                <p class="breadcrumbs__item">
                    {{$booking->bookingServiceUser()->first()->short_full_name}}
                </p>
                <span class="breadcrumbs__arrow">></span>
                <a href="/serviceUser-settings/booking/{{$booking->bookingServiceUser()->first()->id}}" class="breadcrumbs__item">
                    My Bookings
                </a>
            @endif

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
                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'"  alt="">
                    </a>
                    <div class="orderInfo__item orderInfo__item--rightPadding">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger"><a href="{{$booking->bookingCarer()->first()->profile_link}}">{{$booking->bookingCarer()->first()->short_full_name}}</a></span>
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
                            <span class="orderOptions__value">{{\Carbon\Carbon::parse($booking->date_from)->toFormattedDateString()}} - {{\Carbon\Carbon::parse($booking->date_to)->toFormattedDateString()}}</span>
                        </div>
                    </div>
                    <div class="orderInfo__map">
                        <div id="map" style="width: 100%;height: 100%;"></div>
                    </div>
                </div>
            @else
                <a href="{{$booking->bookingServiceUser()->first()->profile_link}}" class="profilePhoto orderInfo__photo">
                    <img src="{{asset('img/service_user_profile_photos/'.$booking->bookingServiceUser()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'"  alt="">
                </a>
                <div class="orderInfo__item orderInfo__item--rightPadding">
                    <h2 class="ordinaryTitle">
                        <span class="ordinaryTitle__text ordinaryTitle__text--bigger"><a href="{{$booking->bookingServiceUser()->first()->profile_link}}">{{$booking->bookingServiceUser()->first()->short_full_name}}</a></span>
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
                        <span class="orderOptions__value">{{\Carbon\Carbon::parse($booking->date_from)->toFormattedDateString()}} - {{\Carbon\Carbon::parse($booking->date_to)->toFormattedDateString()}}</span>
                    </div>
                    <div class="orderOptions">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger">Distance</span>
                        </h2>
                        <span id="distance" class="orderOptions__value">loading..</span>
                    </div>
                    <div class="orderOptions">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger">By car</span>
                        </h2>
                        <span id="duration" class="orderOptions__value">loading..</span>
                    </div>
                </div>
                <div class="orderInfo__map">
                    <div id="map" style="width: 100%;height: 100%;"></div>
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
                                <button {{!in_array($booking->carer_status_id, [2]) ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "reject"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smaller roundedBtn__item--reject">
                                    reject
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button  class="roundedBtn__item   roundedBtn__item--alternative" data-id="{{$booking->id}}">
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
                                <button  class="roundedBtn__item   roundedBtn__item--alternative" data-id="{{$booking->id}}">
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
                        @elseif($booking->status_id == 7)
                            <div class="roundedBtn">
                                <button {{$booking->overviews()->get()->count() ? 'disabled' : ''}} onclick="location.replace('{{url('/bookings/'.$booking->id.'/leave_review')}}')" class="roundedBtn__item roundedBtn__item--smalest roundedBtn__item--forReview">
                                    leave review
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
                        <p class="totalPrice">£{{$booking->price}}</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="bookStatus">
            <p class="">
                Current booking status
            </p>
        <span>
            @if($booking->status_id == 2)
                BOOKING AWAITING CONFIRMATION
            @elseif($booking->status_id == 4)
                BOOKING CANCELLED
            @elseif($booking->status_id == 5)
                BOOKING CONFIRMED
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
                            @if(in_array($appointment->status_id, [1, 2, 3]))
                                @if($appointment->is_past)
                                    @php($class = 'progress')
                                @else
                                    @php($class = 'new')
                                @endif
                            @else
                                @php($class = 'done')
                            @endif
                            <div class="singleAppointment singleAppointment--{{$class}}">
                                <div class="singleAppointment__header">
                                  <span>
                                    #{{$i}}
                                  </span>
                                    <h2>
                                        {{in_array($appointment->status_id, [4]) ? 'completed' : ''}}
                                        {{in_array($appointment->status_id, [5]) ? 'rejected' : ''}}
                                        {{in_array($appointment->status_id, [3]) ? 'in dispute' : ''}}
                                        @if(in_array($appointment->status_id, [1, 2]))
                                            {{$appointment->is_past ? 'in progress' : 'new'}}
                                        @endif
                                    </h2>
                                </div>
                                <div class="singleAppointment__body">
                                    <p>
                                        <span>Date: </span> {{$appointment->formatted_date_start}}
                                    </p>
                                    <p>
                                        <span>Time: </span>  {{$appointment->formatted_time_from}} - {{$appointment->formatted_time_to}}
                                    </p>
                                    <div class="appointmentBtn">
                                        @php($field = $user->user_type_id == 1 ? 'purchaser_status_id' : 'carer_status_id')
                                        <button {{$booking->status_id != 5 || !in_array($appointment->{$field}, [1]) || !$appointment->is_past ? 'disabled' : ''}}  data-appointment_id = "{{$appointment->id}}" data-status = "completed"  class="changeAppointmentStatus appointmentBtn__item appointmentBtn__item--compl">
                                            Completed
                                        </button>
                                        <button {{$booking->status_id != 5 || !in_array($appointment->{$field}, [1]) || !$appointment->is_past ? 'disabled' : ''}}  data-appointment_id = "{{$appointment->id}}" data-status = "reject"  class="changeAppointmentStatus appointmentBtn__item appointmentBtn__item--rej">
                                            Reject
                                        </button>
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
                        <textarea name="message" class="messageBox__item doNotCount"  placeholder="Type your message"></textarea>
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
                                <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'" alt="">
                            </a>
                            @elseif($message->sender == 'service_user')
                            <a href="Service_user_Public_profile_page.html" class="profilePhoto comment__photo">
                                <img src="{{asset('img/service_user_profile_photos/'.$booking->bookingServiceUser()->first()->id.'.png')}}" onerror="this.src='/img/no_photo.png'"  alt="">
                            </a>
                            @endif
                            <div class="comment__info">
                                <div class="commentHeader">
                                    <h2 class="profileName">
                                        @if($message->sender == 'carer')
                                            <a href="{{$booking->bookingCarer()->first()->profile_link}}">
                                                {{$booking->bookingCarer()->first()->short_full_name}}
                                            </a>
                                        @elseif($message->sender == 'service_user')
                                            <a href="Service_user_Public_profile_page.html">
                                                {{$booking->bookingServiceUser()->first()->short_full_name}}
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
                                @if(strtolower($message->new_status) == 'pending')
                                    booking awaiting confirmation
                                @elseif(strtolower($message->new_status) == 'in_progress')
                                    booking confirmed
                                @elseif(strtolower($message->new_status) == 'completed')
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

{{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJaLv-6bVXViUGJ_e_-nR5RZlt9GUuC4M"></script>--}}
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
      var origin1 = 'England {{$carerProfile->town}} {{$carerProfile->address_line1}}';
      var destinationA = 'England {{$serviceUserProfile->town}} {{$serviceUserProfile->address_line1}}';

      console.log({'carerProfile': origin1, 'serviceUserProfile': destinationA})

      var service = new google.maps.DistanceMatrixService();
      service.getDistanceMatrix(
        {
          origins: [origin1],
          destinations: [destinationA],
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.IMPERIAL,
        }, callback);

      function callback(response, status) {
        console.log(response.rows[0].elements[0].status)
        if(response.rows[0].elements[0].status === 'OK'){
          // convert km to miles
          // var convert = parseInt(response.rows[0].elements[0].distance.text)*0.62137;

          // $('#distance').html(convert.toFixed(3) + ' (miles)');
          $('#distance').html(response.rows[0].elements[0].distance.text);
          $('#duration').html(response.rows[0].elements[0].duration.text);
        }
        if(response.rows[0].elements[0].status === 'NOT_FOUND' || response.rows[0].elements[0].status === 'ZERO_RESULTS'){
          $('#distance').html('(not found)');
          $('#duration').html('(not found)');
        }
      }
    }

    var geocoder;
    var map;
    function initialize() {
      geocoder = new google.maps.Geocoder();
      var mapOptions = {
        zoom: 14
      }
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
    }

    function codeAddress() {
      var address = '{{$carerProfile->town}} {{$carerProfile->address_line1}}';

      if({{$user->user_type_id}} !== 1){
        address = '{{$serviceUserProfile->town}} {{$serviceUserProfile->address_line1}}';
      }

      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
    }

    $(document).ready(function(){
        initialize();
        codeAddress();
        if({{$user->user_type_id}} !== 1){
          DistanceMatrixService();
        }
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
