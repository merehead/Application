// ------ Global Variable -----------
var $carer_profile = null;
var arrFiles = []
var arrFilesProfilePhoto = []
var arrForDeleteIDProfile = []

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
    })
}

// -- Send request to server with AJAX data ----------
function ajaxForm(form, that) {
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
    // Иван функция уменшает автоматом шрифт у имени пользователя в шапке
    if($('.profileName').lenght>0)
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

        var that = $(this).find('i.toggler');
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
        is_data_changed=true;
        var that = $(this);
        var idForm = 'form#' + $(that).find('span').attr('data-id');
        var idLoadFiles = '#' + $(that).find('span').attr('data-id');
        $(idForm).find('select').attr("disabled", false).removeClass('profileField__select--greyBg');
        $(idForm).find('input[type="checkbox"]').attr("disabled", false).removeClass('profileField__select--greyBg');
        $(idForm).find('input').attr("readonly", false).removeClass('profileField__input--greyBg');
        $(idForm).find('textarea').attr("readonly", false).removeClass('profileField__input--greyBg');

        $(idLoadFiles).find('.pickfiles').attr("disabled", false);

        $(that).hide();
        $(that).parent().find('button.hidden').removeClass('hidden');
        $('.alert').remove();
        cancelEditFieldsCarer();
        return false;
    });

    // -- Save Carer Profile -------
    $carer_profile.find('button.btn-success').on('click', function (e) {
        e.preventDefault();
        is_data_changed=false;
        var that = $(this);
        var idForm = 'form#' + $(that).parent().find('a>span').attr('data-id');
        var idLoadFiles = '#' + $(that).parent().find('a>span').attr('data-id');

        $(idLoadFiles).find('.pickfiles').attr("disabled", true);

        that.button('loading');

        if(arrFilesProfilePhoto.length > 0){
          var url = '/profile-photo'
          if(arrFilesProfilePhoto[0].service_user_id){
            url = '/service-user-profile-photo'
          }
          axios.post(
            url,
            arrFilesProfilePhoto[0],
          ).then(function (response) {
            console.log(response)
          })
        }

        if(arrFiles.length > 0){
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
            formdata.append('type', file.type_value.split('-')[0])
            formdata.append('file', fileSend)
            chunk += 1
            axios.post(
              '/document/upload',
              formdata,
            ).then(function (response) {
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
                  $('.pickfiles').val('')
                  arrFiles = []
                  if(arrForDeleteIDProfile.length > 0){
                    axios.delete(
                      '/api/document/'+arrForDeleteIDProfile+'/',
                    ).then( (response) => {
                      console.log(response)
                    })
                    ajaxForm($(idForm), that);
                  }else{
                    ajaxForm($(idForm), that);
                  }
                }
              }else{
                loop()
              }
            })
            .catch(function (error) {
              console.log(error)
            })
          }
        }else{
          ajaxForm($(idForm), that);
        }

        return false;
    })

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
    $('select[name="have_car"]').parent().parent().hide();
    if ($('select[name="have_car"]').val() == 'Yes') {
        {
            $('select[name="have_car"]').parent().parent().show()
        }
    } else {
        $('select[name="have_car"]').val('');
        $('select[name="have_car"]').parent().parent().hide()
    }
    $('select[name="driving_licence"]').on('change', function (e) {
        if ($(this).val() == 'Yes') {
            {
                $('select[name="have_car"]').parent().parent().show()
            }
        } else {
            $('select[name="have_car"]').val('');
            $('select[name="have_car"]').parent().parent().hide()
        }
    });

    // -- upload files. Registration sections -------
    var arrLocalStorage = []
    var arrForDeleteID = []
    var file
    var file_profile_photo = {}
    var getlocalStorageData = JSON.parse(localStorage.getItem('files_id'))

    var fileTypes = [
        'image/jpeg','image/gif','image/png',
      ]
    var wordFileType = [
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || 'application/msword',
      'application/msword', 'doc', 'docx'
    ]
    var pdfFileType = ['application/pdf', 'pdf']

    if(getlocalStorageData){
      getlocalStorageData.map((index) => {
        if(document.getElementById("upload_files")){
          axios.get(
            '/api/document/'+index.id.id+'/',
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

    if($('#profile_photo').attr('style')){
      $('#profile_photo').parent().find('.pickfiles-delete_profile_photo').attr('style', 'display: block')
      $('#profile_photo').parent().find('.add--moreHeight').html('')
    }

    $('.addInfo__input').change(function () {
      var id = $(this).parent().parent().find('.pickfiles_img').attr('id')
      var input_name = $(this).attr('name')
      var input_val = $("input[name="+input_name+"]").val()

      arrFiles.map((index) => {
        if(index.unique_type === id){
          console.log(index)
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

    $('.pickfiles-delete').on('click', function () {
      var input_name = $(this).parent().find('.pickfiles_img').attr('id')
      var deleteID = $(this).attr('id')
      var _this = $(this)

      if($(this).attr('id')){
        arrForDeleteIDProfile.push(parseInt(deleteID))
        axios.delete(
          '/api/document/'+deleteID+'/',
        ).then( (response) => {
          pickfilesDelete(_this)
          var getls = JSON.parse(localStorage.getItem('files_id'))
          if(getls){
            var newGetls = getls.filter((index) => {
              if(index.id.id !== parseInt(deleteID)){
                return index
              }
            })
            localStorage.setItem('files_id', JSON.stringify(newGetls))
          }
        })
      }else{
        pickfilesDelete(_this)
        arrFiles = arrFiles.filter((index) => {
          if(index.unique_type !== input_name){
            return index
          }
        })
      }
    })

    $('.pickfiles-delete_profile_photo').on('click', function() {
      arrFiles = []
    })

    $('.pickfiles').on('change', function() {

      var input_val = $(this).parent().parent().find('.addInfo__input').val('')
      $(this).parent().parent().find('.addInfo__input').prop( "disabled", false)
      $(this).parent().parent().find('.addInfo__input').attr( "readonly", false )
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')
      var input_id = $(this).parent().parent().find('.addInfo__input').attr('name')
      var pickfiles_img_id = $(this).parent().find('.pickfiles_img').attr('id')
      var deleteID = $(this).parent().find('.pickfiles-delete').attr('id')

      file = $(this)[0].files[0]

      var reader  = new FileReader()
      reader.addEventListener("load", () => {
        $(this).parent().find('.pickfiles_img').attr('style', 'background-image: url('+reader.result+')')
        $(this).parent().find('.fa-plus-circle').attr('style', 'opacity: 0')
        file = reader.result
      }, false)

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

      var getls = JSON.parse(localStorage.getItem('files_id'))
      if(getls){
        getls.map((index) => {
          if(index.id.id === parseInt(deleteID)){
            arrForDeleteID.push(parseInt(deleteID))
          }
        })
      }

      if(deleteID){
        arrForDeleteIDProfile.push(parseInt(deleteID))
      }

      file.type_value = input_name
      file.unique_type = pickfiles_img_id

      arrFiles = arrFiles.filter((index) => {
        if(index.unique_type !== pickfiles_img_id){
          return index
        }
      })

      arrFiles.push(file)
      console.log(arrFiles)
      $(this).parent().find('.add__comment--smaller').html('')
      $(this).parent().find('.pickfiles-delete').attr('style', 'display: block')
    })

    $('.upload_files').on('click', function (e) {
      e.preventDefault()

      console.log(arrFiles)

      // if(arrFiles.length > 0){
      //   $(this).html('uploading..')
      //   var fileChunk = 0
      //   file = arrFiles[fileChunk]
      //   var sliceSize = 524288 // 512 kib
      //   var chunks = Math.ceil(file.size / sliceSize)
      //   var chunk = 0
      //   var start = 0
      //   var end = sliceSize
      //
      //   function loop() {
      //     var blob = file.slice(start, end)
      //     if(blob.size !== 0){
      //       if(blob.size === sliceSize){
      //         send(blob)
      //         start += sliceSize
      //         end += blob.size
      //       }else{
      //         send(blob)
      //         start += sliceSize
      //         end += blob.size
      //       }
      //     }
      //   }
      //   loop()
      //
      //   function send(fileSend) {
      //
      //     var formdata = new FormData()
      //     formdata.append('name', file.name)
      //     formdata.append('chunk', chunk)
      //     formdata.append('chunks', chunks)
      //     formdata.append('title', file.title)
      //     formdata.append('type', file.type_value)
      //     formdata.append('file', fileSend)
      //     chunk += 1
      //     axios.post(
      //       '/document/upload',
      //       formdata,
      //     ).then(function (response) {
      //
      //       if(response.data.result){
      //         var data = {
      //           id: response.data.result,
      //           type_value: arrFiles[fileChunk].type_value
      //         }
      //
      //         var getls = JSON.parse(localStorage.getItem('files_id'))
      //         if(getls){
      //           getls.push(data)
      //           localStorage.setItem('files_id', JSON.stringify(getls))
      //         }else{
      //           arrLocalStorage.push(data)
      //           localStorage.setItem('files_id', JSON.stringify(arrLocalStorage))
      //         }
      //       }
      //
      //       if(chunk === chunks){
      //         if(arrFiles[fileChunk + 1]){
      //           fileChunk += 1
      //           file = arrFiles[fileChunk]
      //           chunks = Math.ceil(file.size / sliceSize)
      //           chunk = 0
      //           start = 0
      //           end = sliceSize
      //           loop()
      //         }else{
      //           $('.upload_files').html('next step <i class="fa fa-arrow-right"></i>')
      //           $('.pickfiles').val('')
      //           arrFiles = []
      //
      //           if(arrForDeleteID.length > 0){
      //             var getls = JSON.parse(localStorage.getItem('files_id'))
      //             axios.delete(
      //               '/api/document/'+arrForDeleteID+'/',
      //             ).then( (response) => {
      //               arrFiles = getls.filter((index) => {
      //                 if(arrForDeleteID.indexOf(index.id.id) === -1){
      //                   return index
      //                 }
      //               })
      //               localStorage.setItem('files_id', JSON.stringify(arrFiles))
      //               document.getElementById('step').submit()
      //             })
      //           }else{
      //             document.getElementById('step').submit()
      //           }
      //         }
      //       }else{
      //         loop()
      //       }
      //     })
      //     .catch(function (error) {
      //       $('.upload_files').html('next step <i class="fa fa-arrow-right"></i>')
      //       console.log(error)
      //     })
      //   }
      // }else{
      //   document.getElementById('step').submit()
      // }
    })

    $('.pickfiles_profile_photo').on('change', function () {

      arrFilesProfilePhoto = []

      var input_val = $(this).parent().parent().find('.addInfo__input').val('')
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')
      var this_name = $(this).attr('name')

      var val = $(this)[0].files[0]

      var reader  = new FileReader()
      reader.addEventListener("load", () => {
        $(this).parent().find('.pickfiles_img').attr('style', 'background-image: url('+reader.result+')')
        $(this).parent().find('.fa-plus-circle').attr('style', 'opacity: 0')

        file_profile_photo.image = reader.result
        if(this_name){
          file_profile_photo.service_user_id = parseInt(this_name)
        }

        arrFilesProfilePhoto.push(file_profile_photo)
        console.log(arrFilesProfilePhoto)
      }, false)

      reader.readAsDataURL(val)
      $(this).parent().find('.add__comment--smaller').html('')
      $(this).parent().find('.pickfiles-delete').attr('style', 'display: block')
    })

    $('.upload_files_profile_photo').on('click', function (e) {
      e.preventDefault()
      if(arrFilesProfilePhoto.length > 0){
        axios.post(
          '/profile-photo',
          arrFilesProfilePhoto[0],
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
        console.log(arrFilesProfilePhoto);
        axios.post(
          '/service-user-profile-photo',
          arrFilesProfilePhoto[0],
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
      var val = $(this)[0].files[0]

      var reader  = new FileReader()
      reader.addEventListener("load", () => {
        $('#profile_photo').attr('src', reader.result)
        file_profile_photo.image = reader.result
        arrFilesProfilePhoto.push(file_profile_photo)
        console.log(arrFilesProfilePhoto)
      }, false)
      reader.readAsDataURL(val)
    })

    $('.searchContainer__input').on('change',function (e) {
        insertParam('search',$(this).val());
    })

    $("input[type='file']").change(function(){
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })

    // -- upload files. Profile sections -------
    var arrTypeAndID = []

    if($carer_profile.length){
      axios.get(
        'documents',
      ).then( (response) => {
        var newDoc = Object.entries(response.data.data.documents)

        newDoc.map((index) => {
          var c = 0
          index[1].map((index) => {
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

        arrTypeAndID.map((index) => {
          if(wordFileType.indexOf(index.type_file_name) !== -1){
            $('#'+index.type_value+'').attr('style', 'background-image: url(/img/Word-icon_thumb.png)')
          }else if(pdfFileType.indexOf(index.type_file_name) !== -1){
            $('#'+index.type_value+'').attr('style', 'background-image: url(/img/PDF_logo.png)')
          }else{
          $('#'+index.type_value+'').attr('style', 'background-image: url(/api/document/'+index.id+'/preview)')
          }
          $('#'+index.type_value+'').parent().children('.add').find('.fa-plus-circle').attr('style', 'opacity: 0')
          $('#'+index.type_value+'').parent().find('.pickfiles-delete').attr('id', index.id)
          $('#'+index.type_value+'').parent().parent().find('.addInfo__input').attr( "disabled", false )
          $('#'+index.type_value+'').parent().parent().find('.addInfo__input').attr( "readonly", false )
          $('#'+index.type_value+'').parent().parent().find('.addInfo__input').val(index.title)
        })
      })
    }

});
