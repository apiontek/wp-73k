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
  <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 pb-2 mb-4 mt-3">

    <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          echo get_template_part( 'content-templates/content', 'article' );
        }
      }
    ?>

    <!-- ?php // if ( !is_active_sidebar( 'sidebar' ) ) : ? -->
      <!-- <aside class="w-full lg:w-2/6 bg-white border-gray-400 border-2 p-8"> -->
        <!-- ?php // dynamic_sidebar( 'sidebar' ); ? -->
      <!-- </aside> -->
    <!-- ?php // endif; ? -->

  </div>
</main>
<?php
get_footer();
