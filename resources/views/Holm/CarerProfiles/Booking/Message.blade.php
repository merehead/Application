
<link rel="stylesheet" href="/css/jquery-ui-timepicker-addon.css">
<script src="/js/jquery-ui-timepicker-addon.js"></script>
<script>
    $(document).ready(function () {
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 17,
            center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
        $carer_profile.find('input[type="checkbox"]').attr("disabled", false).removeClass('profileField__select--greyBg');
        $carer_profile.find('input[type="text"]').attr("readonly", false).removeClass('profileField__input--greyBg');
    });
</script>

<div id="message-carer" class="modalWrapper modal fade">
    <div class="customModal">
        <div class="message">
            <div class="message__header">
                <div class="bookCarer">
                    <a href="" class="bookCarer__item bookCarer__item--modal centeredLink">Book carer</a>
                </div>
                <a href="#" data-dismiss="modal" aria-label="Close" class="closeModal">
                    <i class="fa fa-close"></i>
                </a>
            </div>
            <form id="bookings__form" method="POST" action="/bookings">
                <input type="hidden" name="carer_id" value="{{$carerProfile->id}}">
                <input type="hidden" name="town" value="{{$carerProfile->town}}">
                <input type="hidden" name="address_line1" value="{{$carerProfile->address_line1}}">
                <div class="message__body">
                    <div class="messageGroup">
                        <h2 class="ordinaryTitle ordinaryTitle--smaller">
                            <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                                Person needing care
                            </span>
                        </h2>
                        <div class="needCareContainer">
                            <div class="needCare btn-group" data-toggle="buttons"
                                 data-html="Service_user_Public_profile_page">
                                @php($i = 0)
                                    @if(!empty($carerProfile) && Auth::check()&&isset(Auth::user()->userPurchaserProfile->serviceUsers))
                                @foreach(Auth::user()->userPurchaserProfile->serviceUsers as $serviceUser)
                                    @php(++$i)
                                    @if(!$serviceUser->isDeleted())

                                        @if(strlen($serviceUser->first_name)>0)

                                            <a href="{{ $serviceUser->registration_progress!='61'
                                    ? route('ServiceUserRegistration', ['serviceUserProfile' => $serviceUser->id])
                                    : route('ServiceUserSetting',['id'=>$serviceUser->id])}}"
                                               class="needCare__item centeredLink btn btn-default">
                                                {!! $serviceUser->first_name.'&nbsp'.mb_substr($serviceUser->family_name,0,1).'.' !!}
                                                <input type="radio" id="q{{$serviceUser->id}}" name="service_user_id"
                                                       value="{{$serviceUser->id}}" {{$i == 1 ? 'checked' : ''}}/>
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                                        @endif
                            </div>
                            <div class="messageMap map">
                                <div class="profileMap map" style="width:100%;height:200px">
                                    <div id="map_canvas" style="clear:both; height:200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bookings-more">
                        <div class="messageGroup">

                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitle__text">Type of care</span>
                            </h2>
                            <div class="messageCheckbox">
                                @foreach($typeCareAll as $care)
                                    <div class="checkBox_item">

                                        {!! Form::checkbox('bookings[0][assistance_types][]', $care->id, null,
                                                    array('class' => 'customCheckbox assistance_types','id'=>'assistance_types'.$care->id)) !!}
                                        <label for="assistance_types{{$care->id}}">{{$care->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="messageGroup cdate">
                            <h2 class="ordinaryTitle">
                              <span class="ordinaryTitle__text ordinaryTitle__text--smaller rtext">
                                select date and time
                             </span>
                        </h2>
                        <div class="messageInputs datetime ">
                            <div class="messageInputs__field messageDate">
                                <input type="text" name="bookings[0][appointments][0][date_start]"
                                       class="messageInput datepicker datepicker_message" placeholder="06.06.2017 ">

                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="messageInputs__field messageDate">
                                <input type="text" class="messageInput datepicker datepicker_message"
                                       name="bookings[0][appointments][0][date_end]" placeholder=" 08.08.2017">
                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="messageInputs__field messageTime ">
                                <input type="text" class="messageInput timepicker_message"
                                       name="bookings[0][appointments][0][time_from]" placeholder="14.30 PM" value="14.30">
                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </a>
                            </div>


                            <div class="messageInputs__field messageTime ">
                                <input name="time_to_bed" id="time_to_bed" class="messageInput" placeholder="555" type="text">
                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </a>
                            </div>


                            <div class="messageInputs__field messageTime ">
                                <input type="text" class="messageInput timepicker_message" id="time_to_bed"
                                       name="bookings[0][appointments][0][time_to]" placeholder="20.30 PM"  value="20.30">
                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="messageGroup ">
                        <h2 class="ordinaryTitle">
                            <span class="ordinaryTitl__text">How often</span>
                        </h2>
                        <div class="messageCheckbox checktime">
                            <div class="checkBox_item">
                                <input type="radio" name="bookings[0][appointments][0][periodicity]" value="Daily" class="customCheckbox periodicity"
                                       id="boxD1">
                                <label for="boxD1">Daily</label>
                            </div>
                            <div class="checkBox_item">
                                <input type="radio" name="bookings[0][appointments][0][periodicity]" value="Weekly" class="customCheckbox periodicity"
                                       id="boxD2">
                                <label for="boxD2">weekly</label>
                            </div>
                            <div class="checkBox_item">
                                <input type="radio" name="bookings[0][appointments][0][periodicity]" value="Single" class="customCheckbox periodicity"
                                       id="boxD3">
                                <label for="boxD3">Single</label>
                            </div>                        </div>
                    </div>
                    <a href="#" class="additionalTime">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        add additional time
                    </a>


                </div> <div class="moreBtn">
                        <a href="#" class="moreBtn__item moreBtn__item--withIco centeredLink ">
                            <span>+</span> add more bookings
                        </a>
                    </div>
                </div>
                <div class="message__footer">
                    <div class="messageTotal">
                        <div class="bookBtn">
                            <button type="submit"
                                    class="bookBtn__item bookBtn__item--big centeredLink">
                                book carer
                            </button>
                        </div>
                        <div class="total">
                            <div class="total__item  totalBox">
                                <div class="totalTitle">
                                    <p>Total </p>
                                    <span>  5 hours </span>
                                </div>
                                <p class="totalPrice"> £60 </p>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>