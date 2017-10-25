
function getCarerImage(id_carer)
{
    $.getJSON('/admin/user/getCarerImage/'+id_carer, function(data) {
        console.log(data);
        $('body').find('#NTAModal').remove();
        $('body').append(data.form);
        $('#NTAModal').modal();
    });
}
$(document).ready(function(){

	console.log('check');


	$('.innerTable').each(function(){
   var height = $(this).parent().height();
    $(this).css('height', height);
 	});






});
