<?php
/**
 * The default single page template.
 *
 * @author Freeshifter LLC
 * @since 1.0.0
 */

namespace WP_73k;

get_header('', array('fixednav'=>true)); ?>
<main class="container-fluid h-100 d-flex justify-content-center align-items-center">
  <div class="d-flex flex-column-reverse flex-lg-row align-items-lg-end mt-5" id="front-page">

  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post(); ?>

    <div class="col-auto mt-3 mt-lg-0">
      <?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
    </div>

    <!-- the_content(); -->
    <div class="col-auto justify-content-start ms-lg-3">
      <?php the_content(); ?>
    </div>

  <?php }
      }
    ?>

  </div>
</main>
<?php
get_footer();
