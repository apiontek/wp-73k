<?php
/**
 * Kickoff theme setup and build
 */

namespace WP_73k;

define( 'WP_73k_VERSION', wp_get_theme()->version );
define( 'WP_73k_DIR', __DIR__ );
define( 'WP_73k_URL', get_template_directory_uri() );

/**
 * Function to support inline SVG icons by name with div wrapper
 */
function svg_icon_use($icon_name, $div_class) {
  $output = "<div class=\"$div_class $icon_name\"><svg class=\"$icon_name\" aria-hidden=\"true\">";
  $output .= "<use xlink:href=\"" . get_stylesheet_directory_uri() . "/dist/images/icons.svg#$icon_name\"></use>";
  return $output . "</svg></div>";
};

/**
 * Autoloader for browersync
 */
require_once( WP_73k_DIR . '/vendor/autoload.php' );

\A7\autoload( __DIR__ . '/src' );
