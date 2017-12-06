// ------ Global Variable -----------
var $carer_profile = null;
var has_error_profile_form=false;
var error_mark = '';
var arrFiles = [];
var arrFilesProfilePhoto = [];
var ProfilePhotoSeviceUser = [];
var arrForDeleteIDProfile = [];
var checkUploading = false;
var carerId = +window.location.href.split('/')[window.location.href.split('/').length-1] // get user id
var $img = $('img')
//----------------------------------
var bookings_pos=1;
var periodicity = 4;
var appointments=1;
var like_name;
//-------------GoogleMaps ----------------------
var geocoder;
var map;
var marker;
var is_data_changed=false;

// window.onbeforeunload = function () {
//     return (is_data_changed ? "Измененные данные не сохранены. Закрыть страницу?" : null);
// }

function addressFormt(autocomplete){
    var refs = autocomplete.data.refs;
    $.getJSON('/address?udprn='+refs+'&query='+autocomplete.data.query, function(data) {
        console.log(data);
        var number = '';
        var subbuildingname = '';
        var buildingname = '';
        var organisation = '';
        $('input[name="address_line1"]').val('');
        $('input[name="address_line2"]').val('');
        $('input[name="town"]').val('');
        $('input[name="postcode"]').val('');

        if(data[0].number!=undefined)number=data[0].number;
        if(data[0].buildingname!=undefined)buildingname= data[0].buildingname;
        if(data[0].organisation!=undefined)organisation=data[0].organisation+', ';

        if(organisation!==''){
            $('input[name="address_line1"]').val(organisation+''+buildingname);
            $('input[name="address_line2"]').val(number+' '+data[0].street);
        }else if(data[0].buildingname!=undefined&&data[0].subbuildingname!=undefined) {
            subbuildingname = data[0].subbuildingname + ' ';
            $('input[name="address_line1"]').val(data[0].subbuildingname+', '+data[0].buildingname);
            $('input[name="address_line2"]').val(number + ' ' + data[0].street);
        }else if(data[0].subbuildingname!=undefined){
            subbuildingname=data[0].subbuildingname+' ';
            $('input[name="address_line1"]').val(data[0].subbuildingname);
            $('input[name="address_line2"]').val(number+' '+data[0].street);
        }else if(data[0].street!=undefined){
            $('input[name="address_line1"]').val(number+' '+data[0].street);
        }
        else if(data[0].premise!=undefined){
            $('input[name="address_line1"]').val(number+' '+data[0].premise);
        }

         $('input[name="town"]').val(data[0].posttown);
         $('input[name="postcode"]').val(data[0].postcode);

    });
}
function getTime( ) {
    var d = new Date( );
    d.setHours( d.getHours() ); // offset from local time
    var h = (d.getHours() % 12) || 12; // show midnight & noon as 12
    var m = d.getMinutes();
    if(m<30){m=0;} else{
        h=h+1;m=0;
    }
    return (
        ( h < 10 ? '0' : '') + h +
        ( m < 10 ? ':0' : ':') + m +
        // optional seconds display
        // ( d.getSeconds() < 10 ? ':0' : ':') + d.getSeconds() +
        ( h < 12 ? ' AM' : ' PM' )
    );

}
function isHTML(str) {
    var a = document.createElement('div');
    a.innerHTML = str;
    for (var c = a.childNodes, i = c.length; i--; ) {
        if (c[i].nodeType == 1) return true;
    }
    return false;
}

function calculate_price() {
    var form = $('#bookings__form');
    var token = $(form).find('input[name="_token"]').val();
    console.log(form.serialize());
    $.ajax({
        url: '/bookings/calculate_price',
        headers: {'X-CSRF-TOKEN': token},
        data: $(form).serialize(),
        type: 'POST',
        dataType: "json",
        success: function (response) {
            if(response.price !=undefined){
                $('.totalPrice').html('£'+response.price);
            }
            if(response.hours !=undefined){
                $('.totalTitle>span').html(response.hours+' hours');
            }
        },
        error: function (response) {
            if(response.price !=undefined){
                $('.totalPrice').html(response.price);
            }
        }
    });
};

function carerSearchAjax(){
    // if(!is_admin) {
    //     $('#findMessage').modal();
    //     return false;
    // }
    var form = $('#carerSearchForm');
    var token = $(form).find('input[name=_token]').val();
    if($('#load-more').val()==0||$('#load-more').val()==undefined){
        $('.carer-result').empty();
        $('#load-count').val(5);
    }
    $('#loader-search').show();
    $('.error-text').hide();
    $('.moreBtn__item').hide();

    $.ajax({
        url: $(form).attr('action'),
        headers: {'X-CSRF-TOKEN': token},
        data: $(form).serialize()+'&carerSearchAjax=true',
        type: 'POST',
        dataType: "json",
        success: function (response) {
            console.log(response);
            if($('#load-more').val()==0)
                $('.carer-result').empty();
            $('#loader-search').hide();
            if (response.success == true) {
                $('.carer-result').append(response.html);
                $('.Paginator').html(response.htmlHeader);
                $('.moreBtn__item').show();
                if(response.id==0)$('.moreBtn__item').hide();
                $('#load-more').val(0);
                $('#id-carer').val(response.id);
                $('#page').val(response.page);
            }else{
                $('.carer-result').append(response.html);
                $('.Paginator').html(response.htmlHeader);

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            $('.result').remove();
            $('#loader-search').hide();
            $('.error-text').show();
        }
    });
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 17,
        center: {lat: -34.397, lng: 150.644}
    });
    geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);
}

function geocodeAddress(geocoder, resultsMap) {
    var addr = ($('input[name="address_line1"]').val()!='не указан')?$('input[name="address_line1"]').val():'';
    var address = $('input[name="town"]').val()+' '+ addr;
    var step = 1;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            if(marker)marker.setMap(null);
            marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            if(step==1){
                address=$('input[name="postcode"]').val();
                if(address!=undefined) {
                    geocoder.geocode({'address': address}, function (results, status) {
                            if (status === 'OK') {
                                resultsMap.setCenter(results[0].geometry.location);
                                if (marker) marker.setMap(null);
                                marker = new google.maps.Marker({
                                    map: resultsMap,
                                    position: results[0].geometry.location
                                });
                            }
                        }
                    );
                }
                step= step+1;
            }
            else {
                $('.fieldCategory').after('<div class="alert alert-warning alert-dismissable fade in">\n' +
                    '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                    '    <strong>Warning!</strong> You entered an incorrect address. Please enter your real address.\n' +
                    '  </div>')
            }
            //alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

// ------ Global Functions ----------
function confirmPass($this){
    var conf =  $($this).val();
    var pass =  $('input[name="password"]').val();
    if(conf!='' || pass!='')
    if(conf!=pass){
        $('#password_confirmation').parent().find('span.registrationForm__ico--right').addClass('registrationForm__ico--wrong');
        $('#password_confirmation').parent().find('span.registrationForm__ico--right>i').removeClass('fa-check').addClass("fa-times");
    }else{
        $('#password_confirmation').parent().find('span.registrationForm__ico--right>i').addClass('fa-check').removeClass("fa-times");
        $('#password_confirmation').parent().find('span.registrationForm__ico--right').removeClass('registrationForm__ico--wrong');
    }
}

function checkStrength(password) {
    var strength = 0;
    $('.passStrength').show();
    //console.log(password.length);
    if (password=='**********') {
        $('.passStrength__bar').css('width','5%');
        $('.passStrength__bar').css('background','red');
        $('.passStrength__bar').css('color','red');
        $('#result').css('color','red');
        return 'enter the password'
    }
    if (password.length < 6) {
        $('.passStrength__bar').css('width','5%');
        $('.passStrength__bar').css('background','red');
        $('.passStrength__bar').css('color','red');
        $('#result').css('color','red');
        return 'too short'
    }
    if (password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
    if (password.match(/([!,%,&,@,#,$,^,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
    if (strength < 2) {
        $('.passStrength__bar').css('width','20%');
        $('.passStrength__bar').css('background','red');
        $('#result').css('color','red');

        return 'weak'
    } else if (strength == 2) {
        $('.passStrength__bar').css('width','60%');
        $('.passStrength__bar').css('background','#7ab7dc');
        $('#result').css('color','#7ab7dc');

        return 'good'
    } else if (strength > 2) {
        $('.passStrength__bar').css('width','100%');
        $('.passStrength__bar').css('background','#80cb2d');
        $('#result').css('color','#80cb2d');
        return 'Strong'
    }
}

function insertParam(key, value) {
    key = encodeURI(key);
    value = encodeURI(value);

    var kvp = document.location.search.substr(1).split('&');

    var i = kvp.length;
    var x;
    while (i--) {
        x = kvp[i].split('=');

        if (x[0] == key) {
            x[1] = value;
            kvp[i] = x.join('=');
            break;
        }
    }
    kvp = kvp.filter(function (n) {
        return n != ''
    });
    if (i < 0) {
        kvp[kvp.length] = [key, value].join('=');
    }
    //this will reload the page, it's likely better to store this until finished
    document.location.search = kvp.join('&');
}

function login_ajax(form) {
    $('.login__body').hide();
    $('.loader').show();
    var token = $(form).find('input[name=_token]').val();
    $(form).find('.error-block h3 strong').html('');
    $.ajax({
        url: $(form).attr('action'),
        headers: {'X-CSRF-TOKEN': token},
        data: $(form).serialize(),
        type: 'POST',
        dataType: "application/json",
        success: function (response) {
            $('.login__body').show();
            $('.loader').hide();
            if (response.status != 200) {
                $(form).find('.error-block strong').html(response.email);
            } else {
                window.refresh();
            }
        },
        error: function (response) {
            $(form).find('.formField').hide();
            $('.login__body').show();
            $('.loader').hide();
            if (response.status != 200) {
                var data = $.parseJSON(response.responseText);
                $(form).find('.error-block h3 strong').html(data.email);
                $(form).find('.error-block h3 strong').html(data.password);
                $('.btry').show();
            } else {
                $(form).find('.success-block h3 strong').html('Login success');
                window.location.reload();
            }
        }

    });
    return false;
}

function refreshLoginForm(form) {
    $(form).find('.error-block strong').html('');
    $('.blogin').show();
    $(form).find('.formField').show();
}

// -- Cancel all edit fields in Carer Profile ---------
function setNoEditableFields() {

    $carer_profile.find('select').attr("disabled", true).addClass('profileField__select--greyBg');
    $carer_profile.find('input[type="checkbox"]').attr("disabled", true).addClass('profileField__select--greyBg');
    $carer_profile.find('input').attr("readonly", true).addClass('profileField__input--greyBg');
    $carer_profile.find('textarea').attr("readonly", true).addClass('profileField__input--greyBg');
    $('#datepicker_when_start').attr('readonly',true)
        .datepicker("destroy");
    return true;
}

// -- Default cancel edit fields in Carer Profile ---------
function cancelEditFieldsCarer() {
    $('[data-edit]').each(function () {
        switch ($(this).get(0).tagName) {
            case "SELECT":
                $(this).attr("disabled", true).addClass('profileField__select--greyBg');
                break;
            case "INPUT":
                $(this).attr("readonly", true).addClass('profileField__input--greyBg');
                break;
            case "RADIO":
                $(this).on('click', function () {
                    return false;
                });
                break;
        }
    });

}

// -- Send request to server with AJAX data ----------
function ajaxForm(form, that) {
    if(!has_error_profile_form) {
        var token = $(form).find('input[name=_token]').val();
        $.ajax({
            url: $(form).attr('action'),
            headers: {'X-CSRF-TOKEN': token},
            data: $(form).serialize(),
            type: 'POST',
            dataType: "application/json",
            success: function (response) {
                if (response.status != 200) {
                    $(form).find('.error-block strong').html(response.toString());
                }
                that.button('reset');
                var idForm = $(form).attr('id');
                if (idForm == 'carerPrivateGeneral' || idForm == "PrivateGeneral") {
                    var geocoder = new google.maps.Geocoder();
                    geocodeAddress(geocoder, map);
                }
                // -- processing effects ----------
                setTimeout(function () {
                    $(that).addClass('hidden');
                    setNoEditableFields();
                    $(that).parent().find('a.btn-edit').show();
                }, 500);
            },
            error: function (response) {
                that.button('reset');
                var idForm = $(form).attr('id');
                if (idForm == 'carerPrivateGeneral' || idForm == "PrivateGeneral") {
                    var geocoder = new google.maps.Geocoder();
                    geocodeAddress(geocoder, map);
                }
                // -- processing effects -----------
                setTimeout(function () {
                    $(that).addClass('hidden');
                    setNoEditableFields();
                    $(that).parent().find('a.btn-edit').show();
                }, 500);
            }
        });
    }else{
        that.button('reset');
        $(document).scrollTop($(error_mark).offset().top-100)
    }
    return false;
}

function scale(block) {
    var step = 0.1,
        minfs = 10,
        scw = block.scrollWidth,
        w = block.offsetWidth+20;
    if (scw < w) {
        var fontsize = parseInt($(block).css('font-size'), 10) - step;
        if (fontsize >= minfs){
            $(block).css('font-size',fontsize)
            scale(block);
        }
    }
}

function setTime(input, hour, second, period){
    $(input).val(hour+':'+second+' '+period)
}

function toDate(dStr,format) {
    var now = new Date();
    if (format == "h:m") {
        now.setHours(dStr.substr(0,dStr.indexOf(":")));
        now.setMinutes(dStr.substr(dStr.indexOf(":")+1));
        now.setSeconds(0);
        return now;
    }else
        return "Invalid Format";
}

$(document).ready(function () {

    $(document).on('blur','.mypicker',function(e){
        var that = $(this);
        if(!$(that).hasClass('active_picker'))
        $('.date-drop').remove();
    });

    $(window).click(function(e){
        if($(e.target).parent()[0].className.indexOf('date')<0 && $('.date-drop').length>0){
             $('.date-drop').remove();
             $('.mypicker').removeClass('active_picker');
        }
    });

    $(document).on('change','.hour',function(e){
        var hour = $(this).val();
        var seconds = $('.seconds').val();
        var input = $(this).parent().parent().parent().parent().prev('div').find('input');
        var time = ($('.checkbox-date').is(':checked'))?'PM':'AM';
        setTime(input,hour,seconds,time);
        calculate_price();
    });

    $(document).on('change','.checkbox-date',function(e){
        var seconds = $('.seconds').val();
        var hour = $('.hour').val();
        var input = $(this).parent().parent().parent().parent().parent().prev('div').find('input');
        var time = ($('.checkbox-date').is(':checked'))?'PM':'AM';
        setTime(input,hour,seconds,time);
        calculate_price();
    });

    $(document).on('change','.seconds',function(e){
        var seconds = $(this).val();
        var hour = $('.hour').val();
        var input = $(this).parent().parent().parent().parent().prev('div').find('input');
        var time = ($('.checkbox-date').is(':checked'))?'PM':'AM';
        setTime(input,hour,seconds,time);
        // $('.date-drop').remove();
        // $('.mypicker').removeClass('active_picker');
        calculate_price();
    });

    $(document).on('focus','.mypicker',function(e){
        var that = $(this);
        if(!$(that).hasClass('active_picker')) {
            $('.date-drop').remove();
            $('.mypicker').removeClass('active_picker');
        }
        $(that).addClass('active_picker');
        $(that).parent().after('<div class="date-drop">\n' +
            '      <div class="date-drop__item">\n' +
            '        <div class="date-drop__body">\n' +
            '          <div class="date-select">\n' +
            '            <span class="date-select__ico">\n' +
            '              <i class="fa fa-caret-down"></i>\n' +
            '            </span>\n' +
            '            <select class=" hour date-select__item">\n' +
            '              <option value="00">00</option>\n' +
            '              <option value="01">01</option>\n' +
            '              <option value="02">02</option>\n' +
            '              <option value="03">03</option>\n' +
            '              <option value="04">04</option>\n' +
            '              <option value="05">05</option>\n' +
            '              <option value="06">06</option>\n' +
            '              <option value="07">07</option>\n' +
            '              <option value="08">08</option>\n' +
            '              <option value="09">09</option>\n' +
            '              <option value="10">10</option>\n' +
            '              <option value="11">11</option>\n' +
            '              <option value="12">12</option>\n' +
            '            </select>\n' +
            '\n' +
            '          </div>\n' +
            '          <span class="date-separator">\n' +
            '            :\n' +
            '          </span>\n' +
            '          <div class="date-select">\n' +
            '            <span class="date-select__ico">\n' +
            '              <i class="fa fa-caret-down"></i>\n' +
            '            </span>\n' +
            '            <select class="seconds date-select__item">\n' +
            '              <option value="">50</option>\n' +
            '            </select>\n' +
            '\n' +
            '          </div>\n' +
            '        </div>\n' +
            '        <div class="date-drop__footer">\n' +
            '          <div class="date-choise">\n' +
            '            <span>AM</span>\n' +
            '            <div class="date-check">\n' +
            '              <input type="checkbox" class="checkbox-date" id="checkbox">\n' +
            '              <label for="checkbox"></label>\n' +
            '            </div>\n' +
            '            <span>PM</span>\n' +
            '          </div>\n' +
            '        </div>\n' +
            '      </div>\n' +
            '    </div>');
        $('.seconds').empty();
        var second;
        for (var i = 0; i < 4; i++) {
            if(i<1){second='00';} else {second=i*15;}
            $('.seconds').append(new Option(second, second));
        }
        var start_time = $(that).parent().parent().parent().find('.picker-box')[0];
        var current_time = new Date();
        var time = toDate($(that).val().substring(0, 5),"h:m");
        var minutes = time.getMinutes();
        var hours = time.getHours();
        var timeAMPM = ($('.checkbox-date').is(':checked'))?'PM':'AM';
        start_time = toDate($(start_time).find('input.start').val().substring(0, 5),"h:m");

        if(hours==0) {
            if($(that).hasClass('end')) {
                hours = start_time.getHours() + 1;
                minutes = start_time.getMinutes();
            } else {
                hours = current_time.getHours() + 1;
            }
            if(hours>12)  hours=hours-12;
        }else if($(that).hasClass('end')) {
            minutes = start_time.getMinutes();
            if(hours>12) hours=hours-12;
            //if(hours<10) hours='0'+hours;
            if(minutes<10) minutes='0'+minutes;
            $('.seconds').val(minutes);
            setTime(that,hours,minutes,timeAMPM);
        }

        if(hours<10) hours='0'+parseInt(hours);
        if(minutes<10) minutes='0'+parseInt(minutes);
        $('.hour').val(hours);
        $('.seconds').val(minutes);
        if($(that).hasClass('end'))
            $('.seconds').find('option').each(function() {
            if ( $(this).val() != minutes )
                $(this).attr('disabled', true);
            else  $(this).attr('disabled', false);
        });
        $('.checkbox-date').attr('checked',$(that).val().indexOf('PM')>0)

        setTime(that,hours,minutes,timeAMPM);
    });

    $(document).on('click','.payment__item',function(e){e.preventDefault(); return false;});


    $('#add-login-popup').on('click', function (){

        //$('#login-popup').modal('hide');

        $('#login-popup').modal('hide');

        $('#login').modal('show');



    });

    $('#add-signin-popup').on('click', function (){
        $('#login-popup').modal('hide');

        $('#signUpdiv').modal('show');

    });

});
// -- Document events ---------------
$(document).ready(function () {

    /*-------mob menu----------*/

    $('.xsNav').click(function(e){
        e.preventDefault();
        $('.collapseBox').toggleClass('active');
        $('body').toggleClass('no-scrolling');

    });

    $('.onlyNumber').on('keyup', function () {
        $('.error-onlyNumber').remove();
        var errorText = '<span class="help-block error-onlyNumber">\n' +
            '             <strong>Wrong input. Please enter only number</strong>\n' +
            '          </span>';
        if (this.value.match(/[^0-9]/g)) {
            $(this).before(errorText);
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

    like_name=$('input[name="like_name"]').val();
    $('input[name="like_name"]').on('change',function(){
        var text = $(this).val();
        $('.line_about').html('ONE LINE ABOUT '+text);

        // $('span').each(function(){
        //     var t = $(this).text();
        //     console.log();
        //     t=t.replace(like_name, text);
        //     $(this).text(t);
        // });
    });

    // $('input[name="mobile_number"]').on('keyup', function () {
    //     var val=$(this).val();
    //     var that = this;
    //     $('.error-onlyNumber1').remove();
    //
    //     var errorText = '<span class="help-block error-onlyNumber1">\n' +
    //         '             <strong>Wrong input. Format: 07999999999</strong>\n' +
    //         '          </span>';
    //     if (val.match(/^07[0-9]{9}$/)) {
    //         $(that).before(errorText);
    //         that.value = that.value.replace(/^07[0-9]$/, '07');
    //     }
    // });

/*    $(".digitFilter").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });*/


    $(document).ready(function(){
        $(".digitFilter0, .digitFilter0v2, .digitFilter07").bind("cut copy paste click dblclick focus",function(e) {
            e.preventDefault();
        });
    });


    $(".digitFilter07").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        var input =  $(".digitFilter07").val();
        if((input.length==0 && e.keyCode!=48)) {
            e.preventDefault();
            return;
        }
        if(input.length==1 && e.keyCode!=55) {
            e.preventDefault();
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $(".digitFilter0").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        var input =  $(".digitFilter0").val();
        if((input.length==0 && e.keyCode!=48)) {
            e.preventDefault();
            return;
        }
        if((input.length>0 && input.substring(0,1)!='0')) {
            e.preventDefault();
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $(".digitFilter0v2").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        var input =  $(".digitFilter0v2").val();
        if((input.length==0 && e.keyCode!=48)) {
            e.preventDefault();
            return;
        }
        if((input.length>0 && input.substring(0,1)!='0')) {
            e.preventDefault();
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    // Иван функция уменшает автоматом шрифт у имени пользователя в шапке
    if ($('.profileName').lenght > 0)
        scale($('.profileName').parent()[0]);
    $('.sortLinkXs').click(function (e) {

        e.preventDefault();
        var hBlock3 = $('.hiddenSort');

        if (hBlock3.is(':visible')) {
            $(this).find('.fa').addClass('fa-angle-down');
            $(this).find('.fa').removeClass('fa-angle-up')
        }
        else {
            $(this).find('.fa').removeClass('fa-angle-down');
            $(this).find('.fa').addClass('fa-angle-up')
        }
        $('.hiddenSort ').toggleClass('hiddenSort--visible');
    });

    /*------основной блок фильтров--------*/
    $('.filterHead__link').click(function (e) {

        e.preventDefault();
        var hBlock = $('.hiddenFilter');

        if (hBlock.is(':visible')) {
            $(this).find('.fa').addClass('fa-angle-down');
            $(this).find('.fa').removeClass('fa-angle-up')
        }
        else {
            $(this).find('.fa').removeClass('fa-angle-down');
            $(this).find('.fa').addClass('fa-angle-up')
        }
        $('.hiddenFilter ').toggleClass('hiddenFilter--visible');
    });

    $('.filterGroup__box').removeClass('filterGroup__box--active');
    $('.hiddenFilter ').removeClass('hiddenFilter--visible');

    /*----- внутрение фильтры------*/
    $('.searchFilter .filterGroup__link').click(function () {

        var hBlock2 = $(this).next('div');
        if (!$(this).hasClass('active')) {	//если "кликнутый" пункт неактивный:

            $(this).addClass('active');	//активируем "кликнутый" пункт
            $(this).next('div').addClass('filterGroup__box--active');	//раскрываем следующий за ним блок с описанием
        } else {

            $(this).removeClass('active').next('div').removeClass('filterGroup__box--active');	//скрываем данный пункт
        }

        if (hBlock2.is(':visible')) {
            $(this).find('.fa').removeClass('fa-angle-down');
            $(this).find('.fa').addClass('fa-angle-up')

        }
        else {
            $(this).find('.fa').addClass('fa-angle-down');
            $(this).find('.fa').removeClass('fa-angle-up')
        }


    });

    if ($(window).width() < 768) {
        $('.hiddenSort').removeClass('hiddenSort--visible');
    }
    else {
        $('.filterGroup__box').addClass('filterGroup__box--active');
        $('.hiddenFilter ').addClass('hiddenFilter--visible');
        $('.hiddenSort').addClass('hiddenSort--visible');
    }
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('.filterHead__link').click(function (e) {
                e.preventDefault();
                var hBlock = $('.hiddenFilter');
                if (hBlock.is(':visible')) {
                    $(this).find('.fa').addClass('fa-angle-down');
                    $(this).find('.fa').removeClass('fa-angle-up')
                }
                else {
                    $(this).find('.fa').removeClass('fa-angle-down');
                    $(this).find('.fa').addClass('fa-angle-up')
                }
                $('.hiddenFilter ').toggleClass('hiddenFilter--visible');
            });

            $('.filterGroup__box').removeClass('filterGroup__box--active');

            /*----- внутрение фильтры------*/
            $('.searchFilter .filterGroup__link').click(function (e) {
                e.preventDefault();
                var hBlock2 = $(this).next('div');
                if (!$(this).hasClass('active')) {	//если "кликнутый" пункт неактивный:

                    $(this).addClass('active');	//активируем "кликнутый" пункт
                    $(this).next('div').addClass('filterGroup__box--active');	//раскрываем следующий за ним блок с описанием
                } else {
                    $(this).removeClass('active').next('div').removeClass('filterGroup__box--active');	//скрываем данный пункт
                }
                if (hBlock2.is(':visible')) {
                    $(this).find('.fa').removeClass('fa-angle-down');
                    $(this).find('.fa').addClass('fa-angle-up')
                }
                else {
                    $(this).find('.fa').addClass('fa-angle-down');
                    $(this).find('.fa').removeClass('fa-angle-up')
                }
            });
        }
        else {
            $('.filterGroup__box').addClass('filterGroup__box--active');
            $('.hiddenFilter ').addClass('hiddenFilter--visible');
            $('.hiddenSort').addClass('hiddenSort--visible');
        }
    });

    if ($("#depend-if").val() == 'It Depends') {
        $(".depend_hiding").show()
    }

    $("#depend-if").on('change', function () {
        if ($(this).val() != "0") {
            if ($(this).val() == 'Yes') {
                $(".depend_hiding").hide();
            }
            if ($(this).val() == 'No') {
                $(".depend_hiding").hide();
            }
            if ($(this).val() == 'It Depends') {
                $(".depend_hiding").show();
            }
        }
    });

    if ($("#depend-ifNo").val() == 'No') {
        $(".depend_hidingNo").show();
    } else {
        $(".depend_hidingNo").hide();
    }

    $("#depend-ifNo").on('change', function () {
        if ($(this).val() != "0") {
            if ($(this).val() == 'No') {
                $(".depend_hidingNo").show();
            }
            if ($(this).val() == 'Yes') {
                $(".depend_hidingNo").hide();
            }
        }
    });

    if ($("#depend-if-work").val() == 'Yes') {
        $(".depend_hiding-work").show();
    } else {
        $(".depend_hiding-work").hide();
    }

    $("#depend-if-work").on('change', function () {
        if ($(this).val() != "0") {
            if ($(this).val() == 'Yes') {
                $(".depend_hiding-work").hide();
            }
            if ($(this).val() == 'No') {
                $(".depend_hiding-work").hide();
            }
        }
    });

    if ($("#type_car_work").val() == 'Yes') {
        //$(".car-block").show();
        $('#profile_use_car').parent().show();
    } else {
        $(".car-block").hide();
        $('#profile_use_car').parent().hide();
    }

    $("#type_car_work").on('change', function () {
        if ($("#type_car_work").val() == 'Yes') {
            $(".car-block").show();
            $('#profile_use_car').parent().show();
        } else {
            $(".car-block").hide();
            $('#profile_use_car').parent().hide();
        }
    });

    $(".getting_dressed_for_bed_selector").on('change', function () {
        if ($(".getting_dressed_for_bed_selector").val() != 'No') {
            $(".getting_dressed_for_bed_depend").slideDown();

        } else {
            $(".getting_dressed_for_bed_depend").slideUp();
        }
    });


    $(".keeping_safe_at_night_selector").on('change', function () {
        if ($(".keeping_safe_at_night_selector").val() != 'No') {
            $(".keeping_safe_at_night_depend").slideDown();
            if($(".toilet_at_night_selector").val() != 'No'){
                $(".toilet_at_night_depend").slideDown();
            }
        } else {
            $(".keeping_safe_at_night_depend").slideUp();
            $(".toilet_at_night_depend").slideUp();
        }
    });



    if ($('#driving_license').length > 0) {
        if ($('#driving_license').val() == "Yes") {
            $('.hiding_profile').show();
        } else {
            $('.hiding_profile').hide();
        }
        if ($("#type_car_work").val() == 'Yes') {
            //$(".car-block").show();
            $('#profile_use_car').parent().show();
        } else {
            //$(".car-block").hide();
            $('#profile_use_car').parent().hide();
        }
    }

    if ($('#register_have_car').length > 0) {
        if ($('#register_have_car').val() == "Yes") {
            $('#register_use_car').parent().parent().show();
        } else {
            var uc = $('#register_use_car').parent().parent();
            $(uc).hide();
        }
    }

    $("#post_code_profile").on("keyup", function (e) {
        var validator = /^(([Bb][Ll][0-9])|([Mm][0-9]{1,2})|([Oo][Ll][0-9]{1,2})|([Ss][Kk][0-9]{1,2})|([Ww][AaNn][0-9]{1,2})) {0,}([0-9][A-Za-z]{2})$/;
        var text = $(this).val();
        var $this = $(this);
        var errorText = '<span class="help-block error-post-code">\n' +
            '             <strong>Wrong post code. Please retry enter</strong>\n' +
            '          </span>';
        $('.error-post-code').remove();
        has_error_profile_form = false;
        error_mark = '';
        if (!validator.test(text)) {
            $($this).after(errorText);
            has_error_profile_form = true;
            error_mark = '#post_code_profile';
        }
    });

    $(document).on('change', '#register_have_car', function () {
        if ($('#register_have_car').val() == "Yes") {
            $('#register_use_car').parent().parent().show();
        } else {
            var uc = $('#register_use_car').parent().parent();
            $(uc).hide();
        }
    });

    //step8 carer registration transport
    if ($('#regCarerSt8_driving_licence').length > 0) {
        if ($('#regCarerSt8_driving_licence').val() == "Yes") {
            $('.dependFrom_regCarerSt8_driving_licence').show();
        } else {
            $('.dependFrom_regCarerSt8_driving_licence').hide();
            $('.dependFrom_regCarerSt8_have_car').hide();
        }
    }
    $(document).on('change', '#regCarerSt8_driving_licence', function () {
        if ($('#regCarerSt8_driving_licence').val() == "Yes") {
            $('.dependFrom_regCarerSt8_driving_licence').show();
            if ($('#regCarerSt8_have_car').val() == "Yes") {
                $('.dependFrom_regCarerSt8_have_car').show();
            }
            if ($('#regCarerSt8_use_car').val() == "Yes" && $('#regCarerSt8_have_car').val() == "Yes") {
                $('.dependFrom_regCarerSt8_use_car').show();
            }
        } else {
            $('.dependFrom_regCarerSt8_driving_licence').hide();
            $('.dependFrom_regCarerSt8_have_car').hide();
            $('.dependFrom_regCarerSt8_use_car').hide();
        }
    });

    if ($('#regCarerSt8_have_car').length > 0) {
        if ($('#regCarerSt8_have_car').val() == "Yes") {
            $('.dependFrom_regCarerSt8_have_car').show();
        } else {
            $('.dependFrom_regCarerSt8_have_car').hide();

        }
    }
    $(document).on('change', '#regCarerSt8_have_car', function () {
        if ($('#regCarerSt8_have_car').val() == "Yes") {
            $('.dependFrom_regCarerSt8_have_car').show();
            if ($('#regCarerSt8_use_car').val() == "Yes") {
                $('.dependFrom_regCarerSt8_use_car').show();
            }
        } else {
            $('.dependFrom_regCarerSt8_have_car').hide();
            $('.dependFrom_regCarerSt8_use_car').hide();
        }
    });
    if ($('#regCarerSt8_use_car').length > 0) {
        if ($('#regCarerSt8_use_car').val() == "Yes") {
            $('.dependFrom_regCarerSt8_use_car').show();
        } else {
            $('.dependFrom_regCarerSt8_use_car').hide();

        }
    }
    $(document).on('change', '#regCarerSt8_use_car', function () {
        if ($('#regCarerSt8_use_car').val() == "Yes") {
            $('.dependFrom_regCarerSt8_use_car').show();
        } else {
            $('.dependFrom_regCarerSt8_use_car').hide();
        }
    });
    //^^^^^^step8 carer registration transport

    $('.text-limit').parent().css('margin-right', 0);
    $('.text-limit').parent().css('position', 'relative');

    $('.text-limit').on('keyup', function () {

        if ($(this).parent().find('#charsLeft').length == 0)
            $(this).after('<span class="charsLeft" id="charsLeft"></span>');
        var limit = $(this).attr('data-limit');
        if (limit <= 0) limit = 50;
        $(this).limit(limit, '#charsLeft');
    });
//>>>>Иван 20170921 для приватного профиля пользователя
    $(document).on('change', '.profileField__select.serviceUserProfile', function () {

        if ($(this).val() == 'No') {
            $(this).parent().next().hide();
        }
        if ($(this).val() == 'Yes') {
            $(this).parent().next().show();
        }
        if ($(this).val() == 'Sometimes') {
            $(this).parent().next().show();
        }
    });

    $(document).on('change', '.profileField__select.serviceUserProfilePet', function () {

        if ($(this).val() == 'No') {
            $(".serviceUserProfilePetHide").hide();
        }
        if ($(this).val() == 'Yes') {
            $(".serviceUserProfilePetHide").show();
        }

    });

    $(document).on('change', '.move_available_switcher',function () {

        if ($(this).val() == 'Yes') {
            $(".depend_from_move_available").hide();
        }
        else  {
            $(".depend_from_move_available").show();
        }

    });
    $(document).on('change', '.other_detail_switcher',function () {

        if ($(this).val() == 'Yes') {
            $(".depend_from_entering_aware").slideDown("slow");
        }
        else  {
            $(".depend_from_entering_aware").slideUp();
        }

    });
    $(document).on('change', '.assistance_keeping_switcher',function () {

        if ($(this).val() == 'Yes') {
            $(".depend_from_home_safe").hide();
        }
        else  {
            $(".depend_from_home_safe").show();
        }

    });

    $(document).on('change', '.toilet_switcher',function () {

        if ($(this).val() != 'No') {
            $(".depend_from_managing_toilet_needs").slideDown("slow");
        }
        else  {
            $(".depend_from_managing_toilet_needs").slideUp();
        }

    });
    if($('.incontinence_wear_switcher').val() != 'No') {
        $(".depend_from_have_incontinence_incontinence_wear").slideUp();
    }
    $(document).on('change', '.incontinence_switcher',function () {

        if ($(this).val() != 'Yes') {
            $(".depend_from_have_incontinence").slideDown("slow");

            if($('.incontinence_wear_switcher').val() != 'No') {
                $(".depend_from_have_incontinence_incontinence_wear").slideDown("slow");
            }

        }
        else  {
            $(".depend_from_have_incontinence").slideUp();
            $(".depend_from_have_incontinence_incontinence_wear").slideUp();
        }

    });
    $(document).on('change', '.incontinence_wear_switcher',function () {

        if ($(this).val() != 'No') {
            $(".depend_from_have_incontinence_incontinence_wear").slideUp("slow");
        }
        else  {
            $(".depend_from_have_incontinence_incontinence_wear").slideDown();
        }

    });

    $(document).on('change', '.consent_switcher',function () {

        if ($(this).val() != 'No') {
            $(".depend_from_consent").slideDown("slow");
        }
        else  {
            $(".depend_from_consent").slideUp();
        }

    });

    $(document).on('change', '.toilet_at_night_selector',function () {

        if ($(this).val() != 'No') {
            $(".toilet_at_night_depend").slideDown("slow");
        }
        else  {
            $(".toilet_at_night_depend").slideUp();
        }

    });

    $("input[name='behaviour[9]']").change(function () {
        if (this.checked) {
            $(".depend_from_behaviour9").slideDown("slow");
        } else {
            $(".depend_from_behaviour9").slideUp();
        }

    });


    $("input[name='languages[12]']").change(function () {
        if (this.checked) {
            $(".otherLanguages").slideDown("slow");
        } else {
            $(".otherLanguages").slideUp();
        }

    });


    $(function () {
        $("#DBS_certificate_date").datepicker({
            beforeShow: function(input, inst) {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            },
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "-2Y",
            maxDate: "-1D",
            yearRange: "-2:+2"
        });
    });
    $( function() {
        $( "#datepicker_driver_licence" ).datepicker({
            beforeShow: function(input, inst) {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            },
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "+0D",
            maxDate: "+50Y",
            yearRange: "0:+50"
        });
    } );
    $( function() {
        $( "#datepicker_insurance" ).datepicker({
            beforeShow: function(input, inst) {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            },
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "+0D",
            maxDate: "+50Y",
            yearRange: "0:+50"
        });
    } );
    $( function() {
        $( "#datepicker_date_sertificate" ).datepicker({
            beforeShow: function(input, inst) {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999999999999);
                }, 0);
            },
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "+0D",
            maxDate: "+50Y",
            yearRange: "0:+50",
            ignoreReadonly:false
        });
    });
        $("#datepicker_when_start").datepicker({
            //changeMonth: true,
            //changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "+3D",
            maxDate: "+20Y",
            yearRange: "0:+10"
        });

    //if($.isFunction('timepicker')){
        $('#time_to_bed').timepicker({
            beforeShow: function(i) {
                if ($(i).attr('readonly')) { return false; }
                },
            change: function() {
                $(this).change();
            },
            timeFormat: 'h:mm p',
            interval: 60,
            //minTime: '10',
            //maxTime: '6:00pm',_step48
            //defaultTime: '18',
            startTime: '18:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
        $('#time_to_from').timepicker({
            change: function() {
                $(this).change();
            },
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: getTime(),
            //maxTime: '6:00pm',_step48
            //defaultTime: '18',
            startTime: getTime(),
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    //}
    //if($.isFunction('timepicker')) {
    //     $('#time_to_night_helping:not(.profileField__input--greyBg)').timepicker({
    //         change: function() {
    //             $(this).change();
    //         },
    //         timeFormat: 'h:mm p',
    //         interval: 30,
    //         startTime: '18:00',
    //         dynamic: true,
    //         dropdown: true,
    //         scrollbar: true
    //     });
    //}

    $(".allTime").click(function () {
        $('input.checkboxTimerGroup:checkbox').not(this).prop('checked', this.checked);
        $('input.morning:checkbox').not(this).prop('checked', this.checked);
        $('input.afternoon:checkbox').not(this).prop('checked', this.checked);
        $('input.night:checkbox').not(this).prop('checked', this.checked);
    });

    $(".everyMorning").click(function () {
        $('input.morning:checkbox').not(this).prop('checked', this.checked);
    });

    $(".everyAfternoon").click(function () {
        $('input.afternoon:checkbox').not(this).prop('checked', this.checked);
    });

    $(".everyNight").click(function () {
        $('input.night:checkbox').not(this).prop('checked', this.checked);
    });


//>>>>Иван 20170922 для приватного профиля пользователя
    $(document).on('change', '.serviceUserProfileInhabitants', function () {

        if ($(this).val() == 'No') {
            $(".inhabitantsDepend").hide();
        }
        if ($(this).val() == 'Yes') {
            $(".inhabitantsDepend").show();
        }
        if ($(this).val() == 'Sometimes') {
            $(".inhabitantsDepend").show();
        }
    });
    $(document).on('change', '.profileField__select.home-is-flat', function () {

        if ($(this).val() == 'HOUSE') {
            $(".profileField.home-is-flat").hide();
        }
        if ($(this).val() == 'FLAT') {
            $(".profileField.home-is-flat").show();
        }
        if ($(this).val() == 'BUNGALOW') {
            $(".profileField.home-is-flat").hide();
        }
    });


    $( "textarea, .countable" ).not('.doNotCount').focus(function() {
        var $this = this;
        $('.help-block').remove();
        var maxLenght = $( $this ).attr('maxlength');
        var currentLength = $( $this ).val().length;
        var symbolsLeft = maxLenght - currentLength;
        $( $this ).before('<span class="help-block" style="margin: 0;padding: 0;color: green">Characters remaining ('+currentLength+'/'+maxLenght+')</span>');
        $($this).next("span").css("top", "28px");
    });
    $( "textarea, .countable" ).keyup(function() {
        var maxLenght = $( this ).attr('maxlength');
        var currentLength = $( this ).val().length;
        var symbolsLeft = maxLenght - currentLength;
        $( this ).prev( "span" ).text('Characters remaining ('+currentLength+'/'+maxLenght+')');
    });
    $("textarea, .countable").focusout(function () {
        $(this).prev("span").remove();
        $(this).next("span").css("top", "12px");
    });

    $(document).on('click','a.referal-field-btn--add', function (e) {
        e.preventDefault();

        var n = $( ".referal-row" ).length + 1;

        //alert(n);

        var block = '         <div class="referal-row">\n' +
            '                    <div class="referal-field">\n' +
            '                        <div class="inputWrap">\n' +
            '                            <input type="email" name="email['+
            n +
            ']" class="formInput" placeholder="Email addresses" required />\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                    <a href="#" class="referal-field-btn referal-field-btn--add"">\n' +
            '                        <i class="fa fa-plus"></i>\n' +
            '                    </a>\n' +
            '                    <a href="" class="referal-field-btn referal-field-btn--delete">\n' +
            '                        <i class="fa fa-minus"></i>\n' +
            '                    </a>\n' +
            '                </div>';

        var that = $(this);

        $(that).parent().after(block);//.html('xflbjhilhjtrdlihj');

    });
    $(document).on('click','a.referal-field-btn--delete', function (e) {
        e.preventDefault();

        $(this).parent().remove();
    });

//^^^^^^^Иван 20170922 для регистрации профиля пользователя
    if ($("#step48sometimes-if").val() == 'Yes') {
        {
            $(".sometimes_hiding_step48").show()
        }
    }
    if ($("#step48sometimes-if2").val() == 'Yes' && $("#step48sometimes-if").val() == 'Yes') {
        {
            $(".sometimes_hiding2_step48").show()
        }
    }
    $("#step48sometimes-if").on('change', function () {
        if ($("#step48sometimes-if").val() != 'No') {
            $(".sometimes_hiding_step48").show();
        } else {
            $(".sometimes_hiding_step48").hide();
            $(".sometimes_hiding2_step48").hide();
        }
    });
    if ($("#step48sometimes-if2").val()!=''){
        if ($("#step48sometimes-if2").val() != 'No') {
            $(".sometimes_hiding2_step48-1").show();
            $(".sometimes_hiding2_step48-2").hide();
        } else {
            $(".sometimes_hiding2_step48-2").show();
            $(".sometimes_hiding2_step48-1").hide();
        }
    }
    $("#step48sometimes-if2").on('change', function () {
        if ($("#step48sometimes-if2").val() != 'No') {
            $(".sometimes_hiding2_step48-1").show();
            $(".sometimes_hiding2_step48-2").hide();
        } else {
            $(".sometimes_hiding2_step48-2").show();
            $(".sometimes_hiding2_step48-1").hide();
        }
    });
//^^^^^^^Иван 20170929 для регистрации профиля пользователя
    if ($("#criminal_detail").val() == 'Some') {
        $(".criminal_detail").show();
    } else {
        $(".criminal_detail").hide();
    }
    $("#criminal_detail").on('change', function () {
        if ($("#criminal_detail").val() == 'Some') {
            $(".criminal_detail").show();
        } else {
            $(".criminal_detail").hide();
        }
    });
    if($.isFunction('timepicker')) {
        $('.timepicker_message').timepicker({
            change: function() {
                $(this).change();
                console.log('time change');
            },
            timeFormat: 'h:mm p',
            interval: 30,
            //minTime: '10',
            //maxTime: '6:00pm',
            //defaultTime: '18',
            startTime: getTime(),
            startTime: '18:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true

        });
    }

    $('.moreBtn__item').on('click',function(){


        var dlast = $('.bookings-more').last().clone();
        $(dlast).find('.datepicker').each(function () {
            var input_name = $(this).attr('name').substring(0, $(this).attr('name').indexOf('['));
            var input_name_p = $(this).attr('name').substring($(this).attr('name').indexOf('[')+2, $(this).attr('name').length);
            $(this).attr('name', input_name + '[' + bookings_pos + input_name_p);
        });
        $(dlast).find('.timepicker_message').each(function () {
            var input_name = $(this).attr('name').substring(0, $(this).attr('name').indexOf('['));
            var input_name_p = $(this).attr('name').substring($(this).attr('name').indexOf('[')+2, $(this).attr('name').length);
            $(this).attr('name', input_name + '[' +bookings_pos+ input_name_p);
            var input_name1 = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p1 = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name1 + '[' + bookings_pos + input_name_p1);
        });
        $(dlast).find('.periodicity').each(function () {
            var input_name2 = $(this).attr('name').substring(0, $(this).attr('name').indexOf('['));
            var input_name_p2 = $(this).attr('name').substring($(this).attr('name').indexOf('[')+2, $(this).attr('name').length);
            $(this).attr('name', input_name2 + '[' +bookings_pos+ input_name_p2);
            var input_name3 = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p3 = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name3 + '[' + bookings_pos + input_name_p3);
        });
        $(dlast).find('.assistance_types').each(function () {
            var input_name2 = $(this).attr('name').substring(0, $(this).attr('name').indexOf('['));
            var input_name_p2 = $(this).attr('name').substring($(this).attr('name').indexOf('[')+2, $(this).attr('name').length);
            $(this).attr('name', input_name2 + '[' +bookings_pos+ input_name_p2);
            // var input_name3 = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            // var input_name_p3 = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            // $(this).attr('name', input_name3 + '[' + bookings_pos + input_name_p3);
        });
        $('.moreBtn__item').before(dlast);
        $('.bookings-more').last().find('.datepicker_message').removeClass("hasDatepicker").removeAttr('id');
        $('.bookings-more').last().find('.timepicker_message ').removeClass("hasDatepicker").removeAttr('id');

        $(".datepicker_message").datepicker({
            beforeShow: function(input, inst) {
                inst.dpDiv.css({"z-index":"2000!important;"});
                if ($(input).attr('readonly')) { return false; }
            },
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "+0D",
            maxDate: "+50Y",
            yearRange: "0:+50"
        });
        $('.timepicker_message').timepicker({
            beforeShow: function(input, inst) {
                inst.dpDiv.css({"z-index":"2000!important;"});
            },change: function() {
                $(this).change();
            },
            timeFormat: 'h:mm p',
            interval: 30,
            startTime: getTime(),
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });

        bookings_pos++;
        return false;
    });

    $(document).on('change','.datepicker_message',function(){
        var datepickerBegin = $(this).parent().parent().find('.datepicker_message[name*="start"]').datepicker("getDate");
        var datepickerEnd = $(this).parent().parent().find('.datepicker_message[name*="end"]').datepicker("getDate");
        var form = $(this).parent().parent();
        var timestart = $(form).find('.timepicker_message')[0];
        var now = new Date();
        var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
        if(datepickerBegin.length>0)
        if(datepickerBegin-today==0){
            $(timestart).timepicker().destroy();
            $(timestart).timepicker({minTime:getTime(),startTime:getTime(),scrollbar:true});
        }else{
            $(timestart).timepicker().destroy();
            $(timestart).timepicker({minTime:null,startTime:null,scrollbar:true});
        }

        var form = $(this).parent().parent().parent().parent().parent();
        $(form).find('.weekly').attr('disabled',false);
        $(form).find('.Daily').attr('disabled',false);
        if (datepickerEnd-datepickerBegin==0) {
            $(form).find('.weekly').attr('disabled',true);
            $(form).find('.Daily').attr('disabled',true);
            $(form).find('.Single').attr('checked',true);
        }else if (datepickerEnd-datepickerBegin < 7 * 86400 * 1000) {
            $(form).find('.weekly').attr('disabled',true);
        }else{
            $(form).find('.weekly').attr('disabled',false);
            $(form).find('.Daily').attr('disabled',false);
        }
    });
    $(document).on('click','.Single',function(){
        var that = $(this);
        if( $(that).is(':checked')) {
            var datetime = $(that).parent().parent().find('.datepicker_message');
            var label = $(that).parent().parent().find('.correct');
            $(datetime).parent().hide();
            $(label).hide();
        }
    });
    $(document).on('click','.weekly',function(){
        var that = $(this);
        if( $(that).is(':checked')) {
            var datetime = $(that).parent().parent().find('.datepicker_message');
            var label = $(that).parent().parent().find('.correct');
            $(datetime).parent().show();
            $(label).show();
            $(datetime).removeClass("hasDatepicker").removeAttr('id');
            var datestart = $(datetime).attr('name').substring(0,$(datetime).attr('name').length - 10)+'[date_start]';
            var datestartDate = $('input[name="'+datestart+'"]').datepicker( "getDate" );
            var inWeek = new Date();
            var in90Day = new Date();
            inWeek.setDate(datestartDate.getDate()+7);
            in90Day.setDate(datestartDate.getDate()+75);

            console.log(inWeek);
            $(datetime).datepicker({
                beforeShow: function (input, inst) {
                    inst.dpDiv.css({"z-index": "2000!important;"});
                    if ($(input).attr('readonly')) { return false; }
                },
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd/mm/yy",
                showAnim: "slideDown",
                minDate: inWeek,
                maxDate: in90Day,
                yearRange: "0:+2"
            });
        }
    });

    $(document).on('click','.delete',function(){
        var that = $(this);
        var cur = $(that).attr('data-id');
        $(that).parent().parent().prev('div').remove();
        $(that).parent().parent().remove();

        $('div[data-id="'+cur+'"]').remove();
        $('.'+cur).remove();
        appointments=appointments-1;
        if(appointments<=1)$('.delete').hide();
        calculate_price();
    });

    $(document).on('click','.Daily',function(){
        var that = $(this);
        if( $(that).is(':checked')) {
            var datetime = $(that).parent().parent().find('.datepicker_message');
            var label = $(that).parent().parent().find('.correct');
            $(datetime).parent().show();
            $(label).show();
            $(datetime).removeClass("hasDatepicker").removeAttr('id');
            var inDay = new Date();
            var form = $(this).parent().parent();
            var in90Day = new Date();
            var datestart = $(datetime).attr('name').substring(0,$(datetime).attr('name').length - 10)+'[date_start]';
            var datestartDate = $('input[name="'+datestart+'"]').datepicker( "getDate" );
            if(datestartDate!=null) {
                inDay.setDate(datestartDate.getDate() + 2);
                in90Day.setDate(datestartDate.getDate() + 75);
                $(datetime).datepicker({
                    beforeShow: function (input, inst) {
                        inst.dpDiv.css({"z-index": "2000!important;"});
                        if ($(input).attr('readonly')) {
                            return false;
                        }
                    },
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "dd/mm/yy",
                    showAnim: "slideDown",
                    minDate: inDay,
                    maxDate: in90Day,
                    yearRange: "0:+2"
                });
            }else{

            }
        }
    });

    $(document).on('click','.roundedBtn__item--alternative-smal,.roundedBtn__item--alternative',function(e){
       e.preventDefault();
       var id=$(this).attr('data-id');
        $.ajax({
            url: '/bookings/'+id+'/modal_edit',
            type: 'get',
            dataType: "html",
            success: function (response) {
                $('#message-booking').remove();
                $('body').append(response);
                $('.needCare__item').click();
                $(".datepicker_message").datepicker({
                    beforeShow: function(input, inst) {
                        inst.dpDiv.css({"z-index":"2000!important;"});
                        if ($(input).attr('readonly')) { return false; }
                    },
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "dd/mm/yy",
                    showAnim: "slideDown",
                    minDate: "+0D",
                    maxDate: "+50Y",
                    yearRange: "0:+50"
                });
                $('.timepicker_message').timepicker({
                    beforeShow: function(input, inst) {
                        inst.dpDiv.css({"z-index":"2000!important;"});
                    },change: function() {
                        $(this).change();
                    },
                    timeFormat: 'h:mm p',
                    interval: 30,
                    //minTime: '10',
                    //maxTime: '6:00pm',
                    //defaultTime: '18',
                    startTime: getTime(),
                    dynamic: true,
                    dropdown: true,
                    scrollbar: true
                });
                $('#message-booking').modal('show');
                $('.needCare__item').click();
            },
            error: function (response) {

            }
        });
    });

    $(document).on('click','a.additionalTime', function (e) {
        e.preventDefault();
        var $that =$(this);
        var dlast = $('.cdate').last().clone();
        var typeCareAll = $('.typeCareAll').last().clone();
        var clast = $('.checktime').last().clone();
        $(dlast).find('.error-booking').remove();
        $(clast).find('.error-booking').remove();
        $(dlast).find('.datepicker').each(function () {
            var input_name = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name + '[' + appointments + input_name_p);
            $(this).parent().parent().find('.delete').attr('data-id','d'+appointments);
            $(this).parent().parent().find('.delete').show();
        });
        var t=$('.assistance_types').length+1;
        $(typeCareAll).find('.assistance_types').each(function(){
           var input_name = $(this).attr('name').substring(0, $(this).attr('name').indexOf(']')-1);
           var input_name_p = $(this).attr('name').substring($(this).attr('name').indexOf(']'), $(this).attr('name').length);
            $(this).attr('name', input_name +  appointments + input_name_p);
            $(this).attr('id', 'assistance_types' +  t);
            $(this).val(t);
            $(this).parent().find('label').attr('for','assistance_types' +  t);
            t=t+1;
        });

        $(dlast).find('.mypicker').each(function () {
            var input_name = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name + '[' +appointments+ input_name_p);
            var input_name1 = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p1 = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name1 + '[' + appointments + input_name_p1);
        });

        $(clast).find('.periodicity').each(function () {
            var input_name3 = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p3 = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name3 + '[' + appointments + input_name_p3);
            var input_name2 = $(this).attr('id').substring(0, $(this).attr('id').indexOf('D')+1);
            $(this).attr('id', input_name2 +periodicity);
            var input_name2 = $(this).parent().find('label').attr('for').substring(0, $(this).parent().find('label').attr('for').indexOf('D')+1);
            $(this).parent().find('label').attr('for', input_name2 +periodicity);
            $(this).parent().parent().attr('data-id','d'+appointments);
            $(this).parent().parent().find('.delete').attr('data-id','d'+appointments);
            periodicity++;
        });

        $(clast).find('.datepicker').each(function () {
            var input_name = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name + '[' + appointments + input_name_p);
            $(this).parent().parent().find('.delete').attr('data-id','d'+appointments);
        });

        $($that).before('<br><h2 class="ordinaryTitle d'+appointments+'">\n' +
            '                                <span class="ordinaryTitle__text">Type of care</span>\n' +
            '                            </h2>');
        appointments=appointments+1;
        $($that).before(typeCareAll);
        $($that).before(dlast);
        $($that).before(clast);
        $('.rtext').last().remove();

        $('.datepicker_message').removeClass("hasDatepicker").removeAttr('id');
        $('.timepicker_message').removeClass("hasDatepicker").removeAttr('id');


        $(".datepicker_message").datepicker({
            beforeShow: function(input, inst) {
                inst.dpDiv.css({"z-index":"9999!important"});
                if ($(input).attr('readonly')) { return false; }
            },
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "+0D",
            maxDate: "+50Y",
            yearRange: "0:+50"
        });
        $('.timepicker_message').timepicker({
            beforeShow: function(input, inst) {
                inst.dpDiv.css({"z-index":2000});
                if ($(input).attr('readonly')) { return false; }
            },
            change: function() {
                $(this).change();
            },
            timeFormat: 'h:mm p',
            interval: 60,
            //maxTime: '6:00pm',_step48
            //defaultTime: '18',
            startTime: getTime(),
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
        calculate_price();
        return false;
    });

    $(document).on('click','#confirm-terms',function(){
        if ($(this).is(':checked')) {
            $('#book-carer').prop('disabled',false);
        }
        else{
            $('#book-carer').prop('disabled',true);

        }
    });
    if ($("#checkL12").is(':checked')) {
        $(".language_additional").show();
    } else {
        $(".language_additional").hide();
    }
    $("#checkL12").on('click', function () {
        if ($("#checkL12").is(':checked')) {
            $(".language_additional").show();
        } else {
            $(".language_additional").hide();
        }
    });

    if($("#checkLOTHER").is(':checked')) {
        $(".language_additional").show();
    }else{
        $(".language_additional").hide();
    }
    $("#checkLOTHER").on('click',function(){
        if($("#checkLOTHER").is(':checked')) {
            $(".language_additional").show();
        }else{
            $(".language_additional").hide();
        }
    });

    /*--------------слайдер I am carer page------------*/
    if ($('div').is('.carerBanner')) {
        $('.carerBanner').owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            navigation: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: false,
            responsive: {
                600: {
                    items: 1
                }
            }
        });
    }

    /*-------------- Home page slider (popular carers) ------------*/
    if ($('div').is('.HomePageBanner')) {
        $('.HomePageBanner').owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            nav: true,
            navText: [
              '<a href="#theCarousel" data-slide="prev" class="sliderControl sliderControl--left centeredLink">'+
              '<i class="fa fa-angle-left"></i>'+
              '</a>',
              '<a href="#theCarousel" data-slide="next" class="sliderControl sliderControl--right centeredLink">'+
              '<i class="fa fa-angle-right"></i>'+
              '</a>'
            ],
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive:{
               0    : { items:1 },
               600  : { items:2 },
               992  : { items:3 },
               1200 : { items:4 }
           }
        });
    }

    $('.sliderControl').on('click', function (e) {
      e.preventDefault()
    });

    $('.moreLink').on('click', function (e) {
        $('#load-more').val(1);
        $('#load-count').val(parseInt($('#load-count').val())+5);
        $('#page').val(parseInt($('#page').val())+1);
        carerSearchAjax();
    });

    $(document).on('click','.sort-rating', function (e) {
        e.preventDefault();
        $('#sort-rating').val(1);
        $('#sort-id').val(0);
        if($('#sort-rating-order').val()=='asc'){
            $('#sort-rating-order').val('desc');
        }else{
            $('#sort-rating-order').val('asc');
        }
        $('#load-more').val(0);
        carerSearchAjax();
    });

    $(document).on('click','.sort-distance', function (e) {
        e.preventDefault();
        $('#sort-rating').val(1);
        $('#sort-id').val(0);
        if($('#sort-distance-order').val()=='asc'){
            $('#sort-distance-order').val('desc');
        }else{
            $('#sort-distance-order').val('asc');
        }
        $('#load-more').val(0);
        carerSearchAjax();
    });

    $(document).on('click','.sort-id', function (e) {
        e.preventDefault();
        $('#sort-id').val(1);
        $('#sort-rating').val(0);
        if($('#sort-id-order').val()=='asc'){
            $('#sort-id-order').val('desc');
        }else{
            $('#sort-id-order').val('asc');
        }
        $('#load-more').val(0);
        carerSearchAjax();
    });

    /*-------------- Home page slider (popular carers) ------------*/
    if ($('div').is('.appointmentSlider')) {
        $('.appointmentSlider').owlCarousel({
            items: 3,
            loop: false,
            dots: true,
            nav: true,
            navText: [
              '<a href="#theCarousel" data-slide="prev" class="sliderControl sliderControl--left centeredLink">'+
                '<i class="fa fa-angle-left"></i>'+
              '</a>',
              '<a href="#theCarousel" data-slide="next" class="sliderControl sliderControl--right centeredLink">'+
                '<i class="fa fa-angle-right"></i>'+
              '</a>'
            ],
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive:{
               0    : { items:1 },
               600  : { items:1 },
               992  : { items:2 },
               1200  : { items:3 }
           }
        });
    }

    $('.sliderControl').on('click', function (e) {
      e.preventDefault()
    })

    /*-------------- Home/welcome-carer page slider (recalls) ------------*/
    // Carousel
    $('.multi-item-carousel').carousel({
        // interval: 5000
    });

    $('#theCarousel1').on('slide.bs.carousel', function () {
      var _this = $(this)
      var data_id = $('#theCarousel_users').children()
      var peopleBox = $('.peopleBox').children()
      $(this).removeClass('active')

      peopleBox.removeClass('activeImg')

      setTimeout(function () {
        current_id = parseInt(_this.find('.active').attr('id').replace(/[^1-9]/g, ''))
        $.each( data_id, function( key, value ) {
          if(parseInt($(this).attr('data-id')) === current_id){
            $(this).children().addClass('activeImg')
          }
        });
      }, 800)
    })

    $(".toggler").click(function (e) {
        e.preventDefault();

        var that = $(this).parent().find('i.toggler');
        if (that.length == 0)
            that = $(this).parent().parent().find('i.toggler');
        $(this).parent().parent().next().slideToggle("slow", function () {
            if ($(that).hasClass('fa')) {
                if ($(that).hasClass('fa-minus')) {
                    $(that).removeClass('fa-minus');
                    $(that).addClass('fa-plus');
                } else {
                    $(that).addClass('fa-minus');
                    $(that).removeClass('fa-plus');
                }
            }
        });
        return false;
    });
    $(".faq__link").click(function (e) {
        e.preventDefault();

        var that = $(this).parent().find('i.toggler');
        $(this).parent().find('.faq__content').slideToggle("slow", function () {
            if ($(that).hasClass('fa')) {
                if ($(that).hasClass('fa-minus')) {
                    $(that).removeClass('fa-minus');
                    $(that).addClass('fa-plus');
                } else {
                    $(that).addClass('fa-minus');
                    $(that).removeClass('fa-plus');
                }
            }
        });
        return false;
    });

    //--- for page Faq -----
    $('.faq__content').hide();

    //-- for Carer Profiles --------
    $carer_profile = $('.carer-profile');
    setNoEditableFields();
    // -- Edit Carer Profile -------
    $carer_profile.find('a.btn-edit').on('click', function (e) {
        e.preventDefault();
        var that = $(this);
        is_data_changed = true;

        $('input[name="is_data_changed"]').val(1);
        $('input[name="postcode"]').autocomplete({
                serviceUrl: '/address',
                params: {query: ($(this).prop('readonly')==true)?'':$(this).attr('data-country') + ' ' + $(this).val()},
                minChars: 2,
                dataType: 'json',
                onSelect: function (suggestion) {
                    addressFormt(suggestion, $('input[name="postcode"]:not(.disable)'));
                }
            }
        );
        $('input[name="postcode"]').autocomplete('clear');
        if (is_data_changed) {
            $('#datepicker_when_start').attr('readonly',false)
                .datepicker({ dateFormat: "dd/mm/yy",
                showAnim: "slideDown",
                minDate: "+3D",
                maxDate: "+20Y",
                yearRange: "0:+10" });
        }

        var idForm = 'form#' + $(that).find('span').attr('data-id');
        var idLoadFiles = '#' + $(that).find('span').attr('data-id');
        $(idForm).find('select').attr("disabled", false).removeClass('profileField__select--greyBg');
        $(idForm).find('input[type="checkbox"]').attr("disabled", false).removeClass('profileField__select--greyBg');
         $(idForm).find('input').attr("readonly", false).removeClass('profileField__input--greyBg');
        // $(idForm).find('input').attr("disabled", false).removeClass('profileField__input--greyBg');
        $(idForm).find('textarea').attr("readonly", false).removeClass('profileField__input--greyBg');
        // $('input[name="postcode"],input[name="postCode"],input[name="address_line1"]').attr('autocomplete', 'on');
        if($('#time_to_night_helping').length){
            $('#time_to_night_helping').timepicker({
                change: function () {
                    $(this).change();
                },
                timeFormat: 'h:mm p',
                interval: 30,
                startTime: '18:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        }
        $(idLoadFiles).find('.pickfiles').attr("disabled", false);
        // $('input[name="postcode"],input[name="address_line1"]').autocomplete('enable');
        $(idLoadFiles).find('.pickfiles-change').attr("disabled", false);
        $(idLoadFiles).find('.pickfiles_profile_photo--change').attr("disabled", false);
        $(idLoadFiles).find('.pickfiles_profile_photo_service_user--change').attr("disabled", false);
        if(carerId){
          $(idLoadFiles).find('.pickfiles-delete').attr("style", 'display: block');
        }
        $(idLoadFiles).find('.addInfo__input-ford').attr("disabled", false).removeClass('profileField__input--greyBg');
        $(idLoadFiles).find('.addInfo__input-ford').attr("readonly", false).removeClass('profileField__input--greyBg');
        // $(idLoadFiles).find('.addInfo__input').attr("disabled", false);
        // $(idLoadFiles).find('.addInfo__input').attr("readonly", false);
        $(idLoadFiles).find('.profilePhoto__ico').attr("style", 'display: block');

        $(that).hide();
        $(that).parent().find('button.hidden').removeClass('hidden');
        $('.alert').remove();

        cancelEditFieldsCarer();
        return false;
    });
    //------------Google Address search -----------------------
    if ($('input[name="postcode"]').length) {

        $('input[name="postcode"]:not(.disable)').autocomplete({
                serviceUrl: '/address',
                params: {query: ($(this).prop('readonly')==true)?'':$(this).attr('data-country') + ' ' + $(this).val()},
                minChars: 2,
                dataType: 'json',
                onSelect: function (suggestion) {
                    addressFormt(suggestion, $('input[name="postcode"]:not(.disable)'));
                }
            }
        );
        // var input = /** @type {HTMLInputElement} */(document.getElementsByName('postcode')[0]);
        // var autocomplete = new google.maps.places.Autocomplete(input);
        // autocomplete.setTypes('addresses');
        // autocomplete.addListener('place_changed', function() {
        //     var place = autocomplete.getPlace();
        //     if (!place.geometry) {
        //         // User entered the name of a Place that was not suggested and
        //         // pressed the Enter key, or the Place Details request failed.
        //         window.alert("No details available for input: '" + place.name + "'");
        //         return;
        //     }
        //     var address = '';
        //     if (place.address_components) {
        //         address = [
        //             (place.address_components[0] && place.address_components[0].short_name || ''),
        //             (place.address_components[1] && place.address_components[1].short_name || ''),
        //             (place.address_components[2] && place.address_components[2].short_name || '')
        //         ].join(' ');
        //
        //         $.each(place.address_components, function( index, value ) {
        //             console.log(value);
        //             switch(value['types'][0]) {
        //                 case "postal_code": //почтовый код
        //                         $('input[name="postcode"]').val(value.long_name);
        //                     break;
        //                 case "postal_town": // город
        //                     $('input[name="town"]').val(value.long_name);
        //                     break;
        //                 case "route":// улица
        //                     $('input[name="address_line1"]').val(value.long_name);
        //                     break;
        //             }
        //         });
        //     }
        //     console.log(address);
        // });

    }

    // --  Add booking Carer -------
    $(document).on('click', 'button.bookBtn__item', function (e) {
        e.preventDefault();
        var form = $('#bookings__form');
        var token = $(form).find('input[name="_token"]').val();
        $('.error-booking').remove();
        var errorText = '<span class="help-block error-booking">\n' +
            '             <strong>The field(s) can not be empty. \n' +
            'Enter a value or select an option</strong>\n' +
            '          </span>';
        console.log(form.serialize());
        $.ajax({
            url: $(form).attr('action'),
            headers: {'X-CSRF-TOKEN': token},
            data: $(form).serialize(),
            type: $(form).attr('method'),
            dataType: "application/json",
            success: function (response) {
                if(response.responseText.indexOf('success')){
                    if($(form).attr('method')=='PUT')
                        window.refresh();
                    //$('#message-booking').modal('hide');
                }
            },
            error: function (response) {
                if(response.responseText.indexOf('success')){
                    if($(form).attr('method')=='PUT')
                        location.reload();
                        //$('#message-booking').modal('hide');
                }
                if( response.responseText.indexOf('purchase')>0){
                    window.location.href='/'+response.responseText;
                }
                else {
                    var data = JSON.parse(response.responseText);
                    var arr = $.map(data, function (key, el) {
                        return el.replace('.', '][').replace('.', '][').replace('.', '][').replace('.', '][').replace('bookings]', 'bookings') + ']'
                    });
                    $.each(arr, function (key, val) {
                        console.log(val);
                        $('input[name*="' + val + '"').last().parent().parent().after(errorText);
                    });
                }
            }
        });
    });

    // -- Save Carer Profile -------
        $(document).on('change','select[name="DBS_use"]',function (e) {
            if($(this).val()=='Yes')
                $('#dpsBlock').show();
            else
                $('#dpsBlock').hide();
        });
        $(document).on('change','select[name="DBS"]',function (e) {
            if($(this).val()=='Yes')
                $('#dpsBlock').show();
            else
                $('#dpsBlock').hide();
        });
        $carer_profile.find('button.btn-success').on('click', function (e) {
            e.preventDefault();
            $('input[name="address_line1"]').autocomplete({serviceUrl:'/noaddress/'});
            $('input[name="address_line1"]').autocomplete('clear');
            if($('#time_to_night_helping').length){
                $('#time_to_night_helping').timepicker().destroy();
            }
            is_data_changed = false;
            $('input[name="is_data_changed"]').val(0);
            if (is_data_changed) {
                $('#datepicker_when_start').attr('readonly',false)
                    .datepicker();
            } else {
                $('#datepicker_when_start').attr('readonly',true)
                    .datepicker("destroy");
            }
            $('.error-onlyNumber').remove();
            var that = $(this);
            var idForm = 'form#' + $(that).parent().find('a>span').attr('data-id');
            var idLoadFiles = '#' + $(that).parent().find('a>span').attr('data-id');

            if(idLoadFiles === '#carerQUALIFICATIONS'){
              $.each($('.addInfo__input-required'), function (input, index) {
                if($(this).val().length <= 0){
                  $(this).addClass('addInfo__input-required_error')
                }else{
                  $(this).removeClass('addInfo__input-required_error')
                }
              })
            }

            if($('.addInfo__input-required_error').length === 0){
              that.button('loading');
              $(idLoadFiles).find('.pickfiles').attr("disabled", true);
              $(idLoadFiles).find('.pickfiles-change').attr("disabled", true);
              $(idLoadFiles).find('.pickfiles-delete').attr("style", 'display: none');
              $(idLoadFiles).find('.pickfiles_profile_photo--change').attr("disabled", true);
              $(idLoadFiles).find('.pickfiles_profile_photo_service_user--change').attr("disabled", true);
              $(idLoadFiles).find('.addInfo__input-ford').attr("disabled", true);
              $(idLoadFiles).find('.addInfo__input').attr("disabled", true);
              $(idLoadFiles).find('.profilePhoto__ico').attr("style", 'display: none');
              // $('input[name="postcode"],input[name="address_line1"]').autocomplete('disable');

              if (arrFilesProfilePhoto.length > 0) {
                  var url = '/profile-photo'
                  axios.post(
                      url,
                      arrFilesProfilePhoto[0]
                  ).then(function (response) {
                      // console.log(response)
                  })
              }
              if (ProfilePhotoSeviceUser.length > 0) {
                      url = '/service-user-profile-photo'
                  axios.post(
                      url,
                      ProfilePhotoSeviceUser[0]
                  ).then(function (response) {
                      // console.log(response)
                  })
              }

              if (arrFiles.length > 0) {
                  var fileChunk = 0;
                  file = arrFiles[fileChunk];
                  var sliceSize = 524288 ;// 512 kib
                  var chunks = Math.ceil(file.size / sliceSize);
                  var chunk = 0;
                  var start = 0;
                  var end = sliceSize;

                  function loop() {
                      var blob = file.slice(start, end);
                      if (blob.size !== 0) {
                          if (blob.size === sliceSize) {
                              send(blob);
                              start += sliceSize;
                              end += blob.size
                          } else {
                              send(blob);
                              start += sliceSize;
                              end += blob.size
                          }
                      }
                  }

                  function send(fileSend) {
                      var formdata = new FormData();
                      formdata.append('name', file.name);
                      formdata.append('chunk', chunk);
                      formdata.append('chunks', chunks);
                      formdata.append('title', file.title);
                      formdata.append('type', file.type_value_unique.split('-')[0]);
                      formdata.append('file', fileSend);
                      chunk += 1;
                      axios.post(
                          !carerId ?
                            '/document/upload'
                            :
                            '/document/upload/'+carerId+'',
                          formdata
                      ).then(function (response) {
                          if (chunk === chunks) {
                              if (arrFiles[fileChunk + 1]) {
                                  fileChunk += 1;
                                  file = arrFiles[fileChunk];
                                  chunks = Math.ceil(file.size / sliceSize);
                                  chunk = 0;
                                  start = 0;
                                  end = sliceSize;
                                  loop()
                              } else {
                                  $('.pickfiles').val('');
                                  arrFiles = [];
                                  if (arrForDeleteIDProfile.length > 0) {
                                      axios.delete(
                                          '/api/document/' + arrForDeleteIDProfile + '/'
                                      ).then(function(response) {
                                          console.log(response)
                                      })
                                      ajaxForm($(idForm), that);
                                  } else {
                                      ajaxForm($(idForm), that);
                                  }
                              }


                              if(idLoadFiles === '#carerQUALIFICATIONS') {
                                $.each($('.profileField_active'), function (index, val) {
                                  if(!$(this).find('.pickfiles-delete-loaded').length){
                                    $(this).find('.addContainer .pickfiles').remove()
                                    $(this).find('.pickfiles-delete').addClass('pickfiles-delete-loaded').attr('id', response.data.result.id)
                                    return false
                                  }
                                })
                              }else{
                                $('#'+response.data.result.type+'').parent().find('.pickfiles-delete').attr('id', ''+response.data.result.id+'');
                              }

                          } else {
                              loop()
                          }
                      }).catch(function (error) {
                          console.log(error)
                        })
                  }
                  loop();
              } else {
                  ajaxForm($(idForm), that);
              }
            }

            return false;
        });

    $('.passStrength__bar').css('width','5%');
    $('.passStrength__bar').css('background','red');
    $('.passStrength__bar').css('color','red');
    $('#result').css('color','red');
    $('#result').html('enter the password');
    $('.passStrength').hide();
    $('input[name="password"]').on('keyup',function (e) {
        $('#result').html(checkStrength($(this).val()));
        confirmPass($('input[name="password_confirmation"]'));

    });
    // -- Registration Carer Step 1

    $('input[name="password_confirmation"]').on('keyup',function (e) {
        confirmPass(this);
    });
    // -- Registration Carer Step 8


    // -- upload files. Registration sections -------
    var arrLocalStorage = []
    var arrForDeleteID = []
    var file
    var file_profile_photo = {}
    var getlocalStorageData = localStorage.getItem('files_id')

    var fileTypes = [
        'image/jpeg','image/gif','image/png',
      ]
    var wordFileType = [
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || 'application/msword',
      'application/msword', 'doc', 'docx'
    ]
    var pdfFileType = ['application/pdf', 'pdf']

    if(!$carer_profile.length){
      if(getlocalStorageData){
        JSON.parse(getlocalStorageData).map(function(index) {
          if(document.getElementById("upload_files")){
            axios.get(
              '/api/document/'+index.id.id+'/'
            ).then(function (response) {
              var res = response.data.data.document

              if(wordFileType.indexOf(res.file_name.split('.')[1]) !== -1){
                $('#'+index.type_value+'').attr('style', 'background-image: url(/img/Word-icon_thumb.png)')
              }else if(pdfFileType.indexOf(res.file_name.split('.')[1]) !== -1){
                $('#'+index.type_value+'').attr('style', 'background-image: url(/img/PDF_logo.png)')
              }else{
                // $('#'+index.type_value+'').attr('style', 'background-image: url(/api/document/'+index.id.id+'/preview)')
                $('#'+index.type_value+'').attr('src', '/api/document/'+index.id.id+'/preview')
              }

              $('#'+index.type_value+'').parent().children('.add').find('.add__comment--smaller').html('<div class="file-name">'+res.file_name+'</div>')
              $('#'+index.type_value+'').parent().children('.add').find('.fa-plus-circle').attr('style', 'opacity: 0')
              $('#'+index.type_value+'').parent().find('.pickfiles-delete').attr('style', 'display: block')
              $('#'+index.type_value+'').parent().find('.pickfiles-delete').attr('id', index.id.id)
              $('#'+index.type_value+'').parent().parent().find('.addInfo__input').prop( "disabled", false )
              if(response.data.data.document.title !== 'undefined'){
                $('#'+index.type_value+'').parent().parent().find('.addInfo__input').val(res.title)
              }
            })

            // $.each($img, function (i, val) {
            //   console.log(val);
            //   imageOrientation(val)
            // })
          }
        })
      }
    }else{
      localStorage.setItem('files_id', JSON.stringify([]))
    }

    if($('#profile_photo').attr('style')){
      $('#profile_photo').parent().find('.pickfiles-delete_profile_photo').attr('style', 'display: block')
      // $('#profile_photo').parent().find('.add--moreHeight').html('')
    }

      var url =  $('#profile_photo').attr('name')
      $('<img/>').attr('src', url).on('load', function() {
        $('#profile_photo').parent().find('.add').attr('style', 'opacity: 0')
      });

      $(document).on('change', '.addInfo__input', function(e) {
      var id = $(this).parent().parent().find('.pickfiles_img').attr('id')
      var input_name = $(this).attr('name')
      var input_val = $(this).val()

      arrFiles.map(function(index) {
        if(index.unique_type === id){
          console.log(index.unique_type, id, input_val)
          index.title = input_val
        }
      })
    })

    function pickfilesDelete(_this){
      if(!$carer_profile.length){
        _this.parent().find('.add__comment--smaller').html('<p>Choose a File or Drag Here</p><span>Size limit: 10 MB</span>')
      }
      _this.attr('style', 'display: none')
      _this.parent().find('.fa-plus-circle').attr('style', '')
      _this.parent().find('.pickfiles_img').attr('style', '')
      _this.parent().parent().find('.addInfo__input').prop( "disabled", true )
      _this.parent().parent().find('.addInfo__input').val('')
      _this.parent().find('.pickfiles').val('')
      _this.attr('id', '')
    }

    $(document).on('click', '.pickfiles-delete', function () {
      var input_name = $(this).parent().find('.pickfiles_img').attr('id')
      var input_value = $(this).parent().parent().find('.addInfo__input')
      var deleteID = $(this).attr('id')
      var _this = $(this)

      input_value.removeClass('addInfo__input-required addInfo__input-required_error')

      if($(this).attr('id')){
        arrForDeleteIDProfile.push(parseInt(deleteID))
        axios.delete(
          '/api/document/'+deleteID+'/'
        ).then( function(response) {
          pickfilesDelete(_this)
          var getls = JSON.parse(localStorage.getItem('files_id'))
          if(getls){
            var newGetls = getls.filter(function(index) {
              if(index.id.id !== parseInt(deleteID)){
                return index
              }
            })
            if(_this.parent().closest('#carerPrivateAvailability').length){
              _this.parent().closest('.profileField').remove()
              $.each($('.profileField_q'), function (i, val) {
                $(this).find('span').text('Certificate '+(i+1)+'')
              })
            }else{
              _this.parent().find('.pickfiles_img').attr('style', 'display: none')
            }
            localStorage.setItem('files_id', JSON.stringify(newGetls))
          }
        })
      }else{
        pickfilesDelete(_this)
        arrFiles = arrFiles.filter(function(index) {
          console.log(index.unique_type, input_name)
          if(index.unique_type !== input_name){
            return index
          }
        })
        _this.parent().closest('.profileField').remove()
        $(this).parent().find('.pickfiles_img').attr('style', 'display: none')
        $.each($('.profileField_q'), function (i, val) {
          $(this).find('span').text('Certificate '+(i+1)+'')
        })
      }
    })

    $('.pickfiles-delete_profile_photo').on('click', function() {
      arrFiles = []
    })

    var c = 0

    $(document).on('change', '.pickfiles, .pickfiles-change', function(e) {
      var _this = $(this)

      var input_val = $(this).parent().parent().find('.addInfo__input').val('')
      var p = $(this).parent().parent().parent().find('.profileField_h')
      var p_length = $(this).parent().parent().parent().find('.profileField')
      var div2 = $(this).parent().parent().addClass('profileField_h')

      $(this).closest('.profileField').addClass('profileField_active')
      $(this).parent().parent().find('.addInfo__input').prop( "disabled", false)
      $(this).parent().parent().find('.addInfo__input').attr( "readonly", false )
      $(this).parent().find('.fa-plus-circle').attr('style', 'opacity: 0')
      $(this).parent().parent().find('.addInfo__input').addClass('addInfo__input-required')
      $(this).parent().find('.pickfiles_img').attr('style', 'display: block')
      $(this).parent().find('.pickfiles_img').attr('style', 'display: block')
      $(this).parent().append('<div class="pickfiles-delete">x</div>')
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')
      var pickfiles_img_id = $(this).parent().find('.pickfiles_img').attr('id')
      var deleteID = $(this).parent().find('.pickfiles-delete').attr('id')

      file = $(this)[0].files[0]

      // adImageOrientation(file, $(this).parent().find('.pickfiles_img'))

      var reader  = new FileReader()
      reader.addEventListener("load", function() {
        file = reader.result
        console.log(file)
        _this.parent().find('.pickfiles_img').attr('src', file)
      })

      if (fileTypes.indexOf(file.type) !== -1) {
        reader.readAsDataURL(file)
      }else{
        if(wordFileType.indexOf(file.type) !== -1){
          $(this).parent().find('.pickfiles_img').attr('style', 'background-image: url(/img/Word-icon_thumb.png)')
        }
        if(pdfFileType.indexOf(file.type) !== -1){
          $(this).parent().find('.pickfiles_img').attr('style', 'background-image: url(/img/PDF_logo.png)')
        }
      }

      var getls = localStorage.getItem('files_id') ? JSON.parse(localStorage.getItem('files_id')) : []
      if(getls){
        getls.map(function(index) {
          if(index.id.id === parseInt(deleteID)){
            arrForDeleteID.push(parseInt(deleteID))
          }
        })
      }

      if(deleteID){
        arrForDeleteIDProfile.push(parseInt(deleteID))
      }

      if($('#qualifications-page').length){
        file.type_value_unique = 'nvq'
      }else{
        file.type_value_unique = input_name
      }

      file.type_value = input_name
      if($carer_profile.length){
        file.unique_type = pickfiles_img_id
      }else{
        file.unique_type = input_name
      }

      var q = '.profileRow-'+input_name.split('-')[0]
      c += 1;

      $(q).append(
        '<div class="profileField profileField_q profileField_h">'+
          '<span>Certificate '+(p_length.length+1)+'</span><div class="addContainer">'+
            '<input class="pickfiles" accept="" type="file" />'+
            '<img id="'+input_name.split('-')[0]+'-'+c+'u" class="pickfiles_img"/>'+
              '<a class="add add--moreHeight">'+
                  '<i class="fa fa-plus-circle"></i>'+
                  '<div class="add__comment add__comment--smaller"></div>'+
              '</a>'+
          '</div>'+
          '<div class="addInfo">'+
              '<input type="text" name="'+input_name.split('-')[0]+'-'+c+'u" class="addInfo__input profileField__input--greyBg addInfo__input-ford" placeholder="Name">'+
          '</div>'+
        '</div>'
      )

      if($carer_profile.length){
        arrFiles = arrFiles.filter(function(index) {
          if(index.unique_type !== pickfiles_img_id){
            return index
          }
        })
      }else{
        arrFiles = arrFiles.filter(function(index) {
          if(index.unique_type !== input_name){
            return index
          }
        })
      }

      arrFiles.push(file)

      $(this).parent().find('.add__comment--smaller').html('')
      $(this).parent().find('.pickfiles-delete').attr('style', 'display: block')

      adImageOrientation(file, $(this).parent().find('.pickfiles_img'))
    })

    $('.upload_files').on('click', function (e) {
      e.preventDefault()

      if($('#qualifications-page').length){
        $.each($('.addInfo__input-required'), function (input, index) {
          if($(this).val().length <= 0){
            $(this).addClass('addInfo__input-required_error')
          }else{
            $(this).removeClass('addInfo__input-required_error')
          }
        })
      }

      if($('.addInfo__input-required_error').length === 0){

        if(!checkUploading){
          checkUploading = true
          if(arrFiles.length > 0){
            $(this).html('uploading..')
            var fileChunk = 0
            file = arrFiles[fileChunk]
            var sliceSize = 524288 // 512 kib
            var chunks = Math.ceil(file.size / sliceSize)
            var chunk = 0
            var start = 0
            var end = sliceSize

        function loop() {
          var blob = file.slice(start, end)
          if(blob.size !== 0){
            if(blob.size === sliceSize){
              send(blob)
              start += sliceSize
              end += blob.size
            }else{
              send(blob)
              start += sliceSize
              end += blob.size
            }
          }
        }
        loop()

        function send(fileSend) {

          var formdata = new FormData()
          formdata.append('name', file.name)
          formdata.append('chunk', chunk)
          formdata.append('chunks', chunks)
          formdata.append('title', file.title)
          formdata.append('type', file.type_value_unique)
          formdata.append('file', fileSend)
          chunk += 1
          axios.post(
            '/document/upload',
            formdata
          ).then(function (response) {

            if(response.data.result){
              var data = {
                id: response.data.result,
                type_value: arrFiles[fileChunk].type_value
              }

              var getls = JSON.parse(localStorage.getItem('files_id'))
              if(getls){
                getls.push(data)
                localStorage.setItem('files_id', JSON.stringify(getls))
              }else{
                arrLocalStorage.push(data)
                localStorage.setItem('files_id', JSON.stringify(arrLocalStorage))
              }
            }

            if(chunk === chunks){
              if(arrFiles[fileChunk + 1]){
                fileChunk += 1
                file = arrFiles[fileChunk]
                chunks = Math.ceil(file.size / sliceSize)
                chunk = 0
                start = 0
                end = sliceSize
                loop()
              }else{
                $('.upload_files').html('next step <i class="fa fa-arrow-right"></i>')
                $('.pickfiles').val('')
                arrFiles = []

                  if(arrForDeleteID.length > 0){
                    var getls = JSON.parse(localStorage.getItem('files_id'))
                    axios.delete(
                      '/api/document/'+arrForDeleteID+'/'
                    ).then( function(response) {
                      arrFiles = getls.filter(function(index) {
                        if(arrForDeleteID.indexOf(index.id.id) === -1){
                          return index
                        }
                      })
                      localStorage.setItem('files_id', JSON.stringify(arrFiles))
                      document.getElementById('step').submit()
                    })
                  }else{
                    document.getElementById('step').submit()
                  }
                }
              }else{
                loop()
              }
            })
            .catch(function (error) {
              $('.upload_files').html('next step <i class="fa fa-arrow-right"></i>')
              console.log(error)
            })
          }
        }else{
          document.getElementById('step').submit()
        }
      }
    }});

    $('.pickfiles_profile_photo').on('change', function () {

      var _this = $(this)

      arrFilesProfilePhoto = []

      // adImageOrientation(file, $('.pickfiles_img'))

      var input_val = $(this).parent().parent().find('.addInfo__input').val('')
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')
      var this_name = $(this).attr('name')
      $('#profile_photo').remove()

      var file = $(this)[0].files[0]

      var reader  = new FileReader()
      reader.addEventListener("load", function() {

        if (fileTypes.indexOf(file.type) !== -1) {
          _this.parent().find('.pickfiles_img').attr('src', reader.result)
        }else{
          if(wordFileType.indexOf(file.type) !== -1){
            _this.parent().find('.pickfiles_img').attr('style', 'background-image: url(/img/Word-icon_thumb.png)')
          }
          if(pdfFileType.indexOf(file.type) !== -1){
            _this.parent().find('.pickfiles_img').attr('style', 'background-image: url(/img/PDF_logo.png)')
          }
        }

        _this.parent().find('.fa-plus-circle').attr('style', 'opacity: 0')

        file_profile_photo.image = reader.result
        if(this_name){
          file_profile_photo.service_user_id = parseInt(this_name)
        }

        arrFilesProfilePhoto.push(file_profile_photo)
        console.log(arrFilesProfilePhoto)
      }, false)

      reader.readAsDataURL(file)
      $(this).parent().find('.add__comment--smaller').html('')
      $(this).parent().find('.pickfiles-delete').attr('style', 'display: block')
    })

    $('.upload_files_profile_photo').on('click', function (e) {
      e.preventDefault()
      if(arrFilesProfilePhoto.length > 0){
        axios.post(
          '/profile-photo',
          arrFilesProfilePhoto[0]
        ).then(function (response) {
          console.log(response)
          document.getElementById('step').submit()
        })
      }else{
        document.getElementById('step').submit()
      }
    })

    $('.upload_files_profile_photo_su').on('click', function (e) {
      e.preventDefault()
      if(arrFilesProfilePhoto.length > 0){
        axios.post(
          '/service-user-profile-photo',
          arrFilesProfilePhoto[0]
        ).then(function (response) {
          console.log(response)
          document.getElementById('step').submit()
        })
      }else{
        document.getElementById('step').submit()
      }
    })

    $('.pickfiles_profile_photo--change').on('change', function () {

      arrFilesProfilePhoto = []
      var file = $(this)[0].files[0]

      // adImageOrientation(file, $('#profile_photo'))

      var reader  = new FileReader()
      reader.addEventListener("load", function() {

        $('#profile_photo').attr('src', reader.result)
        $('.set_preview_profile_photo').attr('src', reader.result)

        file_profile_photo.image = reader.result
        arrFilesProfilePhoto.push(file_profile_photo)

      }, false)

      reader.readAsDataURL(file)
    })

    $('.pickfiles_profile_photo_service_user--change').on('change', function () {
      var _this = $(this)
      var serviceUserId = $(this).attr('name')

      ProfilePhotoSeviceUser = []
      var file = $(this)[0].files[0]

      // adImageOrientation(file, $('.profile_photo_service_user'))

      var reader  = new FileReader()
      reader.addEventListener("load", function() {

      _this.parent().find('.profile_photo_service_user').attr('src', reader.result)
      $('#pf-'+serviceUserId+'').attr('src', reader.result)

      var data = {
        image: reader.result,
        service_user_id: parseInt(serviceUserId)
      }

      ProfilePhotoSeviceUser.push(data)

      }, false)
      reader.readAsDataURL(file)
    })

    $('.searchContainer__input').on('change',function (e) {
        insertParam('search',$(this).val());
    })

    $("input[type='file']").change(function(){
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })

    // -- upload files. Profile sections -------
    var arrTypeAndID = []
    var profileRow = 'profileRow-'

    if($carer_profile.length){
      axios.get(
        !carerId ?
          '/documents'
          :
          '/documents/'+carerId+'',
      ).then( function(response) {
        var newDoc = Object.entries(response.data.data.documents)

        function func(index, index2, i) {
          if(wordFileType.indexOf(index2.file_name.split('.')[1]) !== -1){
            return "<div id="+index[0].toLowerCase()+i+" class='pickfiles_img' style='background-image: url(/img/Word-icon_thumb.png)'></div>"
          }else if(pdfFileType.indexOf(index2.file_name.split('.')[1]) !== -1){
            return "<div id="+index[0].toLowerCase()+i+" class='pickfiles_img' style='background-image: url(/img/PDF_logo.png)'></div>"
          }else{
            // return "<div id="+index[0].toLowerCase()+i+" class='pickfiles_img' style='background-image: url(/api/document/"+index2.id+"/preview)'></div>"
            return "<img id="+index[0].toLowerCase()+i+" class='pickfiles_img' src='/api/document/"+index2.id+"/preview'/>"
          }
        }

        newDoc.map(function(index, i) {
          var p = '.' + profileRow+index[0].toLowerCase()

            $(p).html('')
            index[1].map(function(index2, i2) {
              $(p).append(
                '<div class="profileField profileField_active profileField_q profileField_h">'+
                  '<span>Certificate '+(i2+1)+'</span><div class="addContainer">'+
                  '<div class="pickfiles-delete pickfiles-delete-loaded" id="'+index2.id+'">x</div>'+ //eqweqwe
                    func(index[0], index2, i)+
                    '<a class="add add--moreHeight"></a>'+
                  '</div>'+
                  '<div class="addInfo">'+
                      '<input disabled type="text" placeholder="Name"'+
                      'value="'+(index2.title !== 'undefined' ? index2.title : '')+'"'+
                      'name="'+index[0].toLowerCase()+'-'+i+'" class="addInfo__input profileField__input--greyBg">'+
                  '</div>'+
                '</div>'
              )
            })
            $(p).append(
              '<div class="profileField profileField_q">'+
                '<span>Certificate '+(index[1].length+1)+'</span><div class="addContainer">'+
                  '<input disabled class="pickfiles" accept="" type="file" />'+
                  '<img id="'+index[0].toLowerCase()+i+1+'u'+'" class="pickfiles_img"/>'+
                    '<a class="add add--moreHeight">'+
                        '<i class="fa fa-plus-circle"></i>'+
                        '<div class="add__comment add__comment--smaller"></div>'+
                    '</a>'+
                '</div>'+
                '<div class="addInfo">'+
                    '<input disabled type="text" name="'+index[0].toLowerCase()+'-'+i+1+'" class="addInfo__input profileField__input--greyBg addInfo__input-ford" placeholder="Name">'+
                '</div>'+
              '</div>'
            )

            newDoc.map(function(index) {
              var c = 0
              index[1].map(function(index) {
                var data = {
                  type_value: c > 0 ? (index.type.toLowerCase() + c) : index.type.toLowerCase(),
                  title: index.title !== 'undefined' ? index.title : '',
                  id: index.id,
                  type_file_name: index.file_name.split('.')[1]
                }
                c += 1
                arrTypeAndID.push(data)
              })
            })

            arrTypeAndID.map(function(index) {
              if(wordFileType.indexOf(index.type_file_name) !== -1){
                $('#'+index.type_value+'').attr('style', 'background-image: url(/img/Word-icon_thumb.png)')
              }else if(pdfFileType.indexOf(index.type_file_name) !== -1){
                $('#'+index.type_value+'').attr('style', 'background-image: url(/img/PDF_logo.png)')
              }else{
              // $('#'+index.type_value+'').attr('style', 'background-image: url(/api/document/'+index.id+'/preview)')
              $('#'+index.type_value+'').attr('src', '/api/document/'+index.id+'/preview')
              }
              $('#'+index.type_value+'').parent().children('.add').find('.fa-plus-circle').attr('style', 'opacity: 0')
              $('#'+index.type_value+'').parent().find('.pickfiles-delete').attr('id', index.id)
              // $('#'+index.type_value+'').parent().find('.pickfiles-change').remove()
              $('#'+index.type_value+'').parent().parent().find('.addInfo__input').attr( "disabled", false )
              $('#'+index.type_value+'').parent().parent().find('.addInfo__input').attr( "readonly", false )
              $('#'+index.type_value+'').parent().parent().find('.addInfo__input').val(index.title)
            })
        })
      })

      // imageOrientation($img)
    }


    // -- BOOKING PAYMENT -------
    $('.bookPayment__form-switch').on('click', function(e) {
      e.preventDefault()
      $(this).addClass('paySwitch__item--active')
      $('.bookPayment__form-header').attr('style', 'display: block')
      $('.bonusPay-header').attr('style', 'display: none')
      $('.bonusPay-header-switch').removeClass('paySwitch__item--active')
    })
    $('.bonusPay-header-switch').on('click', function(e) {
      e.preventDefault()
      $(this).addClass('paySwitch__item--active')
      $('.bookPayment__form-header').attr('style', 'display: none')
      $('.bookPayment__form-switch').removeClass('paySwitch__item--active')
      $('.bonusPay-header').attr('style', 'display: block')
    })


    // -- PROFILE RATING -------

    $('.profileRating__item').on('click', function() {
      var reviewForm = $('form.reviewForm')
      var raiting = $(this).parent().children()

      var value = $(this).attr('id').split('_')[0]
      var id = $(this).attr('id').split('_')[1]

      reviewForm.find("input[name='"+value+"']").val(id)

      raiting.removeClass('active')
      $.each(raiting, function(i, elem) {
        if(i < id){
          $(this).addClass('active')
        }
      })
    })

    // -- MASONRY -------
    $('.grid').masonry({
      itemSelector: '.grid .userContainer',
      percentPosition: true
    });

    $('div#message-carer form#bookings__form').find('input').attr("disabled", false).removeClass('profileField__input--greyBg');
    $('div#message-carer form#bookings__form').find('input').attr("readonly", false).removeClass('profileField__input--greyBg');
    $('#confirm-terms').attr("disabled", false);


    function adImageOrientation(image, div) {
      var arrClass = [ 'flip', 'rotate-180', 'flip-and-rotate-180', 'flip-and-rotate-270',
        'rotate-90', 'flip-and-rotate-90', 'rotate-270' ]

      EXIF.getData(image, function() {
        orientation = EXIF.getTag(this, "Orientation");
        console.log('Exif=', EXIF.getTag(this, "Orientation"));

        arrClass.map(function (value) {
            div.removeClass(value)
        })

        switch(orientation) {
          case 2: div.addClass('flip'); break;
          case 3: div.addClass('rotate-180'); break;
          case 4: div.addClass('flip-and-rotate-180'); break;
          case 5: div.addClass('flip-and-rotate-270'); break;
          case 6: div.addClass('rotate-90'); break;
          case 7: div.addClass('flip-and-rotate-90'); break;
          case 8: div.addClass('rotate-270'); break;
        }
      });
    }

    function imageOrientation(image) {

      EXIF.getData(image, function() {
        orientation = EXIF.getTag(this, "Orientation");
        switch(orientation) {
          case 2: div.addClass('flip'); break;
          case 3: div.addClass('rotate-180'); break;
          case 4: div.addClass('flip-and-rotate-180'); break;
          case 5: div.addClass('flip-and-rotate-270'); break;
          case 6: div.addClass('rotate-90'); break;
          case 7: div.addClass('flip-and-rotate-90'); break;
          case 8: div.addClass('rotate-270'); break;
        }
      });
    }

});


// -- SPINNER -------
function showSpinner() {
  $('body').addClass('overflow-hidden')
  $('body').append(
    '<div class="show-spinner"></div>'
  );
};

function hideSpinner() {
  $('body').removeClass('overflow-hidden')
  $( ".show-spinner" ).remove();
};

function showErrorModal(message) {
  $('body').addClass('overflow-hidden')
  $('body').append(
    '<div class="error-popup-container">'+
      '<div class="error-popup">'+
        '<div class="error-popup__ico">'+
          '<span>'+
            '<i class="fa fa-times-circle"></i>'+
          '</span>'+
        '</div>'+
        '<a href="#" class="error-popup__close">'+
          '<i class="fa fa-times"></i>'+
        '</a>'+
        '<div class="error-popup__body">'+
          '<h2>'+
            message.title+
          '</h2>'+
          '<p class="info-p info-p--roboto">'+
            message.description+
          '</p>'+
        '</div>'+
      '</div>'+
    '</div>'
  );
};

$(document).on('click', '.error-popup__close', function(event) {
  event.preventDefault()
  hideErrorModal()
})

function hideErrorModal() {
  $('body').removeClass('overflow-hidden')
  $('.error-popup-container').remove()
};
