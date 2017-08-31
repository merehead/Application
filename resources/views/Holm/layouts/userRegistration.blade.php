<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="favicon.png">
    <title>Holm Care</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"
          rel="stylesheet">
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/customize.css">
    <link rel="stylesheet" href="css/cupertino/jquery-ui.min.css">
</head>
<body>
@yield('header')
@yield('content')
@yield('footer')
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"   >

</script>


<script src="{{asset('js/jquery-ui.min.js')}}"></script>

<script>
    $('.footerSocial a, .headerSocial a').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, '_blank').focus();
    });
    $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "-70Y",
            maxDate: "-1D",
            yearRange: "-70:+0"
        });
    } );

    $( document ).ready(function() {

        //alert($("#main-if").val());

        if($("#main-if").val()==1){
            {$(".hiding").show( )}
        }
        if($("#depend-if").val()=='It depends'){
            {$(".depend_hiding").show( )}
        }
        if($("#main-if2").val()==1){
            {$(".hiding2").show( )}
        }

    });

    $(function(){
        $("#main-if").change(function(){
            if($(this).val() !="0")
            {
                if($(this).val() == 1) {$(".hiding").show( )}
                if($(this).val() == 2) {$(".hiding").hide( )}
            }
        });
    });

    $(function(){
        $("#main-if2").change(function(){
            if($(this).val() !="0")
            {
                if($(this).val() == 1) {$(".hiding2").show( )}
                if($(this).val() == 2) {$(".hiding2").hide( )}
            }
        });
    });


    $(function(){
        $("#depend-if").change(function(){
            if($(this).val() !="0")
            {
                if($(this).val() == 'Yes') {$(".depend_hiding").hide( )}
                if($(this).val() == 'No') {$(".depend_hiding").hide( )}
                if($(this).val() == 'It depends') {$(".depend_hiding").show( )}
            }
        });
    });

    $(".allTime").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $(document).ready(function() {
        $(".allTime").change(function(){
            if(this.checked){
                $(".checkSingle").each(function(){
                    this.checked=true;
                })
            }else{
                $(".checkSingle").each(function(){
                    this.checked=false;
                })
            }
        });

        $(".checkSingle").click(function () {
            if ($(this).is(":checked")){
                var isAllChecked = 0;
                $(".checkSingle").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $(".allTime").prop("checked", true); }
            }
            else {
                $(".allTime").prop("checked", false);
            }
        });
    });



</script>




<div id="login" class="login" style="position: fixed; z-index: 999; top:20%; left:40%; display:none">
    <div class="login__header">
        <h2>login</h2>
        <a href="/out" class="closeModal"
           onclick="event.preventDefault();document.getElementById('login').style.display = 'none';">
            <i class="fa fa-times"></i>
        </a>
    </div>

    <div class="login__body">

        {{--<form  class="login__form">--}}
        <form id="login__form" class="login__form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Email
                </h2>
                <div class="inputWrap">
                    <input type="email" class="formInput " placeholder="Your email"
                           name="email">
                </div>
            </div>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Password
                </h2>
                <div class="inputWrap">
                    <input type="password" class="formInput " placeholder="******"
                           name="password">
                </div>
            </div>
        </form>
    </div>
    <div class="login__footer">
        <div class="login__row">
            <div class="checbox_wrap checbox_wrap--signedIn ">
                <input type="checkbox" class="checkboxNew" id="check1" />
                <label for="check1"> <span>Stay signed in</span></label>
            </div>
            <div class="roundedBtn login__btn">
                <a href="toLogin" class="roundedBtn__item  "
                   onclick="event.preventDefault();document.getElementById('login__form').submit();">
                    login
                </a>
            </div>
        </div>


        <a href="Forgot_password.html" class="login__forgot">
            Forgot password?
        </a>
    </div>

</div>
</body>
</html>
