<div class="mainPanel">
    <h2 class="categoryTitle">
          <span class="categoryTitle__ico">
              <i class="fa fa-comment" aria-hidden="true"></i>
          </span>
        Reviews managament
    </h2>
    <div class="tableWrap tableWrap--margin-t">
        <h2 class="review__title">
            Booking Overview - {{$reviews->id}}
        </h2>
        <div class="userRating">
            <div class="userRating__item">
                <h2 style="margin-right: 20px;" class="userRating__title">
                    Rating
                </h2>
                <p class="userRating__name">
                    <span>Punctuality</span>
                </p>
                <div class="profileRating">
                    <span class="profileRating__item active" id="punctuality_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="punctuality_5">
                      <i class="fa fa-heart"></i>
                    </span>
                </div>
            </div>
            <div class="userRating__item">

                <p class="userRating__name">
                    <span>FRIENDLINESS</span>s
                </p>
                <div class="profileRating ">
                    <span class="profileRating__item active" id="friendliness_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="friendliness_5">
                      <i class="fa fa-heart"></i>
                    </span>
                </div>
            </div>
            <div class="userRating__item">

                <p class="userRating__name">
                    <span>Communication</span>
                </p>
                <div class="profileRating ">
                    <span class="profileRating__item active" id="communication_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="communication_5">
                      <i class="fa fa-heart"></i>
                    </span>
                </div>
            </div>
            <div class="userRating__item">

                <p class="userRating__name">
                    <span>Performance</span>
                </p>
                <div class="profileRating ">
                    <span class="profileRating__item active" id="performance_1">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_2">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_3">
                    <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_4">
                      <i class="fa fa-heart"></i>
                    </span>
                    <span class="profileRating__item" id="performance_5">
                      <i class="fa fa-heart"></i>
                    </span>
                </div>
            </div>
        </div>

        <form class="reviewForm" method="post" action="{{route('ReviewManagementEdit',['id'=>$reviews->id])}}">
            <input type="hidden" name="punctuality" value="1">
            <input type="hidden" name="friendliness" value="1">
            <input type="hidden" name="communication" value="1">
            <input type="hidden" name="performance" value="1">
            <div class="formField">
                <textarea class="formArea formArea--review " placeholder="Type your comment" name="comment" maxlength="150">{{$reviews->comment}}</textarea>

            </div>
            <div class="formField">
                <button type="submit" class="reviewForm__btn">
                    submit
                </button>
            </div>
        </form>
    </div>
</div>