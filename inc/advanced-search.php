<?php
/**
* @package moran
* @subpackage WPAS
* @since 1.0
**/
// Get places from posts
function issue_place() {
  $args = array(
    'post_type' => 'document',
    'posts_per_page' => '-1',
  );
  $wp_query = new WP_Query($args);
  $temp = array();
  $places = array();
  unset($places);
  $counter = 0;
  while ($wp_query -> have_posts()): $wp_query->the_post();
    $field_key = '';
    $post_id = get_the_ID();
    $field = get_field_object($field_key, $post_id);
    $places[$counter] = $field['value'];
    $counter++;
  endwhile;
  $result = array_unique($places);
  sort($result);
return $result;
}
// Form
function advanced_search_form(){
  $args = array();
  $args['wp_query'] = array(
    'post_type' => 'document',
    'orderby' => 'title',
    'order' => 'ASC',
  );
  $args['form'] = array(
    'auto_submit' => true
  );
  $args['form']['ajax'] = array(
    'enabled' => true,
    'show_default_results' => true,
  );
  $args['fields'][] = array(
    'type' => 'search',
  );
  $arg['fields'][] = array(
    'type' => 'meta_key',
  );
  register_wpas_form('advanced-search', $args);
}
add_action('init', 'advanced_search_form');