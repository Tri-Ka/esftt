var swiper = 
{
	init: function()
	{
		var galleryTop = new Swiper('.gallery-top', {
	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        // spaceBetween: 30,
        	// centeredSlides: true,
        	autoplay: 4000,
        	autoplayDisableOnInteraction: false,
        	// Disable preloading of all images
	        preloadImages: false,
	        // Enable lazy loading
	        lazyLoading: true
	    });
	    // var galleryThumbs = new Swiper('.gallery-thumbs', {
	    //     spaceBetween: 10,
	    //     centeredSlides: true,
	    //     slidesPerView: 'auto',
	    //     touchRatio: 0.2,
	    //     slideToClickedSlide: true
	    // });
	    // galleryTop.params.control = galleryThumbs;
	    // galleryThumbs.params.control = galleryTop;
	}
};

var masonry = 
{
	init: function()
	{
		var container = $('.directories');
		// initialize
		container.masonry({
		  columnWidth: '.directory',
		  itemSelector: '.directory'
		});
	}
}

$( document ).ready(function()
{
	swiper.init();
	//masonry.init();
	$('iframe').removeAttr('style');

});