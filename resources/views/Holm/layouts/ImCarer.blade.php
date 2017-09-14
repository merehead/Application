<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900" rel="stylesheet">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/main.min.css">
    <link rel="stylesheet" href="/css/customize.css">
    <link rel="stylesheet" href="/css/carousel/carousel.css">
    <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script  src="js/owl.carousel.min.js" defer ></script>

    <script  src="js/main.js" defer ></script>
</head>
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

    // Carousel
    $('.multi-item-carousel').carousel({
        interval: false
    });

    // change quote
    $('.peopleBox').on('click', function (e) {
        e.preventDefault()
        var quote = $(this).find('.people_quote').text().trim()
        $('#testimonialSlider__item p').text(quote)
    })

</script>

</body>
</html>