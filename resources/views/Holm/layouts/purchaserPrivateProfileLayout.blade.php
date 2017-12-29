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

    $( function() {
        $( "#datepicker_driver_licence" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "+0D",
            maxDate: "+20Y",
            yearRange: "0:+10"
        });
    } );

    $( function() {
        $( "#datepicker_insurance" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd/mm/yy",
            showAnim:"slideDown",
            minDate: "+0D",
            maxDate: "+20Y",
            yearRange: "0:+10"
        });
    } );

    $( document ).ready(function() {

        //alert($("#main-if").val());

        /*        if($("#main-if").val()=='Yes'){
         {$(".hiding").show( )}
         }*/
        if($("#depend-if").val()=='It depends'){
            {$(".depend_hiding").show( )}
        }
        /*        if($("#main-if2").val()=='Yes'){
         {$(".hiding2").show( )}
         }*/

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
        $('input.checkboxTimerGroup:checkbox').not(this).prop('checked', this.checked);
        $('input.morning:checkbox').not(this).prop('checked', this.checked);
        $('input.afternoon:checkbox').not(this).prop('checked', this.checked);
        $('input.night:checkbox').not(this).prop('checked', this.checked);
    });

    $(".everyMorning").click(function(){
        $('input.morning:checkbox').not(this).prop('checked', this.checked);
    });

    $(".everyAfternoon").click(function(){
        $('input.afternoon:checkbox').not(this).prop('checked', this.checked);
    });

    $(".everyNight").click(function(){
        $('input.night:checkbox').not(this).prop('checked', this.checked);
    });


    $(document).ready(function() {
        $(".allTime").change(function(){
            if(this.checked){
                $(".checkboxTimerGroup").each(function(){
                    this.checked=true;
                })
            }else{
                $(".checkboxTimerGroup").each(function(){
                    this.checked=false;
                })
            }
        });


        $(".checkboxTimerGroup").click(function () {
            if ($(this).is(":checked")){
                var isAllChecked = 0;
                $(".checkboxTimerGroup").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $(".allTime").prop("checked", true); }
            }
            else {
                $(".allTime").prop("checked", false);
            }
        });

        $(".morning").click(function () {
            if ($(this).is(":checked")){
                var isAllChecked = 0;
                $(".morning").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $(".everyMorning").prop("checked", true); }
            }
            else {
                $(".everyMorning").prop("checked", false);
                $(".allTime").prop("checked", false);
            }
        });
        $(".afternoon").click(function () {
            if ($(this).is(":checked")){
                var isAllChecked = 0;
                $(".afternoon").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $(".everyAfternoon").prop("checked", true); }
            }
            else {
                $(".everyAfternoon").prop("checked", false);
                $(".allTime").prop("checked", false);
            }
        });
        $(".night").click(function () {
            if ($(this).is(":checked")){
                var isAllChecked = 0;
                $(".night").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $(".everyNight").prop("checked", true); }
            }
            else {
                $(".everyNight").prop("checked", false);
                $(".allTime").prop("checked", false);
            }
        });
    });
/*    // Carousel
    $('.multi-item-carousel').carousel({
        interval: false
    });

    // change quote
    $('.peopleBox').on('click', function (e) {
        e.preventDefault()
        var quote = $(this).find('.people_quote').text().trim()
        $('#testimonialSlider__item p').text(quote)
    })*/

</script>

</body>
</html>
