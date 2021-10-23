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
    <h1 class="text-muted fst-italic mb-4 tek-border-bottom-gray-dashed">
      <?php echo 'Search results for: &#8220;' . esc_html( get_search_query() ) . '&#8221;'; ?>
    </h1>

    <?php
        while ( have_posts() ) :
          the_post();
          echo get_template_part( 'content-templates/content', 'article' );
        endwhile;

        // output listing pagination if not singular
        if (!is_singular()) :
    ?>

      <nav class="d-flex justify-content-between" aria-label="Page navigation">
        <div class="nav-previous alignleft">
          <?php
            $txt = inline_svg( 'mdi-chevron-left', array( 'div_class' => 'icon baseline me-1' ) ) . 'Older';
            next_posts_link( $txt ); ?>
        </div>
        <div class="nav-next alignright">
          <?php
            $txt = 'Newer' . inline_svg( 'mdi-chevron-right', array( 'div_class' => 'icon baseline ms-1' ) );
            previous_posts_link( $txt ); ?>
        </div>
      </nav>

    <?php endif;
      else :

        echo '<h1 class="text-muted fst-italic mb-4 tek-border-bottom-gray-dashed">Search: nothing found</h1>';

        printf( 'Sorry, no results for &#8220;%s&#8221;',
          esc_html( get_search_query() )
        );
      endif;
    ?>

  </div>
</main>
<?php
get_footer();
