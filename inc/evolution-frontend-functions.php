<?php
/**
 * Custom frontend functions for Evolution
 *
 * @package Evolution Framework
 */


/**
 * Display logo image.
 */
if ( ! function_exists( 'evolution_logo' ) ) :

function evolution_logo() {
	if ( ! get_theme_mod( 'evolution_logo' ) ) {
		return;
	}
	$logo_tag = ( is_front_page() && get_theme_mod( 'evolution_replace_blogname' ) ) ? 'div' : 'div';
	$logo_alt = ( get_theme_mod( 'evolution_replace_blogname' ) ) ? get_bloginfo( 'name' ) : '';
	$logo_src = esc_url( get_theme_mod( 'evolution_logo' ) );
	if ( get_theme_mod( 'evolution_retina_logo' ) ) :
		list( $logo_width ) = getimagesize( $logo_src );
		$logo_width = round( $logo_width / 2 ); ?>
		<<?php echo esc_attr( $logo_tag ); ?> class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="<?php echo esc_attr( $logo_alt ); ?>" src="<?php echo esc_attr( $logo_src ); ?>" width="<?php echo esc_attr( $logo_width ); ?>" /></a></<?php echo esc_attr( $logo_tag ); ?>>
	<?php else: ?>
		<<?php echo esc_attr( $logo_tag ); ?> class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="<?php echo esc_attr( $logo_alt ); ?>" src="<?php echo esc_attr( $logo_src ); ?>" /></a></<?php echo esc_attr( $logo_tag ); ?>>
	<?php endif;
}
endif;


/**
 * Display site title.
 */
if ( ! function_exists( 'evolution_site_title' ) ) :

function evolution_site_title() {
	if ( get_theme_mod( 'evolution_logo' ) && get_theme_mod( 'evolution_replace_blogname' ) ) {
		return;
	}
	$title_tag = ( is_front_page() ) ? 'div' : 'div';
	?>
	<<?php echo esc_attr( $title_tag ); ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo esc_attr( $title_tag ); ?>>
	<?php
}
endif;


/**
 * Display categories.
 */
if ( ! function_exists( 'evolution_category' ) ) :

function evolution_category() {
	$categories = get_the_category();
	$i = 0;
	echo '<div class="cat-links"><i class="fa fa-folder-open" aria-hidden="true"></i> ';
	foreach( $categories as $category ) {
		if ( 0 !== $i++ ) {
			echo '<span class="category-sep">/</span>';
		}
		printf( '<a rel="category tag" href="%1$s" class="category category-%2$s">%3$s</a>',
			esc_url( get_category_link( $category->term_id ) ),
			esc_attr( $category->term_id ),
			esc_html( $category->name )
		);
	}
	echo '</div><!-- .cat-links -->';
	echo "\n";
}
endif;


/**
 * Display post header meta.
 */
if ( ! function_exists( 'evolution_entry_meta' ) ) :

function evolution_entry_meta() {
	// Hide for pages on Search.
	if ( 'post' != get_post_type() ) {
		return;
	}
	?>
	<div class="entry-meta"><i class="fa fa-clock-o" aria-hidden="true"></i> 
		<?php esc_html_e( 'Posted', 'evolution' ) ?>
		<span class="posted-on"><?php esc_html_e( 'on', 'evolution' ); ?>
		<?php printf( '<a href="%1$s" rel="bookmark"><time class="entry-date published updated" datetime="%2$s">%3$s</time></a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		); ?>
		</span>
		<span class="byline"><?php esc_html_e( 'by', 'evolution' ); ?>
			<span class="author vcard">
				<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php printf( esc_html__( 'View all posts by %s', 'evolution' ), get_the_author() );?>"><span class="author-name"><?php echo get_the_author();?></span></a> <?php esc_html_e( 'in', 'evolution' ); ?>&nbsp; <?php evolution_category(); ?>
			</span>
		</span>
		<?php if ( ! post_password_required() && comments_open() ) : ?>
			&nbsp;|&nbsp;<span class="entry-meta-sep"><i class="fa fa-comment" aria-hidden="true"></i></span>
			<span class="comments-link">
				<?php comments_popup_link( esc_html__( '0 Comments', 'evolution' ), esc_html__( '1 Comment', 'evolution' ), esc_html__( '% Comments', 'evolution' ) ); ?>
			</span>
		<?php endif; ?>
	</div><!-- .entry-meta -->
	<?php
}
endif;


/**
 * Shorten text.
 */
if ( ! function_exists( 'evolution_shorten_text' ) ) :

function evolution_shorten_text( $text, $length ) {
	$text = wp_kses( $text, array() );
	if( mb_strlen( $text ) > $length ) {
		$text = mb_substr( $text ,0 ,$length );
		return $text . '...';
	} else {
		return $text;
	}
}
endif;



/**
 * Author Bio Box below Articles
 * @author Andreas Hecht
 */
if ( ! function_exists( 'evolution_author_profile' ) ) :

function evolution_author_profile() {
?>
<div class="author-bio">
<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
<div class="author-inner">
<p class="bio-name"><strong><?php the_author_meta('display_name'); ?></strong></p>
<p class="bio-desc"><?php the_author_meta('description'); ?></p>
	<?php
			$url      = get_the_author_meta( 'url' );                                   
            $social_1 = get_the_author_meta( 'facebook' );
            $social_2  = get_the_author_meta( 'twitter' );
            $social_3     = get_the_author_meta( 'feedurl' );
            $social_4    = get_the_author_meta( 'googleplus' );
            $social_5   = get_the_author_meta( 'linkedin' );
            $social_6   = get_the_author_meta( 'xing' );
            $social_7   = get_the_author_meta( 'youtube' );
            $social_8   = get_the_author_meta( 'github' ); 
            $social_9   = get_the_author_meta( 'vimeo' );
            $social_10   = get_the_author_meta( 'flickr' );
            $social_11   = get_the_author_meta( 'pinterest' );                          
			?>
			<?php if ( $url || $social_1 || $social_2 || $social_3 || $social_4 || $social_5 || $social_6 || $social_7 || $social_8 || $social_9 || $social_10 || $social_11 ): ?>
			<div class="social-icons">
			<ul class="social-link clearfix">
                <?php if( $url ) : ?><li><a href="<?php echo esc_url( $url ); ?>" target="_blank" title="Website"><i class="fa fa-link" aria-hidden="true"></i></a></li><?php endif; ?>
                <?php if( $social_1 ) : ?><li><a href="<?php echo esc_url( $social_1 ); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php endif; ?>
                <?php if( $social_2 ) : ?><li><a href="<?php echo esc_url( $social_2 ); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_3 ) : ?><li><a href="<?php echo esc_url( $social_3 ); ?>" target="_blank" title="RSS Feed"><i class="fa fa-rss" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_4 ) : ?><li><a href="<?php echo esc_url( $social_4 ); ?>" target="_blank" title="Google +"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_5 ) : ?><li><a href="<?php echo esc_url( $social_5 ); ?>" target="_blank" title="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_6 ) : ?><li><a href="<?php echo esc_url( $social_6 ); ?>" target="_blank" title="Xing"><i class="fa fa-xing" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_7 ) : ?><li><a href="<?php echo esc_url( $social_7 ); ?>" target="_blank" title="Youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_8 ) : ?><li><a href="<?php echo esc_url( $social_8 ); ?>" target="_blank" title="GitHub"><i class="fa fa-github" aria-hidden="true"></i></a></li><?php endif; ?>			
				<?php if( $social_9 ) : ?><li><a href="<?php echo esc_url( $social_9 ); ?>" target="_blank" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_10 ) : ?><li><a href="<?php echo esc_url( $social_10 ); ?>" target="_blank" title="Flickr"><i class="fa fa-flickr" aria-hidden="true"></i></a></li><?php endif; ?>
				<?php if( $social_11 ) : ?><li><a href="<?php echo esc_url( $social_11 ); ?>" target="_blank" title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li><?php endif; ?>
			</ul><!-- .author-profile-link -->
</div>
</div>
<?php endif; ?>
<!-- social-link -->
<div class="clear"></div>
</div>   
<?php }
add_action( 'evolution_after_content', 'evolution_author_profile' );
endif;



/**
 * Display navigation to next/previous post when applicable.
 */
if ( ! function_exists( 'evolution_post_nav' ) ) :

function evolution_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'evolution' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous"><div class="post-nav-title">' . esc_html__( 'Older post', 'evolution' ) . '</div>%link</div>', esc_html_x( '%title', 'Previous post link', 'evolution' ) );
				next_post_link( '<div class="nav-next"><div class="post-nav-title">' . esc_html__( 'Newer post', 'evolution' ) . '</div>%link</div>', esc_html_x( '%title', 'Next post link', 'evolution' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .post-navigation -->
	<?php
}
endif;



/**
 * Add customizer style to the header.
 */
if ( ! function_exists( 'evolution_customizer_css' ) ) :

function evolution_customizer_css() {
	?>
	<style type="text/css">
		/* Colors */
		<?php if ( $evolution_link_color = get_theme_mod( 'evolution_link_color' ) ) : ?>
		.entry-content a, .entry-summary a, .page-content a, .author-profile-description a, .comment-content a, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a {
			color: <?php echo esc_attr( $evolution_link_color ); ?>;
		}
		<?php endif; ?>
		<?php if ( $evolution_link_hover_color = get_theme_mod( 'evolution_link_hover_color' ) ) : ?>
		.main-navigation a:hover, .entry-content a:hover, .entry-summary a:hover, .page-content a:hover, .author-profile-description a:hover, .comment-content a:hover {
			color: <?php echo esc_attr( $evolution_link_hover_color ); ?>;
		}
		<?php endif; ?>

		<?php if ( get_theme_mod( 'evolution_logo' ) ) : ?>
		/* Logo */
			.site-logo {
				<?php if ( $evolution_logo_margin_top = get_theme_mod( 'evolution_top_margin' ) ) : ?>
				margin-top: <?php echo esc_attr( $evolution_logo_margin_top ); ?>px;
				<?php endif; ?>
				<?php if ( $evolution_logo_margin_bottom = get_theme_mod( 'evolution_bottom_margin' ) ) : ?>
				margin-bottom: <?php echo esc_attr( $evolution_logo_margin_bottom ); ?>px;
				<?php endif; ?>
			}
			<?php if ( get_theme_mod( 'evolution_add_border_radius' ) ) : ?>
				.site-logo img {
					border-radius: 50%;
				}
			<?php endif; ?>
		<?php endif; ?>
	</style>
	<?php
}
add_action( 'wp_head', 'evolution_customizer_css' );
endif;


/**
 * Static Share Buttons for index.php and single.php. Facebook, Twitter and Google+
 * 
 * @uses Hook "evolution_after_thumbnail()"
 */
function evolution_share_buttons() { ?>
<div class="share-buttons-flex">
    <ul class="evolution-share-buttons">
        <li><a class="facebook" title="Bei Facebook empfehlen" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;t=<?php echo rawurlencode(strip_tags(get_the_title())) ?>" target="blank" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i> <?php esc_html_e( 'Share', 'evolution' ); ?></a></li>
        <li><a class="twitter" title="Bei Twitter empfehlen" href="https://twitter.com/intent/tweet?source=webclient&amp;text=<?php echo rawurlencode(strip_tags(get_the_title())) ?> <?php echo urlencode(get_permalink($post->ID)); ?>" target="blank" rel="nofollow"><i class="fa fa-twitter" aria-hidden="true"></i> <?php esc_html_e( 'Tweet', 'evolution' ); ?></a></li>
        <li class="last"><a class="googleplus" title="Bei Google+ empfehlen" href="https://plusone.google.com/_/+1/confirm?hl=de&amp;url=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;title=<?php echo rawurlencode(strip_tags(get_the_title())) ?>" target="blank" rel="nofollow"><i class="fa fa-google-plus" aria-hidden="true"></i> <?php esc_html_e( 'Share', 'evolution' ); ?></a></li>
    </ul>
</div>
<?php }



/**
 * Modify the read more link text
 */
function evolution_modify_read_more_link() {
	return '<a class="continue-reading" href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . esc_html__( 'Continue reading &raquo;', 'evolution' ) . '</a>';
}
add_filter( 'the_content_more_link', 'evolution_modify_read_more_link' );



/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function evolution_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'evolution_page_menu_args' );




	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own twentysixteen_excerpt() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
if ( ! function_exists( 'evolution_excerpt' ) ) :

	function evolution_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;



/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
if ( ! function_exists( 'evolution_excerpt_more' ) && ! is_admin() ) :

function evolution_excerpt_more() {
	$link = sprintf( '<p><a href="%1$s" class="more-link">%2$s &raquo;</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'evolution' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'evolution_excerpt_more' );
endif;