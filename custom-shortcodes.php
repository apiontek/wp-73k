<?php

require_once( WP_73k_DIR . '/socials.php' );

/**
 * Shortcode to insert line of social icons
 */
function social_icons_function( $atts = array() ) {
  // set up default parameter
  extract(shortcode_atts(array(
    'prof' => '0'
  ), $atts));

  if ($prof == '1') {
    return get_social_icons_prof_str();
  } else {
    return get_social_icons_str();
  }
}
add_shortcode('social_icons', 'social_icons_function');

/**
 * Shortcode to insert single social icon by name
 * However, social icon MUST be imported in main.js !
 */
function single_social_icon_function( $atts = array() ) {
  // set up default parameter
  extract(shortcode_atts(array(
    'name' => '0',
    'class' => 'baseline'
  ), $atts));

  if ($name == '0') {
    return 'social_icon shortcode requires "name" parameter, like "name=mdi-account"';
  } else {
    return svg_icon_use($name, $class);
  }
}
add_shortcode('social_icon', 'single_social_icon_function');


?>