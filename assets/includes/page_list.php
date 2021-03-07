<?php /*
================================================================================
Page List Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

?><!-- assets/includes/page_list.php -->

<div class="sof_page_list">
<div class="sof_page_list_inner">

	<ul id="pages_ul">
	<?php

	// Do we have a custom menu?
	if ( has_nav_menu( 'theball_menu' ) ) {

		// Try and use it.
		wp_nav_menu( [
			'theme_location' => 'theball_menu',
			'echo' => true,
			'container' => '',
			'items_wrap' => '%3$s',
		] );

	} else {

		// Our fallback is to show page list.
		wp_list_pages( 'title_li=&depth=1' );

	}

	?>
	</ul>

</div>
</div>



