<?php
/**
* @package moran
* @since 1.0
* @name sidebar for Single Page Content
**/
?>
<div class="date item">
    <div class="icon"><i class="fa fa-calendar-check-o"></i></div>
    <div class="info">
        <h6><?php echo _e('Last Reviewed', 'moran'); ?></h6>
        <p><?php the_modified_date('d F Y'); ?></p>
    </div>
</div>
<?php $document = get_field('file_download');
      $document_url   = wp_get_attachment_url($document);
      $document_title = get_the_title($document);
      $document_size  = filesize(get_attached_file($document));
      $document_size  = size_format($document_size,2 );
      $document_info  = pathinfo(get_attached_file($document)); 
  if ($document): ?>
<div class="download item">
    <div class="icon">
        <a href="<?php echo $document_url; ?>" alt="<?php echo $document_title; ?>"><i class="fa fa-download"></i></a>
    </div>
    <div class="info">
        <h6><a href="<?php echo $document_url; ?>" title="<?php echo $document_title; ?>"><?php echo _e('Download Article', 'moran'); ?></a></h6>
        <p><?php echo $document_size . ' (.' . $document_info['extension'] . ')'; ?></p>    
    </div>
            
</div>
<?php endif; ?>
<div class="share item">
    <h6><?php echo _e('Share this Article', 'moran'); ?></h6>
    <?php share_article(); ?>
</div>