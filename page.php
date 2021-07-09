<?php
/**
 * The default single page template.
 *
 * @author Adam Piontek
 * @since 1.0.0
 */

namespace WP_73k;

get_header(); ?>
<main class="container d-flex justify-content-center">
  <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 border-bottom border-gray pb-4 mb-3">

  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); ?>

    <article itemscope itemtype="https://schema.org/CreativeWork">

      <header>
        <h2 class="fs-2 fw-600 mb-0">
        <?php
          if ( is_archive() || is_home() ) {
            printf( '<a href="%s" rel="bookmark">%s</a>',
              esc_url( get_the_permalink() ),
              esc_html( get_the_title() )
            );
          } else {
            echo get_the_title();
          } ?>
        </h2>
      </header>

      <div class="article">
        <?php
        if ( has_post_thumbnail() ) {
          echo get_the_post_thumbnail( get_the_ID(), 'large', ['class' => 'rounded shadow-lg'] );
        }

        the_content(); ?>
      </div>

    </article>

  <?php
      }
    } ?>

  </div>
</main>
<?php
get_footer();
