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
                    <a href="Service_user_Public_profile_page.html" class="profilePhoto orderInfo__photo">
                        <img src="{{asset('img/profile_photos/'.$booking->bookingCarer()->first()->id.'.png')}}" alt="">
                    </a>
                    <div class="orderInfo__item orderInfo__item--rightPadding">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitle__text ordinaryTitle__text--bigger"><a href="Service_user_Public_profile_page.html">{{$booking->bookingCarer()->first()->full_name}}</a></span>
                        </h2>
                        <div class="viewProfile">
                            <a href="Service_user_Public_profile_page.html" class="viewProfile__item centeredLink">
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
                            <span class="orderOptions__value">12 (miles)</span>
                        </div>
                        <div class="orderOptions">
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text ordinaryTitle__text--bigger">By car</span>
                            </h2>
                            <span class="orderOptions__value">30 (min)</span>
                        </div>
                    </div>
                    <div class="orderInfo__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.71192633547!2d-0.3818036193070037!3d51.52873519756609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1497972116028"   frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            @else
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
                    @if($user->user_type_id == 1)
                        @if($booking->status_id == 1)
                            <div class="roundedBtn">
                                <a href="#" class="roundedBtn__item roundedBtn__item--smaller roundedBtn__item--accept">
                                    accept
                                </a>
                            </div>
                            <div class="roundedBtn">
                                <a href="#" class="roundedBtn__item roundedBtn__item--smaller roundedBtn__item--reject">
                                    reject
                                </a>
                            </div>
                            <div class="roundedBtn">
                                <a href="Message.html" class="roundedBtn__item   roundedBtn__item--alternative">
                                    OFFER ALTERNATIVE TIME
                                </a>
                            </div>
                        @elseif($booking->status_id == 5)
                            <div class="roundedBtn">
                                <button data-booking_id = "{{$booking->id}}" data-status = "cancel"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--cancel">
                                    cancel
                                </button>
                            </div>
                            <div class="roundedBtn">
                                <button  data-booking_id = "{{$booking->id}}" data-status = "completed"  class="changeBookingStatus roundedBtn__item roundedBtn__item--smalest roundedBtn__item--accept">
                                    completed
                                </button>
                            </div>
                        @elseif($booking->status_id == 7)
                        @endif

                    @else
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
           BOOKING AWAITING CONFIRMATION

        </span>
        </div>
        <div class="bookConfirm">
            <p class="bookConfirm__info ">
                Please      <a href="Contact_Us.html" > Contact us   </a>
                if there is a problem with the booking

            </p>
        </div>





        <div class="appointmentSliderWrap">
            <h2 class="ordinaryTitle ">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">Appointments:</span>
            </h2>
            <div class="sliderContainer ">
                <a href="" class="sliderArrow sliderArrow--left centeredLink">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="" class="sliderArrow sliderArrow--right centeredLink">
                    <i class="fa fa-angle-right"></i>
                </a>
                <div class="appointmentSliderBox">
                    <div class="appointmentSlider">
                        <div class="singleAppointment singleAppointment--progress">
                            <div class="singleAppointment__header">
                  <span>
                    #1
                  </span>
                                <h2>
                                    in progress
                                </h2>
                                <a href="#">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>
                            <div class="singleAppointment__body">
                                <p>
                                    <span>Date: </span> 15 june 2017
                                </p>
                                <p>
                                    <span>Time: </span>  13:00 PM - 18:00 PM
                                </p>
                                <div class="appointmentBtn">
                                    <a href="#" class="appointmentBtn__item appointmentBtn__item--compl">
                                        Completed
                                    </a>
                                    <a href="#" class="appointmentBtn__item appointmentBtn__item--rej">
                                        Rejected
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="singleAppointment  ">
                            <div class="singleAppointment__header">
                  <span>
                    #1
                  </span>
                                <h2>
                                    in progress
                                </h2>
                                <a href="#">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>
                            <div class="singleAppointment__body">
                                <p>
                                    <span>Date: </span> 15 june 2017
                                </p>
                                <p>
                                    <span>Time: </span>  13:00 PM - 18:00 PM
                                </p>
                                <div class="appointmentBtn">
                                    <a href="#" class="appointmentBtn__item appointmentBtn__item--compl">
                                        Completed
                                    </a>
                                    <a href="#" class="appointmentBtn__item appointmentBtn__item--rej">
                                        Rejected
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="singleAppointment  ">
                            <div class="singleAppointment__header">
                  <span>
                    #1
                  </span>
                                <h2>
                                    in progress
                                </h2>
                                <a href="#">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>
                            <div class="singleAppointment__body">
                                <p>
                                    <span>Date: </span> 15 june 2017
                                </p>
                                <p>
                                    <span>Time: </span>  13:00 PM - 18:00 PM
                                </p>
                                <div class="appointmentBtn">
                                    <a href="#" class="appointmentBtn__item appointmentBtn__item--compl">
                                        Completed
                                    </a>
                                    <a href="#" class="appointmentBtn__item appointmentBtn__item--rej">
                                        Rejected
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="singleAppointment  ">
                            <div class="singleAppointment__header">
                  <span>
                    #1
                  </span>
                                <h2>
                                    in progress
                                </h2>
                                <a href="#">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>


                        </div>
                        <div class="singleAppointment  ">
                            <div class="singleAppointment__header">
                  <span>
                    #1
                  </span>
                                <h2>
                                    in progress
                                </h2>
                                <a href="#">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>


                        </div>
                        <div class="singleAppointment  ">
                            <div class="singleAppointment__header">
                  <span>
                    #1
                  </span>
                                <h2>
                                    in progress
                                </h2>
                                <a href="#">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>












        <div class="comments ">
            <div class="comments__forMessage">
                <div class="messageBox">
                    <h2 class="formLabel">
                        Your Message
                    </h2>
                    <textarea  class="messageBox__item"  placeholder="Type your message"></textarea>
                    <div class="roundedBtn roundedBtn--center">
                        <button class=" roundedBtn__item roundedBtn__item--send
                  roundedBtn__item--smaller">
                            send
                        </button>
                    </div>

                </div>
            </div>

            <div class="innerContainer">
                <div class="comment">
                    <a href="Carer_Public_profile_page.html"  class="profilePhoto comment__photo">
                        <img src="./dist/img/profile4.png" alt="">
                    </a>
                    <div class="comment__info">
                        <div class="commentHeader">
                            <h2 class="profileName"> <a href="Carer_Public_profile_page.html"> Rosie P.</a>

                            </h2>
                            <p class="commentHeader__date">
                                <span >12:06 AM</span>
                                <span>14.05.2017</span>
                            </p>
                        </div>
                        <div class="commentText">
                            <p>
                                Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran endesalutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran ende salutandi no per. Lorem ipsum dolor sit amet, ea sit ceteroassusamus, a idqran ende salutandi no per.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="comment">
                    <a href="Carer_Public_profile_page.html"  class="profilePhoto comment__photo">
                        <img src="./dist/img/profile4.png" alt="">
                    </a>
                    <div class="comment__info">
                        <div class="commentHeader">
                            <h2 class="profileName"><a href="Carer_Public_profile_page.html"> Rosie P.</a></h2>
                            <p class="commentHeader__date">
                                <span >12:05 AM</span>
                                <span>14.05.2017</span>
                            </p>
                        </div>
                        <div class="commentText">
                            <p>
                                Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran endesalutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran ende salutandi no per. Lorem ipsum dolor sit amet, ea sit ceteroassusamus, a idqran ende salutandi no per.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="comment">
                    <a href="Service_user_Public_profile_page.html" class="profilePhoto comment__photo">
                        <img src="./dist/img/profile8.jpg" alt="">
                    </a>
                    <div class="comment__info">
                        <div class="commentHeader">
                            <h2 class="profileName"><a href="Service_user_Public_profile_page.html">   Bob M.</a></h2>
                            <p class="commentHeader__date">
                                <span >12:04 AM</span>
                                <span>14.05.2017</span>
                            </p>
                        </div>
                        <div class="commentText">
                            <p>
                                Lorem ipsum dolor sit amet, ea sit cetero assusamus, a idqran ende salutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran endesalutandi no per. Est eu pertinaciaen delacrue instructiol vel eu natum vedi idqran ende salutandi no per. Lorem ipsum dolor sit amet, ea sit ceteroassusamus, a idqran ende salutandi no per.
                            </p>
                        </div>
                    </div>
                </div>



                <div class="bookConfirm bookConfirm--with-time bookConfirm--with-border">
                    <h2 class="bookConfirm__title">
                        <span><i class="fa fa-check"></i></span>
                        Booking Awaiting Confirmation
                    </h2>
                    <p class="bookConfirm__time">
                        <span >12:04 AM</span>
                        <span>14.05.2017</span>
                    </p>

                </div>





            </div>







        </div>


    </div>
</section>

<script>
    $('.changeBookingStatus').click(function () {
        var booking_id = $(this).attr('data-booking_id');
        var status = $(this).attr('data-status');
        $.post('/bookings/'+booking_id+'/'+status, function (data) {
        });
    });

</script>