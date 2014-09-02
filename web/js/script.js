var AutoResize =
{
	init: function()
	{

		if($('textarea').length > 0) {
			$('textarea').autoResize();
		}
	}
};

var Comment =
{
	init: function()
	{

		$(document).on('click', '.submitComment', function(e){

			e.preventDefault();
			e.stopPropagation();

			url = $(this).parent('form').attr('action');
			data = $( "#newCommentForm" ).serialize();

	        $.ajax({
	            type: 'post',
	            url: url,
	            data: data,
	            success: function(data)
	            {

	            	$('#commentList').append('<li>' + data + '</li><hr/>');
	            }
	        });

		});
	}
};

var GalleryFic =
{
	init: function()
	{

		if(0 < $('#thumbs').length){

			$('#thumbs').galleriffic({
	        delay:                     2500,
			numThumbs:                 15,
			preloadAhead:              10,
			enableTopPager:            false,
			enableBottomPager:         true,
			maxPagesToShow:            7,
			imageContainerSel:         '#slideshow',
			controlsContainerSel:      '#controls',
			captionContainerSel:       '#caption',
			loadingContainerSel:       '#loading',
			renderSSControls:          true,
			renderNavControls:         true,
			playLinkText:              'Play Slideshow',
			pauseLinkText:             'Pause Slideshow',
			prevLinkText:              '&lsaquo; Previous Photo',
			nextLinkText:              'Next Photo &rsaquo;',
			nextPageLinkText:          'Next &rsaquo;',
			prevPageLinkText:          '&lsaquo; Prev',
			enableHistory:             false,
			autoStart:                 false,
			syncTransitions:           true,
			defaultTransitionDuration: 700,
			onSlideChange:             function(prevIndex, nextIndex) {
				// 'this' refers to the gallery, which is an extension of $('#thumbs')
				this.find('ul.thumbs').children()
					.eq(prevIndex).fadeTo('fast', 1.0).end()
					.eq(nextIndex).fadeTo('fast', 1.0);
			},
			onPageTransitionOut:       function(callback) {
				this.fadeTo('fast', 0.0, callback);
			},
			onPageTransitionIn:        function() {
				this.fadeTo('fast', 1.0);
			}
    	});

		}


	}
};

$( document ).ready(function()
{
	AutoResize.init();
	GalleryFic.init();
	Comment.init();
});