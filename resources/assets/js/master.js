$(function () {
	var $preview = $('.preview');
	var $previewLoader = $('.preview-loader');
	var $previewImage = $('.preview-image');
	var $previewDesc = $('.preview-desc-content');
	var $loader = $('.loader');
	var $postThumbnailEdit = $('.profile-thumbnail-edit');

	lightbox.option({
		'resizeDuration'             : 0,
		'fadeDuration'               : 200,
		'albumLabel'                 : '%1 / %2',
		'alwaysShowNavOnTouchDevices': true
	});

	$('[data-toggle="tooltip"]').tooltip();
	$('#work-sold').bootstrapSwitch();


	$('.masonry-item').each(function (index, elem) {
		$(elem).fadeIn(200 + 50 * index);
	});

	$('.profile-thumbnail').on({
		mouseenter: function () {
			$(this).find('.profile-thumbnail-edit').fadeIn(200);
		},
		mouseleave: function () {
			$(this).find('.profile-thumbnail-edit').fadeOut(200);
		}
	});

	$('.profile-thumbnail-edit, .profile-thumbnail-edit i').dropzone({
		url                  : '/admin/profile/upload',
		uploadMultiple       : false,
		addedfile            : function (file) {
			$loader.fadeIn(200);
		},
		success              : function (file, newPath) {
			$('#profile-thumbnail').attr('src', newPath);
			$loader.fadeOut(200);
		},
		error                : function () {
			$loader.fadeOut(200);
		},
		createImageThumbnails: false,
		headers              : {
			'X-CSRF-Token': $postThumbnailEdit.attr('data-token')
		}
	});
});