<?php
 /*
 * Plugin Name:       GB Plugin
 * Plugin URI:        https://gbogdanov.com
 * Description:       Custom plugin for registering custom post types needed for my custom theme
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      8.0
 * Author:            Georgi Bogdanov
 * Author URI:        https://gbogdanov.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://gbogdanov.com/gb-plugin/
 * Text Domain:       gb-plugin
 * Domain Path:       /languages
 */

if ( ! defined( 'GB_INCLUDE' ) ) {
    define( 'GB_INCLUDE', plugin_dir_path( __FILE__ ) . 'includes'  );
}

require GB_INCLUDE . '/functions.php';
require GB_INCLUDE . '/cpt-courses.php';
require GB_INCLUDE . '/cpt-trainers.php';