<?php

// if this is signup...
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) AND 'wp-signup.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {

?>
</div><!-- /post -->



</div><!-- /main_column_inner -->

</div><!-- /main_column -->



<?php get_sidebar(); ?>



<?php

}

?>



</div><!-- /.cols_inner -->
</div><!-- /#cols -->



</div><!-- /#content_wrapper -->



<?php

// don't include on network home
if ( is_main_site() ) { // AND is_front_page() ) {

} else {

	// include supporters
	include( apply_filters(

		// fliter name
		'theball_supporters',

		// default include
		get_template_directory() . '/assets/includes/supporters_2014.php'

	));

}

?>



<div id="footer">
<div id="footer_inner">

<div id="join_in" class="clearfix">

<div id="join_in_top" class="clearfix">

<ul>
<li class="join_in_last"><a href="/contact/" class="email_icon" title="Email The Ball">Email The Ball</a></li>
<!--<li><a href="http://blip.tv/the-ball-2010" class="blip_icon" title="The Ball 2010 on Blip.tv">The Ball 2010 on Blip.tv</a></li>-->
<!--<li><a href="http://www.youtube.com/theballtv" class="youtube_icon" title="The Ball on YouTube">The Ball on YouTube</a></li>-->
<li><a href="http://linkedin.com/company/spirit-of-football-cic" class="linkedin_icon" title="Find us on LinkedIn">Find us on LinkedIn</a></li>
<li><a href="http://twitter.com/the_ball" class="twitter_icon" title="Find us on Twitter">Find us on Twitter</a></li>
<li><a href="http://www.facebook.com/theball.tv" class="facebook_icon" title="Find us on Facebook">Find us on Facebook</a></li>
</ul>

</div><!-- /join_in_top -->

</div><!-- /join_in -->

<?php include( get_template_directory().'/assets/includes/network-white.php' ); ?>

<p>&copy; <a href="http://www.spiritoffootball.com/">Spirit of Football CIC</a> 2002 &ndash; <?php echo date('Y'); ?></p>

</div>
</div>



</div><!-- /container -->



<?php //include( get_template_directory().'/assets/includes/analytics.php' ); ?>

<?php wp_footer(); ?>

</body>


</html>