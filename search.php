<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AdamPion73k
 */

get_header(); ?>

<main class="container d-flex justify-content-center">
  <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 pb-2 mb-4 mt-3">

    <?php if (have_posts()) : ?>
    <h1 class="text-gray-300 fst-italic mb-4 tek-border-bottom-gray-dashed">
      Search results for: <?php echo esc_html( get_search_query() ); ?></h1>

    <?php
        while ( have_posts() ) :
          the_post();
          echo get_template_part( 'content-templates/content', 'article' );
        endwhile;
    ?>

      <nav class="d-flex justify-content-between" aria-label="Page navigation">
        <div class="nav-previous alignleft"><?php next_posts_link( '&larr; Older' ); ?></div>
        <div class="nav-next alignright"><?php previous_posts_link( 'Newer &rarr;' ); ?></div>
      </nav>

    <?php
      else :

        echo '<h1 class="text-gray-300 fst-italic mb-4 tek-border-bottom-gray-dashed">Search: nothing found</h1>';

        printf( 'Sorry, no results for %s',
          esc_html( get_search_query() )
        );
      endif;
    ?>

  </div>
</main>
<?php
get_footer('', array('frontpage'=>false));
