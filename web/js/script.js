var swiper =
{
	init: function()
	{
		var galleryTop = new Swiper('.gallery-top', {
	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        // spaceBetween: 30,
        	// centeredSlides: true,
        	// autoplay: 10000,
        	autoplayDisableOnInteraction: false,
        	// Disable preloading of all images
	        preloadImages: false,
        	keyboardControl: true,
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
		if (0 < $('.grid').length) {
			var $container = $('.grid');
			// initialize
			$container.imagesLoaded(function(){
				$container.isotope({
					itemSelector: '.grid-item',
				  	percentPosition: true,
				  	masonry: {
				    	columnWidth: '.grid-item'
				  	}
				})
			});
		}

	}
};

var chart =
{
	init: function()
	{
		if (0 < $('#myfirstchart').length) {
			var myData = $('#myfirstchart').data('stats');

			var min = $('#myfirstchart').data('min');
			var max = $('#myfirstchart').data('max');

			new Morris.Area({
			  element: 'myfirstchart',
			  data: myData,
			  xkey: 'y',
			  ykeys: ['value'],
			  labels: ['Value'],
			  ymin: min,
			  ymax: max,
			  parseTime: false,
			  fillOpacity: 0.6,
			});

			var pieData = $('#pie-chart').data('stats');

			new Morris.Donut({
			  	element: 'pie-chart',
			  	data: pieData,
			 	colors: [
					'#118E08',
					'#D00000'
				],
			});
		}

	}
};

var checkEmptyForm =
{
	init: function()
	{
		$(document).on('submit', '.check-empty-form', function()
		{

			var err = false;
			$('.error').hide();

			$.each($(this).find('.check-empty'), function()
			{
				if ('' == $(this).val()) {
					err = true;
				}
			})

			if (true == err) {
				$('.error').show();
				return false;
			}
		})
	}
};

var addTopic =
{
	init: function()
	{
		$(document).on('click', '.add-topic', function()
		{
			$('#big-topic-id').val($(this).attr('data-big-topic-id'));

		});
	}
}

var newPostCount =
{
	init: function()
	{
		var $url = $('.count-container').attr('data-url');

		$.ajax(
		$url, {
			dataType: "json",
		})
        .done(function (datas) {
        	$.each(datas.topcisIds, function(index, value){
        		if (0 < $('[data-newpost-' + value +']').length) {
        			$('[data-newpost-' + value +']').removeClass('hidden');
        		}
        	});
        	$('.count-container').html(datas.template);
        })
        .error(function () {

        });
	}
}

$( document ).ready(function()
{
	swiper.init();
	masonry.init();
	$('iframe').removeAttr('style');
	chart.init();
	checkEmptyForm.init();
	addTopic.init();
	newPostCount.init();
});
