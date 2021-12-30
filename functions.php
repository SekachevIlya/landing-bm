<?php
/**
 * bitmelech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bitmelech
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Setup Theme
 */
require get_template_directory() . '/inc/setup-theme.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/style-set-scripts.php';

/**
 * Path in JS
 */
require get_template_directory() . '/inc/path-in-js.php';

/**
 * Rigister Menus
 */

require get_template_directory() . '/inc/menus.php';

/**
 * Content Width
 */
require get_template_directory() . '/inc/content-width.php';

/**
 * Add Image Size
 */
require get_template_directory() . '/inc/add-image-size.php';

/**
 * Widgets Init
 */
require get_template_directory() . '/inc/widgets-init.php';

/**
 * Helpers
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * ACF Options
 */
require get_template_directory() . '/inc/acf-options.php';

