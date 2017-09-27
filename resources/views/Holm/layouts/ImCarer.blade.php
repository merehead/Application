<!DOCTYPE html>
<html lang="en">
@include(config('settings.frontTheme').'.HTML_head.head')
<body>

@yield('header')
@yield('content')
@yield('footer')
@yield('modals')

<script>
    $('.footerSocial a, .headerSocial a').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, '_blank').focus();
    });

    // change quote
    $('.peopleBox').on('click', function (e) {
        e.preventDefault()
        var quote = $(this).find('.people_quote').text().trim()
        $('#testimonialSlider__item p').text(quote)
    });
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
