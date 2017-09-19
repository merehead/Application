
@include(config('settings.frontTheme').'.CarerProfiles.Booking.BookingTabCarerHeader')

<div class="justifyContainer justifyContainer--smColumn">

        <div class="bookingNav">
            <a href="/carer-settings/booking/all" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              ALL
            </span>
            </a>
            <a href="/carer-settings/booking/new" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              new
            </span>
            </a>
            <a href="/carer-settings/booking/progress" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              in progress
            </span>
            </a>
            <a href="/carer-settings/booking/completed" class="bookingNav__link centeredLink">
            <span class="bookingNav__text">
              completed
            </span>
            </a>
        </div>

    <div class="bookingGroup">
        <a href="#" class="printIco">
            <img src="/img/print.png" alt="">
        </a>
        <div class="total">
            <div class="total__item  total__item--smaller totalBox">
                <div class="totalTitle">
                    <p>Total </p>
                </div>
                <p class="totalPrice totalPrice--smaller"> £81    </p>
            </div>
        </div>
    </div>
</div>
<div class="bookings">


    <div class="bookingCard bookingCard--new">
        <div class="bookingCard__header bookingCard__header">
            <h2>new</h2>
        </div>
        <div class="bookingCard__body bookInfo">
            <div class="bookInfo__profile">
                <a href="Service_user_Public_profile_page.html" class="profilePhoto bookInfo__photo">
                    <img src="/img/profile8.jpg" alt="">
                </a>
                <div class="bookInfo__text">
                    <p><a href="Service_user_Public_profile_page.html">bob m.</a> booked you</p>
                    <a href="NewAnAppointment_New.html" class="">view details</a>
                </div>

            </div>
            <div class="bookInfo__date">
                <span class="bookDate">15 May 2017</span>
                <span class="bookTime">12:00 PM - 5:00 PM</span>
                <p class="hourPrice">
                    5h / <span>£50</span>
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
    </div>

    <!--
            <div class="bookingCard bookingCard--new">
              <div class="bookingCard__header bookingCard__header">
                <h2>new</h2>
              </div>
              <div class="bookingCard__body bookInfo">
                <div class="bookInfo__profile">
                  <div class="profilePhoto bookInfo__photo">
                    <img src="./dist/img/profile8.jpg" alt="">
                  </div>
                  <div class="bookInfo__text">
                    <p><a href="Service_user_Public_profile_page.html">bob m.</a> booked you</p>
                    <a href="NewAnAppointment.html" class="">view details</a>
                  </div>

                </div>
                <div class="bookInfo__date">
                  <span class="bookDate">10 May 2017</span>
                  <span class="bookTime">12:00 PM - 5:00 PM</span>
                  <p class="hourPrice">
                    5h / <span>£50</span>
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
            </div>

            <div class="bookingCard bookingCard--new">
              <div class="bookingCard__header bookingCard__header">
                <h2>new</h2>
              </div>
              <div class="bookingCard__body bookInfo">
                <div class="bookInfo__profile">
                  <div class="profilePhoto bookInfo__photo">
                    <img src="./dist/img/profile8.jpg" alt="">
                  </div>
                  <div class="bookInfo__text">
                    <p><a href="Service_user_Public_profile_page.html">bob m.</a> booked you</p>
                    <a href="NewAnAppointment.html" class="">view details</a>
                  </div>

                </div>
                <div class="bookInfo__date">
                  <span class="bookDate">10 May 2017</span>
                  <span class="bookTime">12:00 PM - 5:00 PM</span>
                  <p class="hourPrice">
                    5h / <span>£50</span>
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
            </div>





            <div class="moreBtn moreBtn--book ">
              <a href="" class="moreBtn__item moreBtn__item--book centeredLink">
                Load More
              </a>
            </div>


    -->

</div>