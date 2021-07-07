<?php
/**
 * The article template.
 *
 * @author Freeshifter LLC
 * @since 1.0.0
 */

namespace WP_73k;

?>
<article class="post border-bottom border-gray pb-4 mb-3" itemscope itemtype="https://schema.org/CreativeWork">
  <header>
    <h2 class="post-title fs-2 fw-600 mb-2">
    <?php
      if ( is_archive() || is_home() ) {
        printf( '<a href="%s" rel="bookmark">%s</a>',
          esc_url( get_the_permalink() ),
          esc_html( get_the_title() )
        );
      } else {
        echo get_the_title();
      } ?>
    </h2>

    <?php $posttags = get_the_tags(); ?>
    <div class="post-date font-monospace text-gray-300 <?php if (count($posttags) == 0) { echo 'mb-3'; } ?>">
      <?php echo svg_icon_use("mdi-calendar-clock", "icon baseline me-2") . get_the_date('F j, Y'); ?>
      by <?php echo svg_icon_use("mdi-account", "icon baseline me-1") . get_the_author(); ?>
    </div>

    <?php
      if (count($posttags) > 0) {
        echo '<div class="post-tags fs-smaller mb-4">' . svg_icon_use("mdi-tag-multiple", "icon baseline text-gray-300 me-1");

        $tag_strings = array_map(function ($tag) {
          $tag_str = '<span class="text-gray-300">#</span>';
          $tag_str .= '<a href="' . get_bloginfo('url') . '/tag/' . $tag->slug . '">' . $tag->name . '</a>';
          return $tag_str;
        }, $posttags);
        echo implode(", ", $tag_strings) . '</div>';
      }
    ?>

  </header>

  <div class="article post-body">
    <?php
    if ( has_post_thumbnail() ) {
      echo get_the_post_thumbnail( get_the_ID(), 'large', ['class' => 'rounded shadow-lg'] );
    }

    the_content(); ?>
  </div>
</article>
