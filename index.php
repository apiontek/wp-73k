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



      <?php if (is_author()) : 
        // If a user has filled out their description, show a bio on their entries.
        if ( get_the_author_meta( 'description' ) ) { ?>
        <div id="author-info" class="d-flex flex-row mb-4 tek-border-bottom-gray-dashed">
          <div id="author-avatar" class="flex-shrink-0 me-3 pt-1">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), $size = '96', $default = '', $alt = '', $args = array( 'class' => 'rounded-3' )); ?>
          </div><!-- #author-avatar -->
          <div id="author-description" class="flex-grow-1 mb-2">
            <h1 class="text-muted fst-italic mb-0"><?php printf( __( 'Author: %s', '' ), get_the_author() ); ?></h1>
            <?php the_author_meta( 'description' ); ?>
          </div><!-- #author-description -->
        </div><!-- #entry-author-info -->
      <?php } else {
        // if user does not have description, show standard archive title
        ?>
      <h1 class="text-muted fst-italic mb-4 tek-border-bottom-gray-dashed"><?= get_the_archive_title(); ?></h1>
      <?php } ?>

    <?php elseif (is_archive()) : ?>
    <h1 class="text-muted fst-italic mb-4 tek-border-bottom-gray-dashed"><?= get_the_archive_title(); ?></h1>

    <?php
      endif;
      if ( have_posts() ) :
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
      endif;
    ?>

  </div>
</main>
<?php
get_footer();
