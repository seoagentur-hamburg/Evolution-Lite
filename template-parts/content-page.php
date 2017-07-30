<?php
/**
 * The template used for displaying page content.
 *
 * @package Evolution Framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( ! get_post_meta( get_the_ID(), 'evolution_hide_page_title', true ) ) : ?>
	<header class="entry-header">
		<?php if( is_front_page() ) : ?>
		<h2 class="entry-title"><?php the_title(); ?></h2>
		<?php else : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'evolution' ), 'after'  => '</div>', 'pagelink' => '<span class="page-numbers">%</span>',  ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->