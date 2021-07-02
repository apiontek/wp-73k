<?php
/**
 * Kickoff theme setup and build
 */

namespace WP_73k;

define( 'WP_73k_VERSION', wp_get_theme()->version );
define( 'WP_73k_DIR', __DIR__ );
define( 'WP_73k_URL', get_template_directory_uri() );

require_once( WP_73k_DIR . '/vendor/autoload.php' );

\A7\autoload( __DIR__ . '/src' );
