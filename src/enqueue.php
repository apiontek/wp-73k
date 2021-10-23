<?php

namespace WP_73k;

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {

  $min_ext = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

  // JS
  wp_enqueue_script(
    'wp_73k_js',
    WP_73k_URL . "/dist/main{$min_ext}.js",
    [],
    WP_73k_VERSION,
    true
  );

  // CSS
  wp_enqueue_style(
    'wp_73k_css',
    WP_73k_URL . "/dist/main{$min_ext}.css",
    [],
    WP_73k_VERSION,
    ''
  );

} );