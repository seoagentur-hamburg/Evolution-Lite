<?php
/**
 * Custom helper functions for Evolution
 *
 * @package Evolution Framework
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'evolution_setup' ) ) :

function evolution_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 744;
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on evolution, use a find and replace
	 * to change 'evolution' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'evolution', get_template_directory() . '/languages' );
    
    apply_filters( 'override_load_textdomain', true, 'evolution', get_template_directory() . '/languages/de_DE.mo' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    
    /**
 * Theme Support für WooCommerce
 */
    add_theme_support( 'woocommerce' );  
    
    //remove function attached to woocommerce_before_main_content hook
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
 
//remove function attached to woocommerce_after_main_content hook
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


//adding theme's starter container
    function evolution_child_wrapper_start() {
        echo '<div id="primary" class="content-area"><main id="main" class="site-main" role="main">';
    }
    add_action( 'woocommerce_before_main_content', 'evolution_child_wrapper_start', 10 );
 
//adding theme's ending container
    function evolution_child_wrapper_end() {
        echo '</div></main>';
    }
    add_action( 'woocommerce_after_main_content', 'evolution_child_wrapper_end', 10 );
    
    
/**
 * Adding Support for Yoast SEO Breadcrumbs.
 * 
 * @link https://kb.yoast.com/kb/add-theme-support-for-yoast-seo-breadcrumbs/
 */ 
    add_theme_support( 'yoast-seo-breadcrumbs' );
    
  
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1000, 500, true );
	add_image_size( 'evolution-post-thumbnail-large', 1080, 600, true );
	add_image_size( 'evolution-post-thumbnail-medium', 482, 300, true );
	add_image_size( 'evolution-post-thumbnail-small', 80, 60, true );
	add_image_size( 'evolution-page-thumbnail', 1260, 350, true );

	// This theme uses wp_nav_menu() in two location.
	register_nav_menus( array(
		'primary'       => esc_html__( 'Main Navigation', 'evolution' ),
		'header-social' => esc_html__( 'Header Social Links', 'evolution' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'audio', 'gallery', 'video'
	) );

	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'evolution_custom_header_args', array(
		'default-image' => '',
		'width'         => 1260,
		'height'        => 350,
		'flex-height'   => true,
		'header-text'   => false,
	) ) );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/normalize.css', 'style.css', 'css/editor-style.css' ) );
}
endif; // evolution_setup
add_action( 'after_setup_theme', 'evolution_setup' );



/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function evolution_widgets_init() {
    
        register_sidebar( array(
		'name'          => esc_html__( 'Header Right', 'evolution' ),
		'id'            => 'header-right',
		'description'   => esc_html__( 'This is the header widget area. It is best to use with the Social Follow Widget or the site search.', 'evolution' ),
		'before_widget' => '<aside id="%1$s" class="header-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => '',
	) );  
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'evolution' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'This is the normal sidebar. If you do not use this sidebar, the page will be a one-column design.', 'evolution' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'evolution' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'From left to right there are 4 sequential footer widget areas, and the width is auto-adjusted based on how many you use. If you do not use a footer widget, nothing will be displayed.', 'evolution' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'evolution' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'evolution' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'evolution' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'evolution_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function evolution_scripts() { 
    
	wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:700,500', array(), null, 'all');
    wp_enqueue_style('google-fonts');
    wp_register_style('fontawesome', 'https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css', array(), null, 'all');
    wp_enqueue_style('fontawesome');
	wp_enqueue_style( 'evolution-style', get_stylesheet_uri(), array(), '2.2.1' );

	if ( ! get_theme_mod( 'evolution_hide_navigation' ) ) {
		wp_enqueue_script( 'evolution-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20160525', true );
		wp_enqueue_script( 'double-tap-to-go', get_template_directory_uri() . '/js/doubletaptogo.min.js', array( 'jquery' ), '1.0.0', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'evolution-functions', get_template_directory_uri() . '/js/functions.js', array(), '20160822', true );
}
add_action( 'wp_enqueue_scripts', 'evolution_scripts' );



/**
 * Set tag-cloud font-sizes for wp tag cloud
 */
if ( ! function_exists( 'evolution_set_tag_cloud_sizes' ) ) :

function evolution_set_tag_cloud_sizes($args) {
	$args['smallest'] = 10;
	$args['largest'] = 10;
	$args['number'] = 10;
	return $args;
}
endif;
add_filter('widget_tag_cloud_args','evolution_set_tag_cloud_sizes');



/**
 * Managing contact fields for author bio
 */
$Evolution_Contactfields = new Evolution_Contactfields(
	array (
		'Feed',
	    'Twitter',
        'Facebook',
        'GooglePlus',
        'Flickr',
        'Xing',
        'Github',
        'Instagram',
        'LinkedIn',
        'Pinterest',
        'Vimeo',
        'Youtube'
	)
);

class Evolution_Contactfields {
	public
		$new_fields
	,	$active_fields
	,	$replace
	;

	/**
	 * @param array $fields New fields: array ('Twitter', 'Facebook')
	 * @param bool $replace Replace default fields?
	 */
	public function __construct($fields, $replace = TRUE)
	{
		foreach ( $fields as $field )
		{
			$this->new_fields[ mb_strtolower($field, 'utf-8') ] = $field;
		}

		$this->replace = (bool) $replace;

		add_filter('user_contactmethods', array( $this, 'add_fields' ) );
	}

	/**
	 * Changing contact fields
	 * @param  $original_fields Original WP fields
	 * @return array
	 */
	public function add_fields($original_fields)
	{
		if ( $this->replace )
		{
			$this->active_fields = $this->new_fields;
			return $this->new_fields;
		}

		$this->active_fields = array_merge($original_fields, $this->new_fields);
		return $this->active_fields;
	}

	/**
	 * Helper function
	 * @return array The currently active fields.
	 */
	public function get_active_fields()
	{
		return $this->active_fields;
	}
}



/**
 * Clean wp-caption Output without the 10px WordPress is adding
 * 
 */
if ( ! function_exists( 'evolution_cleaner_caption' ) ) : 

function evolution_cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

	/* Open the caption <div>. */
	$output = '<div' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<p class="wp-caption-text"><span class="fa fw fa-camera fa-1x"></span>' . $attr['caption'] . '</p>';

	/* Close the caption </div>. */
	$output .= '</div>';

	/* Return the formatted, clean caption. */
	return $output;
} 
endif;

add_filter( 'img_caption_shortcode', 'evolution_cleaner_caption', 10, 3 );


/**
 * Add custom classes to the body.
 */
function evolution_body_classes( $classes ) {
	if ( is_page_template( 'fullwidth.php' ) ) {
		$classes[] = 'full-width';
	} elseif ( ! is_active_sidebar( 'sidebar' ) || is_page_template( 'nosidebar.php' ) || is_404() ) {
		$classes[] = 'no-sidebar';
	} else {
		$classes[] = 'has-sidebar';
	}

	$footer_widgets = 0;
	$footer_widgets_max = 4;
	for( $i = 1; $i <= $footer_widgets_max; $i++ ) {
		if ( is_active_sidebar( 'footer-' . $i ) ) {
				$footer_widgets++;
		}
	}
	$classes[] = 'footer-' . $footer_widgets;

	if ( get_option( 'show_avatars' ) ) {
		$classes[] = 'has-avatars';
	}

	return $classes;
}
add_filter( 'body_class', 'evolution_body_classes' );



/**
 * Adjust content_width value for full width template.
 */
function evolution_fullwidth_content_width() {
	if ( is_page_template( 'page_fullwidth.php' ) ) {
		global $content_width;
		$content_width = 1020;
	}
}
add_action( 'template_redirect', 'evolution_fullwidth_content_width' );


/**
 * Adjust content_width value for nosidebar template.
 */
function evolution_nosidebar_content_width() {
	if ( is_page_template( 'nosidebar.php' ) ) {
		global $content_width;
		$content_width = 900;
	}
}
add_action( 'template_redirect', 'evolution_nosidebar_content_width' );



/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
if ( ! function_exists( 'evolution_edit_link' ) ) :

function evolution_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'evolution' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;



/**
 * Better Quality for Preview Images
 */
function evolution_sharpen_resized_file( $resized_file ) {
    $image = wp_get_image_editor( $resized_file );
    if ( !is_resource( $image ) )
        return new WP_Error( 'error_loading_image', $image, $file );
    $size = @getimagesize( $resized_file );
    if ( !$size )
        return new WP_Error('invalid_image', __( 'Could not read image size', 'evolution' ), $file);
    list($orig_w, $orig_h, $orig_type) = $size;
    switch ( $orig_type ) {
        case IMAGETYPE_JPEG:
            $matrix = array(
                array(-1, -1, -1),
                array(-1, 16, -1),
                array(-1, -1, -1),
            );
            $divisor = array_sum(array_map('array_sum', $matrix));
            $offset   = 0;
            imageconvolution($image, $matrix, $divisor, $offset);
            imagejpeg($image, $resized_file,apply_filters( 'jpeg_quality', 100, 'edit_image' )); // Die Qualitaet der Bilder. Hier ist 100 Prozent eingestellt.
            break;
        case IMAGETYPE_PNG:
            return $resized_file;
        case IMAGETYPE_GIF:
            return $resized_file;
    }
    return $resized_file;
}
add_filter('image_make_intermediate_size', 'evolution_sharpen_resized_file',900);