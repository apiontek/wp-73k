<?php
/**
 * This file adds functions and actions for classes.
 *
 * @author Freeshifter LLC
 * @since 1.0.0
 */

namespace WP_73k;

add_filter( 'body_class', function( $classes ) {

  if ( is_singular( ['post', 'page'] ) ) {
    $classes[] = 'singular';
  }

  if ( is_front_page() ) {
    $classes[] = 'front-page';
  }

  return $classes;

});

/*
 * Filter to add CSS class to navbar menu <li> items
 */
add_filter( 'nav_menu_css_class' , function( $classes, $item, $args, $depth ) {
  if ( 'primary' === $args->theme_location ) {
    if (property_exists($args, 'menu_item_class')) {
      array_push($classes, $args->menu_item_class);
    }
  }      
  return $classes;
}, 3, 4 );

/*
 * Filter to add CSS class to navbar menu item <a> links
 */
add_filter( 'nav_menu_link_attributes' , function( $atts, $item, $args ) {
  if ( 'primary' === $args->theme_location ) {
    $atts['class'] = (empty($atts['class'])) ? '' : $atts['class'];
    if ( in_array('current_page_item', $item->classes) ) {
      $atts['class'] .= ' active';
    }
    if (property_exists($args, 'link_class')) {
      $atts['class'] .= ' ' . $args->link_class;
    }
  }
  return $atts;
}, 2, 3 );

/*
 * Filter to add icons to navbar menu items
 */
add_filter( 'wp_nav_menu_objects', function($items, $args) {
  $svgicon_prefix = 'icon-';
  foreach ( $items as $k => $object ) {
    foreach ($object->classes as $c) {
      if (substr( $c, 0, strlen( $svgicon_prefix ) ) === $svgicon_prefix) {
        $icon_slug = str_replace($svgicon_prefix, '', $c);
        $object->title = svg_icon_use($icon_slug, 'icon baseline') . $object->title;
      }
    }
  }
  return $items;
}, 1, 2 );