<?php
/**
* @package moran
* @since 1.0
* @name Content for External sources
**/
?>
<article class="external <?php echo get_post_type($post->ID); ?>">
    <div class="text">
        <div class="icon">
            <a class="fa fa-external-link" href="<?php the_field('external_url') ?>" target="_blank"></a>
        </div> 
        <h3><a href="<?php the_field('external_url') ?>" target="_blank"><?php the_title(); ?></a></h3>
        <span class="caution"><?php echo _e('This will direct outside website', 'moran'); ?></span>
    </div>
</article>
