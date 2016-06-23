<?php
/**
 * @package moran
 * @since 1.0
 * @name Share/tweet icons
 */
function share_article(){
    $url = get_post_permalink();
    $title = str_replace('', '%20', get_the_title());
    $source = get_bloginfo('name');
    
    $services = array (
        'facebook' => array(
            'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url .'&redirect_uri='. $url,
            'i'   => '<i class="fa fa-facebook"></i>',
            't'   => esc_attr(__('Share on Facebook', 'moran'))
        ),
        'twitter' => array(
            'url' => 'https://twitter.com/intent/tweet?text=' . $source . ' - ' . $title . '&amp;url='. $url ,
            'i'   => '<i class="fa fa-twitter"></i>',
            't'   => esc_attr(__('Tweet this', 'moran'))
        ),

    );
    echo '<ul class="share">';
        foreach ($services as $name => $service) {
            echo '<li>';
            $href = sprintf($service['url'], $url, urlencode($title));
            $icon = $service['i'];
            echo '<a href="'. $href .'" title="'.$service['t'].'" target="_blank">'. $icon .'</a>';
            echo '</li>';
        }
    echo '</ul>';
}
