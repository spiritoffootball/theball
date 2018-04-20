/**
 * General Javascript functions fot The Ball.
 *
 * @since 2.2.14
 */

// prevent
jQuery(document).ready(function() {
	setTimeout(function() {
		jQuery('.tiled-gallery a.fancybox').each(function() {
			jQuery(this).removeClass('fancybox').addClass('nofancybox');
			if (jQuery(this).fancybox != undefined) {
				jQuery(this).unbind('click.fb');
				jQuery(this).fancybox = function() {};
			}
		});
	}, 50);
});
