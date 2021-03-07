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
 * Pass the jQuery shortcut in.
 *
 * @since 2.2.14
 *
 * @param {Object} $ The jQuery object.
 */
(function($) {

	/**
	 * When the DOM is ready.
	 *
	 * @since 2.2.14
	 */
	$(document).ready( function() {

		// First pass.
		$('.post').fitVids({
			customSelector: "iframe.dfb-video"
		});

		// Refresh after any AJAX event completes.
		$(document).ajaxComplete( function() {
			setTimeout( function() {
				$('.post').fitVids();
			}, 200 );
		});

		return;

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
			$('.tiled-gallery a.fancybox').each( function() {
				$(this).removeClass('fancybox').addClass('nofancybox');
				if ($(this).fancybox != undefined) {
					$(this).unbind('click.fb');
					$(this).fancybox = function() {};
				}
			});

		}, 50 );

	});

} )( jQuery );
