<?php /*
================================================================================
Comments Template
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

--------------------------------------------------------------------------------
*/

// Do not delete these lines.
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) AND 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly. Thanks!' );
}

// If there's a password.
if ( post_password_required() ) { ?>
	<div id="comments_wrapper" class="no_comments">
		<h3 class="nocomments">Enter the password to view comments</h3>
	</div><!-- /comments_wrapper -->
	<?php return;
}

// This variable is for alternating comment background.
$oddcomment = 'class="alt" ';

?><!-- comments.php -->

<?php if ( have_comments() ) : ?>

	<div id="comments_wrapper">

		<h3><?php comments_number(
			__( '<span>0</span> comments on this post', 'theball' ),
			__( '<span>1</span> comment on this post', 'theball' ),
			__( '<span>%</span> comments on this post', 'theball' )
		); ?></h3>

		<ol class="commentlist">

			<?php wp_list_comments( [
				// List comments params.
				'type'=> 'all', //'comment',
				'reply_text' => __( 'Reply to this comment', 'theball' ),
				'callback' => 'theball_comments',
			] ); ?>

		</ol>

	</div><!-- /comments_wrapper -->

<?php else : ?>

	<?php if ( 'open' == $post->comment_status ) : ?>

		<div id="comments_wrapper" class="no_comments">

			<h3 class="nocomments"><?php _e( 'No comments yet', 'theball' ); ?></h3>

			<p><?php _e( 'Be the first to leave one!', 'theball' ); ?></p>

		</div><!-- /comments_wrapper -->

	 <?php else : ?>

	 	<div id="comments_wrapper" class="no_comments">

			<h3 class="nocomments"><?php _e( 'Comments are closed', 'theball' ); ?></h3>

		</div><!-- /comments_wrapper -->

	<?php endif; ?>

<?php endif; ?>



<div id="respond_wrapper">
	<?php comment_form(); ?>
</div><!-- /respond_wrapper -->



