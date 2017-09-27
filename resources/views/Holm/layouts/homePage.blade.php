<!DOCTYPE html>
<html lang="en">
@include(config('settings.frontTheme').'.HTML_head.head')
<body>
@yield('header')
@yield('content')
@yield('footer')
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script  src="js/owl.carousel.min.js" defer ></script>
<link rel="stylesheet" href="/css/cupertino/jquery-ui.min.css">
<link rel="stylesheet" href="/css/jquery-ui-timepicker-addon.css">
<script src="/js/jquery-ui-timepicker-addon.js"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('modals')
<script>

    $('.footerSocial a, .headerSocial a').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, '_blank').focus();
    });
    $( function() {
        $( ".datepicker_message" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "+0D",
            maxDate: "+50Y",
            yearRange: "0:+50"
        });
    } );

/*    $( "#sign_up_button" ).click(function(event) {
        event.preventDefault();
        //alert('Sign up');

        //$("#modal").modal();
        $("#sign_up_div").modal().show();
    });*/
    var pos = 1;
    $('.peopleBox').on('click', function (e) {
        e.preventDefault();
        var $this =  $(this);
        var id = $(this).attr('data-id');
        $('.special-slide').find('.active').removeClass('active');
        $('.profilePhoto').removeClass('activeImg');
        $('.special-slide').find('#testimonialSlider__item'+id).addClass('active');
        pos=parseInt(id);
    });

    $('.sliderControl--right').on('click',function(){
        pos = pos+1;
        if(pos>3) pos=1;
        $('.profilePhoto').removeClass('activeImg');
        $('.peopleBox[data-id="'+pos+'"]').find('.profilePhoto').addClass('activeImg');
        console.log(pos);
    })
    $('.sliderControl--left').on('click',function(){
        pos = pos-1;
        if(pos>=3) pos=1;
        if(pos<=0) pos=3;
        $('.profilePhoto').removeClass('activeImg');
        $('.peopleBox[data-id="'+pos+'"]').find('.profilePhoto').addClass('activeImg');
        console.log(pos);
    })

</script>


</body>
</html>
