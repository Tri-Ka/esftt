var checkEmptyForm =
{
	init: function()
	{
		$(document).on('submit', '.check-empty-form', function()
		{
			$.each($(this).find('.check-empty'), function()
			{
				if ('' == $(this).val()) {
					return false;
				}
			})
		})
	}
}

$( document ).ready(function()
{
	checkEmptyForm.init();

	$('.datepicker').each(function(){
		var $date = new Date($(this).val());
		var d = $date.getDate();
		var m =  $date.getMonth() + 1;
		var y = $date.getFullYear();
		var h = $date.getHours();
		var i = $date.getMinutes();

		$(this).val(d + "-" + m + "-" + y + ' ' + h + ':' + i)
		$(this).datetimepicker();
	});
});
