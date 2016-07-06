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
  <header>
    <div class="container">
      <div class="row">
        <?php // Show logo based on width dimensions (min 768 for rectangular logo) 
        if(get_theme_mod('moran_logo')): ?>
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img class="logo-square" src="<?php echo esc_url(get_theme_mod('moran_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            <img class="logo-rect" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-vertical.jpg" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        </a>
        <?php else: ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo bloginfo('name'); ?></a>
        </h1>
        <?php endif; ?>
        <div class="show-tools">
            <div class="show-search">
                <div class="icon">
                    <a href="#"><i class="fa fa-search"></i></a>
                </div>
            </div>
            <div class="show-lang">
                <?php pll_the_languages(array('hide_current'=> 1)); ?>
            </div>
            <div class="show-menu">
                <div class="icon">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu-row', 'container_class' => 'menu-wrap')); ?>
      </div>
    </div>
    <?php // Drawer model for menu. Note: both primary and secondary menus repeated to show in different screen dinmension independently ?>
    <div id="menu-drawer">
        <div class="drawer-container">
            <div class="body">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu-list', 'container' => '')); ?>
            </div>
            <div class="footer">
                <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'menu-row', 'container' => '')); ?>
                <?php get_template_part('temps/footer', 'credit'); ?>
            </div>
        </div>
    </div>
    <?php // Drawer model for Search form and its contents. ?>
    <div id="search-drawer">
        <div class="drawer-container">
            <?php // display search resault for WP Advanced Search framework
                  $advanced_search = new WP_Advanced_Search('advanced-search');
                  $query = $advanced_search->query(); ?> 
            <div class="header row">
                <?php get_search_form(); ?>
                <div class="search-tools">
                    <div class="icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="result">
                        <h6><?php echo _e('Results', 'moran'); ?></h6>
                        <?php echo $query->found_posts; ?>
                    </div>
                    <div class="form-reset">
                        <input type="reset" onclick="resetForm()" form="wp-advanced-search" name="reset" value="<?php echo _e('Reset', 'moran'); ?>" id="reset"/>
                    </div>
                </div>
            </div>
            <?php if($query->have_posts()): ?>
            <div class="body">
            <?php while($query->have_posts()): $query->the_post();
                // Show different content templates based on Custom Post Types
                if (in_array( get_post_type(), array('research','urban_archive'))): 
                    get_template_part('temps/content', 'external');
                else:
                get_template_part('temps/content', get_post_format());      
                endif; endwhile;
                else:
                get_template_part('temps/content', 'null'); ?> 
            </div>
            <?php endif; ?>
        </div>
    </div>
  </header>
  <main>
    <div class="container">
      <div class="row">
          <div class="col-fifth-one">
            <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'menu-side', 'container' => '')); ?>
          </div>
          <div class="col-fifth-four">
