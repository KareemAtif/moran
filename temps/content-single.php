<?php
/**
* @package moran
* @since 1.0
* @name Single Page Content
**/
 ?>
<article class="post article-<?php the_ID(); ?>">
    <div class="header">
        <div class="text">
            <h5><?php echo get_the_term_list($post->ID,'urban_categories') ?></h5> 
            <h6><?php $post_type   = get_post_type($post->ID); 
              $post_object = get_post_type_object($post_type);
                echo $post_object->labels->menu_name; ?></h6>   
            <h1><?php the_title(); ?></h1>
            <div class="date">
                <p><b><?php echo _e('Published on', 'moran'); ?></b></p>
                <p><?php the_date('d F, Y'); ?></p>
            </div>    
        </div>
        
        <div class="thumb"><?php the_post_thumbnail();?></div>
    </div>
    <div class="body">
        
        <?php the_content(); ?>    
    </div>
    <div class="footer">
        <div class="date">
            <p><b><?php echo _e('Last Reviewed', 'moran'); ?></b></p>
            <p><?php the_modified_date('d F, Y'); ?></p>
        </div>
    <?php $document = get_field('file_download');
    if ($document): 
            $document_url   = wp_get_attachment_url($document);
            $document_title = get_the_title($document);
            $document_size  = filesize(get_attached_file($document));
            $document_size  = size_format($document_size,2 );
            $document_info  = pathinfo(get_attached_file($document)); ?>
        <div class="download">
            <div class="file-title"><a href="<?php echo $document_url; ?>" alt=""><?php echo _e('Download Article', 'moran'); ?></a></div>
            <div class="file-info"><span><?php echo $document_info['extension']; ?></span><?php echo _e(' File', 'moran') . ' - ' . $document_size; ?></div>
        </div>
    <?php endif; ?>
        <div class="share">
            <h6><?php echo _e('Share this Article', 'moran'); ?></h6>
            <?php share_article(); ?>
        </div>    
    </div>
</article>
