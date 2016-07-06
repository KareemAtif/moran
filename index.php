<?php
/**
* @package moran
* @since 2.0
* @name Main Index Page
**/
get_header(); 
    if(is_front_page()):
        get_template_part('temps/content', 'feature');
    elseif(is_404()):
        echo 'GET A 404 PAGE';
    endif;
get_footer(); ?>