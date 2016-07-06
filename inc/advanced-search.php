<?php
/**
* @package moran
* @subpackage WPAS
* @since 1.0
**/
// Get list of CPTs
function post_types(){
    $args = array('public' => true, '_builtin' => false);
    $output = 'objects';
    $operator = 'and';
    $exclude = array('wpcf7_contact_form');
    $post_types = get_post_types($args, $output, $operator);
    foreach ($post_types as $post_type):
    if(TRUE === in_array($post_type->name, $exclude))
    continue;
    endforeach;
    $post_type->labels->menu_name;
}
// Form
function advanced_search_form(){
  $args = array();
  $args['wp_query'] = array(
    'post_type' => array('policy_analysis','facts_budgets','research','urban_archive'),
    'orderby' => 'title',
    'order' => 'ASC',
  );
  $args['form'] = array(
    'auto_submit' => true
  );
  $args['form']['ajax'] = array(
    'enabled' => true,
    'show_default_results' => false,
  );
  $args['fields'][] = array(
    'pre_html' => '<div class="form-field">',
    'type' => 'search',
    'placeholder' => __('Enter search here...', 'moran'),
    'post_html' => '</div><div class="form-collect">',
  );
  /*$args['fields'][] = array(
   'pre_html' => '<div class="form-field action-field">',
   'type' => 'clear',
   'value' => __('Reset', 'moran'),
   'post_html' => '</div>',
  );*/
  $args['fields'][] = array(
    'pre_html' => '<div class="form-field">',
    'type' => 'taxonomy',
    'taxonomy' => 'post_tag',
    'format' => 'checkbox',
    'post_html' => '</div>',
  );
  $args['fields'][] = array(
    'pre_html' => '<div class="form-field">',
    'type' => 'post_type',
    'values' => array('policy_analysis' => __('Policy Analysis', 'moran'),'facts_budgets' => __('Facts & Budgets', 'moran'),'research' => __('Research', 'moran'),'urban_archive' => __('Urban Archive', 'moran'),),
    'format' => 'checkbox',
    'post_html' => '</div>',
  );
  $args['fields'][] = array( 
  'pre_html' => '<div class="form-field">',
  'type' => 'orderby', 
  'format' => 'select', 
  'label' => __('Order by', 'moran'), 
  'values' => array('title' => __('Title', 'moran'), 
                    'date' => __('Date', 'moran')),
  'post_html' => '</div></div>',                     
  );
  register_wpas_form('advanced-search', $args);
}
add_action('init', 'advanced_search_form');