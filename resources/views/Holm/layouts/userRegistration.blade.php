<!DOCTYPE html>
<html lang="en">
@include(config('settings.frontTheme').'.HTML_head.head')
<body>
@yield('header')
@yield('content')
@yield('footer')

{{--<!-- <script src="{{asset('js/plupload.full.min.js')}}"></script> -->

--}}{{--<script src="{{asset('js/main.js')}}"></script>--}}
@yield('modals')



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
            minDate: "-120Y",
            maxDate: "-18Y",
            yearRange: "-120:+0"
        });
    });


    $(function () {
        $("#datepicker15").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            showAnim: "slideDown",
            minDate: "-2Y",
            maxDate: "-1D",
            yearRange: "-2:+2"
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

    $( function() {
        $( "#datepicker_driver_licence" ).datepicker({
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
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "+0D",
            maxDate: "+50Y",
            yearRange: "0:+50"
        });
    } );
    $(document).ready(function () {

        //alert($("#main-if").val());

        if ($("#main-if").val() == 'Yes') {
            {
                $(".hiding").show()
            }
        }
        if ($("#depend-if").val() == 'It Depends') {
            {
                $(".depend_hiding").show()
            }
        }
/*        if ($("#depend-if").val() == 'Yes') {
            {
                $(".depend_hiding").show()
            }
        }*/
        if ($("#main-if2").val() == 'Yes') {
                $(".hiding2").show();
            }
            else{
                $(".hiding2").hide();
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
        if ($("#sometimes-if2").val() != 'No' && $("#sometimes-if").val() != 'No') {
            {
                $(".sometimes_hiding2").show()
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



        if ($("input[name='behaviour[9]']").attr("checked") == 'checked') {
            {
                $(".hiding").show();
            }
        }


        $( "input[name='behaviour[9]']" ).change(function () {
            if (this.checked) {
                $(".hiding").show();
            } else {
                $(".hiding").hide();
            }

        });

        if ($("input[name='languages[12]']").attr("checked") == 'checked') {
            {

                $(".hiding").show();
            }
        }


        $("input[name='languages[12]']").change(function () {
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
                if ($(this).val() == 'It Depends') {
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
                    $(".sometimes_hiding").hide();
                    $(".sometimes_hiding2").hide()
                }
                if ($(this).val() == 'Sometimes') {
                    $(".sometimes_hiding").show()
                }
            }
        });
    });
    $(function () {
        $("#sometimes-if2").change(function () {
            if ($(this).val() != "0") {
                if ($(this).val() == 'Yes') {
                    $(".sometimes_hiding2").show()
                }
                if ($(this).val() == 'No') {
                    $(".sometimes_hiding2").hide()
                }
                if ($(this).val() == 'Sometimes') {
                    $(".sometimes_hiding2").show()
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

        if ($("#step input:checkbox:checked").length > 0)
        {
            $(".any_checked").show();
        }
        else
        {
            $(".any_checked").hide();
        }

        $("#step input:checkbox").click(function () {
            if ($("#step input:checkbox:checked").length > 0)
            {
                $(".any_checked").slideDown();
            }
            else
            {
                $(".any_checked").slideUp();   // hide("slow"); //.slideUp()
            }
        });


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
