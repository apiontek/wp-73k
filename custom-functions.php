<?php

/**
 * Function to support inline SVG icons by name with div wrapper
 */
function svg_icon_use($icon_name, $div_class = '') {
  $div_class .= ' icon';
  $output = "<div class=\"$div_class $icon_name\"><svg class=\"$icon_name\" aria-hidden=\"true\">";
  $output .= "<use xlink:href=\"" . get_stylesheet_directory_uri() . "/dist/images/icon-sprites.svg#$icon_name\"></use>";
  return $output . "</svg></div>";
};

?>