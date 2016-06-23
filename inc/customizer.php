<?php
/**
* @package moran
* @subpackage customizer
* @since 1.0
**/
// Add Logo uploader
function moran_theme_customizer( $wp_customize ){
  $wp_customize->add_section( 'moran_logo_section' , array(
    'title'       => __( 'Logo', 'moran' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header'
));
  $wp_customize->add_setting( 'moran_logo' );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'moran_logo', array(
    'label'    => __( 'Logo', 'moran' ),
    'section'  => 'moran_logo_section',
    'settings' => 'moran_logo',
)));
}
add_action('customize_register', 'moran_theme_customizer');