$(document).ready(function(){

    console.log('check');

    var footer_height = $(".footer").innerHeight();
    $('.content').css({'padding-bottom': footer_height});

});