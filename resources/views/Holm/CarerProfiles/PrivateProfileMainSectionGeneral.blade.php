<div class="borderContainer">
    <div class="profileCategory">
        <h2 class="profileCategory__title">General</h2>
        <a href="#" class="profileCategory__link">
            <i class="fa fa-pencil"></i>
        </a>
    </div>
</div>

<div class="borderContainer">
    <div class="profileInfoContainer">
        <div class="generalInfo">
            <div class="profilePhoto profilePhoto--change">
                <img src="./dist/img/profile4.png" alt="">
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
                <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                    <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                    <span class="profileRating__item active">
                <i class="fa fa-heart"></i>
                </span>
                    <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                </span>
                    <span class="profileRating__item active">
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
                  <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                    </div>
                </div>
                <div class="userRating__item">

                    <p class="userRating__name">
                        <span>Friendliness</span>s
                    </p>
                    <div class="profileRating ">
                  <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                    </div>
                </div>
                <div class="userRating__item">

                    <p class="userRating__name">
                        <span>Communication</span>
                    </p>
                    <div class="profileRating ">
                  <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                    </div>
                </div>
                <div class="userRating__item">

                    <p class="userRating__name">
                        <span>Performance</span>
                    </p>
                    <div class="profileRating ">
                  <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                  <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                        <span class="profileRating__item active">
                    <i class="fa fa-heart"></i>
                  </span>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <div class="profileRow">
        <div class="profileField profileField--half">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                cv
              </span>
            </h2>
            <div class="addContainer">
                <a href="#" class="add">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
        </div>
        <div class="profileField profileField--half">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                passport
              </span>
            </h2>
            <div class="addContainer">
                <a href="#" class="add">
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="borderContainer">
    <h2 class="fieldCategory">
        Contacts
    </h2>
    <div class="profileRow">

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Address Line 1 <span class="requireIco">*</span>
              </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="{{$carerProfile->address_line1}}">
        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Address Line 2
              </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="{{$carerProfile->address_line2}}">
        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Town / city <span class="requireIco">*</span>
              </span>
            </h2>
            <div class="profileField__input-wrap">
                <input type="text" class="profileField__input" placeholder="{{$carerProfile->town}}">
                <span class="profileField__input-ico centeredLink">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
            </div>

        </div>



    </div>

    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Post code <span class="requireIco">*</span>
              </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="{{$carerProfile->Postcode->name}}">
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Mobile Number <span class="requireIco">*</span>
              </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="{{$carerProfile->mobile_number}}">
        </div>

        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Email ADDRESS <span class="requireIco">*</span>
              </span>
            </h2>
            <input type="text" class="profileField__input" placeholder="{{$user->email}}">
        </div>
    </div>

    <div class="profileMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119257097!2d-0.38180351472723606!3d51.528735197655706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2sru!4v1498824096837" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>

<div class="borderContainer borderContainer--noBorder">
    <div class="profileRow">
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Able work legally in the UK </span>
            </h2>
            <select class="profileField__select  profileField__select--greyBg">
                <option value="Yes">Able work legally in the UK</option>
            </select>
        </div>
        <div class="profileField">
            <h2 class="profileField__title ordinaryTitle">
              <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                Restrictions working in the UK </span>
            </h2>
            <select class="profileField__select profileField__select--greyBg">
                <option value="Yes">Do not have restrictions to work in the uk</option>
            </select>
        </div>
    </div>
</div>
<div class="borderContainer">
    <div class="profileCategory profileCategory--noBg">
        <h2 class="profileCategory__title">one line summary</h2>

    </div>
    <div class="profileRow">

        <div class="profileField profileField--full-width">
            <input type="text" class="profileField__input" placeholder="{{$carerProfile->sentence_yourself}}">
        </div>
    </div>


</div>
<div class="borderContainer ">
    <div class="profileCategory profileCategory--noBg">
        <h2 class="profileCategory__title">About me</h2>

    </div>
    <div class="profileRow">
        <div class="profileField profileField--full-width">
            <!--    <h2 class="profileField__title ordinaryTitle">
                 <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                   How should the carer enter the Service User’s home?    </span>
               </h2>-->
            <textarea class="profileField__area" placeholder="{{$carerProfile->description_yourself}}"></textarea>
        </div>
    </div>

</div>

<div class="borderContainer ">

    <div class="profileRow">
        <div class="profileField ">


            <h2 class="fieldCategory">
                Personal References
            </h2>
            <h2 class="profileSubcategory">Person #1
            </h2>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  name
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="First name">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Job Title
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Job title">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Relationship
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Relationship">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Phone
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Phone">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Email
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Email">
            </div>

        </div>

        <div class="profileField ">
            <h2 class="profileSubcategory">Person #2

            </h2>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  name
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="First name">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Job Title
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Job title">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Relationship
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Relationship">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Phone
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Phone">
            </div>
            <div class="profileField profileField--full-width">
                <h2 class="profileField__title ordinaryTitle">
                <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                  Email
                </span>
                </h2>
                <input type="text" class="profileField__input" placeholder="Email">
            </div>

        </div>
    </div>

</div>