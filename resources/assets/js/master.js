$(function () {
	$('.masonry-item').each(function (index, elem) {
		$(elem).fadeIn(parseInt(Math.random() * 1800 + 200));
	})
});