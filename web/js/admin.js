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
	$('.datepicker').datetimepicker();
		checkEmptyForm.init();

});