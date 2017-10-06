<div id="message-booking" class="modalWrapper modal fade">
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
            <form id="bookings__form" method="PUT" action="/bookings/{{$booking->id}}">
                {{csrf_field()}}
                <input type="hidden" name="carer_id" value="{{$booking->carer_id}}">
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

                                @if(strlen($serviceUsers->first_name)>0)

                                    <a href="#"
                                           class="needCare__item centeredLink btn btn-default">
                                        {!! $serviceUsers->first_name.'&nbsp'.mb_substr($serviceUsers->family_name,0,1).'.' !!}
                                        <input type="radio" id="q{{$serviceUsers->id}}"
                                               name="service_user_id" data-town="{{$serviceUsers->town}}"
                                               data_address_line1="{{$serviceUsers->address_line1}}"
                                               value="{{$serviceUsers->id}}" checked />
                                    </a>
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
                                @foreach($assistance_types as $care)
                                    <div class="checkBox_item">

                                        {!! Form::checkbox('bookings[0][assistance_types][]', $care->id, $care->id,
                                                    array('class' => 'customCheckbox assistance_types','onclick'=>'return false;','id'=>'assistance_types'.$care->id)) !!}
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
                        </div>
                        @foreach($appointments as $appointment)
                        <div class="messageInputs datetime ">
                            <div class="messageInputs__field messageDate">
                                <input  onchange="calculate_price()" type="text" name="bookings[0][appointments][{{$loop->index}}][date_start]"
                                        class="messageInput datepicker datepicker_message" placeholder="06.06.2017 "
                                value="{{date('d/m/Y',strtotime($appointment->date_start))}}"
                                >

                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </a>
                            </div>
                            <label class="checkBox_item correct2" for="date_end">Start</label>

                            <div class="messageInputs__field messageTime ">
                                <input  onchange="calculate_price()" type="text" class="messageInput timepicker_message" id="time_to_from"
                                        name="bookings[0][appointments][{{$loop->index}}][time_from]" placeholder="1:30 PM"
                                        value="{{$appointment->time_from}}">
                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </a>
                            </div>
                            <label class="checkBox_item correct2" for="date_end">End</label>
                            <div class="messageInputs__field messageTime ">
                                <input  onchange="calculate_price()" type="text" class="messageInput timepicker_message" id="time_to_bed"
                                        name="bookings[0][appointments][{{$loop->index}}][time_to]" placeholder="3:30 PM"
                                        value="{{$appointment->time_to}}">
                                <a href="#" class="messageIco centeredLink">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </a>
                            </div>
                            <i class="fa fa-close checkBox_item delete nhide" data-id="d0" aria-hidden="true"></i>
                        </div>
                        <div class="messageGroup ">
                            <h2 class="ordinaryTitle">
                                <span class="ordinaryTitl__text">How often</span>
                            </h2>
                            <div class="messageCheckbox checktime" data-id="d0">
                                <div class="checkBox_item">
                                    <input type="radio" name="bookings[0][appointments][{{$loop->index}}][periodicity]" value="Daily"
                                           class="customCheckbox periodicity Daily" onclick="return false;" disabled="disabled"
                                           id="boxD{{$loop->index+1}}" {{($appointment->periodicity=='daily')?'checked':''}}>
                                    <label for="boxD{{$loop->index+1}}">Daily</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="radio" name="bookings[0][appointments][{{$loop->index}}][periodicity]" value="Weekly"
                                           class="customCheckbox periodicity weekly" onclick="return false;" disabled="disabled"
                                           id="boxD{{$loop->index+2}}" {{($appointment->periodicity=='weekly')?'checked':''}}>
                                    <label for="boxD{{$loop->index+2}}">weekly</label>
                                </div>
                                <div class="checkBox_item">
                                    <input type="radio" name="bookings[0][appointments][{{$loop->index}}][periodicity]" value="Single"
                                           class="customCheckbox periodicity Single" onclick="return false;" disabled="disabled"
                                           id="boxD{{$loop->index+3}}" {{($appointment->periodicity=='single')?'checked':''}}>
                                    <label for="boxD{{$loop->index+3}}">Single</label>
                                </div>
                                <br>
                                <input type="hidden" name="bookings[0][appointments][{{$loop->index}}][periodicity]" value="{{$appointment->periodicity}}">
                                <label class="checkBox_item ordinaryTitle correct {{($appointment->periodicity=='single')?'nhide':''}}" for="date_end">Continue until</label>
                                <div class="messageInputs__field messageDate correct3 {{($appointment->periodicity=='single')?'nhide':''}}">
                                    <input  onchange="calculate_price()" type="text" class="messageInput datepicker datepicker_message" id="date_end" onchange="calculate_price()"
                                           name="bookings[0][appointments][{{$loop->index}}][date_end]" placeholder=" 08.08.2017" value="{{date('d/m/Y',strtotime($appointment->date_end))}}">
                                    <a href="#" class="messageIco centeredLink">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                        @endforeach

                        <a href="#" class="additionalTime nhide">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            add additional time
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
                            <button type="submit"
                                    class="bookBtn__item bookBtn__item--big centeredLink">
                                book carer
                            </button>
                        </div>
                        <div class="total">
                            <div class="total__item  totalBox">
                                <div class="totalTitle">
                                    <p>Total </p>
                                    <span>  {{$booking->hours}} hours </span>
                                </div>
                                <p class="totalPrice"> £{{$booking->price}} </p>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
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

            $carer_profile.find('input[type="checkbox"]').attr("disabled", false).removeClass('profileField__select--greyBg');
            $carer_profile.find('input[type="text"]').attr("readonly", false).removeClass('profileField__input--greyBg');
        });
    </script>
</div>