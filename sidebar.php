<?php
/**
* @package moran
* @since 1.0
* @name Sidebar Template
**/
?>
<aside id="secondary">
    
    <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => 'menu-side', 'container' => '')); 
          dynamic_sidebar('sidebar-right');
           ?>
</aside>




