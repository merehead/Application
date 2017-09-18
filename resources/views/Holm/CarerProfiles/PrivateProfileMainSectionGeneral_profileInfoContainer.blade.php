<div class="profileInfoContainer">
    <div class="generalInfo">
        <div class="profilePhoto profilePhoto--change">
          <div class="formField">
            </div>

            <input class="pickfiles_profile_photo--change" accept=".jpg,.jpeg,.png,.doc" type="file" />
            <img id="profile_photo" src="img/profile_photos/{{$carerProfile->id}}.png" alt="avatar">

            <a href="#" class="profilePhoto__ico">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
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
<div class="profileRow">
    <div class="profileField">
        <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                I like to be called <span class="requireIco">*</span>
              </span>
        </h2>
        <?php echo Form::text('like_name',null,['class'=>'profileField__input','placeholder'=>'I like to be called']); ?>
    </div>
</div>
