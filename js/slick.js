// $(document).on('click','.album__column',function(){
	$('.slick1').slick({
		arrows: false,
		dots: false,
		// adaptiveHeight: true,
		// slidesToShow: 3,
		// slidesToScroll: 1,
		// centerMode: true,
		// responsive:[
		// 	{
		// 		breakpoint: 320,
		// 		settings: {
		// 			adaptiveHeight: false,
		// 		}
		// 	},
		// 	{
		// 		breakpoint: 768,
		// 		settings: {
		// 			adaptiveHeight: true,
		// 		}
		// 	}
		// ],
	})
// })

$('.control-main-slider__arrow_prev').click(function(){
	$('.main-slider__body').slick('slickPrev')
})

$('.control-main-slider__arrow_next').click(function(){
	$('.main-slider__body').slick('slickNext')
})


// $('.slick2').slick({
// 	arrows: false,
// 	dots: false,
// 	// adaptiveHeight: true,
// 	infinite: true,
// 	slidesToShow: 3,
// 	slidesToScroll: 3,
// 	// centerMode: true,
// 	autoplay: true,
// 	autoplaySpeed: 2000,
// 	responsive:[
// 		{
// 			breakpoint: 550,
// 			settings: {
// 				slidesToShow: 1,
// 				slidesToScroll: 1,
// 			}
// 		},
// 		{
// 			breakpoint: 768,
// 			settings: {
// 				slidesToShow: 2,
// 				slidesToScroll: 2,
// 			}
// 		}
// 	],
// })

// $('.slick2_prev').click(function(){
// 	$('.slick2').slick('slickPrev')
// })

// $('.slick2_next').click(function(){
// 	$('.slick2').slick('slickNext')
// })