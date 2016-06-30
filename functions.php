<?php
/**
* @package moran
* @since 1.0
* @name Functions page
**/
// Theme Width
if (!isset($content_width)) {
  $content_width = 1140;
}
// Theme Defaults and Registers support
if (!function_exists('moran_setup')){
  function moran_setup(){
    // Add language text domain
    load_theme_textdomain('moran', get_template_directory() . '/languages');
    // Support for Post Formats
    add_theme_support('post-formats', array('image', 'video', 'audio', 'gallery'));
    // Switch default core markup
    add_theme_support('automatic-feed-links', 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    // Add Navigation
    register_nav_menus(array(
      'primary'   => __('Primary' , 'moran'),
      'secondary' => __('Secondary', 'moran'),
      'footer' => __('Footer', 'moran')
    ));
    // Support Post Thumbnails
    add_theme_support('post-thumbnails');
    add_image_size('feature', 835 ,470, true, array('right', 'top'));
    add_image_size('square', 310 ,310, true, array('right', 'top'));
    add_image_size('single', 930,523, true, array('right', 'top'));
  }
}
add_action('after_setup_theme', 'moran_setup');
// Add Home to menu
function home_page_menu( $args ) {
    $args['show_home'] = true;
    return $args;
    }
    add_filter( 'wp_page_menu_args', 'home_page_menu' );
// Register Widget
function moran_widget() {
  register_sidebar( array(
    'name'        => __('Right Sidebar', 'moran'),
    'id'          => 'sidebar-right',
    'description' => 'Display widgets appear on the right side.',
  ));
  register_sidebar( array(
    'name'        => __('Left Sidebar', 'moran'),
    'id'          => 'sidebar-left',
    'description' => 'Display widgets appear on the left side.',
  ));
}
add_action('widgets_init', 'moran_widget');
// Enqueue theme Styles and Scripts
function style_script(){
  // Add Reset.css
  wp_register_style('theme-reset', get_template_directory_uri(). '/assets/css/reset.css','', filemtime(get_stylesheet_directory(). '/assets/css/reset.css'));
  wp_enqueue_style('theme-reset');
  // Add Global.css
  wp_register_style('theme-globe', get_template_directory_uri(). '/assets/css/globe.css', '', filemtime(get_stylesheet_directory(). '/assets/css/globe.css'));
  wp_enqueue_style('theme-globe');
  // Add Media.css
  wp_register_style('theme-responsive', get_template_directory_uri(). '/assets/css/responsive.css', '', filemtime(get_stylesheet_directory(). '/assets/css/responsive.css'));
  wp_enqueue_style('theme-responsive');
  // Add RTL.css
  wp_register_style('theme-rtl', get_template_directory_uri(). '/assets/css/rtl.css', '', filemtime(get_stylesheet_directory(). '/assets/css/rtl.css'));
  wp_enqueue_style('theme-rtl');
  // Add jQuery UI
  wp_register_script('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', '', '1.11.4', true);
  wp_enqueue_script('jquery-ui');
  // Add Script.JS
  wp_register_script('theme-script', get_template_directory_uri() . '/assets/js/script.js', '', filemtime(get_stylesheet_directory() . '/assets/js/script.js'), true);
  wp_enqueue_script('theme-script');
}
add_action('wp_enqueue_scripts', 'style_script');
// Updgrade jQuery library
function jquery_update(){
  if(!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4', true);
    wp_enqueue_script('jquery');
  }
}
add_action('init', 'jquery_update');

/* Add AJAX handler for search Form
function ajax_search(){
  if(!isset ($_POST['search']))
    exit;
  query_posts(
    array(
      'posts_per_page' => 4,
      'no_found_rows' => true,
      'post_type' => get_post_types(array('public' => true)),
      's' => wp_unslash((string) $_post['search'] ),
      )
  );
  get_template_part('temps/content', 'ajax-search');
  exit;
}
add_action('wp_ajax_nopriv_search', 'ajax_search', 100);
add_action('wp_ajax_search', 'ajax_search', 100);*/
// Theme Includes
  // Add Theme customizer
  require get_template_directory() . '/inc/customizer.php';
  // Head clean
  require get_template_directory() . '/inc/clean-head.php';
  // Add Custom Post Type
  require get_template_directory() . '/inc/custom-posttype.php';
  // Add Custom Taxonomies
  require get_template_directory() . '/inc/custom-taxonomy.php';
  // Add Share Buttons
  require get_template_directory() . '/inc/share.php';
  // Advanced Search Formats
  require_once('inc/wpas/wpas.php');
  require get_template_directory() . '/inc/advanced-search.php';