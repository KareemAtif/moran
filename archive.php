<?php
/**
* @package moran
* @since 1.0
* @name Archive Template
**/

get_header();
    // Query custom post types to include in page header as filter for content
    $args = array('public' => true, '_builtin' => false);
    $output = 'objects';
    $operator = 'and';
    $post_types = get_post_types($args, $output, $operator);
    if (have_posts()): ?>
    <div class="header">
        <h6><?php echo _e('Use any of following items to filter content:', 'moran'); ?></h6>
        <ul class="filter">
        <?php foreach ($post_types as $post_type): 
            $exclude = array('wpcf7_contact_form');
            if(TRUE === in_array($post_type->name, $exclude))
            continue;
            ?>
            <li>
                <a href="#" data-filter="<?php echo '.' . $post_type->name; ?>">
                    <?php echo $post_type->labels->menu_name; ?>
                </a>
            </li>
        <?php endforeach; ?>
            <li>
                <a href="#" class="selected" data-filter="*"><?php echo _e('Show all', 'moran'); ?></a>
            </li>
        </ul>
    </div>
    <?php endif; 
    if(have_posts()): ?>
    <div class="body">
        <div class="grid">
    <?php while(have_posts()): the_post();?>
    <?php // Show different content templates based on Custom Post Types
    if (in_array( get_post_type(), array('research','urban_archive'))): 
        get_template_part('temps/content', 'external');
    else:
        get_template_part('temps/content', get_post_format());      
    endif; ?>
    <?php endwhile; ?> 
        </div>
    <?php // If loop doesnt have any content show message from template
    else: 
       get_template_part('temps/content', 'null'); ?> 
    </div>
    <?php endif;
get_footer(); ?>