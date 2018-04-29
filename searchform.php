<?php /*
================================================================================
Searchform Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

?><!-- searchform.php -->

<form method="get" id="searchform" action="<?php bloginfo( 'url' ); ?>/">

	<label for="s" class="assistive-text"><?php _e( 'Search', 'theball' ); ?></label>
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'theball' ); ?>">
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'theball' ); ?>">

</form>



