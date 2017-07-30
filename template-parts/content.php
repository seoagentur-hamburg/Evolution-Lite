<?php
/**
 * @package Evolution Framework
 */
?>

<div class="post-full post-full-summary">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php evolution_entry_meta(); ?>
			<?php do_action( 'evolution_after_title' ); ?>
			<?php if ( has_post_thumbnail() ): ?>
			<div class="post-thumbnail">
			<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
			<div class="featured"><?php esc_html_e( 'Featured', 'evolution' ); ?></div>
			<?php endif; ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div><!-- .post-thumbnail -->
			<?php endif; ?>
           <?php if (get_theme_mod("share-buttons") == 'checked') : ?>
            <?php evolution_share_buttons(); ?>
            <?php endif; ?>
        <?php do_action( 'evolution_after_thumbnail' ); ?>
		</header><!-- .entry-header -->
		
		<?php evolution_excerpt(); ?>
		
		<div class="entry-content">
		
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'evolution' ),
				get_the_title()
			) );

        wp_link_pages( array(	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evolution' ), 'after'  => '</div>', 'pagelink' => '<span class="page-numbers">%</span>',  ) );
		?>
		
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
</div><!-- .post-full -->