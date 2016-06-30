<?php
/**
* @package moran
* @since 1.0
* @name Content for Footer contact
**/
 ?>
<div class="contact">
     <h6><?php echo _e('For inquires and suggestions', 'moran'); ?></h6>
    <?php $currentlang = get_bloginfo('language');
          if($currentlang=="en-US"):
            echo do_shortcode('[contact-form-7 id="5" title="contact"]'); 
          else:
            echo do_shortcode('[contact-form-7 id="132" title="contact"]');
          endif;
    ?>
</div>