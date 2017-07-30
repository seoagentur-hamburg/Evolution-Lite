<?php
/**
 * @package Evolution Framework
 */
?>

<div class="post-list post-grid-list">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ): ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'evolution-post-thumbnail-medium' ); ?></a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>
		<div class="post-list-content">
			<header class="entry-header">
				<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
				<div class="featured"><?php esc_html_e( 'Featured', 'evolution' ); ?></div>
				<?php endif; ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php evolution_entry_meta(); ?>
			</header><!-- .entry-header -->
			<div class="entry-summary">
            <?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div><!-- .post-list-content -->
	</article><!-- #post-## -->
</div><!-- .post-list -->