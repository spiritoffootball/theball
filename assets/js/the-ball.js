/*
================================================================================
Custom Javascript for The Ball.
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/



/**
 * When the DOM is ready.
 *
 * @since 2.2.14
 */
jQuery(document).ready( function() {

	/**
	 * Short delay lets other scripts run first.
	 *
	 * @since 2.2.14
	 */
	setTimeout( function() {

		/**
		 * Remove Fancybox from JetPack galleries.
		 *
		 * @since 2.2.14
		 */
		jQuery('.tiled-gallery a.fancybox').each( function() {
			jQuery(this).removeClass('fancybox').addClass('nofancybox');
			if (jQuery(this).fancybox != undefined) {
				jQuery(this).unbind('click.fb');
				jQuery(this).fancybox = function() {};
			}
		});

	}, 50 );

});



