<?php
/**
 * The 73k theme 
 *
 * @author Adam Piontek
 * @since 1.0.0
 */

namespace WP_73k;

get_header(); ?>
<main class="container d-flex justify-content-center">
  <div class="col-12 col-md-9 col-lg-8 col-xl-7 col-xxl-6 border-bottom border-gray pb-4 mb-3" id="tek-page-resume">

  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); ?>

    <article itemscope itemtype="https://schema.org/CreativeWork">

      <header>
        <h2>
        <?php
          echo inline_svg( 'mdi-account', array( 'div_class' => 'icon baseline' ) );
          echo ' ' . get_the_author_meta('display_name');
          ?>
        </h2>
      </header>

      <div class="article">
        <?php the_content(); ?>
      </div>

    </article>

  <?php
      }
    } ?>

  </div>
</main>
<?php
get_footer();
