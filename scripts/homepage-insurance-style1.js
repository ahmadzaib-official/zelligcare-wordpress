$(function () {
	$(window).on('load resize', function () {
		if($(window).width() <= 1080) {
			$('.module-insurance.style-1 .insurance-wrapper .each-block').each(function () {
				var each = $(this).find('.each-block').html();
				$(this).appendTo('.insurance-mobile-wrapper');
				
			});
		}
	});
});