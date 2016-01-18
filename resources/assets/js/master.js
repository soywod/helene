$(function () {
	var $preview = $('.preview');
	var $previewLoader = $('.preview-loader');
	var $previewImage = $('.preview-image');
	var $previewDesc = $('.preview-desc-content');

	$('.masonry-item').each(function (index, elem) {
		$(elem).fadeIn(200 + 50 * index);
	});

	$('.masonry')
		.on('mouseenter', '.masonry-item', function () {
			$(this).find('.masonry-fade').fadeIn(200);
		})
		.on('mouseleave', '.masonry-item', function () {
			$(this).find('.masonry-fade').fadeOut(200);
		})
		.on('click', '.masonry-item', function () {
			var workId = $(this).attr('data-id');

			$preview.fadeIn();
			$previewImage.html('');
			$previewLoader.show(0);

			$.ajax({
				method : 'GET',
				url    : '/work/' + workId,
				success: function (res) {
					$previewLoader.hide(0);
					$previewImage.html('<img src="' + res.thumbnail + '" alt="' + res.title + '">');
					console.log(res);
					$previewDesc.html(
						'<h2>' + res.title + '</h2>' +
						'<p>' + res.size + '</p>' +
						'<p>' + res.box_price + '</p>' +
						'<p>' + res.unbox_price + '</p>' +
						'<p>' + (res.sold === 1) + '</p>'
					);
				},
				error  : function () {
					console.log('KO');
				}
			});
		});

	$preview
		.on('click', '.preview-close', function () {
			$preview.fadeOut();
		})
});