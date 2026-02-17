$(function () {
	$('.team-inner-page.style3 .ry-each').each(function () {
		/* SOCIAL MEDIA APPEND */
		var $social = $(this).find('.team-social');
		$($social).appendTo($(this).find('.title'));
		
		/* EXCERPT */
		/*
		var textToHide = $(this).find('.team-excerpt p').text().substring(600);
		var visibleText = $(this).find('.team-excerpt p').text().substring(0, 600);

		$(this).find('.team-excerpt p')
		.html(visibleText + '<i>[..]</i>' + ('<span class="text-to-hide">' + textToHide + '</span>'))
		.append('<a class="btn-excerpt" style="display: block; cursor: pointer;"></a>')
		.click(function() {
			$(this).parents('.ry-each').find('.team-excerpt p span').toggle();
			$(this).parents('.ry-each').find('.team-excerpt p i').toggle();
			$(this).parents('.ry-each').toggleClass('show-data')
			$(this).parents('.ry-each').find('.team-excerpt p a:last').toggleClass('read-less');
		});
		$('.read-less').click(function() {
			var text = $(this).parents('.ry-each').find('.team-excerpt p span').text();
			//$(this).removeClass('read-less');
			$(this).parents('.ry-each').find('.team-excerpt p').text(visibleText + text);
		});
		$('.team-inner-page.style3 .ry-each .team-excerpt p span').hide();
		
		var hasVisibleText = $(this).find('.team-excerpt .text-to-hide').html() != '' && $(this).find('.team-excerpt .text-to-hide').html() != null && typeof $(this).find('.team-excerpt .text-to-hide').html() !== 'undefined';
		if(!hasVisibleText)
		{
			$(this).find('.team-excerpt i').attr('style','display:none');	
			$(this).find('.team-excerpt .btn-excerpt').attr('style','display:none');	
		}
		*/
		
		if (!$(this).find('.team-full-description p').is(':empty') ) {
			$(this).append('<a class="btn-excerpt" style="display: block; cursor: pointer;"></a>');
		}
		
	});
	$('.btn-excerpt').click(function() {
		var $parent = $(this).parents('.ry-each');
		$parent.find('.team-excerpt').toggle();
		$parent.find('.team-full-description').toggle();
		$(this).toggleClass('active');
	});
});