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
  $output .= "<use xlink:href=\"" . get_stylesheet_directory_uri() . "/dist/images/icon-sprites.svg#$icon_name\"></use>";
  return $output . "</svg></div>";
};

/**
 * Social helpers
 */
require_once( WP_73k_DIR . '/socials.php' );
function socials_str($socials) {
  $out_str = '<div id="social-icons" class="mt-1">';
  foreach ($socials as $i=>$social) {
    $pad = $i == 0 ? 'pe-1' : ($i == (count($socials) - 1) ? 'ps-1' : 'px-1');
    $out_str .= '<a href="' . $social['url'] . '" rel="noreferrer" target="' . $social['target'];
    $out_str .= '" class="fs-3 link-light text-decoration-none ' . $pad . '">';
    $out_str .= svg_icon_use($social['icon'], "icon baseline") . "</a>";
  }
  return $out_str . '</div>';
}

/**
 * Autoloader for browersync
 */
require_once( WP_73k_DIR . '/vendor/autoload.php' );

\A7\autoload( __DIR__ . '/src' );
