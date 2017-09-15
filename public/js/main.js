// ------ Global Variable -----------
var $carer_profile = null;

// ------ Global Functions ----------
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
        $(idForm).find('select').attr("disabled", false).removeClass('profileField__select--greyBg');
        $(idForm).find('input[type="checkbox"]').attr("disabled", false).removeClass('profileField__select--greyBg');
        $(idForm).find('input').attr("readonly", false).removeClass('profileField__input--greyBg');
        $(idForm).find('textarea').attr("readonly", false).removeClass('profileField__input--greyBg');
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
        that.button('loading');
        ajaxForm($(idForm), that);

        return false;
    })
    // -- Registration Carer Step 8
    $('select[name="have_car"]').parent().parent().hide();
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

    // -- upload files -------
    var arrFiles = []
    var file

    $('.addInfo__input').change(function () {
      var input_name = $(this).attr('name')
      var input_val = $("input[name="+input_name+"]").val()
      arrFiles.map((index) => {
        if(index.type_value === input_name){
          index.title = input_val
        }
      })
    })

    $('.pickfiles-delete').on('click', function () {
      $(this).attr('style', 'display: none')
      $(this).parent().find('.add__comment--smaller').html('<p>Choose a File or Drag Here</p><span>Size limit: 10 MB</span>')
      $(this).parent().find('.fa-plus-circle').attr('style', '')
      $(this).parent().find('.pickfiles_img').attr('style', '')
      $(this).parent().parent().find('.addInfo__input').prop( "disabled", true )
      $(this).parent().parent().find('.addInfo__input').val('')
      $(this).parent().find('.pickfiles').val('')
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')
      arrFiles = arrFiles.filter((index) => {
        if(index.type_value !== input_name){
          return index
        }
      })
      console.log(arrFiles)
    })

    $('.pickfiles').on('change', function() {
      // var value = $(this).parent().find('.addContainer_load-header-inner').text().toLowerCase()
      // var input_name = $(this).attr('name')
      // var input_val = $("input[name="+input_name+"]").val()
      var input_val = $(this).parent().parent().find('.addInfo__input').val('')
      // var input_name = $('.formField').find('.addInfo__input').attr('name')

      $(this).parent().parent().find('.addInfo__input').prop( "disabled", false)
      var input_name = $(this).parent().parent().find('.addInfo__input').attr('name')

      file = $(this)[0].files[0]

      var fileTypes = [
        'image/jpeg',
        'image/gif',
        'image/png',
      ]
      var wordFileType = [
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || 'application/msword',
        'application/msword'
      ]
      var pdfFileType = 'application/pdf'

      var reader  = new FileReader()
      reader.addEventListener("load", () => {
        $(this).parent().find('.pickfiles_img').attr('style', 'background-image: url('+reader.result+')')
        $(this).parent().find('.fa-plus-circle').attr('style', 'opacity: 0')
      }, false)

      if (fileTypes.indexOf(file.type) !== -1) {
        reader.readAsDataURL(file)
      }else{
        if(wordFileType.indexOf(file.type) !== -1){
          $(this).parent().find('.pickfiles_img').attr('style', 'background-image: url(/img/Word-icon_thumb.png)')
        }
        if(pdfFileType === file.type){
          $(this).parent().find('.pickfiles_img').attr('style', 'background-image: url(/img/PDF_logo.png)')
        }
      }

      file.type_value = input_name

      arrFiles = arrFiles.filter((index) => {
        if(index.type_value !== input_name){
          return index
        }
      })

      arrFiles.push(file)
      console.log(arrFiles)

      $(this).parent().find('.add__comment--smaller').html('<div class="file-name">'+file.name+'</div>')
      $(this).parent().find('.pickfiles-delete').attr('style', 'display: block')
    })

    $('.upload_files').on('click', function () {
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

          axios.post('/document/upload', formdata)
          .then(function (response) {
            console.log(response.data.result)
            if(chunk === chunks){
              console.log(arrFiles[fileChunk])
              if(arrFiles[fileChunk + 1]){
                fileChunk += 1
                file = arrFiles[fileChunk]
                chunks = Math.ceil(file.size / sliceSize)
                chunk = 0
                start = 0
                end = sliceSize
                loop()
              }else{
                $('.add__comment--smaller').html('<p>Choose a File or Drag Here</p><span>Size limit: 10 MB</span>')
                $('.pickfiles-delete').attr('style', 'display: none')
                $('.fa-plus-circle').attr('style', '')
                $('.pickfiles_img').attr('style', '')
                $('.addInfo__input').prop( "disabled", true )
                $('.upload_files').html('upload files')
                $('.addInfo__input').val('')
                $('.pickfiles').val('')
                arrFiles = []
              }
            }else{
              loop()
            }
          })
          .catch(function (error) {
            $('.upload_files').html('upload files')
            console.log(error)
          })
        }
      }
    });
    
    $('.searchContainer__input').on('change',function (e) {
        insertParam('search',$(this).val());
    })
})
