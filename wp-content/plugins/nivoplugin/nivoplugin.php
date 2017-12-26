<?php
/*
    Plugin Name: Nivo Plugin
    Description: nivo slideshow into WordPress
    Author: Karthik
    Version: 1.0
*/


add_theme_support( 'post-thumbnails' );

function np_init() {


add_shortcode('np-shortcode', 'np_function');
    $args = array(
        'public' => true,
        'label' => 'Nivo Images',
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('np_images', $args);


add_image_size('np_widget', 180, 100, true);
add_image_size('np_function', 1200, 798, true);

}



add_action('init', 'np_init');




add_action('wp_print_scripts', 'np_register_scripts');
add_action('wp_print_styles', 'np_register_styles');




/*
function np_register_scripts() {
    if (!is_admin()) {
        // register
        wp_register_script('np_nivo-script', plugins_url('nivo-slider/jquery.nivo.slider.js', __FILE__), array( 'jquery' ));
        wp_register_script('np_script', plugins_url('script.js', __FILE__));
 
        // enqueue
        wp_enqueue_script('np_nivo-script');
        wp_enqueue_script('np_script');
    }
}
 
function np_register_styles() {
    // register
    wp_register_style('np_styles', plugins_url('nivo-slider/nivo-slider.css', __FILE__));
    wp_register_style('np_styles_theme', plugins_url('nivo-slider/themes/default/default.css', __FILE__));
 
    // enqueue
    wp_enqueue_style('np_styles');
    wp_enqueue_style('np_styles_theme');
}




function np_function($type='np_function') {
    $args = array(
        'post_type' => 'np_images',
        'posts_per_page' => 5
    );
    $result = '<div class="slider-wrapper theme-default">';
    $result .= '<div id="slider" class="nivoSlider">';
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
 
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $result .='<img  src="' . $the_url[0] . '" data-thumb="' . $the_url[0] . '" alt=""/>';
    }
    $result .= '</div>';
    $result .='<div id = "htmlcaption" class = "nivo-html-caption">';
    $result .='<strong>This</strong> is an example of a <em>HTML</em> caption with <a href = "#">a link</a>.';
    $result .='</div>';
    $result .='</div>';
    return $result;
}


*/



/* Remove comments in below function if you are using plugin on other site */


function np_register_scripts() {
    if (!is_admin()) {
        // register
/*   wp_register_script('np_script', plugins_url('my_slider/js/jquery.js', __FILE__));
      wp_register_script('np_script', plugins_url('my_slider/js/jquery.isotope.min.js', __FILE__));
      wp_register_script('np_script', plugins_url('my_slider/js/jquery.easing.1.3.js', __FILE__));
      wp_register_script('np_script', plugins_url('my_slider/js/bootstrap.min.js', __FILE__));
      
       wp_register_script('np_script', plugins_url('my_slider/js/jquery.scrollTo.js', __FILE__));
       wp_register_script('np_script', plugins_url('my_slider/js/jquery.nav.js', __FILE__));
      wp_register_script('np_script', plugins_url('my_slider/js/jquery.superslides.js', __FILE__));
      wp_register_script('np_script', plugins_url('my_slider/js/jquery.sticky.js', __FILE__));
       wp_register_script('np_script', plugins_url('my_slider/js/owl.carousel.min.js', __FILE__));
       wp_register_script('np_script', plugins_url('my_slider/js/tweetie.js', __FILE__));
       wp_register_script('np_script', plugins_url('my_slider/js/pace.min.js', __FILE__));
       wp_register_script('np_script', plugins_url('my_slider/js/featherlight.js', __FILE__));
       wp_register_script('np_script', plugins_url('my_slider/js/jquery.nicescroll.min.js', __FILE__));
   
      wp_register_script('np_script', plugins_url('my_slider/js/custom.js', __FILE__));
     
 
        // enqueue

        wp_enqueue_script('np_script');*/
    }
}
 
function np_register_styles() {
    // register

/* wp_register_style('np_styles', plugins_url('my_slider/css/bootstrap.min.css', __FILE__));
       wp_register_style('np_styles', plugins_url('my_slider/css/font-awesome.css', __FILE__));
       wp_register_style('np_styles', plugins_url('my_slider/css/animate.css', __FILE__));
    
      wp_register_style('np_styles', plugins_url('my_slider/css/superslides.css', __FILE__));
       wp_register_style('np_styles', plugins_url('my_slider/css/featherlight.css', __FILE__));
       wp_register_style('np_styles', plugins_url('my_slider/css/owl.carousel.css', __FILE__));
       wp_register_style('np_styles', plugins_url('my_slider/css/owl.theme.css', __FILE__));
   
      wp_register_style('np_styles', plugins_url('my_slider/css/style.css', __FILE__));
     
       wp_register_style('np_styles', plugins_url('http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,400italic', __FILE__));
       wp_register_style('np_styles', plugins_url('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic', __FILE__));
       wp_register_style('np_styles', plugins_url('http://fonts.googleapis.com/css?family=Reenie+Beanie', __FILE__));

 
    // enqueue
    wp_enqueue_style('np_styles');*/

}




function np_function($type='np_function') {
    $args = array(
        'post_type' => 'np_images',
        'posts_per_page' => 5
    );
    $result = ' <div id="slides">';
    $result .= '<ul class="slides-container">';
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
 
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $result .='<li><img  src="' . $the_url[0] . '" data-thumb="' . $the_url[0] . '" alt=""/>

 <div class="caption-wrap">
                     <div class="slide-caption">
                       
                       '.get_the_title().'
                       
                     </div>
                  </div>

</li>';
    }
    $result .='</ul>';
	$result .='<nav class="slides-navigation">
               <a href="#" class="next">
               <i class="fa fa-angle-right"></i>
               </a>
               <a href="#" class="prev">
               <i class="fa fa-angle-left"></i>
               </a>
            </nav>';
    $result .='</div>';
    return $result;
}








?>
