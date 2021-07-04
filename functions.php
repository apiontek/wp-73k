<?php
/**
 * Kickoff theme setup and build
 */

namespace WP_73k;

define( 'WP_73k_VERSION', wp_get_theme()->version );
define( 'WP_73k_DIR', __DIR__ );
define( 'WP_73k_URL', get_template_directory_uri() );

function svg_icon_use($icon_name, $div_class) {
  echo "<div class=\"$div_class $icon_name\">";
  echo "<svg class=\"$icon_name\" aria-hidden=\"true\">";

  echo "<use xlink:href=\"" . get_stylesheet_directory_uri() . "/dist/images/icons.svg#$icon_name\"></use>";

  echo "</svg>";
  echo "</div>";
};

require_once( WP_73k_DIR . '/vendor/autoload.php' );

\A7\autoload( __DIR__ . '/src' );
