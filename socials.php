<?php
/**
 * Functions to help with social icons
 */

// definition of social icons:
$social_icons = array(
  array(
    'icon' => "mdi-typewriter",
    'url' => '/blog',
    'prof' => false,
    'target' => "_self"
  ),
  array('icon' => "mdi-rss", 'url' => '/feed', 'prof' => false, 'target' => "_blank"),
  array(
    'icon' => "mdi-linkedin",
    'url' => "https://www.linkedin.com/in/adampiontek/",
    'prof' => true,
    'target' => "_blank"
  ),
  array('icon' => "mdi-github", 'url' => "https://github.com/apiontek", 'prof' => true, 'target' => "_blank"),
  array('icon' => "svg-gitea", 'url' => "https://73k.us/git/adam", 'prof' => true, 'target' => "_blank"),
  array(
    'icon' => "mdi-key-variant",
    'url' => '/DF185CEE29A3D443_public_key.asc',
    'prof' => true,
    'target' => "_blank"
  ),
  array(
    'icon' => "mdi-goodreads",
    'url' => "https://www.goodreads.com/user/show/2450014-adam-piontek",
    'prof' => false,
    'target' => "_blank"
  ),
  array(
    'icon' => "mdi-twitter",
    'url' => "https://twitter.com/adampiontek",
    'prof' => false,
    'target' => "_blank"
  ),
  array('icon' => "mdi-facebook", 'url' => "https://facebook.com/damek", 'prof' => false, 'target' => "_blank"),
  array(
    'icon' => "mdi-instagram",
    'url' => "https://www.instagram.com/adampiontek/",
    'prof' => false,
    'target' => "_blank"
  ),
  array(
    'icon' => "mdi-steam",
    'url' => "https://steamcommunity.com/id/apiontek/",
    'prof' => false,
    'target' => "_blank"
  ),
  array(
    'icon' => "mdi-discord",
    'url' => "https://discordapp.com/users/328583977629646848",
    'prof' => false,
    'target' => "_blank"
  )
);

function social_icon_is_prof($icon) {
  return $icon['prof'];
}

function get_social_icons() {
  global $social_icons;
  return $social_icons;
}

function get_social_icons_prof() {
  global $social_icons;
  return array_values(array_filter($social_icons, 'social_icon_is_prof'));
}

function social_icons_str($icons_arr) {
  $out_str = '<div id="social-icons">';
  foreach ($icons_arr as $i=>$social) {
    $pad = $i == 0 ? 'pe-1' : ($i == (count($icons_arr) - 1) ? 'ps-1' : 'px-1');
    $out_str .= '<a href="' . $social['url'] . '" rel="noreferrer" target="' . $social['target'];
    $out_str .= '" class="fs-3 link-light text-decoration-none ' . $pad . '">';
    $out_str .= inline_svg($social['icon'], array( 'div_class' => 'icon baseline' ) ) . "</a>";
  }
  return $out_str . '</div>';
}

function get_social_icons_str() {
  return social_icons_str(get_social_icons());
}

function get_social_icons_prof_str() {
  return social_icons_str(get_social_icons_prof());
}

?>