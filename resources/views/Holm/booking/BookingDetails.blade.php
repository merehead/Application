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
                @if($user->user_type_id == 1 || $user->user_type_id == 4)
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
                    <span class="ordinaryTitle__text ordinaryTitle__text--bigger">Booking summary:</span>
                </h2>
                @foreach($summary as $row)
                    <div class="summary-row">
                        <div class="summary-info">
                            <p>{{$row->s_name}}</p>
                            <span>{{date("M d, Y", strtotime($row->date_start))}} - {{date("M d, Y", strtotime($row->date_end))}} </span>
                        </div>
                        <div class="summary-extra">
                            <p>{{strtoupper(str_replace('single', 'once', $row->name))}}</p>
                        </div>
                        <div class="summary-extra">
                            <p>{{strtoupper($row->times)}} times</p>
                        </div>
                    </div>
                @endforeach
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
        <div class="innerContainer">
            <div class="orderConfirm">
                <div class="orderConfirm__btns">
                    @if($user->user_type_id !== 4)
                        @if($user->user_type_id == 3)
                            @if($booking->status_id == 2)
                                <div class="roundedBtn">
                                    <button {{!in_array($booking->carer_status_id, [2]) ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "accept"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smaller roundedBtn__item--accept">
                                        accept
                                    </button>
                                </div>
                                <div class="roundedBtn">
                                    <button  {{!in_array($booking->carer_status_id, [2]) ? 'disabled' : ''}}  data-booking_id = "{{$booking->id}}" data-status = "reject"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smaller roundedBtn__item--reject">
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

        <div class="bookConfirm">
            <p class="bookConfirm__info ">
                Please      <a href="{{route('ContactPage')}}" > Contact us   </a>
                if there is a problem with the booking

            </p>
        </div>

        @php($i = 1)
        @foreach($booking->appointments as $appointment)
            @if(in_array($appointment->status_id, [1, 2, 3]))
                @if($appointment->is_past)
                    @php($class = 'appointment-status--progress')
                @else
                    @php($class = 'appointment-status--coming')
                @endif
            @else
                @php($class = 'appointment-status--completed')
            @endif
            <div class="app-item">
                <div class="appointment-head">
                    <span class="app-number">#{{$i}}</span>
                    <h2 class="appointment-status {{$class}}">
                        {{in_array($appointment->status_id, [4]) ? 'completed' : ''}}
                        {{in_array($appointment->status_id, [5]) && ($appointment->carer_status_id == $appointment->purchaser_status_id)  ? 'canceled' : ''}}
                        {{in_array($appointment->status_id, [5]) && ($appointment->carer_status_id != $appointment->purchaser_status_id) ? 'rejected' : ''}}
                        {{in_array($appointment->status_id, [3]) ? 'in dispute' : ''}}
                        @if(in_array($appointment->status_id, [1, 2]))
                            {{$appointment->is_past ? 'in progress' : 'Upcoming'}}
                        @endif
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="appointment-info">
                            <p class="appointment-info__item">
                                <i class="fa fa-calendar"></i>
                                <span>{{$appointment->formatted_date_start}}</span>
                            </p>
                            <p class="appointment-info__item">
                                <i class="fa fa-clock-o"></i>
                                <span>{{$appointment->formatted_time_from}} - {{$appointment->formatted_time_to}}</span>
                            </p>
                            <p class="appointment-info__services">
                                <span>{{$appointment->assistance_types_text}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="app-btn">
                            @if($user->user_type_id !== 4)
                                @php($field = $user->user_type_id == 1 ? 'purchaser_status_id' : 'carer_status_id')
                                <button data-appointment_id="{{$appointment->id}}" {{$booking->status_id != 5 || $appointment->status_id == 5 || !in_array($appointment->{$field}, [1])  || (!$appointment->cancelable && !$appointment->is_past)  ? 'disabled' : ''}}  data-appointment_id = "{{$appointment->id}}" data-status = "reject"  class="changeAppointmentStatus app-btn__item">
                                    @if($appointment->cancelable)
                                        Cancel
                                    @else
                                        Reject
                                    @endif
                                </button>
                                @if(!$appointment->cancelable)
                                <button data-appointment_id="{{$appointment->id}}" {{$booking->status_id != 5 || !in_array($appointment->{$field}, [1]) || !$appointment->is_past ? 'disabled' : ''}}  data-status = "completed"  class="changeAppointmentStatus app-btn__item app-btn__item--complete">
                                    Completed
                                </button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @php(++$i)
        @endforeach
        <div class="comments">
            @if($user->user_type_id !== 4)
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
            @endif

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
                                @elseif(strtolower($message->new_status) == 'canceled')
                                    booking canceled
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
      var origin1 = 'England {{$carerProfile->postcode}}';
      var destinationA = 'England {{$serviceUserProfile->postcode}}';

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
      var address = '{{$carerProfile->postcode}}';

      if({{$user->user_type_id}} !== 1 && {{$user->user_type_id}} !== 4){
        address = '{{$serviceUserProfile->postcode}}';
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
