$( document ).ready(function()
{
	$('.datepicker').datetimepicker({
		locale: 'fr',
		format: 'DD-mm-YYYY HH:mm',
		extraFormats: [ 'YYYY-mm-D HH:mm' ]
	});

});