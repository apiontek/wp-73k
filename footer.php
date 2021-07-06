<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freeshifter
 */

namespace WP_73k;

?>
    <!-- <footer class="footer relative bg-dark-1 text-light-2 pt-8 pb-16">
      <div class="relative z-10">
        <div class="container mx-auto">
          <div class="lg:flex lg:justify-between">
            <div class="lg:w-1/4 text-center lg:text-left">
              <div class="text-xl">
                <p class="text-sm">&copy; 2021 by Adam Piontek</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer> -->
    <footer class="footer73k footer bottom-0 end-0 bg-dark">
        <div class="px-2 px-sm-3">
          <span class="text-gray-300">&copy; Copyright <?php echo date("Y") ?> Adam Piontek</span>
        </div>
      </footer>

    <?php wp_footer(); ?>
  </body>
</html>
