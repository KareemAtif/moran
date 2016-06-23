<?php
/**
* @package moran
* @since 1.0
* @name Single Page Template
**/
get_header();

while(have_posts()): the_post(); ?>

    <?php get_template_part('temps/content', 'single');

endwhile;
get_sidebar();
get_footer(); ?>