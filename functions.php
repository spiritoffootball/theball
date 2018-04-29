<?php /*
================================================================================
Theme Functions
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/



/**
 * Define a version for this theme, so that updates refresh stylesheets.
 *
 * @since 1.0
 */
define( 'THEBALL_VERSION', '2.4' );



if ( ! function_exists( 'theball_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override theball_setup() in a child theme, add your own theball_setup to your
 * child theme's functions.php file. To augment it, just define your own setup function.
 *
 * @since 1.0
 */
function theball_setup() {

	/*
	 * Make theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory of the child theme.
	 */
	load_theme_textdomain(
		'theball',
		get_template_directory() . '/languages'
	);

	// use Featured Images (also known as post thumbnails)
	add_theme_support( 'post-thumbnails' );

	// to use wp_nav_menu() we first need to register one
	register_nav_menu( 'theball_menu', __( 'Table of Contents', 'theball' ) );

}

endif; // theball_setup

// add an action for the above
add_action( 'after_setup_theme', 'theball_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since 2.2.2
 *
 * @global int $content_width
 */
function theball_content_width() {

	// the annoying default content width
	$GLOBALS['content_width'] = apply_filters( 'theball_content_width', 660 );

}

// add an action for the above
add_action( 'after_setup_theme', 'theball_content_width', 0 );



if ( ! function_exists( 'theball_enqueue_scripts_and_styles' ) ) :
/**
 * Add front-end screen styles.
 *
 * @since 1.0
 */
function theball_enqueue_scripts_and_styles() {

	// -------------------------------------------------------------------------
	// Stylesheets
	// -------------------------------------------------------------------------

	// register reset
	wp_register_style(
		'theball_reset_css', // unique id
		get_template_directory_uri() . '/assets/css/reset.css', // src
		array(), // dependencies
		THEBALL_VERSION, // version
		'all' // media
	);

	// init
	$dev = '';

	// check for dev
	if ( defined( 'SCRIPT_DEBUG' ) AND SCRIPT_DEBUG === true ) {
		//$dev = '.dev';
	}

	// add layout css
	wp_enqueue_style(
		'theball_screen_css',
		get_template_directory_uri() . '/assets/css/screen' . $dev . '.css',
		array( 'theball_reset_css' ),
		THEBALL_VERSION, // version
		'all' // media
	);

	// include on main site
	if ( is_main_site() ) {

		// add homepage css
		wp_enqueue_style(
			'theball_main_css',
			get_template_directory_uri() . '/assets/css/main' . $dev . '.css',
			array( 'theball_screen_css' ),
			THEBALL_VERSION, // version
			'all' // media
		);

		// include on network home
		if ( is_front_page() ) {

			// add homepage css
			wp_enqueue_style(
				'theball_home_css',
				get_template_directory_uri() . '/assets/css/home' . $dev . '.css',
				array( 'theball_main_css' ),
				THEBALL_VERSION, // version
				'all' // media
			);

			/*
			// add homepage css
			wp_enqueue_style(
				'theball_countdown_css',
				get_template_directory_uri() . '/assets/css/countdown' . $dev . '.css',
				array( 'theball_home_css' ),
				THEBALL_VERSION, // version
				'all' // media
			);
			*/

		}

	}

	// -------------------------------------------------------------------------
	// Overrides for styles - for child themes, dequeue these and add you own
	// -------------------------------------------------------------------------

	/*
	// add Google Webfont "Lato"
	wp_enqueue_style(
		'theball_webfont_css',
		'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic',
		array( 'theball_layout_css' ),
		null, // no version, thanks
		null // no media, thanks
	);

	// add colours css
	wp_enqueue_style(
		'theball_colours_css',
		get_template_directory_uri() . '/assets/css/colours-01' . $dev . '.css',
		array( 'theball_webfont_css' ),
		THEBALL_VERSION, // version
		'all' // media
	);
	*/

	// -------------------------------------------------------------------------
	// Javascript
	// -------------------------------------------------------------------------

	// navigation script
	wp_enqueue_script(
		'theball_navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		THEBALL_VERSION,
		true
	);

	/*
	// utility script
	wp_enqueue_script(
		'theball_general',
		get_template_directory_uri() . '/assets/js/the-ball.js',
		array( 'jquery' ),
		THEBALL_VERSION
	);
	*/

	// include on network home
	if ( is_main_site() AND is_front_page() ) {

		/*
		// add our countdown javascript
		wp_enqueue_script(
			'theball_countdown',
			get_template_directory_uri() . '/assets/js/countdown.js',
			array( 'jquery' ),
			THEBALL_VERSION
		);

		// add our countdown init javascript
		wp_enqueue_script(
			'theball_countdown_init',
			get_template_directory_uri() . '/assets/js/countdown-init.js',
			array( 'theball_countdown' ),
			THEBALL_VERSION
		);
		*/

	}

	// is it a post?
	if ( is_single() ) {

		// js is...
		$move_form_js = 'assets/js/move_form.js';

		// is it there?
		$path = check_file_is_present( $move_form_js );

		// add our javascript
		wp_enqueue_script(
			'theball_move_form',
			get_template_directory_uri() . '/' . $move_form_js,
			array( 'jquery' ),
			THEBALL_VERSION
		);

	}

}
endif; // theball_enqueue_scripts_and_styles

// add a filter for the above, very late so it (hopefully) is last in the queue
add_action( 'wp_enqueue_scripts', 'theball_enqueue_scripts_and_styles', 100 );



if ( ! function_exists( 'theball_enqueue_print_styles' ) ):
/**
 * Add front-end print styles.
 *
 * @since 1.0
 */
function theball_enqueue_print_styles() {

	// init
	$dev = '';

	// check for dev
	if ( defined( 'SCRIPT_DEBUG' ) AND SCRIPT_DEBUG === true ) {
		//$dev = '.dev';
	}

	// -------------------------------------------------------------------------
	// Print stylesheet included last
	// -------------------------------------------------------------------------

	// add print css
	wp_enqueue_style(
		'theball_print_css',
		get_template_directory_uri() . '/assets/css/print' . $dev . '.css',
		array( 'theball_screen_css' ), // dependencies
		THEBALL_VERSION, // version
		'print' // media
	);

}
endif; // theball_enqueue_print_styles

// add a filter for the above, even later so it (hopefully) is last in the queue
add_action( 'wp_enqueue_scripts', 'theball_enqueue_print_styles', 110 );



/**
 * Get admin stylesheet.
 *
 * @since 1.0
 */
function cmw_add_admin_style() {

	// construct path to admin.css
	$filepath = get_template_directory() . '/assets/css/admin.css';

	// is our stylesheet present?
	if ( file_exists( $filepath ) ) {

		// add admin style overrides
		echo '<!-- custom admin styles -->
<link rel="stylesheet" type="text/css" media="screen" href="' . get_bloginfo( 'template_url' ) . '/assets/css/admin.css" />
' . "\n\n";

	}

}

// modify admin styles
//add_action( 'admin_head', 'cmw_add_admin_style' );



/**
 * Include login stylesheet,
 *
 * @since 1.0
 */
function cmw_add_login_style() {

	// construct path to admin.css
	$filepath = get_template_directory() . '/assets/css/login.css';

	// is our stylesheet present?
	if ( file_exists( $filepath ) ) {

		// add login style overrides
		echo '<!-- custom login styles -->
<link rel="stylesheet" type="text/css" media="screen" href="' . get_bloginfo( 'template_url' ) . '/assets/css/login.css" />
' . "\n\n";

	}

}

// modify login styles
add_action( 'login_head', 'cmw_add_login_style' );



/**
 * Utility to check for presence of vital files.
 *
 * @since 1.0
 *
 * @param string $file The name of the file
 * @return string $filepath The absolute path to file
 */
function check_file_is_present( $file ) {

	// construct path to our requested file
	$filepath = get_template_directory() . '/' . $file;

	// die if the file isn't there
	if ( ! is_file( $filepath ) ) {
		die( 'File "' . $filepath . '" is missing from the theme directory.' );
	}

	// --<
	return $filepath;

}



/**
 * Disable more link jump.
 *
 * @see http://codex.wordpress.org/Customizing_the_Read_More
 *
 * @since 1.0
 *
 * @param string $link The existing more jump link
 * @return string $link The modified more jump link
 */
function remove_more_jump_link( $link ) {

	$offset = strpos( $link, '#more-' );

	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}

	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}

	// --<
	return $link;

}

// add a filter for the above
add_filter( 'the_content_more_link', 'remove_more_jump_link' );



/**
 * Wrap more link in a paragraph of its own.
 *
 * @since 1.0
 *
 * @param string $link The existing more link
 * @return string $link The modified more link
 */
function theball_more_link( $link ) {

	// wrap in para tag
	$link = '<p>' . $link . '</p>';

	// --<
	return $link;

}

// add a filter for the above
add_filter( 'the_content_more_link', 'theball_more_link', 20, 1 );



/**
 * Utility to add button css class to blog nav links.
 *
 * @since 1.0
 *
 * @param string $link The existing add jump link
 * @return string $link The modified add jump link
 */
function theball_add_link_css( $link ) {

	// add css
	$link = str_replace( '<a ', '<a class="css_btn" ', $link );

	// --<
	return $link;

}

// add filter for next/previous links
//add_filter( 'previous_post_link', 'theball_add_link_css' );
//add_filter( 'next_post_link', 'theball_add_link_css' );



/**
 * Modify caption shortcode output.
 *
 * @since 1.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string $caption The customised caption.
 */
function theball_image_caption_shortcode( $empty = null, $attr, $content ) {

	// get our shortcode vars
	extract( shortcode_atts( array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr) );

	if ( 1 > (int) $width || empty( $caption ) ) {
		return $content;
	}

	// sanitise id
	if ( $id ) $id = 'id="' . esc_attr( $id ) . '" ';

	// add space prior to alignment
	$_alignment = ' ' . esc_attr( $align );

	// get width
	$_width = ( 0 + (int) $width );

	// construct
	$caption = '<div class="captioned_image' . $_alignment . '" style="width: ' . $_width . 'px"><span ' . $id . ' class="wp-caption">'
	. do_shortcode( $content ) . '</span><small class="wp-caption-text">' . $caption . '</small></div>';

	// --<
	return $caption;

}

// add a filter for the above
add_filter( 'img_caption_shortcode', 'theball_image_caption_shortcode', 10, 3 );



/**
 * Utility to concatenate names.
 *
 * @since 1.0
 *
 * @param string $forename The forename.
 * @param string $surname The surname.
 * @return string $fullname The concatenated full name.
 */
function theball_get_full_name( $forename, $surname ) {

	// init return
	$fullname = '';

	// add forename
	if ( $forename != '' ) { $fullname .= $forename; }

	// add surname
	if ( $surname != '' ) { $fullname .= ' ' . $surname; }

	// strip any whitespace
	$fullname = trim( $fullname );

	// --<
	return $fullname;

}



/**
 * Custom comments display function.
 *
 * @since 1.0
 *
 * @param string $comment The comment.
 * @param array $args The comment arguments.
 * @param int $depth The comment depth.
 */
function theball_comments( $comment, $args, $depth ) {

	// enable Wordpress API on comment
	$GLOBALS['comment'] = $comment;

	// -------------------------------------------------------------------------
	// Comment HTML
	// -------------------------------------------------------------------------
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<div class="comment-wrapper">

		<div id="comment-<?php comment_ID(); ?>">

		<div class="comment-identifier clearfix">

		<?php echo get_avatar( $comment, $size='50' ); ?>

		<?php edit_comment_link( __( 'Edit comment', 'theball' ), '<span class="alignright">', '</span>' ); ?>

		<?php printf( __( '<cite class="fn">%s</cite>', 'theball' ), get_comment_author_link() ); ?>

		<a class="comment_permalink" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'theball' ), get_comment_date(),  get_comment_time()) ?></a>

		</div><!-- /comment-identifier -->

		<div class="comment-content">

		<?php if ( $comment->comment_approved == '0' ) { ?>
		<p><em><?php _e( 'Your comment is awaiting moderation.', 'theball' ); ?></em></p>
		<?php } ?>

		<?php comment_text() ?>

		</div><!-- /comment-content -->

		<div class="reply">

		<?php

		// comment_reply_link
		echo comment_reply_link(
			array_merge(
				$args,
				array(
					'depth' => $depth,
					'max_depth' => $args['max_depth']
				)
			)
		);

		?>

		</div><!-- /reply -->

		</div><!-- /comment-<?php comment_ID(); ?> -->

		</div><!-- /comment-wrapper -->

<?php

} // end function



if ( ! function_exists( 'theball_multipager' ) ):
/**
 * Adds some style to multipager elements
 *
 * @since 1.0
 *
 * @return string $page_links The multipager page links.
 */
function theball_multipager() {

	// set default behaviour
	$defaults = array(
		'before' => '<div class="multipager">',
		'after' => '</div>',
		'link_before' => '',
		'link_after' => '',
		'next_or_number' => 'next',
		'nextpagelink' => '<span class="alignright">' . __( 'Next page','theball' ) . ' &raquo;</span>',
		'previouspagelink' => '<span class="alignleft">&laquo; ' . __( 'Previous page','theball' ) . '</span>',
		'pagelink' => '%',
		'more_file' => '',
		'echo' => 0,
	);

	// get page links
	$page_links = wp_link_pages( $defaults );

	// add separator when there are two links
	$page_links = str_replace(
		'a><a',
		'a> <span class="multipager_sep">|</span> <a',
		$page_links
	);

	// get page links
	$page_links .= wp_link_pages( array(
		'before' => '<div class="multipager multipager_all"><span>' . __( 'Pages: ','theball' ) . '</span>',
		'after' => '</div>',
		'pagelink' => '<span class="multipager_link">%</span>',
		'echo' => 0
	) );

	// --<
	return $page_links;

}
endif; // theball_multipager



if ( ! function_exists( 'theball_widgets_init' ) ):
/**
 * Register our widgets.
 *
 * @since 1.0
 */
function theball_widgets_init() {

	// define an area where a widget may be placed
	register_sidebar( array(
		'name' => __( 'SOF Homepage Top Main', 'theball' ),
		'id' => 'sof-home-top-main',
		'description' => __( 'A widget area at the top of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// define an area where a widget may be placed
	register_sidebar( array(
		'name' => __( 'SOF Homepage Top Right', 'theball' ),
		'id' => 'sof-home-top-right',
		'description' => __( 'A widget area at the top of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// define an area where a widget may be placed
	register_sidebar( array(
		'name' => __( 'SOF Homepage Top Sub', 'theball' ),
		'id' => 'sof-home-top-sub',
		'description' => __( 'A widget area at the top of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// define an area where a widget may be placed
	register_sidebar( array(
		'name' => __( 'SOF Homepage Social Column', 'theball' ),
		'id' => 'sof-home-middle',
		'description' => __( 'A widget area in the middle of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// define an area where a widget may be placed
	register_sidebar( array(
		'name' => __( 'SOF Homepage About Column', 'theball' ),
		'id' => 'sof-home-middle-right',
		'description' => __( 'A widget area in the middle right of the site home page', 'theball' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// widget definitions
	require( get_template_directory() . '/assets/widgets/widgets.php' );

	// and the widget
	register_widget( 'The_Ball_Widget' );

}
endif; // theball_widgets_init

// add action for the above
add_action( 'widgets_init', 'theball_widgets_init' );




if ( ! function_exists( 'theball_gallery_shortcode' ) ):
/**
 * Filter the gallery shortcode after Jetpack does.
 *
 * @since 1.0
 */
function theball_gallery_shortcode( $a, $b ) {

	// stop Fancybox from triggering
	return str_replace( '<a ', '<a class="nolightbox" ', $a );

}
endif;

// add filter for the above
add_filter( 'post_gallery', 'theball_gallery_shortcode', 1011, 2 );



if ( ! function_exists( 'theball_geomashup_map_link_get' ) ):
/**
 * Get a link to the map if the current post has a location set.
 *
 * @since 2.3.2
 */
function theball_geomashup_map_link_get() {

	// disable
	return;

	// init
	$map_link = '';

	// do we have the plugin and some coordinates?
	if ( class_exists( 'GeoMashup' ) ) {
		if ( GeoMashup::current_location( null, 'post' ) ) {
			$map_link = ' <a href="#geomap">here</a>';
		}
	}

	// --<
	return $map_link;

}
endif;



if ( ! function_exists( 'theball_geomashup_map_get' ) ):
/**
 * Show the map for a post.
 *
 * @since 2.3.2
 */
function theball_geomashup_map_get() {

	// do we have the plugin and some coordinates?
	if ( class_exists( 'GeoMashup' ) ) {
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

}
endif;



if ( ! function_exists( 'theball_author_posts_link' ) ):
/**
 * Filter the author link to accommodate Co-Authors Plus.
 *
 * @since 2.3.2
 *
 * @param string $link HTML link.
 */
function theball_author_posts_link( $link ) {

	// bail if no Co-Authors Plus
	if ( ! function_exists( 'get_coauthors' ) ) return $link;

	// get multiple authors
	$authors = get_coauthors();

	// bail if none
	if ( empty( $authors ) ) return $link;

	// construct in the form "name, name, name & name"
	$link = '';

	// init counter
	$n = 1;

	// find out how many author we have
	$author_count = count( $authors );

	// loop
	foreach( $authors AS $author ) {

		// default to comma
		$sep = __( ', ', 'theball' );

		// use ampersand if we're on the penultimate
		if ( $n == ( $author_count - 1 ) ) {
			$sep = __( ' &amp; ', 'theball' );
		}

		// if we're on the last, don't add
		if ( $n == $author_count ) $sep = '';

		// construct link
		$link .= sprintf( '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
			esc_url( get_author_posts_url( $author->ID, $author->user_nicename ) ),
			/* translators: %s: author's display name */
			esc_attr( sprintf( __( 'Posts by %s' ), $author->display_name ) ),
			esc_html( $author->display_name )
		);

		// and separator
		$link .= $sep;

		// increment
		$n++;

	}

	// --<
	return $link;

}
endif;

// add filter for the above
add_filter( 'the_author_posts_link', 'theball_author_posts_link', 10, 1 );



