<?php
/**
 * Global Menu for Themes based on The Ball.
 *
 * @since 1.0.0
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
<li<?php if ( is_main_site() && is_object( $post ) && $post->ID == 207 ) { echo ' class="active-trail"'; } ?>><a href="/press/" title="Press Coverage of The Ball">Press</a></li>
<li<?php if ( is_main_site() && is_object( $post ) && $post->ID == 22 ) { echo ' class="active-trail"'; } ?>><a href="/connect/" title="Connect with The Ball">Connect</a></li>
*/

// Access blog ID and post.
global $blog_id, $post;

?>
<!-- assets/includes/menu.php -->

<div id="site-navigation" class="main-navigation" role="navigation">
	<span class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Main Menu', 'theball' ); ?></span>
	<div class="global-menu">
		<ul id="primary-menu" class="menu nav-menu" aria-expanded="false">
			<li class="menu-item<?php if ( ( is_main_site() && is_front_page() ) ) { echo ' active-trail'; } ?>"><a href="/" title="<?php esc_attr_e( 'The Ball Home', 'theball' ); ?>"><?php esc_html_e( 'Home', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( $blog_id == 16 ) { echo ' active-trail'; } ?>"><a href="/2022/" title="<?php esc_attr_e( 'The Ball 2022/23', 'theball' ); ?>"><?php esc_html_e( '2022/23', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( $blog_id == 13 ) { echo ' active-trail'; } ?>"><a href="/2018/" title="<?php esc_attr_e( 'The Ball 2018', 'theball' ); ?>"><?php esc_html_e( '2018', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( $blog_id == 8 ) { echo ' active-trail'; } ?>"><a href="/2014/" title="<?php esc_attr_e( 'The Ball 2014', 'theball' ); ?>"><?php esc_html_e( '2014', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( $blog_id == 9 ) { echo ' active-trail'; } ?>"><a href="/2010/" title="<?php esc_attr_e( 'The Ball 2010', 'theball' ); ?>"><?php esc_html_e( '2010', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( $blog_id == 10 ) { echo ' active-trail'; } ?>"><a href="/2006/" title="<?php esc_attr_e( 'The Ball 2006', 'theball' ); ?>"><?php esc_html_e( '2006', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( $blog_id == 11 ) { echo ' active-trail'; } ?>"><a href="/2002/" title="<?php esc_attr_e( 'The Ball 2002', 'theball' ); ?>"><?php esc_html_e( '2002', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( is_main_site() && is_object( $post ) && $post->ID == 6 ) { echo ' active-trail'; } ?>"><a href="/about/" title="<?php esc_attr_e( 'About The Ball', 'theball' ); ?>"><?php esc_html_e( 'About', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( is_main_site() && is_object( $post ) && $post->ID == 95 ) { echo ' active-trail'; } ?>"><a href="/contact/" title="<?php esc_attr_e( 'Contact The Ball', 'theball' ); ?>"><?php esc_html_e( 'Contact', 'theball' ); ?></a></li>
			<li class="menu-item<?php if ( is_main_site() && is_object( $post ) && $post->ID == 160 ) { echo ' active-trail'; } ?>"><a href="/shop/" title="<?php esc_attr_e( 'The Ball Shop', 'theball' ); ?>"><?php esc_html_e( 'Shop', 'theball' ); ?></a></li>
		</ul>
	</div>
</div>



