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
  <div class="d-flex flex-column-reverse flex-lg-row align-items-lg-end mt-5">


    <div class="col-auto mt-3 mt-lg-0">
        <img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/cat-roof_portrait.webp'; ?>" 
          class="img-fluid border border-20 border-gray-900 rounded-2"
          alt="My cat Babka, stuck on a roof when she was still just a stray."
          title="My cat Babka, stuck on a roof when she was still just a stray."
          />
    </div>

    <div class="col-auto justify-content-start ms-lg-3">

      <h2 class="fs-2 fw-600 mb-0">
        <?php echo svg_icon_use("mdi-account", "icon baseline") . '<span>Adam Piontek</span>'; ?>
      </h2>

      <div class="font-monospace text-gray-300 fs-5">Desktop Systems Engineer. Human.</div>

      <?php echo socials_str(socials()); ?>

    </div>

  </div>
</main>
<?php
get_footer();
