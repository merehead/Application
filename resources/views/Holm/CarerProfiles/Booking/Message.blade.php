{{--<link rel="stylesheet" href="/css/jquery-ui-timepicker-addon.css">--}}
{{--<script src="/js/jquery-ui-timepicker-addon.js"></script>--}}
<script>
    function resizeMap()
    {
        google.maps.event.trigger(map,'resize');
        map.setZoom( map.getZoom() );
    }
    $(document).ready(function () {

        $('.needCare__item').on('click',function(){
            map = new google.maps.Map(document.getElementById('map_canvas_booking'), {
                zoom: 17,
                center: {lat: -34.397, lng: 150.644}
            });
            var geocoder = new google.maps.Geocoder();
           var that = $(this).find('input');
            var addr = $(that).attr('data_address_line1');
            var address = $(that).attr('data-town')+' '+ addr;
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    if(marker)marker.setMap(null);
                    marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                    map.setCenter(results[0].geometry.location);
                    resizeMap();
                    $('.profileMap').show();
                } else {
                    $('.fieldCategory').after('<div class="alert alert-warning alert-dismissable fade in">\n' +
                        '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                        '    <strong>Warning!</strong> You entered an incorrect address. Please enter your real address.\n' +
                        '  </div>')
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        });
//        if($($carer_profile)!='undefinded') {
//            $carer_profile.find('input[type="checkbox"]').attr("disabled", false).removeClass('profileField__select--greyBg');
//            $carer_profile.find('input[type="text"]').attr("readonly", false).removeClass('profileField__input--greyBg');
//        }
        $('div#message-carer form#bookings__form').find('.assistance_types').attr("disabled", false);
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
                {{--<input type="hidden" name="town" value="{{$carerProfile->town}}">--}}
                {{--<input type="hidden" name="address_line1" value="{{$carerProfile->address_line1}}">--}}
                {{csrf_field()}}

                <div class="message__body">
                    <div class="messageGroup">
                        <h2 class="ordinaryTitle ordinaryTitle--smaller">
                            <span class="ordinaryTitle__text ordinaryTitle__text--smaller">
                                Please select person needing care
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
                                                            {!! $serviceUser->first_name.' '.mb_substr($serviceUser->family_name,0,1).'.' !!}
                                                            <input type="radio" id="q{{$serviceUser->id}}"
                                                                   name="service_user_id" data-town="{{$serviceUser->town}}"
                                                                   data_address_line1="{{$serviceUser->address_line1}}"
                                                                   value="{{$serviceUser->id}}" {{$i == 1 ? 'checked' : ''}}/>
                                                        </a>
                                                    @endif
                                                @endif
                                                @endforeach
                                                @endif
                            </div>
                            <div class="messageMap map">
                                <div id="map_canvas_booking" style="clear:both;width: 370px; height:200px;overflow:visible;"></div>
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
                                                    array('class' => 'customCheckbox assistance_types','onclick'=>'calculate_price();','id'=>'assistance_types'.$care->id)) !!}
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
                                    <input  onchange="calculate_price()" type="text" name="bookings[0][appointments][0][date_start]" required
                                           class="messageInput datepicker datepicker_message" placeholder="06.06.2017 ">

                                    <a href="#" class="messageIco centeredLink">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <label class="checkBox_item correct2" for="date_end">Start</label>

                                <div class="messageInputs__field messageTime ">
                                    <input  onchange="calculate_price()" type="text" class="messageInput timepicker_message" id="time_to_from" required
                                           name="bookings[0][appointments][0][time_from]" placeholder="1:30 PM"
                                           value="">
                                    <a href="#" class="messageIco centeredLink">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </a>
                                </div>


                                {{--                            <div class="messageInputs__field messageTime ">
                                                                <input name="time_to_bed" id="time_to_bed" class="messageInput" placeholder="555" type="text">
                                                                <a href="#" class="messageIco centeredLink">
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                </a>
                                                            </div>--}}

                                <label class="checkBox_item correct2" for="date_end">End</label>
                                <div class="messageInputs__field messageTime ">
                                    <input  onchange="calculate_price()" type="text" class="messageInput timepicker_message" id="time_to_bed" required
                                           name="bookings[0][appointments][0][time_to]" placeholder="3:30 PM"
                                           value="">
                                    <a href="#" class="messageIco centeredLink">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <i class="fa fa-close checkBox_item delete nhide" data-id="d0" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="messageGroup ">
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitl__text">How often</span>
                            </h2>
                            <div class="messageCheckbox checktime" data-id="d0">
                                <div class="checkBox_item">
                                    <input type="radio" name="bookings[0][appointments][0][periodicity]" value="Daily"
                                           class="customCheckbox periodicity Daily" onclick="calculate_price()"
                                           id="boxD1">
                                    <label for="boxD1">Daily</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="radio" name="bookings[0][appointments][0][periodicity]" value="Weekly"
                                           class="customCheckbox periodicity weekly" onclick="calculate_price()"
                                           id="boxD2">
                                    <label for="boxD2">weekly</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="radio" name="bookings[0][appointments][0][periodicity]" value="Single"
                                           class="customCheckbox periodicity Single" onclick="calculate_price()"
                                           id="boxD3">
                                    <label for="boxD3">Once</label>
                                </div>
                                <br>
                                <label class="checkBox_item ordinaryTitle correct nhide" for="date_end">Continue until</label>
                                <div class="messageInputs__field messageDate correct3 nhide">
                                    <input  onchange="calculate_price()" type="text" class="messageInput datepicker datepicker_message" id="date_end" onchange="calculate_price()"
                                           name="bookings[0][appointments][0][date_end]" placeholder=" 08.08.2017">
                                    <a href="#" class="messageIco centeredLink">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="checkBox_item nhide">
                                    <input type="radio" name="bookings[0][appointments][0][periodicity]" value="Single" required
                                           class="customCheckbox periodicity Single"
                                           id="boxD3">
                                    <label for="boxD3">Single</label>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="additionalTime">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            ADD ADDITIONAL APPOINTMENT
                        </a>


                    </div>
                    <div class="moreBtn nhide">
                        <a href="#" class="moreBtn__item moreBtn__item--withIco centeredLink ">
                            <span>+</span> add more bookings
                        </a>
                    </div>
                </div>
                <div class="message__footer">
                    <div class="messageTotal">
                        <div class="bookBtn">
                            <input type="checkbox" class="customCheckbox" name="confirm-terms" id="confirm-terms" required>
                            <label for="confirm-terms">I accept Holm’s <a href="{{route('TermsPage')}}" target="_blank">Terms & Conditions</a> and <a href="{{route('privacy_policy')}}" target="_blank">privacy policy</a> for this booking</label>
                            <button type="submit" disabled id="book-carer" style="margin-top: 12px;"
                                    class="bookBtn__item bookBtn__item--big centeredLink">
                                book carer
                            </button>
                        </div>
                        <div class="total">
                            <div class="total__item  totalBox">
                                <div class="totalTitle">
                                    <p>Total </p>
                                    <span>  0 hours </span>
                                </div>
                                <p class="totalPrice"> £0 </p>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>