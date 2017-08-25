$(document).ready(function(){

	console.log('check');


	$('.innerTable').each(function(){
   var height = $(this).parent().height();
    $(this).css('height', height);
 	});






});
