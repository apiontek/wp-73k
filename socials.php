<?php
/**
 * Functions to help with social icons
 */

// definition of social icons:

function socials() {
  return array(
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
    array('icon' => "gitea", 'url' => "https://73k.us/git/adam", 'prof' => true, 'target' => "_blank"),
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
}
