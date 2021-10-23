<?php
/**
 * Kickoff theme setup and build
 */

namespace WP_73k;

define( 'WP_73k_VERSION', wp_get_theme()->version );
define( 'WP_73k_DIR', __DIR__ );
define( 'WP_73k_URL', get_template_directory_uri() );

/**
 * Social icons definition & functions
 */
require_once( WP_73k_DIR . '/socials.php' );

/**
 * Custom functions
 */
require_once( WP_73k_DIR . '/custom-functions.php' );

/**
 * Custom shortcodes for use in content
 */
require_once( WP_73k_DIR . '/custom-shortcodes.php');

/**
 * Autoloader for browersync
 */
require_once( WP_73k_DIR . '/vendor/autoload.php' );

\A7\autoload( __DIR__ . '/src' );
