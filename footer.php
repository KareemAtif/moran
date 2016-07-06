<?php
/**
* @package moran
* @since 1.0
* @name Footer Template
**/
 ?>
          </div>
      </div>
    </div>
  </main>
 <footer>
     
     <div class="row">
            <div class="col-third-one widget">
                <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'menu-bottom', 'container' => '')); ?>
            </div>
            <div class="col-third-two widget-wrap">
                <div class="widget">
                    <?php get_template_part('temps/footer', 'about'); ?>
                </div>
                <div class="widget">
                    <?php get_template_part('temps/footer', 'contact'); ?>
                </div>
            </div>
                <div class="col-third-two widget"><?php get_template_part('temps/footer', 'credit'); ?></div>
     
     </div>
 </footer>
 <?php wp_footer(); ?>
</body>
</html>
