// ------ Global Variable -----------
var $carer_profile = null;
var has_error_profile_form=false;
var error_mark = '';
var arrFiles = [];
var arrFilesProfilePhoto = [];
var ProfilePhotoSeviceUser = [];
var arrForDeleteIDProfile = [];
var checkUploading = false;
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

function carerSearchAjax(){
    var form = $('#carerSearchForm');
    //$(form).submit();
    var token = $(form).find('input[name=_token]').val();
    $('.result').remove();
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
            $('.result').remove();
            $('#loader-search').hide();
            if (response.success == true) {
                $('#loader-search').after(response.html);
                $('.Paginator').html(response.htmlHeader);
                $('.moreBtn__item').show();
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
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            if(marker)marker.setMap(null);
            marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            $('.fieldCategory').after('<div class="alert alert-warning alert-dismissable fade in">\n' +
                '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                '    <strong>Warning!</strong> You entered an incorrect address. Please enter your real address.\n' +
                '  </div>')
            //alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

// ------ Global Functions ----------
function confirmPass($this){
    var conf =  $($this).val();
    var pass =  $('input[name="password"]').val();
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
// -- Document events ---------------
$(document).ready(function () {


//
//     $('#timepicker1').timepicker({
//         timeFormat: 'h:mm p',
//         interval: 30,
//         //minTime: '10',
//         //maxTime: '6:00pm',
//         //defaultTime: '18',
//         startTime: '18:00',
//         dynamic: true,
//         dropdown: true,
//         scrollbar: true
//     });
//
//     $('#timepicker2').timepicker({
//         timeFormat: 'h:mm p',
//         interval: 30,
// //minTime: '10',
// //maxTime: '6:00pm',
// //defaultTime: '18',
//         startTime: '18:00',
//         dynamic: true,
//         dropdown: true,
//         scrollbar: true
//     });

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
        $(".car-block").show();
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

    if ($('#driving_license').length > 0) {
        if ($('#driving_license').val() == "Yes") {
            $('.hiding_profile').show();
        } else {
            $('.hiding_profile').hide();
        }
        if ($("#type_car_work").val() == 'Yes') {
            $(".car-block").show();
            $('#profile_use_car').parent().show();
        } else {
            $(".car-block").hide();
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

    $("input[name='languages[12]']").change(function () {
        if (this.checked) {
            $(".otherLanguages").slideDown("slow");
        } else {
            $(".otherLanguages").slideUp();
        }

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
            timeFormat: 'h:mm p',
            interval: 30,
            //minTime: '10',
            //maxTime: '6:00pm',_step48
            //defaultTime: '18',
            startTime: '18:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    //}
    //if($.isFunction('timepicker')) {
        $('#time_to_night_helping').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            //minTime: '10',
            //maxTime: '6:00pm',
            //defaultTime: '18',
            startTime: '18:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
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


    $( "textarea" ).focus(function() {
        var maxLenght = $( this ).attr('maxlength');
        var currentLength = $( this ).val().length;
        var symbolsLeft = maxLenght - currentLength;
        $( this ).before('<span class="help-block" style="margin: 0;padding: 0;color: green">Characters remaining ('+currentLength+'/'+maxLenght+')</span>');
    });
    $( "textarea" ).keyup(function() {
        var maxLenght = $( this ).attr('maxlength');
        var currentLength = $( this ).val().length;
        var symbolsLeft = maxLenght - currentLength;
        $( this ).prev( "span" ).text('Characters remaining ('+currentLength+'/'+maxLenght+')');
    });
    $("textarea").focusout(function () {
        $(this).prev("span").remove();
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
    $("#step48sometimes-if2").on('change', function () {
        if ($("#step48sometimes-if2").val() != 'No') {
            $(".sometimes_hiding2_step48").show();
        } else {
            $(".sometimes_hiding2_step48").hide();
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
            timeFormat: 'h:mm p',
            interval: 30,
            //minTime: '10',
            //maxTime: '6:00pm',
            //defaultTime: '18',
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
            },
            timeFormat: 'hh:mm tt',
            interval: 30,
            //minTime: '10',
            //maxTime: '6:00pm',
            //defaultTime: '18',
            startTime: '18:00',
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

    $(document).on('click','.weekly',function(){
        var that = $(this);
        var datetime = $(that).parent().parent().find('.datepicker_message');
        var label = $(that).parent().parent().find('.correct');
        $(datetime).parent().show();
        $(label).show();
        $(datetime).removeClass("hasDatepicker").removeAttr('id');
        $(datetime).datepicker({
            beforeShow: function(input, inst) {
                inst.dpDiv.css({"z-index":"2000!important;"});
            },
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",

            minDate: "+7D",
            maxDate: "+90D",
            yearRange: "0:+2"
        });
    });

    $(document).on('click','.delete',function(){
        var that = $(this);
        var cur = $(that).attr('data-id');
        $(that).parent().parent().remove();

        $('div[data-id="'+cur+'"]').remove();
        appointments=appointments-1;
        if(appointments<=1)$('.delete').hide();
    });

    $(document).on('click','.Daily',function(){
        var that = $(this);
        var datetime = $(that).parent().parent().find('.datepicker_message');
        var label = $(that).parent().parent().find('.correct');
        $(datetime).parent().show();
        $(label).show();
        $(datetime).removeClass("hasDatepicker").removeAttr('id');
        $(datetime).datepicker({
            beforeShow: function(input, inst) {
                inst.dpDiv.css({"z-index":"2000!important;"});
            },
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "+0D",
            maxDate: "+90D",
            yearRange: "0:+2"
        });
    });

    $(document).on('click','a.additionalTime', function (e) {
        e.preventDefault();
        var $that =$(this);
        var dlast = $('.cdate').last().clone();
        var clast = $('.checktime').last().clone();
        $(dlast).find('.datepicker').each(function () {
            var input_name = $(this).attr('name').substring(0, $(this).attr('name').indexOf('][')+15);
            var input_name_p = $(this).attr('name').substring($(this).attr('name').indexOf('][')+17, $(this).attr('name').length);
            $(this).attr('name', input_name + '[' + appointments + input_name_p);
            $(this).parent().parent().find('.delete').attr('data-id','d'+appointments);
            $(this).parent().parent().find('.delete').show();
        });
        $(dlast).find('.timepicker_message').each(function () {
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
        appointments=appointments+1;
        $($that).before(dlast);
        $($that).before(clast);
        $('.rtext').last().remove();

        $('.datepicker_message').removeClass("hasDatepicker").removeAttr('id');
        $('.timepicker_message').removeClass("hasDatepicker").removeAttr('id');


        $(".datepicker_message").datepicker({
            beforeShow: function(input, inst) {
                inst.dpDiv.css({"z-index":2000});
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
            },
            timeFormat: 'hh:mm tt',
            interval: 30,
            //minTime: '10',
            //maxTime: '6:00pm',
            //defaultTime: '18',
            startTime: '18:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
        return false;
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
    })

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
        interval: 5000
    });

    // change quote
    $('.peopleBox').on('click', function (e) {
        e.preventDefault();
        var quote = $(this).find('.people_quote').text().trim();
        $('#testimonialSlider__item p').text(quote)
    });


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
        is_data_changed = true;
        var that = $(this);
        var idForm = 'form#' + $(that).find('span').attr('data-id');
        var idLoadFiles = '#' + $(that).find('span').attr('data-id');
        $(idForm).find('select').attr("disabled", false).removeClass('profileField__select--greyBg');
        $(idForm).find('input[type="checkbox"]').attr("disabled", false).removeClass('profileField__select--greyBg');
        $(idForm).find('input').attr("readonly", false).removeClass('profileField__input--greyBg');
        $(idForm).find('textarea').attr("readonly", false).removeClass('profileField__input--greyBg');
        $('input[name="postcode"],input[name="postCode"],input[name="address_line1"]').attr('autocomplete', 'on');

        $(idLoadFiles).find('.pickfiles').attr("disabled", false);
        $(idLoadFiles).find('.pickfiles-change').attr("disabled", false);
        $(idLoadFiles).find('.pickfiles_profile_photo--change').attr("disabled", false);
        $(idLoadFiles).find('.addInfo__input-ford').attr("disabled", false);
        // $(idLoadFiles).find('.addInfo__input').attr("disabled", false);
        // $(idLoadFiles).find('.addInfo__input').attr("readonly", false);
        $(idLoadFiles).find('.profilePhoto__ico').attr("style", 'display: block');

        $(that).hide();
        $(that).parent().find('button.hidden').removeClass('hidden');
        $('.alert').remove();
        cancelEditFieldsCarer();
        return false;
    });

    // -- Save Carer Profile -------

        $carer_profile.find('button.btn-success').on('click', function (e) {
            e.preventDefault();
            is_data_changed = false;
            var that = $(this);
            var idForm = 'form#' + $(that).parent().find('a>span').attr('data-id');
            var idLoadFiles = '#' + $(that).parent().find('a>span').attr('data-id');

            $(idLoadFiles).find('.pickfiles').attr("disabled", true);
            $(idLoadFiles).find('.pickfiles-change').attr("disabled", true);
            $(idLoadFiles).find('.pickfiles-delete').attr("style", 'display: none');
            $(idLoadFiles).find('.pickfiles_profile_photo--change').attr("disabled", true);
            $(idLoadFiles).find('.addInfo__input-ford').attr("disabled", true);
            $(idLoadFiles).find('.addInfo__input').attr("disabled", true);
            $(idLoadFiles).find('.profilePhoto__ico').attr("style", 'display: none');
            $('input[name="postcode"],input[name="postCode"],input[name="address_line1"]').attr('autocomplete', 'off');

            that.button('loading');

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
                    formdata.append('type', file.type_value.split('-')[0]);
                    formdata.append('file', fileSend);
                    chunk += 1;
                    axios.post(
                        '/document/upload',
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

            return false;
        });
//------------Google Address search -----------------------
    if ($.isFunction($.fn.autocomplete)) {

        $('input[name="postcode"],input[name="postCode"],input[name="address_line1"]').autocomplete({
            serviceUrl: '/address/',
            params: {query: $('input[name="postcode"]').val()},
            minChars: 1,
            dataType:'json',
            onSelect: function (suggestion) {
                // var town = (typeof suggestion.data.postal_town==undefined)?suggestion.data.administrative_area_level_1.short_name:suggestion.data.postal_town.short_name;
                // var street_number = (suggestion.data.street_number==undefined)?'':suggestion.data.street_number.short_name;
                // var street = (suggestion.data.route.short_name==undefined)?'':suggestion.data.route.short_name;
                // $('input[name="address_line1"]').val(street);
                // $('input[name="town"]').val(town);
                // $('input[name="postcode"]').val(suggestion.data.postal_code.short_name);
                // $('input[name="postCode"]').val(suggestion.data.postal_code.short_name);


                if(suggestion.data.terms.length>3) {
                    if($(this).attr('name')=='address_line1'){
                        $('input[name="address_line1"]').val(suggestion.data.terms[0].value);
                    }else {
                        $('input[name="address_line1"]').val(suggestion.data.terms[0].value);
                        $('input[name="town"]').val(suggestion.data.terms[1].value);
                        $('input[name="postcode"]').val(suggestion.data.terms[2].value);
                        $('input[name="postCode"]').val(suggestion.data.terms[2].value);
                    }
                }else{
                    if($(this).attr('name')=='address_line1'){
                        $('input[name="address_line1"]').val(suggestion.data.terms[0].value);
                    }else {
                        //$('input[name="address_line1"]').val('');
                        $('input[name="town"]').val(suggestion.data.terms[0].value);
                        $('input[name="postcode"]').val(suggestion.data.terms[1].value);
                        $('input[name="postCode"]').val(suggestion.data.terms[1].value);
                    }
                }
            }
        });
    }

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
                $('#'+index.type_value+'').attr('style', 'background-image: url(/api/document/'+index.id.id+'/preview)')
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

      console.log(input_name, input_val)

      arrFiles.map(function(index) {
        if(index.unique_type === id){
          console.log(index.unique_type, id, input_val)
          index.title = input_val
        }
      })

      console.log(arrFiles);
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

    $('.pickfiles-delete').on('click', function () {
      var input_name = $(this).parent().find('.pickfiles_img').attr('id')
      var deleteID = $(this).attr('id')
      var _this = $(this)

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
        console.log(arrFiles)
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
      var div2 = $(this).parent().parent().addClass('profileField_h')

      $(this).parent().parent().find('.addInfo__input').prop( "disabled", false)
      $(this).parent().parent().find('.addInfo__input').attr( "readonly", false )
      $(this).parent().find('.fa-plus-circle').attr('style', 'opacity: 0')
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')
      var pickfiles_img_id = $(this).parent().find('.pickfiles_img').attr('id')
      var deleteID = $(this).parent().find('.pickfiles-delete').attr('id')

      file = $(this)[0].files[0]

      var reader  = new FileReader()
      reader.addEventListener("load", function() {
        file = reader.result
        _this.parent().find('.pickfiles_img').attr('style', 'background-image: url('+file+')')
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

      file.type_value = input_name
      if($carer_profile.length){
        file.unique_type = pickfiles_img_id
      }else{
        file.unique_type = input_name
      }

      var q = '.profileRow-'+input_name.split('-')[0]
      c += 1

      if(p.length >= 2){
        $(q).append(
          '<div class="profileField profileField_q profileField_h">'+
            '<div class="addContainer">'+
              '<input class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />'+
              '<div id="'+input_name.split('-')[0]+c+'u" class="pickfiles_img"></div>'+
                '<a class="add add--moreHeight">'+
                    '<i class="fa fa-plus-circle"></i>'+
                    '<div class="add__comment add__comment--smaller"></div>'+
                '</a>'+
            '</div>'+
            '<div class="addInfo">'+
                '<input type="text" name="'+input_name.split('-')[0]+c+'u" class="addInfo__input profileField__input--greyBg addInfo__input-ford" placeholder="Name">'+
            '</div>'+
          '</div>'
        )
      }

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
    })

    $('.upload_files').on('click', function (e) {
      e.preventDefault()

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
            formdata.append('type', file.type_value)
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
    })

    $('.pickfiles_profile_photo').on('change', function () {

      var _this = $(this)

      arrFilesProfilePhoto = []

      var input_val = $(this).parent().parent().find('.addInfo__input').val('')
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')
      var this_name = $(this).attr('name')
      $('#profile_photo').remove()

      var file = $(this)[0].files[0]

      var reader  = new FileReader()
      reader.addEventListener("load", function() {

        if (fileTypes.indexOf(file.type) !== -1) {
          _this.parent().find('.pickfiles_img').attr('style', 'background-image: url('+reader.result+')')
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

      ProfilePhotoSeviceUser = []
      var file = $(this)[0].files[0]

      var reader  = new FileReader()
      reader.addEventListener("load", function() {

      $('.profile_photo_service_user').attr('src', reader.result)

      file_profile_photo.image = reader.result
      ProfilePhotoSeviceUser.push(file_profile_photo)

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
        'documents'
      ).then( function(response) {
        var newDoc = Object.entries(response.data.data.documents)

        function func(index, index2, i) {
          if(wordFileType.indexOf(index2.file_name.split('.')[1]) !== -1){
            return "<div id="+index[0].toLowerCase()+i+" class='pickfiles_img' style='background-image: url(/img/Word-icon_thumb.png)'></div>"
          }else if(pdfFileType.indexOf(index2.file_name.split('.')[1]) !== -1){
            return "<div id="+index[0].toLowerCase()+i+" class='pickfiles_img' style='background-image: url(/img/PDF_logo.png)'></div>"
          }else{
            return "<div id="+index[0].toLowerCase()+i+" class='pickfiles_img' style='background-image: url(/api/document/"+index2.id+"/preview)'></div>"
          }
        }

        newDoc.map(function(index, i) {
          var p = '.' + profileRow+index[0].toLowerCase()
          var count = 3 - index[1].length

            $(p).html('')
            index[1].map(function(index2, i2) {
              $(p).append(
                '<div class="profileField profileField_q profileField_h">'+
                  '<h2 class="profileField__title ordinaryTitle">'+
                    '<span class="ordinaryTitle__text ordinaryTitle__text--smaller">'+
                      ( i2 === 0 ? index[0].toLowerCase().split('_').join(' ') + 's' : '') +
                    '</span>'+
                  '</h2>'+
                  '<div class="addContainer">'+
                    func(index[0], index2, i)+
                    '<a class="add add--moreHeight"></a>'+
                  '</div>'+
                  '<div class="addInfo">'+
                      '<input disabled type="text" placeholder="Name"'+
                      'value="'+(index2.title !== 'undefined' ? index2.title : "")+'"'+
                      'name="'+index[0].toLowerCase()+'-'+i+'" class="addInfo__input profileField__input--greyBg">'+
                  '</div>'+
                '</div>'
              )
            })
            if(count >= 0){
              count === 0 ? count += 1 : ''
              for (var i = 0; i < count; i++) {
                $(p).append(
                  '<div class="profileField profileField_q">'+
                    '<div class="addContainer">'+
                      '<input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />'+
                      '<div id="'+index[0].toLowerCase()+i+1+'u'+'" class="pickfiles_img"></div>'+
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
              }
            }else{
              $(p).append(
                '<div class="profileField profileField_q">'+
                  '<div class="addContainer">'+
                    '<input disabled class="pickfiles" accept="application/pdf,.jpg,.jpeg,.png,.doc,.docx" type="file" />'+
                    '<div id="'+index[0].toLowerCase()+i+1+'u'+'" class="pickfiles_img"></div>'+
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
            }


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
              $('#'+index.type_value+'').attr('style', 'background-image: url(/api/document/'+index.id+'/preview)')
              }
              $('#'+index.type_value+'').parent().children('.add').find('.fa-plus-circle').attr('style', 'opacity: 0')
              $('#'+index.type_value+'').parent().find('.pickfiles-delete').attr('id', index.id)
              $('#'+index.type_value+'').parent().find('.pickfiles-change').remove()
              $('#'+index.type_value+'').parent().parent().find('.addInfo__input').attr( "disabled", false )
              $('#'+index.type_value+'').parent().parent().find('.addInfo__input').attr( "readonly", false )
              $('#'+index.type_value+'').parent().parent().find('.addInfo__input').val(index.title)
            })

        })
      })
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

});
