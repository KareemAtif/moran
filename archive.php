<?php
/**
* @package moran
* @since 1.0
* @name Archive Template
**/

get_header();
    // Query custom post types to include in page header
    $args = array('public' => true, '_builtin' => false);
    $output = 'objects';
    $operator = 'and';
    $post_types = get_post_types($args, $output, $operator);
    if (have_posts()): ?>
    <div class="header clearfix">
        <h6><?php echo _e('Use any of following items to filter content:', 'moran'); ?></h6>
        <ul class="filter">
        <?php foreach ($post_types as $post_type): ?>
            <li class="<?php echo $post_type->name; ?>"><?php echo $post_type->labels->menu_name; ?></li>
        <?php endforeach; ?>
            <li class="show-all"><?php echo _e('show all', 'moran'); ?></li>
        </ul>
    </div>
    <?php endif; 
    if(have_posts()): ?>
    <div class="content body">
    <?php while(have_posts()): the_post();
    // Show different content templates based on Custom Post Types
    if (in_array( get_post_type(), array('research','urban_archive'))): 
        get_template_part('temps/content', 'external');
    else:
        get_template_part('temps/content', get_post_format());      
    endif; ?>
    
    <?php endwhile; 
    else:
       get_template_part('temps/content', 'null'); ?> 
    </div>
    <?php endif;
get_footer(); ?>