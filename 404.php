<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AdamPion73k
 */

get_header(); ?>

<main class="container-fluid d-flex flex-column justify-content-center align-items-center text-light mt-4">

  <img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/40x_unicorn-300.png'; ?>" class="img-fluid mb-3" alt="UNICORN">

  <h2 class="fs-2 mb-0">Oh no! Problem!</h2>
  <p class="lead mb-0">What you seek cannot be found.</p>
  <p class="mb-0" style="font-size: 14px;">(deep, huh?)</p>
  <p class="lead mb-0">Maybe try one of the links above or below, or a search?</p>
  <p class="mt-3" style="font-size: 10px;">
    (Unicorn image <a href="https://creativecommons.org/licenses/by-nc/4.0/" rel="noreferrer" target="_blank">Creative Commons 4.0 BY-NC</a>
    via <a href="http://pngimg.com/download/24891" rel="noreferrer" target="_blank">pngimg.com</a>)
  </p>

</main>

<?php
get_footer();
