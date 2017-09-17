<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.min.css">
    <link rel="stylesheet" href="/css/carousel/carousel.css">
    <link rel="stylesheet" href="/css/customize.css">
</head>
<body>
@yield('header')
@yield('content')
@yield('footer')
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('modals')
<script>

    $('.footerSocial a, .headerSocial a').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, '_blank').focus();
    });

    // Carousel
    $('.multi-item-carousel').carousel({
        interval: false
    });

    // change quote
    $('.peopleBox').on('click', function (e) {
        e.preventDefault();
        var quote = $(this).find('.people_quote').text().trim();
        $('#testimonialSlider__item p').text(quote)
    });

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
