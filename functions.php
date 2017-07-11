<?php
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/function-admin.php';
require_once get_template_directory() . '/tgm/zzrt-theme.php';

function zzrt_load_scripts()
{
    //Register and Enqueue Styles
    wp_register_style('zzrt-style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('zzrt-style');
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('bootstrap');
    wp_register_style('bx-slider', get_template_directory_uri() . '/css/jquery.bxslider.min.css', array(), '4.2.12', 'all');
    wp_enqueue_style('bx-slider');
    wp_register_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array(), '4.7.0', 'all');
    wp_enqueue_style('font-awesome');
    wp_register_style('zzrt-animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0', 'all');
    wp_enqueue_style('zzrt-animate');
    wp_register_style('owl', get_template_directory_uri() . '/css/owl.css', array(), '1.3.2', 'all');
    wp_enqueue_style('owl');
    wp_register_style('use-font-awesome', '//use.fontawesome.com/331696d46d.css', array(), '1.0.0', 'all');
    wp_enqueue_style('use-font-awesome');

    //Register and Enqueue Scripts
    wp_register_script('zzrt_main_scripts', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('zzrt_main_scripts');
    wp_register_script('fontawesome_scripts', '//use.fontawesome.com/331696d46d.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('fontawesome_scripts');
    wp_register_script('bx-slider-scripts', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    wp_enqueue_script('bx-slider-scripts');
    wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '1.1.3', true);
    wp_enqueue_script('wow');
    wp_register_script('parallax', '//cdnjs.cloudflare.com/ajax/libs/parallax/2.1.3/parallax.min.js', array('jquery'), '2.1.3', true);
    wp_enqueue_script('parallax');
    wp_register_script('zzrt_background_video', get_template_directory_uri() . '/js/backgroundVideo.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('zzrt_background_video');
    wp_register_script('owl-scripts', get_template_directory_uri() . '/js/jquery.owl.carouesel.js', array('jquery'), '1.3.2', true);
    wp_enqueue_script('owl-scripts');
    wp_register_script('zzrt_counter', get_template_directory_uri() . '/js/counter.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('zzrt_counter');


}

add_action('wp_enqueue_scripts', 'zzrt_load_scripts');
add_theme_support( 'post-thumbnails' );
register_nav_menus(array(
    'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
    'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
    ));
