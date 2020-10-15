$('.selectpicker').selectpicker();

$(document).ready(function() {
  	$('.input-file-design').change(function(e){
        var fileName = e.target.files[0].name;
        $('.js-fileName').html(fileName);
    });
});

$('.slick-welcome').slick({
	infinite: false,
  	slidesToShow: 4,
  	slidesToScroll: 1,
  	arrows: false,
  	dots: true,
  	 responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesPerRow: 2,
    	rows: 2,

      }
    }
  ]
});

$('.slick-modal').slick({
	infinite: false,
  	slidesToShow: 1,
  	slidesToScroll: 1,
  	arrows: true,
  	dots: false,
  	 responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        dots: false,
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        dots: false,
      }
    }
  ]
});

 $('.slider_for').slick({
 	infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: true,
	fade: true,
	asNavFor: '.slider_nav',
	responsive: [
	{
      breakpoint: 768,
      settings: {
        arrows: false,
        dots: true,
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        dots: true,
      }
    }
	]
});

$('.slider_nav').slick({
	infinite: true,
  	slidesToShow: 3,
  	slidesToScroll: 1,
  	asNavFor: '.slider_for',
  	arrows: false,
 });




// $('.modal').on('shown.bs.modal', function (e) {
//   $('.slick-modal').slick('setPosition');
//   $('.modal_product .images').addClass('open');
// });

jQuery('.wrap_box').hover(function() {
  jQuery(this).find('.menu_box').stop(true, true).delay(200).fadeIn();
}, function() {
  jQuery(this).find('.menu_box').stop(true, true).delay(200).fadeOut();
});

$(document).ready(function(){
	$(".mobile_menu_btn").click(function(){
	    $(".menu_mobile").toggleClass("active");
	});
});

$(document).ready(function(){
	$(".mobile_contacts_btn").click(function(){
	    $(".menu_contacts_mobile").toggleClass("active");
	});
});

$(document).ready(function(){
	$(".menu_contacts_mobile .close").click(function(){
	    $(".menu_contacts_mobile").removeClass("active");
	});
});


// dropdowm modal
$(document).on('click', '.filter_item .dropdown-menu', function (e) {
  e.stopPropagation();
});

// tab filter mobile
$(document).ready(function(){
	$(".tab_mobile_category .nav .nav-item .filter-collapse-btn").click(function(){
	    $('#filter-collapse').show();
	    $('#filter').hide();
	    $(".tab_mobile_category .nav .nav-item .filter-collapse-btn").addClass('active');
	     $(".tab_mobile_category .nav .nav-item .filter-btn").removeClass('active');
	});

	$(".tab_mobile_category .nav .nav-item .filter-btn").click(function(){
	    $('#filter-collapse').hide();
	    $('#filter').show();
	    $(".tab_mobile_category .nav .nav-item .filter-collapse-btn").removeClass('active');
	     $(".tab_mobile_category .nav .nav-item .filter-btn").addClass('active');
	});
});

// zoom img
// $(document).ready(function() {


//     $('.modal_product .images .item').zoom({
//         on: 'grab'
//     });

// });


  $('.slider-thumbnail').slick({
 	slidesToShow: 1,
 	slidesToScroll: 1,
 	arrows: true,
 	fade: false,
 	asNavFor: '.slider-nav-thumbnail',
 	responsive: [
	{
      breakpoint: 768,
      settings: {
        arrows: false,
        dots: true,
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        dots: true,
      }
    }
	]
 });

 $('.slider-nav-thumbnail').slick({
 	slidesToShow: 3,
 	slidesToScroll: 1,
 	asNavFor: '.slider-thumbnail',
 	dots: false,
 	focusOnSelect: true,
 	arrows: false,

 });

 // Remove active class from all thumbnail slides
 $('.slider-nav-thumbnail .slick-slide').removeClass('slick-active');

 // Set active class to first thumbnail slides
 $('.slider-nav-thumbnail .slick-slide').eq(0).addClass('slick-active');

 // On before slide change match active thumbnail to current slide
 $('.slider-thumbnail').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
 	var mySlideNumber = nextSlide;
 	$('.slider-nav-thumbnail .slick-slide').removeClass('slick-active');
 	$('.slider-nav-thumbnail .slick-slide').eq(mySlideNumber).addClass('slick-active');
});

 $(document).ready(function(){
   $('.phone_number').mask('0 (000) 000-00-00');
});

  $(document).ready(function(){
   $('.phone_mask').mask('+7 (000) 000 00 00');
});
