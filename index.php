<?php
/**
 * The default archive page template.
 *
 * @author Adam Piontek
 * @since 1.0.0
 */

namespace WP_73k;

get_header(); ?>
<main class="container d-flex justify-content-center">
  <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 pb-2 mb-4 mt-3">

    <?php if (is_archive()) { ?>
    <h1 class="text-gray-300 fst-italic mb-4 tek-border-bottom-gray-dashed"><?= get_the_archive_title(); ?></h1>

    <?php
      }
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          echo get_template_part( 'content-templates/content', 'article' );
        }
    ?>

      <nav class="d-flex justify-content-between" aria-label="Page navigation">
        <div class="nav-previous alignleft"><?php next_posts_link( '&larr; Older' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer &rarr;' ); ?></div>
      </nav>

    <?php
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