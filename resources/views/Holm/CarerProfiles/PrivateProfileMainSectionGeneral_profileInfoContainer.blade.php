<div class="profileInfoContainer">
    <div class="generalInfo">
        <div class="profilePhoto profilePhoto--change">
          <div class="formField">
                <div class="addContainer">
                  <input class="pickfiles" accept=".jpg,.jpeg,.png" type="file" />
                  <span class="pickfiles-delete">X</span>
                  <div id="carer_profile_photo" class="pickfiles_img"></div>
                    <a href="#" class="add add--moreHeight profilePhoto__ico">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
                <div class="addInfo">
                    <input disabled type="text" name="carer_profile_photo" class="addInfo__input" placeholder="Name" >
                </div>
            </div>
            <!-- <img src="/img/no_photo.png" alt="">
            <a href="#" class="profilePhoto__ico">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a> -->
        </div>


        <div class="generalInfo__text">
            <div class="generalInfo__elem">
                <p>first name</p><span>{{$carerProfile->first_name}}</span>
            </div>
            <div class="generalInfo__elem">
                <p>last name</p><span>{{$carerProfile->family_name}}</span>
            </div>
            <div class="generalInfo__elem">
                <p>gender</p><span>{{$carerProfile->gender}} </span>
            </div>
            <div class="generalInfo__elem">
                <p>date of birth</p><span>{{$carerProfile->DoB}}</span>
            </div>


        </div>
    </div>

    <div class="userRating">
        <div class="avarageRate">
            <h2 class="userRating__title">
                Average rating
            </h2>
            <div class="profileRating ">
                <span class="profileRating__item">
                  <i class="fa fa-heart"></i>
                </span>
                <span class="profileRating__item ">
                  <i class="fa fa-heart"></i>
                </span>
                <span class="profileRating__item ">
                <i class="fa fa-heart"></i>
                </span>
                <span class="profileRating__item ">
                  <i class="fa fa-heart"></i>
                </span>
                <span class="profileRating__item ">
                  <i class="fa fa-heart"></i>
                </span>
            </div>

        </div>
        <div class="otherRate">
            <div class="userRating__item">

                <p class="userRating__name">
                    <span>Punctuality</span>
                </p>
                <div class="profileRating ">
                  <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                  <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                </div>
            </div>
            <div class="userRating__item">

                <p class="userRating__name">
                    <span>Friendliness</span>s
                </p>
                <div class="profileRating ">
                  <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                  <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                </div>
            </div>
            <div class="userRating__item">

                <p class="userRating__name">
                    <span>Communication</span>
                </p>
                <div class="profileRating ">
                  <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                  <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                </div>
            </div>
            <div class="userRating__item">

                <p class="userRating__name">
                    <span>Performance</span>
                </p>
                <div class="profileRating ">
                  <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                  <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                    <span class="profileRating__item ">
                    <i class="fa fa-heart"></i>
                  </span>
                </div>
            </div>
        </div>

    </div>

</div>
