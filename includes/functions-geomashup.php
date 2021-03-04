<?php /*
================================================================================
GeoMashup Functions
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/



if ( ! function_exists( 'theball_geomashup_map_link_get' ) ) :
/**
 * Get a link to the map if the current post has a location set.
 *
 * @since 2.3.2
 */
function theball_geomashup_map_link_get() {

	// Init.
	$map_link = '';

	// Disable.
	return $map_link;

	// Bail if we do not have the plugin.
	if ( ! class_exists( 'GeoMashup' ) ) {
		return $map_link;
	}

	// Do we have the plugin and some coordinates?
	if ( GeoMashup::current_location( null, 'post' ) ) {
		$map_link = ' <a href="#geomap">' . __( 'Jump to map', 'theball' ) . '</a>';
	}

	// --<
	return $map_link;

}
endif;



if ( ! function_exists( 'theball_geomashup_map_get' ) ) :
/**
 * Show the map for a post.
 *
 * @since 2.3.2
 */
function theball_geomashup_map_get() {

	// Bail if we do not have the plugin.
	if ( ! class_exists( 'GeoMashup' ) ) {
		return;
	}

	// Do we have some coordinates?
	if ( GeoMashup::current_location( null, 'post' ) ) {

		?>
		<!-- Start of Map Area -->
		<div id="geomap" class="wikitext">
			<?php echo GeoMashup::map(); ?>
		<!-- End of Map Area -->
		</div>
		<?php

	}

}
endif;



