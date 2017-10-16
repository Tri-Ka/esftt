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

	$("#sidebar-menu a").on('click', function (e) {
    if (!$("#wrapper").hasClass("enlarged")) {

      if ($(this).parent().hasClass("has_sub")) {
        e.preventDefault();
      }

      if (!$(this).hasClass("subdrop")) {
        // hide any open menus and remove all other classes
        $("ul", $(this).parents("ul:first")).slideUp(350);
        $("a", $(this).parents("ul:first")).removeClass("subdrop");
        $("#sidebar-menu .pull-right i").removeClass("fa-angle-up").addClass("fa-angle-down");

        // open our new menu and add the open class
        $(this).next("ul").slideDown(350);
        $(this).addClass("subdrop");
        $(".pull-right i", $(this).parents(".has_sub:last")).removeClass("fa-angle-down").addClass("fa-angle-up");
        $(".pull-right i", $(this).siblings("ul")).removeClass("fa-angle-up").addClass("fa-angle-down");
      } else if ($(this).hasClass("subdrop")) {
        $(this).removeClass("subdrop");
        $(this).next("ul").slideUp(350);
        $(".pull-right i", $(this).parent()).removeClass("fa-angle-up").addClass("fa-angle-down");
        //$(".pull-right i",$(this).parents("ul:eq(1)")).removeClass("fa-chevron-down").addClass("fa-chevron-left");
      }
    }
  });

  // NAVIGATION HIGHLIGHT & OPEN PARENT
  $("#sidebar-menu ul li.has_sub a.active").parents("li:last").children("a:first").addClass("active").trigger("click");

});
