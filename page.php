<?php
/**
 * The template for displaying all pages.
 *
 * @package Evolution Framework
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
		<?php do_action( 'evolution_before_loop' );

            do_action( 'evolution_page' );
		
		    do_action( 'evolution_after_loop' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
