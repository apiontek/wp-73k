<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AdamPion73k
 */

namespace WP_73k;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="profile" href="http://gmpg.org/xfn/11">

  <meta name="description" content="Personal website, blog, resume, portfolio for Adam Piontek">
  <meta name="author" content="Adam Piontek"/>
  <link rel="me" href="mailto:adam@73k.us"/>
  <link rel="me" href="sms:+16462341697"/>
  <link rel="authorization_endpoint" href="https://indieauth.com/auth"/>

  <link rel="preload" href="<?php echo get_stylesheet_directory_uri() . '/dist/fonts/righteous-latin-400-normal.woff2'; ?>" as="font" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" href="<?php echo get_stylesheet_directory_uri() . '/dist/fonts/source-serif-pro-latin-400-normal.woff2'; ?>" as="font" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" href="<?php echo get_stylesheet_directory_uri() . '/dist/fonts/jetbrains-mono-latin-300-normal.woff2'; ?>" as="font" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" href="<?php echo get_stylesheet_directory_uri() . '/dist/fonts/source-serif-pro-latin-600-normal.woff2'; ?>" as="font" type="font/woff2" crossorigin="anonymous">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() . '/dist/images/apple-touch-icon.png'; ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri() . '/dist/images/favicon-32x32.png'; ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri() . '/dist/images/favicon-16x16.png'; ?>">
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri() . '/dist/images/site.webmanifest'; ?>">
  <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri() . '/dist/images/safari-pinned-tab.svg'; ?>" color="#78868a">
  <meta name="apple-mobile-web-app-title" content="73k">
  <meta name="application-name" content="73k">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" href="/favicon.ico">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
  <?php if (is_404()) : ?>
    <style>
      body {
        background: url(<?php echo get_stylesheet_directory_uri() . '/dist/images/40x_rainbow.jpg'; ?>);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
      }
    </style>
  <?php endif; ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<nav class="navbar navbar-expand-lg navbar-dark px-1 px-sm-2 px-lg-3 px-xl-4 px-xxl-5 py-3">
  <div class="container-fluid">

    <h1 class="my-0 py-0 lh-base">
      <?php
        printf( '<a class="navbar-brand fs-1 text-secondary" href="%1$s" rel="home">',
          esc_url( home_url( '/' ) )
        );

        echo svg_icon_use("mdi-desktop-classic", "icon baseline");

        printf( '<span class="fw-light font-brand">\\\\%1$s</span>',
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

      <?php if (!is_page()) : ?> 
        <div class="d-none d-lg-flex ms-2">
          <?php echo get_search_form(); ?>
        </div>
      <?php endif; ?>

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

      <?php if (!is_page()) : ?> 
        <div class="d-flex d-lg-none mt-2">
          <?php echo get_search_form(); ?>
        </div>
      <?php endif; ?>

    </div>

  </div>
</nav>
