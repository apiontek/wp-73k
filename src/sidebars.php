<?php

namespace WP_73k;

/**
 * Register widget area.
 */
add_action( 'widgets_init', function () {

  register_sidebar( [
    'name'            => esc_html( 'Footer' ),
    'id'              => 'footer-widgets',
    'description'     => 'Blog page footer area for widgets',
    'before_widget'   => '<section id="%1$s" class="%2$s widget">',
    'after_widget'    => '</section>',
  ] );

} );