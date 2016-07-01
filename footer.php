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
 <footer class="clearfix">
     <div class="centered">
        <div class="widget-wrap x7">
            <!--div class="col3 widget">
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri()?>/assets/img/footer-logo.jpg" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
                <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'menu-bottom', 'container' => '')); ?>
            </div-->
            <div class="col6 widget">
                <?php get_template_part('temps/footer', 'about'); ?>
            </div>
            <div class="col5 widget">
                <?php get_template_part('temps/footer', 'contact'); ?>
            </div>
        </div>

     </div>
     <div class="footer-credit x7"><?php get_template_part('temps/footer', 'credit'); ?></div>
     </footer>
     <?php wp_footer(); ?>
</body>
</html>
