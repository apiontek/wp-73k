<?php
/**
 * The article template.
 *
 * @author Adam Piontek
 * @since 1.0.0
 */

namespace WP_73k;

?>
<article 
  id="post-<?php the_ID(); ?>"
  class="<?php 
    $post_class = 'post border-bottom border-gray pb-4 mb-3 clearfix';
    echo esc_attr( implode( ' ', get_post_class( $post_class ) ) );
    ?>"
  itemscope itemtype="https://schema.org/CreativeWork"
  >
  <header>
    <h2 class="post-title fs-2 fw-600 mb-2">
    <?php
      if ( is_archive() || is_search() || is_home() ) {
        printf( '<a href="%s" rel="bookmark">%s</a>',
          esc_url( get_the_permalink() ),
          esc_html( get_the_title() )
        );
      } else {
        echo get_the_title();
      } ?>
    </h2>

    <div class="post-date font-monospace text-muted <?php echo (has_tag() ? '' : 'mb-3'); ?>">
      <?php 
        if (is_author()) {
          $the_author = get_the_author();
        } else {
          $the_author = get_the_author_posts_link();
        }
        echo inline_svg( 'mdi-calendar-clock', array( 'div_class' => 'icon baseline me-2' ) ) . get_the_date('F j, Y');
        echo ' by ' . inline_svg( 'mdi-account', array( 'div_class' => 'icon baseline me-1' ) ) . $the_author;
      ?>
    </div>

    <?php
      if (has_tag()) {
        echo '<div class="post-tags fs-smaller mb-4">';
        echo inline_svg( 'mdi-tag-multiple', array( 'div_class' => 'icon baseline text-muted me-1' ) );

        $tag_strings = array_map(function ($tag) {
          return '<span class="text-muted">#</span><a href="' . get_tag_link($tag) . '">' . $tag->name . '</a>';
        }, get_the_tags());

        echo implode(", ", $tag_strings) . '</div>';
      }
    ?>

  </header>

  <div class="article post-body">
    <?php
    if ( has_post_thumbnail() ) {
      echo get_the_post_thumbnail( get_the_ID(), 'large', ['class' => 'rounded shadow-lg'] );
    }

    the_content();

    wp_link_pages(
      array(
        'before' => '<nav class="d-flex justify-content-center" aria-label="Page navigation for post ' . get_the_title() . '"><div class="d-flex align-items-center pe-2">Post pages:</div><div class="pagination">',
        'after' => '</div></nav>',
        'link_before' => '<span class="page-link">',
        'link_after' => '</span>'
      )
    );
  ?>
  </div>
</article>
