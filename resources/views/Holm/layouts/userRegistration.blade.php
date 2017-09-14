<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="favicon.png">
    <title>Holm Care</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"
          rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/customize.css')}}">
    <link rel="stylesheet" href="{{asset('css/cupertino/jquery-ui.min.css')}}">

</head>
<body>
@yield('header')
@yield('content')
@yield('footer')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- <script src="{{asset('js/plupload.full.min.js')}}"></script> -->
<script src="{{asset('js/main.js')}}"></script>
@yield('modals')

<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>

    $('.footerSocial a, .headerSocial a').click(function (e) {

        e.preventDefault();
        var href = $(this).attr('href');
        window.open(href, '_blank').focus();
    });

    $('#timepicker').timepicker({
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

    $(function () {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "-70Y",
            maxDate: "-18Y",
            yearRange: "-70:+0"
        });
    });


    $(function () {
        $("#datepicker15").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "-4Y",
            maxDate: "+20Y",
            yearRange: "-2:+10"
        });
    });

    $(function () {
        $("#datepicker_when_start").datepicker({
            //changeMonth: true,
            //changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "+3D",
            maxDate: "+20Y",
            yearRange: "0:+10"
        });
    });


    $(document).ready(function () {

        //alert($("#main-if").val());

        if ($("#main-if").val() == 'Yes') {
            {
                $(".hiding").show()
            }
        }
        if ($("#depend-if").val() == 'It depends') {
            {
                $(".depend_hiding").show()
            }
        }
        if ($("#main-if2").val() == 'Yes') {
            {
                $(".hiding2").show()
            }
        }

        if ($("#sometimes-if").val() == 'Sometimes') {
            {
                $(".sometimes_hiding").show()
            }
        }
        if ($("#sometimes-if").val() == 'Yes') {
            {
                $(".sometimes_hiding").show()
            }
        }

        if ($("#sometimes-noif").val() == 'Sometimes') {
            {
                $(".sometimesNo_hiding").show()
            }
        }
        if ($("#sometimes-noif").val() == 'No') {
            {
                $(".sometimesNo_hiding").show()
            }
        }

        if ($("#boxf12").attr("checked") == 'checked') {
            {
                $(".hiding").show();
            }
        }


        $('#boxf12').change(function () {
            if (this.checked) {
                $(".hiding").show();
            } else {
                $(".hiding").hide();
            }

        });

        if ($("#boxf12").attr("checked") == 'checked') {
            {

                $(".hiding").show();
            }
        }


        $('#boxf12').change(function () {
            if (this.checked) {
                $(".hiding").show();
            } else {
                $(".hiding").hide();
            }

        });

    });

    $(function () {
        $("#main-if").change(function () {
            if ($(this).val() != "0") {
                if ($(this).val() == 'Yes') {
                    $(".hiding").show()
                }
                if ($(this).val() == 'No') {
                    $(".hiding").hide()
                }
            }
        });
    });

    $(function () {
        $("#main-if2").change(function () {
            if ($(this).val() != "0") {
                if ($(this).val() == 'Yes') {
                    $(".hiding2").show()
                }
                if ($(this).val() == 'No') {
                    $(".hiding2").hide()
                }
            }
        });
    });


    $(function () {
        $("#depend-if").change(function () {
            if ($(this).val() != "0") {
                if ($(this).val() == 'Yes') {
                    $(".depend_hiding").hide()
                }
                if ($(this).val() == 'No') {
                    $(".depend_hiding").hide()
                }
                if ($(this).val() == 'It depends') {
                    $(".depend_hiding").show()
                }
            }
        });
    });

    $(function () {
        $("#sometimes-if").change(function () {
            if ($(this).val() != "0") {
                if ($(this).val() == 'Yes') {
                    $(".sometimes_hiding").show()
                }
                if ($(this).val() == 'No') {
                    $(".sometimes_hiding").hide()
                }
                if ($(this).val() == 'Sometimes') {
                    $(".sometimes_hiding").show()
                }
            }
        });
    });

    $(function () {
        $("#sometimes-noif").change(function () {
            if ($(this).val() != "0") {
                if ($(this).val() == 'Yes') {
                    $(".sometimesNo_hiding").hide()
                }
                if ($(this).val() == 'No') {
                    $(".sometimesNo_hiding").show()
                }
                if ($(this).val() == 'Sometimes') {
                    $(".sometimesNo_hiding").show()
                }
            }
        });
    });


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


    $(document).ready(function () {
        $(".allTime").change(function () {
            if (this.checked) {
                $(".checkboxTimerGroup").each(function () {
                    this.checked = true;
                })
            } else {
                $(".checkboxTimerGroup").each(function () {
                    this.checked = false;
                })
            }
        });


        $(".checkboxTimerGroup").click(function () {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $(".checkboxTimerGroup").each(function () {
                    if (!this.checked)
                        isAllChecked = 1;
                })
                if (isAllChecked == 0) {
                    $(".allTime").prop("checked", true);
                }
            }
            else {
                $(".allTime").prop("checked", false);
            }
        });

        $(".morning").click(function () {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $(".morning").each(function () {
                    if (!this.checked)
                        isAllChecked = 1;
                })
                if (isAllChecked == 0) {
                    $(".everyMorning").prop("checked", true);
                }
            }
            else {
                $(".everyMorning").prop("checked", false);
                $(".allTime").prop("checked", false);
            }
        });
        $(".afternoon").click(function () {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $(".afternoon").each(function () {
                    if (!this.checked)
                        isAllChecked = 1;
                })
                if (isAllChecked == 0) {
                    $(".everyAfternoon").prop("checked", true);
                }
            }
            else {
                $(".everyAfternoon").prop("checked", false);
                $(".allTime").prop("checked", false);
            }
        });
        $(".night").click(function () {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $(".night").each(function () {
                    if (!this.checked)
                        isAllChecked = 1;
                })
                if (isAllChecked == 0) {
                    $(".everyNight").prop("checked", true);
                }
            }
            else {
                $(".everyNight").prop("checked", false);
                $(".allTime").prop("checked", false);
            }
        });
    });


</script>


</body>
</html>
