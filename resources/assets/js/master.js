$(function ()
{
	var $preview = $('.preview');
	var $previewLoader = $('.preview-loader');
	var $previewImage = $('.preview-image');
	var $previewDesc = $('.preview-desc-content');
	var $loader = $('.loader');
	var $editor = $('#profile-desc');

	lightbox.option({
		'resizeDuration'             : 0,
		'fadeDuration'               : 200,
		'albumLabel'                 : '%1 / %2',
		'alwaysShowNavOnTouchDevices': true
	});

	$('[data-toggle="tooltip"]').tooltip();
	$('#work-sold').bootstrapSwitch();

	$('#contact-form').on('submit', function ()
	{
		$loader.show(0);
	});

	$('.masonry-item').each(function (index, elem)
	{
		$(elem).fadeIn(200 + 50 * index);
	});

	$('.profile-thumbnail').on({
		mouseenter: function ()
		{
			$(this).find('.profile-thumbnail-edit').fadeIn(200);
		},
		mouseleave: function ()
		{
			$(this).find('.profile-thumbnail-edit').fadeOut(200);
		}
	});

	$('.work-thumbnail').on({
		mouseenter: function ()
		{
			$(this).find('.work-thumbnail-edit').fadeIn(200);
		},
		mouseleave: function ()
		{
			$(this).find('.work-thumbnail-edit').fadeOut(200);
		}
	});

	$('.profile-thumbnail-edit, .profile-thumbnail-edit i').dropzone({
		url                  : '/admin/profile/upload',
		uploadMultiple       : false,
		addedfile            : function (file)
		{
			$loader.show(0);
		},
		success              : function (file, newPath)
		{
			$('#profile-thumbnail').attr('src', newPath);
			$loader.fadeOut(200);
		},
		error                : function ()
		{
			$loader.fadeOut(200);
		},
		createImageThumbnails: false,
		headers              : {
			'X-CSRF-Token': $('.profile-thumbnail-edit').attr('data-token')
		}
	});

	$('.work-thumbnail-edit, .work-thumbnail-edit i').dropzone({
		url                  : '/admin/work/upload',
		uploadMultiple       : false,
		addedfile            : function (file)
		{
			$loader.show(0);
		},
		success              : function (file, res)
		{
			$('#work-thumbnail').attr('src', res.path);
			$('[name="thumbnail"]').val(res.name);
			$loader.fadeOut(200);
		},
		error                : function ()
		{
			$loader.fadeOut(200);
		},
		createImageThumbnails: false,
		headers              : {
			'X-CSRF-Token': $('.work-thumbnail-edit').attr('data-token')
		}
	});

	if ($editor.length)
	{
		$editor.summernote();
	}
});