<?php
/**
 * @package Evolution Framework
 */
?>

<div class="post-summary post-full-summary">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
			<div class="featured"><?php esc_html_e( 'Featured', 'evolution' ); ?></div>
			<?php endif; ?>
			<?php evolution_category(); ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php evolution_entry_meta(); ?>
			<?php if ( has_post_thumbnail() ): ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div><!-- .post-thumbnail -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>" rel="bookmark" class="continue-reading"><?php esc_html_e( 'Continue reading &rarr;', 'evolution' ); ?></a></p>
		</div><!-- .entry-summary -->
	</article><!-- #post-## -->
</div><!-- .post-summary -->