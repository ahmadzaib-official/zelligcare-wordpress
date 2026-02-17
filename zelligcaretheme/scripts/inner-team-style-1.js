$(document).ready(function () {
	
	$('.team-inner-page.style1 .ry-flex .ry-each').each(function() {
		var dataParag = $(this).find('.team-excerpt p');
		var datanew = dataParag.clone();
		var appendData = $(datanew).addClass('team-details');
		
		appendData.prependTo($(this).find('.team-excerpt'));
	});

	$('.team-inner-page.style1 .ry-flex .ry-each').each(function() {
		$(this).find('.team-excerpt p:not(.team-details)').text($(this).find('.team-excerpt p:not(.team-details)').text().substr(0, 200) + '[..]');
	});
	$(".team-inner-page.style1 .ry-each .button-wrapper a").on('click', function() {
		
		var $parent = $(this).parents('.ry-each');
		var $modalData = $parent.html();
		console.log($modalData);
		$.fancybox.open('<div class="team-box">' + $modalData + '</div>');

	});

});
