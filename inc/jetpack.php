<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package evolution
 */

/**
 * Add theme support for Infinite Scroll.
 */
function evolution_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'type'      => 'click',
		'render'    => 'evolution_infinite_scroll_render',
		'footer'    => false,
	) );
}
add_action( 'after_setup_theme', 'evolution_jetpack_setup' );



function evolution_infinite_scroll_render() {
	while ( have_posts() ) : the_post();
		if ( is_archive() || is_search() ) {
			get_template_part( 'content', 'list' );
		} else {
			get_template_part( 'content', get_theme_mod( 'evolution_content' ) );
		}
	endwhile;
}

/**
 * Change headline of Related Posts
 */
function evolution_remove_related_posts() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'evolution_remove_related_posts', 20 );



function evolution_related_posts_headline( $headline ) {
	$headline = sprintf(
				'<h2 class="jp-relatedposts-title">%s</h2>',
				esc_html__( 'You might also like', 'evolution' )
				);
	return $headline;
}
add_filter( 'jetpack_relatedposts_filter_headline', 'evolution_related_posts_headline' );