$( document ).ready(function()
{
	$('.datepicker').datetimepicker({
		locale: 'fr',
		format: 'DD-mm-YYYY HH:mm',
		extraFormats: [ 'YYYY-mm-D HH:mm' ]
	});
	
	$('#editor').wysiwyg();

	$('.article-form').on('submit', function(e){

		$('#article_content').val($('#editor').html());
	});

});