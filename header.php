<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Evolution Framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'evolution' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="site-branding">
		<div class="evo-one-half">
		<?php evolution_logo(); ?>
		<?php evolution_site_title(); ?>
		<?php if ( ! get_theme_mod( 'evolution_hide_blogdescription' ) ) : ?>
			<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		<?php endif; ?>
            </div><!-- .evo-one-half -->
            <div class="evo-one-half evo-column-last">
				<div class="header-widget-area">
					<?php dynamic_sidebar( 'header-right' ); ?>
				</div><!-- .header-widget-area -->
            </div><!-- .evo-one-half.evo-column-last -->
            </div><!-- .site-branding -->

		<?php if ( ! get_theme_mod( 'evolution_hide_navigation' ) ) : ?>
		<div class="clear"></div>
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle"><span class="menu-text"><?php esc_html_e( 'Menu', 'evolution' ); ?></span></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php if ( ! get_theme_mod( 'evolution_hide_search' ) ) : ?>
			<?php get_search_form(); ?>
			<?php endif; ?>
		</nav><!-- #site-navigation -->
		<?php endif; ?>

		<?php if ( is_page() && has_post_thumbnail() ) : ?>
		<div id="header-image" class="header-image">
			<?php the_post_thumbnail( 'evolution-page-thumbnail' ); ?>
		</div><!-- #header-image -->
		<?php elseif ( ( get_header_image() && 'site' == get_theme_mod( 'evolution_header_display' ) ) ||
		               ( get_header_image() && 'page' == get_theme_mod( 'evolution_header_display' ) && is_page() ) ||
		               ( get_header_image() && 'page' != get_theme_mod( 'evolution_header_display' ) && is_home() ) ) : ?>
		<div id="header-image" class="header-image">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</div><!-- #header-image -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	
	<?php do_action( 'evolution_after_header' ); ?>
	
	<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<div id="breadcrumbs">','</div>' ); } ?>
