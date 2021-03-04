<?php /*
================================================================================
Global Menu for Themes based on The Ball
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

/*
<li<?php if ( is_main_site() AND is_object( $post ) AND $post->ID == 207 ) { echo ' class="active-trail"'; } ?>><a href="/press/" title="Press Coverage of The Ball">Press</a></li>
<li<?php if ( is_main_site() AND is_object( $post ) AND $post->ID == 22 ) { echo ' class="active-trail"'; } ?>><a href="/connect/" title="Connect with The Ball">Connect</a></li>
*/

// Access blog ID and post.
global $blog_id, $post;

?><!-- assets/includes/menu.php -->

<div id="site-navigation" class="main-navigation" role="navigation">
	<span class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Main Menu', 'theball' ); ?></span>
	<div class="global-menu">
		<ul id="primary-menu" class="menu nav-menu" aria-expanded="false">
			<li class="menu-item<?php if ( is_main_site() AND is_front_page() ) { echo ' active-trail'; } ?>"><a href="/" title="The Ball Home">Home</a></li>
			<li class="menu-item<?php if ( $blog_id == 13 ) { echo ' active-trail'; } ?>"><a href="/2018/" title="The Ball 2018">2018</a></li>
			<li class="menu-item<?php if ( $blog_id == 8 ) { echo ' active-trail'; } ?>"><a href="/2014/" title="The Ball 2014">2014</a></li>
			<li class="menu-item<?php if ( $blog_id == 9 ) { echo ' active-trail'; } ?>"><a href="/2010/" title="The Ball 2010">2010</a></li>
			<li class="menu-item<?php if ( $blog_id == 10 ) { echo ' active-trail'; } ?>"><a href="/2006/" title="The Ball 2006">2006</a></li>
			<li class="menu-item<?php if ( $blog_id == 11 ) { echo ' active-trail'; } ?>"><a href="/2002/" title="The Ball 2002">2002</a></li>
			<li class="menu-item<?php if ( is_main_site() AND is_object( $post ) AND $post->ID == 6 ) { echo ' active-trail'; } ?>"><a href="/about/" title="About The Ball">About</a></li>
			<li class="menu-item<?php if ( is_main_site() AND is_object( $post ) AND $post->ID == 95 ) { echo ' active-trail'; } ?>"><a href="/contact/" title="Contact The Ball">Contact</a></li>
			<li class="menu-item<?php if ( is_main_site() AND is_object( $post ) AND $post->ID == 160 ) { echo ' active-trail'; } ?>"><a href="/shop/" title="The Ball Shop">Shop</a></li>
		</ul>
	</div>
</div>



