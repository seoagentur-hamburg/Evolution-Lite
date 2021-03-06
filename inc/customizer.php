<?php
/**
 * evolution Theme Customizer
 *
 * @package evolution
 */

/**
 * Set the Customizer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function evolution_customize_register( $wp_customize ) {

	class evolution_Read_Me extends WP_Customize_Control {
		public function render_content() {
			?>
			<div class="evolution-read-me">
				<p><?php esc_html_e( 'Thank you for using the Evolution Framework Theme.', 'evolution' ); ?></p>
				<h3><?php esc_html_e( 'Documentation', 'evolution' ); ?></h3>
				<p class="evolution-read-me-text"><?php esc_html_e( 'For instructions on theme configuration, please see the documentation.', 'evolution' ); ?></p>
				<p class="evolution-read-me-link"><a href="<?php echo esc_url( __( 'https://andreas-hecht.com/documents/evolution/', 'evolution' ) ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'evolution' ); ?></a></p>
				<h3><?php esc_html_e( 'Support', 'evolution' ); ?></h3>
				<p class="evolution-read-me-text"><?php esc_html_e( 'If there is something you don\'t understand even after reading the documentation, please use the support forum.', 'evolution' ); ?></p>
				<p class="evolution-read-me-link"><a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/evolution', 'evolution' ) ); ?>" target="_blank"><?php esc_html_e( 'Support Forum', 'evolution' ); ?></a></p>
				<h3><?php esc_html_e( 'Review', 'evolution' ); ?></h3>
				<p class="evolution-read-me-text"><?php esc_html_e( 'If you are satisfied with the theme, we would greatly appreciate if you would review it.', 'evolution' ); ?></p>
				<p class="evolution-read-me-link"><a href="<?php echo esc_url( __( 'https://wordpress.org/support/view/theme-reviews/evolution?filter=5', 'evolution' ) ); ?>" target="_blank"><?php esc_html_e( 'Review This Theme', 'evolution' ); ?></a></p>
				<h3><?php esc_html_e( 'Upgrade', 'evolution' ); ?></h3>
				<p class="evolution-read-me-text"><?php esc_html_e( 'If you would like even more features and/or 1-on-1 personal support, it is recommended you upgrade to evolution Pro.', 'evolution' ); ?></p>
				<p class="evolution-read-me-link"><a href="<?php echo esc_url( __( 'http://themeevolution.com/wordpress-themes/evolution/#pro', 'evolution' ) ); ?>" target="_blank"><?php esc_html_e( 'evolution Pro', 'evolution' ); ?></a></p>
			</div>
			<?php
		}
	}

	class evolution_Upgrade extends WP_Customize_Control {
		public function render_content() {
			esc_html_e( 'To use this feature, please upgrade to Evolution Pro.', 'evolution' );
		}
	}

	// Site Identity
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->add_setting( 'evolution_hide_blogdescription', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'evolution_hide_blogdescription', array(
		'label'   => esc_html__( 'Hide Tagline', 'evolution' ),
		'section' => 'title_tagline',
		'type'    => 'checkbox',
	) );

	// READ ME
	$wp_customize->add_section( 'evolution_read_me', array(
		'title'    => esc_html__( 'READ ME', 'evolution' ),
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'evolution_read_me_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Read_Me( $wp_customize, 'evolution_read_me_text', array(
		'section'  => 'evolution_read_me',
		'priority' => 1,
	) ) );

	// Fonts
	$wp_customize->add_section( 'evolution_fonts', array(
		'title'       => esc_html__( 'Fonts', 'evolution' ),
		'description' => esc_html__( 'You can set the header and body text to a variety of fonts.', 'evolution' ),
		'priority'    => 30,
	) );
	$wp_customize->add_setting( 'evolution_fonts_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Upgrade( $wp_customize, 'evolution_fonts_text', array(
		'section'  => 'evolution_fonts',
		'priority' => 1,
	) ) );

	// Colors
	$wp_customize->get_section( 'colors' )->priority     = 35;
	$wp_customize->add_setting( 'evolution_link_color' , array(
		'default'   => '#a62425',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evolution_link_color', array(
		'label'    => esc_html__( 'Link Color', 'evolution' ),
		'section'  => 'colors',
		'priority' => 13,
	) ) );
	$wp_customize->add_setting( 'evolution_link_hover_color' , array(
		'default'           => '#b85051',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'evolution_link_hover_color', array(
		'label'    => esc_html__( 'Link Hover Color', 'evolution' ),
		'section'  => 'colors',
		'priority' => 14,
	) ) );

	// Title
	$wp_customize->add_section( 'evolution_title', array(
		'title'       => esc_html__( 'Title', 'evolution' ),
		'description' => esc_html__( 'You can set the title font.', 'evolution' ),
		'priority'    => 50,
	) );
	$wp_customize->add_setting( 'evolution_title_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Upgrade( $wp_customize, 'evolution_title_text', array(
		'section'  => 'evolution_title',
		'priority' => 1,
	) ) );

	// Logo
	$wp_customize->add_section( 'evolution_logo', array(
		'title'       => esc_html__( 'Logo', 'evolution' ),
		'description' => esc_html__( 'In order to use a retina logo image, you must have a version of your logo that is doubled in size.', 'evolution' ),
		'priority'    => 55,
	) );
	$wp_customize->add_setting( 'evolution_logo', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'evolution_logo', array(
		'label'    => esc_html__( 'Upload Logo', 'evolution' ),
		'section'  => 'evolution_logo',
		'priority' => 11,
	) ) );
	$wp_customize->add_setting( 'evolution_replace_blogname', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'evolution_replace_blogname', array(
		'label'    => esc_html__( 'Replace Title', 'evolution' ),
		'section'  => 'evolution_logo',
		'type'     => 'checkbox',
		'priority' => 12,
	) );
	$wp_customize->add_setting( 'evolution_retina_logo', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'evolution_retina_logo', array(
		'label'    => esc_html__( 'Retina Ready', 'evolution' ),
		'section'  => 'evolution_logo',
		'type'     => 'checkbox',
		'priority' => 13,
	) );
	$wp_customize->add_setting( 'evolution_add_border_radius', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'evolution_add_border_radius', array(
		'label'    => esc_html__( 'Add Border Radius', 'evolution' ),
		'section'  => 'evolution_logo',
		'type'     => 'checkbox',
		'priority' => 14,
	) );
	$wp_customize->add_setting( 'evolution_top_margin', array(
		'default'           => '0',
		'sanitize_callback' => 'evolution_sanitize_margin',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'evolution_top_margin', array(
		'label'    => esc_html__( 'Margin Top (px)', 'evolution' ),
		'section'  => 'evolution_logo',
		'type'     => 'text',
		'priority' => 15,
	));
	$wp_customize->add_setting( 'evolution_bottom_margin', array(
		'default'           => '0',
		'sanitize_callback' => 'evolution_sanitize_margin',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'evolution_bottom_margin', array(
		'label'    => esc_html__( 'Margin Bottom (px)', 'evolution' ),
		'section'  => 'evolution_logo',
		'type'     => 'text',
		'priority' => 16,
	));

	// Header Image
	$wp_customize->add_setting( 'evolution_header_display', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_header_display'
	) );
	$wp_customize->add_control( 'evolution_header_display', array(
		'label'   => esc_html__( 'Header Image Display', 'evolution' ),
		'section' => 'header_image',
		'type'    => 'radio',
		'choices' => array(
			''         => esc_html__( 'Display on the blog posts index page', 'evolution' ),
			'page'     => esc_html__( 'Display on all static pages', 'evolution' ),
			'site'     => esc_html__( 'Display on the whole site', 'evolution' ),
		),
		'priority' => 20,
	) );
    
        // Sektion erstellen für das dunkle Theme
	$wp_customize->add_section("share", array(
		"title" => __("Share Buttons", "evolution"),
		"priority" => 40,
	));
  // Die Einstellungen definieren  
$wp_customize->add_setting('share-buttons', array(
    'default'           => '',
    'sanitize_callback' => 'evolution_share_sanitize',
    'capability' => 'edit_theme_options',
));
 
// Die Eingabemöglichkeit erstellen
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"share-buttons",
		array(
			"label" => __("Activate the Share Buttons under Post Thumbnails", "evolution"),
			"section" => "share",
			"settings" => "share-buttons",
			"type" => "checkbox",
		)
));

	// Featured Posts
	$wp_customize->add_section( 'evolution_featured', array(
		'title'       => esc_html__( 'Featured Posts', 'evolution' ),
		'description' => esc_html__( 'You can set the posts that will be featured on the homepage slider as well as in the evolution Featured Posts widget.', 'evolution' ),
		'priority'    => 75,
	) );
	$wp_customize->add_setting( 'evolution_featured_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Upgrade( $wp_customize, 'evolution_featured_text', array(
		'section'  => 'evolution_featured',
		'priority' => 1,
	) ) );

	// Posts
	$wp_customize->add_section( 'evolution_post', array(
		'title'       => esc_html__( 'Post Display', 'evolution' ),
		'description' => esc_html__( 'You can set how posts are displayed on the blog posts index page. You can also hide elements such as categories, date, author name, comments number, featured image, author profile, and post navigation.', 'evolution' ),
		'priority'    => 80,
	) );
	$wp_customize->add_setting( 'evolution_post_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Upgrade( $wp_customize, 'evolution_post_text', array(
		'section'  => 'evolution_post',
		'priority' => 1,
	) ) );

	// Category Colors
	$wp_customize->add_section( 'evolution_category_colors', array(
		'title'       => esc_html__( 'Category Colors', 'evolution' ),
		'description' => esc_html__( 'You can set the colors for various categories.', 'evolution' ),
		'priority'    => 85,
	) );
	$wp_customize->add_setting( 'evolution_category_colors_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Upgrade( $wp_customize, 'evolution_category_colors_text', array(
		'section'  => 'evolution_category_colors',
		'priority' => 1,
	) ) );

	// Footer
	$wp_customize->add_section( 'evolution_footer', array(
		'title'       => esc_html__( 'Footer', 'evolution' ),
		'description' => esc_html__( 'You can set the footer text and hide the theme credits from here.', 'evolution' ),
		'priority'    => 90,
	) );
	$wp_customize->add_setting( 'evolution_footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Upgrade( $wp_customize, 'evolution_footer_text', array(
		'section'  => 'evolution_footer',
		'priority' => 1,
	) ) );

	// Custom CSS
	$wp_customize->add_section( 'evolution_custom_css', array(
		'title'       => esc_html__( 'Custom CSS', 'evolution' ),
		'description' => esc_html__( 'You can set custom CSS or Google Fonts.', 'evolution' ),
		'priority'    => 95,
	) );
	$wp_customize->add_setting( 'evolution_custom_css_text', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( new evolution_Upgrade( $wp_customize, 'evolution_custom_css_text', array(
		'section'  => 'evolution_custom_css',
		'priority' => 1,
	) ) );

	// Menus
	$wp_customize->add_setting( 'evolution_hide_navigation', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'evolution_hide_navigation', array(
		'label'    => esc_html__( 'Hide Main Navigation', 'evolution' ),
		'section'  => 'menu_locations',
		'type'     => 'checkbox',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'evolution_hide_search', array(
		'default'           => '',
		'sanitize_callback' => 'evolution_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'evolution_hide_search', array(
		'label'    => esc_html__( 'Hide Search on Main Navigation', 'evolution' ),
		'section'  => 'menu_locations',
		'type'     => 'checkbox',
		'priority' => 2,
	) );
}
add_action( 'customize_register', 'evolution_customize_register' );



function evolution_share_sanitize( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
/**
 * Sanitize user inputs.
 */
function evolution_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
		return 1;
	} else {
		return '';
	}
}
function evolution_sanitize_margin( $value ) {
	if ( preg_match("/^-?[0-9]+$/", $value) ) {
		return $value;
	} else {
		return '0';
	}
}
function evolution_sanitize_header_display( $value ) {
	$valid = array(
		''         => esc_html__( 'Display on the blog posts index page', 'evolution' ),
		'page'     => esc_html__( 'Display on all static pages', 'evolution' ),
		'site'     => esc_html__( 'Display on the whole site', 'evolution' ),
	);

	if ( array_key_exists( $value, $valid ) ) {
		return $value;
	} else {
		return '';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function evolution_customize_preview_js() {
	wp_enqueue_script( 'evolution_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160603', true );
}
add_action( 'customize_preview_init', 'evolution_customize_preview_js' );

/**
 * Enqueue Customizer CSS
 */
function evolution_customizer_style() {
	wp_enqueue_style( 'evolution-customizer-style', get_template_directory_uri() . '/css/customizer.css', array() );
}
add_action( 'customize_controls_print_styles', 'evolution_customizer_style');

/**
 * Enqueue Customizer JS
 */
function evolution_customizer_js() {
	wp_enqueue_script( 'evolution-customizer-js', get_template_directory_uri() . '/js/customizer-js.js', array( 'jquery' ), '20160603', true);
	wp_localize_script( 'evolution-customizer-js', 'evolution_customizer_links', array(
		'url' => esc_url( __( 'https://andreas-hecht.com/wordpress-themes/evolution/#pro', 'evolution' ) ),
		'label' => esc_html__( 'Upgrade to Evolution Pro', 'evolution' ),
	));
}
add_action( 'customize_controls_enqueue_scripts', 'evolution_customizer_js' );

