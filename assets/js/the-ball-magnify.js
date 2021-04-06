/*
================================================================================
Custom Magnifier Javascript for The Ball.
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/



/**
 * Pass the jQuery shortcut in.
 *
 * @since 3.0.1
 *
 * @param {Object} $ The jQuery object.
 */
(function($) {

	/**
	 * When the DOM is ready.
	 *
	 * @since 3.0.1
	 */
	$(document).ready( function() {

		// Magnify anything with this class.
		$('.zoom').magnify({
			touchBottomOffset: 90
		});

	});

} )( jQuery );
