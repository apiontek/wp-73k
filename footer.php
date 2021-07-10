<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AdamPion73k
 */

namespace WP_73k;

?>

  <?php
    // FIRST: if this is frontpage, we just do the sticky bottom right copyright footer
    if ($args && $args['frontpage']) {
  ?>
    
    <footer class="tek-fixed-footer">
      <div class="px-2 px-sm-3 text-gray-400">
        &copy; Copyright <?php echo date("Y") ?> Adam Piontek
      </div>
    </footer>

  <?php } else {
    // Not frontpage? Then show regular footer
  ?>

    <footer class="d-flex flex-column align-items-center mt-2 px-3 py-3">

      <?php
        // widget content for blog content footers:
        if (!is_page()) :
      ?>

      <div id="footer-widgets" class="col-12 col-sm-9 col-md-11 col-lg-10 col-xl-9 col-xxl-8 d-flex flex-column align-items-center">
        <div class="px-3 pt-3 pb-1">
          <?php echo get_search_form(); ?>
        </div>
        <div class="d-flex flex-wrap flex-column flex-md-row justify-content-start justify-content-md-center align-items-start">

          <?php
            if ( is_active_sidebar( 'footer-widgets' ) ) :
              dynamic_sidebar( 'footer-widgets' );
            endif;
            ?>

        </div>
      </div>

      <?php
        endif;
        // Regular footer content for all but front page:
        ?>

      <span class="text-gray-400 mt-3">&copy; Copyright <?php echo date("Y") ?> Adam Piontek</span>


    </footer>

  <?php } ?>

  <?php wp_footer(); ?>

  </body>
</html>
