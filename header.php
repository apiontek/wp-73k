<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freeshifter
 */

namespace WP_73k;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri() . '/assets/images/favicon.png'; ?>">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-1 px-sm-2 px-lg-3 px-xl-4 px-xxl-5 py-3">
  <div class="container-fluid">

    <h1 class="my-0 py-0 lh-base">
      <?php
        printf( '<a class="navbar-brand fs-1 text-secondary" href="%1$s" rel="home">',
          esc_url( home_url( '/' ) )
        );

        echo svg_icon_use("mdi-desktop-classic", "icon baseline");

        printf( ' <span class="fw-light font-brand">\\\\%1$s</span>',
          esc_html( get_bloginfo( 'name' ) )
        );

        echo "</a>";
      ?>
    </h1>

    <button class="hamburger hamburger--vortex collapsed navbar-toggler" id="navbarSupportedContentToggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="hamburger-box d-flex">
        <span class="hamburger-inner"></span>
      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php
        if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu([
            'theme_location'  => 'primary',
            'depth' => 1,
            'menu'  => 'primary',
            'container'       => '',
            'container_class' => '',
            'menu_class'      => 'navbar-nav ms-auto',
            'menu_item_class' => 'nav-item',
            'link_class'      => 'nav-link font-monospace fs-6'
            // 'link_before' => '<span>',
            // 'link_after' => '</span>'
          ]);
        }
      ?>

    </div>

  </div>
</nav>


  <main>