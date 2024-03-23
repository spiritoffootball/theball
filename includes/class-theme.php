<?php
/**
 * The Ball Theme Class.
 *
 * @since 2.4.4
 *
 * @package The_Ball
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * The Ball Theme Class.
 *
 * A class that encapsulates this theme's functionality.
 *
 * @since 2.4.4
 */
class SOF_The_Ball_Theme {

	/**
	 * Constructor.
	 *
	 * @since 2.4.4
	 */
	public function __construct() {

		// Bootstrap class.
		$this->include_files();
		$this->setup_objects();
		$this->register_hooks();

		/**
		 * Broadcast that this instance is loaded.
		 *
		 * @since 2.4.4
		 */
		do_action( 'sof/theme/the_ball/loaded' );

	}

	/**
	 * Include files.
	 *
	 * @since 2.4.4
	 */
	public function include_files() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && true === $done ) {
			return;
		}

		// Include global scope Theme Functions.
		include get_template_directory() . '/includes/functions-theme.php';
		include get_template_directory() . '/includes/functions-geomashup.php';

		// We're done.
		$done = true;

	}

	/**
	 * Set up this plugin's objects.
	 *
	 * @since 2.4.4
	 */
	public function setup_objects() {

		// Only do this once.
		static $done;
		if ( isset( $done ) && true === $done ) {
			return;
		}

		// We're done.
		$done = true;

	}

	/**
	 * Register hook callbacks.
	 *
	 * @since 2.4.4
	 */
	public function register_hooks() {

		// Define the annoying content width.
		add_action( 'after_setup_theme', [ $this, 'theme_content_width' ], 0 );

		// Set up this theme's defaults.
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );

		// Add CSS and JS with high priority so they are late in the queue.
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ], 1000 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 1000 );

		// Modify login styles.
		add_action( 'login_head', [ $this, 'login_styles' ] );

		// Modify the "More" link.
		add_filter( 'the_content_more_link', [ $this, 'more_link_wrap' ], 20 );
		add_filter( 'the_content_more_link', [ $this, 'more_link_jump_remove' ] );

		// Filter the next/previous links.
		//add_filter( 'previous_post_link', [ $this, 'next_previous_links_filter' ] );
		//add_filter( 'next_post_link', [ $this, 'next_previous_links_filter' ] );

		// Filter the Image Caption Shortcode's output.
		add_filter( 'img_caption_shortcode', [ $this, 'image_caption_shortcode_filter' ], 10, 3 );

		// Register Widget Areas.
		add_action( 'widgets_init', [ $this, 'widget_areas_register' ] );

		// Add filter for the above.
		add_filter( 'post_gallery', [ $this, 'gallery_shortcode_filter' ], 1011, 2 );

		// Add filter for the above.
		add_filter( 'the_author_posts_link', [ $this, 'author_posts_link_filter' ], 10, 1 );

		// Filter the Site Icon meta tag.
		//add_filter( 'site_icon_meta_tags', [ $this, 'site_icon_meta_tags' ], 10, 1 );

	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @since 2.2.2
	 *
	 * @global int $content_width
	 */
	public function theme_content_width() {

		/**
		 * Filter the annoying default content width.
		 *
		 * @since 2.2.2
		 *
		 * @param int The default content width.
		 * @return int The modified content width.
		 */
		$GLOBALS['content_width'] = apply_filters( 'theball_content_width', 660 );

	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this method is hooked into the "after_setup_theme" hook, which
	 * runs before the "init" hook. The "init" hook is too late for some features,
	 * such as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 */
	public function theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be added to the /languages/ directory of the child theme.
		 */
		load_theme_textdomain(
			'theball',
			get_template_directory() . '/languages'
		);

		// Use Featured Images - also known as post thumbnails.
		add_theme_support( 'post-thumbnails' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		// Let JetPack handle infinite scroll.
		add_theme_support( 'infinite-scroll', [
			//'type' => 'click',
			'type' => 'scroll',
			//'footer_widgets' => false,
			'container' => 'main_column_inner',
			'footer' => false,
			//'wrapper' => true,
			//'render' => false,
			//'posts_per_page' => false,
		] );
		*/

		// To use wp_nav_menu() we first need to register some.
		register_nav_menu( 'theball_global_menu', __( 'Global Menu', 'theball' ) );
		register_nav_menu( 'theball_menu', __( 'Table of Contents', 'theball' ) );

		/**
		 * Broadcast that this theme has been set up.
		 *
		 * @since 2.4.4
		 */
		do_action( 'sof/theme/the_ball/theme/setup' );

	}

	/**
	 * Add our theme's CSS stylesheets.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		// Enqueue screen styles.
		wp_enqueue_style(
			'theball_screen_css',
			get_template_directory_uri() . '/assets/css/screen.css',
			[], // Dependencies.
			THEBALL_VERSION, // Version.
			'all' // Media.
		);

		// On main site.
		if ( is_main_site() ) {

			// Add main site styles.
			wp_enqueue_style(
				'theball_main_css',
				get_template_directory_uri() . '/assets/css/main.css',
				[ 'theball_screen_css' ], // Dependencies.
				THEBALL_VERSION, // Version.
				'all' // Media.
			);

			// On network home.
			if ( is_front_page() ) {

				// Add homepage styles.
				wp_enqueue_style(
					'theball_home_css',
					get_template_directory_uri() . '/assets/css/home.css',
					[ 'theball_main_css' ], // Dependencies.
					THEBALL_VERSION, // Version.
					'all' // Media.
				);

			}

		}

		// Add print CSS.
		wp_enqueue_style(
			'theball_print_css',
			get_template_directory_uri() . '/assets/css/print.css',
			[ 'theball_screen_css' ], // Dependencies.
			THEBALL_VERSION, // Version.
			'print' // Media.
		);

	}

	/**
	 * Add our theme's JavaScript files.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		// Navigation script.
		wp_enqueue_script(
			'theball_navigation',
			get_template_directory_uri() . '/assets/js/navigation.js',
			[],
			THEBALL_VERSION,
			true
		);

		// Add responsive videos script.
		wp_enqueue_script(
			'theball_fitvids',
			get_template_directory_uri() . '/assets/js/jquery.fitvids.js',
			[ 'jquery' ],
			THEBALL_VERSION,
			true
		);

		// Theme javascript.
		wp_enqueue_script(
			'theball_general',
			get_template_directory_uri() . '/assets/js/the-ball.js',
			[ 'theball_fitvids' ],
			THEBALL_VERSION,
			true
		);

		// Include on network home.
		if ( is_main_site() && is_front_page() ) {
			// Nothing yet.
		}

		// Is it a commentable Post?
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Include login stylesheet.
	 *
	 * @since 1.0.0
	 */
	public function login_styles() {

		// Add login style overrides if our stylesheet is present.
		$filepath = get_template_directory() . '/assets/css/login.css';
		if ( ! file_exists( $filepath ) ) {
			return;
		}

		echo '<!-- custom login styles -->' . "\n";
		// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet
		echo '<link rel="stylesheet" type="text/css" media="screen" href="' . get_template_directory_uri() . '/assets/css/login.css" />' . "\n\n";

	}

	/**
	 * Wrap more link in a paragraph of its own.
	 *
	 * @since 1.0.0
	 *
	 * @param string $link The existing more link.
	 * @return string $link The modified more link.
	 */
	public function more_link_wrap( $link ) {

		// Wrap in para tag.
		$link = '<p>' . $link . '</p>';

		// --<
		return $link;

	}

	/**
	 * Disable more link jump.
	 *
	 * @see https://codex.wordpress.org/Customizing_the_Read_More
	 *
	 * @since 1.0.0
	 *
	 * @param string $link The existing more jump link.
	 * @return string $link The modified more jump link.
	 */
	public function more_link_jump_remove( $link ) {

		$offset = strpos( $link, '#more-' );

		if ( $offset ) {
			$end = strpos( $link, '"', $offset );
		}

		if ( $end ) {
			$link = substr_replace( $link, '', $offset, $end - $offset );
		}

		// --<
		return $link;

	}

	/**
	 * Utility to add button class to blog navigation links.
	 *
	 * Note: Unused at present.
	 *
	 * @since 1.0.0
	 *
	 * @param string $link The existing link.
	 * @return string $link The modified link.
	 */
	public function next_previous_links_filter( $link ) {

		// Add CSS class.
		$link = str_replace( '<a ', '<a class="css_btn" ', $link );

		// --<
		return $link;

	}

	/**
	 * Modify caption shortcode output.
	 *
	 * @since 1.0.0
	 *
	 * @param string $empty The existing caption.
	 * @param array  $attr Attributes attributed to the shortcode.
	 * @param string $content Optional. Shortcode content.
	 * @return string $caption The customised caption.
	 */
	public function image_caption_shortcode_filter( $empty, $attr, $content ) {

		// Get our shortcode vars.
		extract( shortcode_atts( [
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => '',
		], $attr ) );

		if ( 1 > (int) $width || empty( $caption ) ) {
			return $content;
		}

		// Sanitise id.
		if ( $id ) {
			$id = 'id="' . esc_attr( $id ) . '" ';
		}

		// Add space prior to alignment.
		$_alignment = ' ' . esc_attr( $align );

		// Get width.
		$_width = ( 0 + (int) $width );

		// Construct.
		$caption = '<div class="captioned_image' . $_alignment . '" style="width: ' . $_width . 'px"><span ' . $id . ' class="wp-caption">'
		. do_shortcode( $content ) . '</span><small class="wp-caption-text">' . $caption . '</small></div>';

		// --<
		return $caption;

	}

	/**
	 * Register our widget areas.
	 *
	 * @since 1.0.0
	 */
	public function widget_areas_register() {

		// Define an area where a widget may be placed.
		register_sidebar( [
			'name'          => __( 'Home Top Left', 'theball' ),
			'id'            => 'sof-top-left',
			'description'   => __( 'A widget area at the top left of the homepage', 'theball' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		] );

		// Define an area where a widget may be placed.
		register_sidebar( [
			'name'          => __( 'Home Top Right', 'theball' ),
			'id'            => 'sof-top-right',
			'description'   => __( 'A widget area at the top right of the homepage', 'theball' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		] );

		// Define an area where a widget may be placed.
		register_sidebar( [
			'name'          => __( 'Home Top Sub', 'theball' ),
			'id'            => 'sof-top-sub',
			'description'   => __( 'A widget area just below the top of the homepage', 'theball' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		] );

		// Define an area where a widget may be placed.
		register_sidebar( [
			'name'          => __( 'Home Middle Left', 'theball' ),
			'id'            => 'sof-middle-left',
			'description'   => __( 'A widget area in the middle left of the homepage', 'theball' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		] );

		// Define an area where a widget may be placed.
		register_sidebar( [
			'name'          => __( 'Home Middle Right', 'theball' ),
			'id'            => 'sof-middle-right',
			'description'   => __( 'A widget area in the middle right of the homepage', 'theball' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		] );

		// Define an area where a widget may be placed.
		register_sidebar( [
			'name'          => __( 'Page Top Right', 'theball' ),
			'id'            => 'sof-top-right-page',
			'description'   => __( 'A widget area at the top right of a single page', 'theball' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		] );

	}

	/**
	 * Filter the gallery shortcode after Jetpack does.
	 *
	 * @since 1.0.0
	 *
	 * @param string $markup The gallery markup.
	 * @param array  $attr The shortcode attributes array.
	 * @return string $markup The modified gallery markup.
	 */
	public function gallery_shortcode_filter( $markup, $attr ) {

		// Bail if there's no markup.
		if ( empty( $markup ) ) {
			return $markup;
		}

		// Stop Fancybox from triggering.
		$markup = str_replace( '<a ', '<a class="nolightbox" ', $markup );

		// --<
		return $markup;

	}

	/**
	 * Filter the author link to accommodate Co-Authors Plus.
	 *
	 * @since 2.3.2
	 *
	 * @param string $link The existing link HTML.
	 * @return string $link The modified link HTML.
	 */
	public function author_posts_link_filter( $link ) {

		// Bail if no Co-Authors Plus.
		if ( ! function_exists( 'get_coauthors' ) ) {
			return $link;
		}

		// Get multiple authors.
		$authors = get_coauthors();

		// Bail if none.
		if ( empty( $authors ) ) {
			return $link;
		}

		// Construct in the form "name, name, name & name".
		$link = '';

		// Init counter.
		$n = 1;

		// Find out how many author we have.
		$author_count = count( $authors );

		// Loop.
		foreach ( $authors as $author ) {

			// Default to comma.
			$sep = ', ';

			// Use ampersand if we're on the penultimate.
			if ( $n == ( $author_count - 1 ) ) {
				$sep = ' &amp; ';
			}

			// If we're on the last, don't add.
			if ( $n == $author_count ) {
				$sep = '';
			}

			// Construct link.
			$link .= sprintf( '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
				esc_url( get_author_posts_url( $author->ID, $author->user_nicename ) ),
				/* translators: %s: author's display name */
				esc_attr( sprintf( __( 'Posts by %s', 'theball' ), $author->display_name ) ),
				esc_html( $author->display_name )
			);

			// And separator.
			$link .= $sep;

			// Increment.
			$n++;

		}

		// --<
		return $link;

	}

	/**
	 * Filters the site icon meta tags.
	 *
	 * To make this work, upload both black *and* white logos and leave the white
	 * logo in place. This function will replace the favicons with the black versions.
	 *
	 * @since 2.4.2
	 *
	 * @param array $meta_tags Existing Site Icon meta elements.
	 * @return array $meta_tags Modified Site Icon meta elements.
	 */
	public function site_icon_meta_tags( $meta_tags ) {

		// Bail if none.
		if ( empty( $meta_tags ) ) {
			return $meta_tags;
		}

		// Loop through them and replace white with black icons.
		foreach ( $meta_tags as $key => $meta_tag ) {
			if ( false !== strpos( $meta_tag, 'rel="icon"' ) ) {
				$meta_tags[ $key ] = str_replace( 'white', 'black', $meta_tag );
			}
		}

		// --<
		return $meta_tags;

	}

	/**
	 * Customise the display of comments.
	 *
	 * @since 1.0.0
	 *
	 * @param string $comment The comment.
	 * @param array  $args The comment arguments.
	 * @param int    $depth The comment depth.
	 */
	public function comment_markup( $comment, $args, $depth ) {

		// Enable WordPress API on comment.
		$GLOBALS['comment'] = $comment;

		?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

			<div class="comment-wrapper">

			<div id="comment-<?php comment_ID(); ?>">

			<div class="comment-identifier clearfix">

			<?php echo get_avatar( $comment, '50' ); ?>

			<?php edit_comment_link( __( 'Edit comment', 'theball' ), '<span class="alignright">', '</span>' ); ?>

			<cite class="fn"><?php echo get_comment_author_link(); ?></cite>

			<a class="comment_permalink" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'theball' ), get_comment_date(), get_comment_time() ); ?></a>

			</div><!-- /comment-identifier -->

			<div class="comment-content">

			<?php if ( $comment->comment_approved == '0' ) { ?>
			<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'theball' ); ?></em></p>
			<?php } ?>

			<?php comment_text(); ?>

			</div><!-- /comment-content -->

			<div class="reply">

			<?php

			// Use comment_reply_link.
			echo comment_reply_link( array_merge(
				$args,
				[
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
				]
			) );

			?>

			</div><!-- /reply -->

			</div><!-- /comment-<?php comment_ID(); ?> -->

			</div><!-- /comment-wrapper -->

		<?php

	}

} // Class ends.
