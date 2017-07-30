<?php
/**
 * Evolution Framework - Import functions files
 *
 * @package evolution
 */

/**
 * Custom frontend functions for this theme.
 */
require get_template_directory() . '/inc/evolution-frontend-functions.php';

/**
 * Custom functions for this theme.
 */
require get_template_directory() . '/inc/evolution-backend-functions.php';

/**
 * Custom widgets for this theme.
 */
require get_template_directory() . '/inc/evolution-widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
