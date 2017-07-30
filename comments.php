<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Evolution Framework
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php
				comments_number( '', esc_html__( '1 Comment', 'evolution' ), esc_html__( '% Comments', 'evolution' ) );
			?>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="comment-navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'evolution' ); ?></h3>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'evolution' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'evolution' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 100,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="comment-navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'evolution' ); ?></h3>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'evolution' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'evolution' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Sorry, Comments are closed.', 'evolution' ); ?></p>
	<?php endif; ?>
	
	<?php

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

    comment_form(
    	array(
    		'comment_field' => '<textarea id="comment" class="plain buffer" name="comment" rows="7" placeholder="' . esc_attr( __( 'Please be kind. Thank You!', 'evolution' ) ) . '" aria-required="true"></textarea>',
    		'fields' => array(
				'author' => '<div class="form-areas"><input id="author" class="author" name="author" type="text" placeholder="' . esc_attr( __( 'Your Name', 'evolution' ) ) . '" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" ' . $aria_req . '>',
				'email' => '<input id="email" class="email" name="email" type="text" placeholder="' . esc_attr( __( 'your@email.com', 'evolution' ) ) . '" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" ' . $aria_req . '>',
				'url' => '<input id="url" class="url" name="url" type="text" placeholder="' . esc_attr( __( 'Your Website', 'evolution' ) ) . '" value="' . esc_url( $commenter[ 'comment_author_url' ] ) . '"></div>'
			)
    	),
    	$post->ID
    );
    ?>

</div><!-- #comments -->
