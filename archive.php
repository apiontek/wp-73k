<?php
/**
 * The default archive page template.
 *
 * @author Freeshifter LLC
 * @since 1.0.0
 */

namespace WP_73k;

get_header(); ?>
<main class="container d-flex justify-content-center">

  <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 pb-2 mb-4 mt-3">

    <h1><?= get_the_archive_title(); ?></h1>

    <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          echo get_template_part( 'content-templates/content', 'article' );
        }
      }
    ?>

  </div>

</main>
<?php
get_footer();