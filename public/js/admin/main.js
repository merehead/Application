
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

// -- SPINNER -------
  function showSpinner() {
    $('body').addClass('overflow-hidden')
    $('body').append(
      '<div class="show-spinner"></div>'
    );
  };

function hideSpinner() {
  $('body').removeClass('overflow-hidden')
  $( ".show-spinner" ).remove();
};

function showErrorModal(message) {
  $('body').addClass('overflow-hidden')
  $('body').append(
    '<div class="error-popup-container">'+
    '<div class="error-popup">'+
    '<div class="error-popup__ico">'+
    '<span>'+
    '<i class="fa fa-times-circle"></i>'+
    '</span>'+
    '</div>'+
    '<a href="#" class="error-popup__close">'+
    '<i class="fa fa-times"></i>'+
    '</a>'+
    '<div class="error-popup__body">'+
    '<h2>'+
    message.title+
    '</h2>'+
    '<p class="info-p info-p--roboto">'+
    message.description+
    '</p>'+
    '</div>'+
    '</div>'+
    '</div>'
  );
};

$(document).on('click', '.error-popup__close', function(event) {
  event.preventDefault()
  hideErrorModal()
})

function hideErrorModal() {
  $('body').removeClass('overflow-hidden')
  $('.error-popup-container').remove()
};
