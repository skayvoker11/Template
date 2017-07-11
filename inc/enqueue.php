<?php
/*
 * @package zzrt-theme
 * ADMIN ENQUEUE FUNCTIONS
 */

function zzrt_load_admin_scripts($hook)
{
    if($hook == 'toplevel_page_zzrt_settings'
        || $hook == 'zzrt-theme_page_zzrt-slides'
        || $hook == 'zzrt-theme_page_zzrt-services') {
        wp_register_style('zzrt_admin', get_template_directory_uri() . '/css/zzrt.admin.css', array(), '1.0.0', 'all');
        wp_enqueue_style('zzrt_admin');

        wp_enqueue_media();

        wp_register_script('zzrt_admin_script', get_template_directory_uri() . '/js/zzrt.admin.js',array('jquery'), '1.0.0', true);
        wp_enqueue_script('zzrt_admin_script');
    } else {
        return;
    }
}

add_action('admin_enqueue_scripts', 'zzrt_load_admin_scripts');