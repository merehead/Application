$(document).ready(function(){

	console.log('check');
 
 	
	

	
	if ($(window).width() < 768) {
		$('.filterGroup__box').removeClass('filterGroup__box--active');
		$('.searchFilter .filterGroup__link').click(function(){
			if(!$(this).hasClass('active')){	//если "кликнутый" пункт неактивный:
				$('.searchFilter .filterGroup__link').removeClass('active').next('div').removeClass('filterGroup__box--active'); //делаем неактивными все пункты и скрываем все блоки
				$(this).addClass('active');	//активируем "кликнутый" пункт
				$(this).next('div').addClass('filterGroup__box--active');	//раскрываем следующий за ним блок с описанием
			} else {	//иначе:
				$(this).removeClass('active').next('div').addClass('filterGroup__box--active');	//скрываем данный пункт
			}
		});
	}
	else {
		$('.filterGroup__box').addClass('filterGroup__box--active');
	}

	 $(window).resize(function() { 
	 	 

	 	 if ($(window).width() < 768) {
	 	 	$('.filterGroup__box').removeClass('filterGroup__box--active');
			   	$('.searchFilter .filterGroup__link').click(function(){
				if(!$(this).hasClass('active')){	//если "кликнутый" пункт неактивный:
					$('.searchFilter .filterGroup__link').removeClass('active').next('div').removeClass('filterGroup__box--active'); //делаем неактивными все пункты и скрываем все блоки
					$(this).addClass('active');	//активируем "кликнутый" пункт
					$(this).next('div').addClass('filterGroup__box--active');	//раскрываем следующий за ним блок с описанием
				} else {	//иначе:
					$(this).removeClass('active').next('div').addClass('filterGroup__box--active');	//скрываем данный пункт
				}
			});
		} 
		else {
			$('.filterGroup__box').addClass('filterGroup__box--active')
		}
	 });


	
	
  	


});