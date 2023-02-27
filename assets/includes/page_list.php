<?php
/**
 * The Ball Page List Template.
 *
 * @since 1.0.0
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!-- assets/includes/page_list.php -->

<div id="sof_page_list" class="sof_page_list">
	<span class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Submenu', 'theball' ); ?></span>
	<div class="sof_page_list_inner">

		<ul id="pages_ul">
			<?php if ( has_nav_menu( 'theball_menu' ) ) : ?>
				<?php

				// Try and use it.
				wp_nav_menu( [
					'theme_location' => 'theball_menu',
					'echo' => true,
					'container' => '',
					'items_wrap' => '%3$s',
				] );

				?>
			<?php else : ?>
				<?php wp_list_pages( 'title_li=&depth=1' ); ?>
			<?php endif; ?>
		</ul>

	</div>
</div>
