<?php
/**
* @package moran
* @since 1.0
* @name Header Template
**/
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description'): wp_title(); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime(get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="all" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="clearfix">
      <div class="con12 centered">
        <?php if(get_theme_mod('moran_logo')): ?>
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo esc_url(get_theme_mod('moran_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
        <?php else: ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo bloginfo('name'); ?></a></h1>
        <?php endif; ?>
        <div class="show-menu">
            <div class="icon">
                <span></span><span></span><span></span>
            </div>
        </div>
        <div class="show-lang">
            <div class="icon">
                <p><?php echo _e('تغيير اللغة', 'moran'); ?></p>
            </div>
            <?php pll_the_languages(array('hide_current'=> 1)); ?>
        </div>
      <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu-row', 'container_class' => 'menu-wrap')); ?>
      </div>  
  </header>
  <main class="clearfix">
      <div class="con12 centered">
        <div class="col2">
            <?php get_sidebar('sidebar'); ?>    
        </div>
        <div class="col10">
            