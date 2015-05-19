var swiper = 
{
	init: function()
	{
		var swiper = new Swiper('.swiper-container', {
	        pagination: '.swiper-pagination',
	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        slidesPerView: 2,
	        paginationClickable: true,
	        loop: true,
        	effect: 'fade',
	    });
	}
}

$( document ).ready(function()
{
	swiper.init();

});