<?php /*
================================================================================
Sidebar Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

?><!-- sidebar.php -->

<div class="right_column clearfix">

	<div class="right_column_inner">

		<?php

		/*
		--------------------------------------------------------------------------------
		2014 Teaser
		--------------------------------------------------------------------------------
		*/

		?><div class="post ball_teaser ball_teaser_row_start">

			<div class="route_map">
				<a href="/2014/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2014_route-320x237.jpg" alt="<?php esc_attr_e( 'The 2014 route', 'theball' ); ?>" title="<?php esc_attr_e( 'The 2014 route', 'theball' ); ?>" width="320" height="237" class="alignnone size-thumbnail" /></a>
				<div class="route_map_text">
					<h2><a href="/2014/" style="text-shadow: none"><?php _e( 'The Ball 2014', 'theball' ); ?></a></h2>
				</div>
			</div>

			<div class="ball_teaser_text">
				<p><?php printf(
					__( '%s left England on 9th Jan 2014 and headed to the World Cup in Sao Paulo, Brazil.', 'theball' ),
					'<em>' . __( 'The Ball 2014', 'theball' ) . '</em>'
				); ?></p>
				<ul class="actionlist">
					<li><a href="/2014/"><?php _e( 'More about 2014...', 'theball' ); ?></a></li>
					<li><a href="/2014/blog/"><?php _e( 'Go to the 2014 blog', 'theball' ); ?></a></a></li>
				</ul>
			</div>

		</div><!-- /post ball_teaser -->

		<?php

		/*
		--------------------------------------------------------------------------------
		2010 Teaser
		--------------------------------------------------------------------------------
		*/

		?><div class="post ball_teaser">

			<div class="route_map">
				<a href="/2010/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2010_route-320x238.jpg" alt="<?php esc_attr_e( 'The 2010 route', 'theball' ); ?>" title="<?php esc_attr_e( 'The 2010 route', 'theball' ); ?>" width="320" height="238" class="alignnone size-thumbnail" /></a>
				<div class="route_map_text">
					<h2><a href="/2010/" style="text-shadow: none"><?php _e( 'The Ball 2010', 'theball' ); ?></a></h2>
				</div>
			</div>

			<div class="ball_teaser_text">
				<p><?php printf(
					__( '%s left England on 24th Jan 2010 headed to the Opening Ceremony in Johannesburg, South Africa.', 'theball' ),
					'<em>' . __( 'The Ball 2010', 'theball' ) . '</em>'
				); ?></p>
				<ul class="actionlist">
					<li><a href="/2010/"><?php _e( 'More about 2010...', 'theball' ); ?></a></li>
					<li><a href="/2010/blog/"><?php _e( 'Go to the 2010 blog', 'theball' ); ?></a></li>
					<li><a href="/2010/blog/2010/01/12/the-ball-2010-kickoff/"><?php _e( 'Start reading from the kickoff', 'theball' ); ?></a></a></li>
				</ul>
			</div>

		</div><!-- /post ball_teaser -->

		<?php

		/*
		--------------------------------------------------------------------------------
		2006 Teaser
		--------------------------------------------------------------------------------
		*/

		?><div class="post ball_teaser ball_teaser_row_start">

			<div class="route_map">
				<a href="/2006/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2006_route-320x240.jpg" alt="<?php esc_attr_e( 'The 2006 route', 'theball' ); ?>" title="<?php esc_attr_e( 'The 2006 route', 'theball' ); ?>" width="320" height="240" class="alignnone size-thumbnail" /></a>
				<div class="route_map_text">
					<h2><a href="/2006/" style="text-shadow: none"><?php _e( 'The Ball 2006', 'theball' ); ?></a></h2>
				</div>
			</div>

			<div class="ball_teaser_text">
				<p><?php printf(
					__( '%s travelled from London to the Opening Ceremony in Munich, Germany.', 'theball' ),
					'<em>' . __( 'The Ball 2006', 'theball' ) . '</em>'
				); ?></p>
				<ul class="actionlist">
					<li><a href="/2006/"><?php _e( 'More about 2006...', 'theball' ); ?></a></li>
					<li><a href="/2006/blog/2006/05/30/the-ball-is-underway"><?php _e( 'Start reading from the beginning', 'theball' ); ?></a></a></li>
					<li><a href="/2006/blog/2006/06/06/we-make-it-to-ypres-and-reach-back-in-time"><?php _e( 'The Christmas Truce', 'theball' ); ?></a></li>
				</ul>
			</div>

		</div><!-- /post ball_teaser -->

		<?php

		/*
		--------------------------------------------------------------------------------
		2002 Teaser
		--------------------------------------------------------------------------------
		*/

		?><div class="post ball_teaser ball_teaser_2002">

			<div class="route_map">
				<a href="/2002/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/interface/2002_route-320x240.jpg" alt="<?php esc_attr_e( 'The 2002 route', 'theball' ); ?>" title="<?php esc_attr_e( 'The 2002 route', 'theball' ); ?>" width="320" height="240" class="alignnone size-thumbnail" /></a>
				<div class="route_map_text">
					<h2><a href="/2002/" style="text-shadow: none"><?php _e( 'The Ball 2002', 'theball' ); ?></a></h2>
				</div>
			</div>

			<div class="ball_teaser_text">
				<p><?php printf(
					__( '%s was carried 7000 miles across Europe and Asia to the World Cup finals in Korea &amp; Japan.', 'theball' ),
					'<em>' . __( 'The Ball 2002', 'theball' ) . '</em>'
				); ?></p>
				<ul class="actionlist">
					<li><a href="/2002/"><?php _e( 'More about 2002...', 'theball' ); ?></a></li>
					<li><a href="/2002/blog/2002/02/23/from-the-other-side-of-the-room"><?php _e( 'Start reading from the beginning', 'theball' ); ?></a></li>
					<li><a href="/2002/videos"><?php _e( 'Watch short videos of the journey', 'theball' ); ?></a></a></li>
				</ul>
			</div>

		</div><!-- /post ball_teaser -->

	</div><!-- /.right_column_inner -->

</div><!-- /.right_column -->



