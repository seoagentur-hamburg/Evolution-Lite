<?php
/**
 * The template for displaying search results pages.
 *
 * @package Evolution Framework
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php do_action( 'evolution_before_loop' ); ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Your Search Results for: %s', 'evolution' ), '<mark>' . get_search_query() . '</mark>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'list' ); ?>

			<?php endwhile; ?>
			
			<?php do_action( 'evolution_after_loop' ); ?>

			<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'evolution' ),
				'next_text'          => __( 'Next page', 'evolution' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'evolution' ) . ' </span>',
			) );
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
