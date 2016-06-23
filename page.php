<?php
/**
* @package moran
* @since 1.0
* @name Page Template
**/
get_header();
    if(have_posts()): while (have_posts()): the_post();
        get_template_part('temps/content', 'page');
    endwhile; endif;
get_footer(); ?>