<?php
/**
* @package moran
* @since 1.0
* @name Single Page Content
**/
 ?>
<article class="post article-<?php the_ID(); if (has_post_thumbnail()): echo ' has-thumb'; endif?>">
    <div class="header">
        <div class="text">
            <h5><span><?php echo get_the_term_list($post->ID,'urban_categories') ?></span></h5> 
            <h6><span><?php $post_type   = get_post_type($post->ID); 
              $post_object = get_post_type_object($post_type);
                echo $post_object->labels->menu_name; ?></span></h6>   
            <h1><span><?php the_title(); ?></span></h1>
            <div class="date">
                <p><?php echo _e('Published on', 'moran'); ?></p>
                <p><?php the_date('d F Y'); ?></p>
            </div>    
        </div>
        <?php if(has_post_thumbnail()): ?>
        <div class="thumb"><?php the_post_thumbnail('single');?></div>
        <?php endif; ?>
        <div class="article-sidebar">
        <?php if(toc_get_index()): ?>
            <div class="article-contents">
                <h5><span><?php echo _e('Article Contents', 'moran'); ?></span></h5>
                <ul><?php echo toc_get_index(); ?></ul>
            </div>
        <?php endif; 
             // get_template_part('temps/content-single', 'more'); ?>
        </div>
    </div>
    <div class="body">
        <?php the_content(); ?>    
    </div>
    <div class="footer">
        <?php get_template_part('temps/content-single', 'more'); ?>
    </div>
</article>