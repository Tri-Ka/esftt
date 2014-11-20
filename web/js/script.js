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

var Competition =
{
	init: function()
	{

		var autoCompleteData = {
		    teams : [
		      ['Player 1', 'Player 2'],
		      ['Player 3', 'Player 4'],
		      ['Player 5', 'Player 6'],
		      ['Player 7', 'Player 8'],

		    ],
		    results : [
		    	[[1,0], [2,7], [2,7], [2,7]],
		    	[[3,0], [2,0]]
		    ]



		  }

		/* Data for autocomplete */
		var acData = ["kr:MC", "ca:HuK", "se:Naniwa", "pe:Fenix",
		              "us:IdrA", "tw:Sen", "fi:Naama"]

		/* If you call doneCb([value], true), the next edit will be automatically
		   activated. This works only in the first round. */
		function acEditFn(container, data, doneCb) {

			var input = $('<input type="text">');

			input.val(data);

			console.log(acData);

			input.autocomplete({
			  	source: acData
			});

			input.blur(function() {
			  	doneCb(input.val());
			});

			input.keyup(function(e) {
			  	if ((e.keyCode || e.which) === 13){
			  		input.blur();
			  	}
			});

			container.html(input);
			input.focus();
		};

		function acRenderFn(container, data, score) {


			    container.append(data);


		};

		$(function() {

		    $('div#autoComplete .demo').bracket({

			    init: autoCompleteData,
			    save: function(e){
			    	console.log(e);
			    }, /* without save() labels are disabled */
			    decorator: {
			      	edit: acEditFn,
			        render: acRenderFn
			    }

			});
		});
	}
}

$( document ).ready(function()
{
	$('.pop-help').popover({
		'template': '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>',
		'animation': true
	});
	AutoResize.init();
	GalleryFic.init();
	Comment.init();
	Competition.init();
});