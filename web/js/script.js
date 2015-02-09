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


var dragAndDrop =
{
	init: function(){

		$('.member').draggable({
			revert: true
		});

		$('.team, .dispo, .no-dispo').droppable({
			accept:".member",
			hoverClass:"zone-drop-hover",
			drop:function(event, ui){

				var team = $(this).attr( 'id' );
				var member = ui.draggable.attr( 'id' );

				ui.draggable.draggable( 'option', 'revert', false );

 			}
 		});

	}
}

var hoverAnimate =
{

	init: function(){

		$( ".elem-homepage").mouseenter(function() {

			var animation = 'bounce';

			elem = $(this).find('h3');

		    $(elem).removeClass(animation + ' animated').addClass(animation + ' animated').on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      			$(this).removeClass(animation + ' animated');
    		});
		});
	}
};

var calendar =
{
	init: function(){


		$('#calendar').fullCalendar({

			header: {

				left:   'today, prev, next',
	    		center: 'title',
	    		right:  'agendaDay, agendaWeek, month',

			},

			lang: 'fr',
			events: {
		        url: $('#calendar').attr('data-urlEvent'),
		        type: 'POST',
		        error: function() {
		            alert('there was an error while fetching events!');
		        },
		        color: 'yellow',   // a non-ajax option
		        textColor: 'black' // a non-ajax option
		    },

		 	//events: $(this).attr('data-urlEvent'),

			dayClick: function(date, jsEvent, view) {

		        alert('Clicked on: ' + date.format());

    		}

    	})

	}
};


$( document ).ready(function()
{
	$('.pop-help').popover({
		'template': '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-content"></div></div>',
		'animation': true
	});
	AutoResize.init();
	Comment.init();
	$('#myModal').modal('show');
	dragAndDrop.init();
	hoverAnimate.init();
	calendar.init();
});