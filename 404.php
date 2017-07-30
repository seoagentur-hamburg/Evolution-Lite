<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Evolution Framework
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404 - That page can&rsquo;t be found.', 'evolution' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'evolution' ); ?></p>

                <aside class="widget widget_search">
					<?php get_search_form(); ?>
                </aside>
                
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
