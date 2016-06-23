<?php
/**
* @package moran
* @since 1.0
* @name Content for posts in loop
**/
?>
<?php if (has_post_thumbnail()): ?>
<article class="<?php echo get_post_type($post->ID); ?> has-thumb">
    <div class="thumb">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('square');?></a>
    </div>
    <div class="text">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <div class="read-more"><a href="<?php the_permalink(); ?>"><?php echo _e('Read more', 'moran'); ?></a></div>
    </div>
</article>
<?php else: ?>
<article class="<?php echo get_post_type($post->ID); ?> no-thumb">
    <div class="text">
        <h4>
            <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
        </h4>
        <div class="icon">
       	<?php if (in_array( get_post_type(), array('policy_analysis'))):?>
			<i class="fa fa-align-justify"></i>
		<?php else: ?>
			<i class="fa fa-area-chart"></i>
        <?php endif; ?>        
        </div>
        <div class="entry">
        	<p><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
        </div>
        <div class="read-more"><a href="<?php the_permalink(); ?>"><?php echo _e('Read more', 'moran'); ?></a></div>
    </div>
</article>    
<?php endif; ?>    
