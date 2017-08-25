$(document).ready(function(){

	console.log('check');

	 	$('.sortLinkXs').click(function(e){

				e.preventDefault();
				var hBlock3 = $('.hiddenSort');

					if (hBlock3.is(':visible') ) {
						$(this).find('.fa').addClass('fa-angle-down');
						$(this).find('.fa').removeClass('fa-angle-up')
					}
					else {
						$(this).find('.fa').removeClass('fa-angle-down');
						$(this).find('.fa').addClass('fa-angle-up')
					}
					$('.hiddenSort ').toggleClass('hiddenSort--visible');
		});

	 	/*------основной блок фильтров--------*/
		$('.filterHead__link').click(function(e){

			e.preventDefault();
			var hBlock = $('.hiddenFilter');

				if (hBlock.is(':visible') ) {
					$(this).find('.fa').addClass('fa-angle-down');
					$(this).find('.fa').removeClass('fa-angle-up')
				}
				else {
					$(this).find('.fa').removeClass('fa-angle-down');
					$(this).find('.fa').addClass('fa-angle-up')
				}
				$('.hiddenFilter ').toggleClass('hiddenFilter--visible');
		});

		$('.filterGroup__box').removeClass('filterGroup__box--active');
		$('.hiddenFilter ').removeClass('hiddenFilter--visible');



		/*----- внутрение фильтры------*/

		$('.searchFilter .filterGroup__link').click(function(){

			var hBlock2 = $(this).next('div');
			if(!$(this).hasClass('active')){	//если "кликнутый" пункт неактивный:

				$(this).addClass('active');	//активируем "кликнутый" пункт
				$(this).next('div').addClass('filterGroup__box--active');	//раскрываем следующий за ним блок с описанием
			} else {

				$(this).removeClass('active').next('div').removeClass('filterGroup__box--active');	//скрываем данный пункт
			}

			if (hBlock2.is(':visible') ) {
				$(this).find('.fa').removeClass('fa-angle-down');
					$(this).find('.fa').addClass('fa-angle-up')

				}
				else {
					$(this).find('.fa').addClass('fa-angle-down');
					$(this).find('.fa').removeClass('fa-angle-up')
				}




		});


	if ($(window).width() < 768) {


		$('.hiddenSort').removeClass('hiddenSort--visible');

	}
	else {
		$('.filterGroup__box').addClass('filterGroup__box--active');
		$('.hiddenFilter ').addClass('hiddenFilter--visible');
		$('.hiddenSort').addClass('hiddenSort--visible');
	}

	 $(window).resize(function() {


	 	if ($(window).width() < 768) {


			$('.filterHead__link').click(function(e){

				e.preventDefault();
				var hBlock = $('.hiddenFilter');

					if (hBlock.is(':visible') ) {
						$(this).find('.fa').addClass('fa-angle-down');
						$(this).find('.fa').removeClass('fa-angle-up')
					}
					else {
						$(this).find('.fa').removeClass('fa-angle-down');
						$(this).find('.fa').addClass('fa-angle-up')
					}
					$('.hiddenFilter ').toggleClass('hiddenFilter--visible');
			});

			$('.filterGroup__box').removeClass('filterGroup__box--active');




			/*----- внутрение фильтры------*/

			$('.searchFilter .filterGroup__link').click(function(e){
				e.preventDefault();
				var hBlock2 = $(this).next('div');
					if(!$(this).hasClass('active')){	//если "кликнутый" пункт неактивный:

						$(this).addClass('active');	//активируем "кликнутый" пункт
						$(this).next('div').addClass('filterGroup__box--active');	//раскрываем следующий за ним блок с описанием
					} else {

						$(this).removeClass('active').next('div').removeClass('filterGroup__box--active');	//скрываем данный пункт
					}

					if (hBlock2.is(':visible') ) {
						$(this).find('.fa').removeClass('fa-angle-down');
							$(this).find('.fa').addClass('fa-angle-up')

					}
					else {
							$(this).find('.fa').addClass('fa-angle-down');
							$(this).find('.fa').removeClass('fa-angle-up')
						}

			});
		}
		else {
			$('.filterGroup__box').addClass('filterGroup__box--active');
			$('.hiddenFilter ').addClass('hiddenFilter--visible');
			$('.hiddenSort').addClass('hiddenSort--visible');
		}
	 });



	 /*--------------слайдер I am carer page------------*/

	 $('.carerBanner').owlCarousel({
 	    items:1,
 	    loop:true,
 	    dots: false,
 	    navigation: false,
 	    autoplay:true,
 	    autoplayTimeout:8000,
 	    autoplayHoverPause:false,

 	    responsive:{
 	        600:{
 	            items:1

 	        }
 	    }
 	});







});
