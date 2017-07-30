<?php
/**
 * The template used for displaying single post.
 *
 * @package Evolution Framework
 */
?>

<div class="post-full post-full-summary">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php do_action( 'evolution_before_title' ); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php evolution_entry_meta(); ?>
			<?php do_action( 'evolution_after_title' ); ?>
			<?php if ( has_post_thumbnail() ): ?>
			<div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
			<?php endif; ?>
           <?php if (get_theme_mod("share-buttons") == 'checked') : ?>
            <?php evolution_share_buttons(); ?>
            <?php endif; ?>
            <?php do_action( 'evolution_after_thumbnail' ); ?>			
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array(	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evolution' ), 'after'  => '</div>', 'pagelink' => '<span class="page-numbers">%</span>',  ) ); ?>
		</div><!-- .entry-content -->

		<?php if ( get_the_tags() ) : ?>
		<div class="tags-links">
			Tags: <?php the_tags( '', esc_html__( ', ', 'evolution' ) ); ?>
		</div>
		<?php endif; // End if $the_tags ?>

		<?php do_action( 'evolution_after_content' ); ?>

	</article><!-- #post-## -->
</div><!-- .post-full -->

<?php evolution_post_nav(); ?>

<?php if ( class_exists( 'Jetpack_RelatedPosts' ) ) : ?>
	<?php echo do_shortcode( '[jetpack-related-posts]' ); ?>
<?php endif; ?>
