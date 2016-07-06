<?php
/**
* @package moran
* @since 1.0
* @name Content for Feature
**/
?>
<div class="featured">
    <div class="header">
        <div class="title">
          <h1>
            <span><?php _e('Latest Article', 'moran'); ?></span>
          </h1>
        </div>
    </div>
    <?php // Show only featured articles with thumbnail 
    $posts = get_posts(array(
       'numberposts'=> 1,
       'post_type'  => array('policy_analysis','facts_budgets'),
       'tax_query'  => array('relation'=>'OR',
                            array('taxonomy'=>'urban_categories',
                                  'field'   => 'slug',
                                  'terms'   => array('housing', 'planning', 'facilities'))
                        ),
       'meta_query' => array('relation'=>'AND',
                            array('key'=>'_thumbnail_id'),
                            array('key'=>'featured_post','value'=>'featured','compare'=>'LIKE')
                            )                         
    )); ?>
    <div class="body">
    <?php foreach ($posts as $post): setup_postdata($post); ?>
        <article>
          <div class="thumb">
              <?php the_post_thumbnail('feature'); ?>
              <h2>
                <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
              </h2>
          </div>
          <div class="content x1">
            <div class="entry"><?php the_excerpt(); ?></div>
            <div class="read-more"><a href="<?php the_permalink(); ?>"><?php echo _e('Read more', 'moran'); ?></a></div>
          </div>
        </article>
    <?php wp_reset_postdata(); 
          endforeach; ?>
  
    </div>
</div>