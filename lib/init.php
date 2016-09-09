<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

/**
 * Register sidebars
 */
function roots_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');

/***************************************
 * FILTERS
 ***************************************/
/**
 * Add extra query variables
 */
function idies_add_query_vars_filter( $vars ){
// For Registration Review Page
  $vars[] = "reg-gf";
  $vars[] = "reg-gw";
  $vars[] = "reg-g1";
  $vars[] = "reg-g2";
  $vars[] = "reg-g3";
  $vars[] = "reg-mf";
  $vars[] = "reg-mw";
  $vars[] = "reg-m1";
  $vars[] = "reg-m2";
  $vars[] = "reg-m3";
  $vars[] = "reg-sf";
  $vars[] = "reg-sw";
  $vars[] = "reg-s1";
  $vars[] = "reg-s2";
  $vars[] = "reg-s3";
  $vars[] = "reg-nf";
  $vars[] = "reg-nw";
  $vars[] = "reg-n1";
  $vars[] = "reg-n2";
  $vars[] = "reg-n3";
  $vars[] = "reg-lf";
  $vars[] = "reg-lw";
  $vars[] = "reg-l1";
  $vars[] = "reg-l2";
  $vars[] = "reg-l3";
  
  $vars[] = "badge-fullname";
  $vars[] = "badge-email";
  $vars[] = "badge-name";
  $vars[] = "badge-affil";

  $vars[] = "DESCRIPTION";

  return $vars;
}
add_filter( 'query_vars', 'idies_add_query_vars_filter' );
