<?php

/*
 * @package zzrt-theme
 * ADMIN PAGE
 */

function zzrt_add_admin_page()
{
    //Generate Admin Page
    add_menu_page('ZZRT Theme Options', 'ZZRT Theme', 'manage_options','zzrt_settings', 'zzrt_theme_create_settings',
        'dashicons-desktop', 111);

    //Generate Admin Sub Pages
    add_submenu_page('zzrt_settings', 'General', 'Settings', 'manage_options', 'zzrt_settings', 'zzrt_theme_create_settings');
    add_submenu_page('zzrt_settings', 'Slides', 'Slides', 'manage_options', 'zzrt-slides', 'zzrt_theme_create_slides');
    add_submenu_page('zzrt_settings', 'Services', 'Our Services', 'manage_options', 'zzrt-services', 'zzrt_theme_create_services');
    add_submenu_page('zzrt_settings', 'Team', 'Our Team', 'manage_options', 'zzrt-team-info', 'zzrt_theme_create_team_info');

    //Activate custom settings
    add_action('admin_init', 'zzrt_custom_settings');
}

add_action('admin_menu', 'zzrt_add_admin_page');

function zzrt_custom_settings()
{
    //General fields
    register_setting('zzrt-settings-group', 'about_us_info');
    register_setting('zzrt-settings-group', 'video_link');
    register_setting('zzrt-settings-group', 'video_title');
    register_setting('zzrt-settings-group', 'video_desc');
    register_setting('zzrt-settings-group', 'recent_posts');

    add_settings_section('zzrt-about-us-options', 'About Us', 'zzrt_create_about_us','zzrt_settings');
    add_settings_field('about-us-text', 'Info', 'zzrt_about_us_info', 'zzrt_settings', 'zzrt-about-us-options');

    add_settings_section('zzrt-recent-posts-options', 'Recent posts', 'zzrt_create_recent_posts','zzrt_settings');
    add_settings_field('recent-posts', 'Count', 'zzrt_count_of_recent_posts', 'zzrt_settings', 'zzrt-recent-posts-options');

    add_settings_section('zzrt-video-options', 'Video', 'zzrt_create_video_info','zzrt_settings');
    add_settings_field('video-link', 'Link', 'zzrt_video_link', 'zzrt_settings', 'zzrt-video-options');
    add_settings_field('video-title', 'Title', 'zzrt_video_title', 'zzrt_settings', 'zzrt-video-options');
    add_settings_field('video-desc', 'Description', 'zzrt_video_desc', 'zzrt_settings', 'zzrt-video-options');

    //Slides fields
    register_setting('zzrt-slides-group', 'slide-1');
    register_setting('zzrt-slides-group', 'slide-title-1');
    register_setting('zzrt-slides-group', 'slide-desc-1');
    register_setting('zzrt-slides-group', 'slide-action-1');
    register_setting('zzrt-slides-group', 'slide-2');
    register_setting('zzrt-slides-group', 'slide-title-2');
    register_setting('zzrt-slides-group', 'slide-desc-2');
    register_setting('zzrt-slides-group', 'slide-action-2');
    register_setting('zzrt-slides-group', 'slide-3');
    register_setting('zzrt-slides-group', 'slide-title-3');
    register_setting('zzrt-slides-group', 'slide-desc-3');
    register_setting('zzrt-slides-group', 'slide-action-3');


    add_settings_section('zzrt-slides-section', 'Header Slider', 'zzrt_create_slider_section', 'zzrt-slides');
    add_settings_field('header-slide-1', 'Slide #1', 'zzrt_slide1', 'zzrt-slides', 'zzrt-slides-section');
    add_settings_field('header-slide-2', 'Slide #2', 'zzrt_slide2', 'zzrt-slides', 'zzrt-slides-section');
    add_settings_field('header-slide-3', 'Slide #3', 'zzrt_slide3', 'zzrt-slides', 'zzrt-slides-section');

    //Services fields
    register_setting('zzrt-services-group', 'service-icon-1');
    register_setting('zzrt-services-group', 'service-title-1');
    register_setting('zzrt-services-group', 'service-desc-1');

    register_setting('zzrt-services-group', 'service-icon-2');
    register_setting('zzrt-services-group', 'service-title-2');
    register_setting('zzrt-services-group', 'service-desc-2');

    register_setting('zzrt-services-group', 'service-icon-3');
    register_setting('zzrt-services-group', 'service-title-3');
    register_setting('zzrt-services-group', 'service-desc-3');

    add_settings_section('zzrt-services-section', '', 'zzrt_create_services_section', 'zzrt-services');
    add_settings_field('service-1', 'Service #1', 'zzrt_service1', 'zzrt-services', 'zzrt-services-section');
    add_settings_field('service-2', 'Service #2', 'zzrt_service2', 'zzrt-services', 'zzrt-services-section');
    add_settings_field('service-3', 'Service #3', 'zzrt_service3', 'zzrt-services', 'zzrt-services-section');
}

function zzrt_create_about_us()
{

}

function zzrt_about_us_info()
{
    $about_us_info = esc_attr(get_option('about_us_info'));
    echo '<textarea rows="4" cols="120" name="about_us_info">' . $about_us_info . '</textarea>';
}

function zzrt_create_recent_posts()
{

}

function zzrt_count_of_recent_posts()
{
    $count = esc_attr(get_option('recent_posts'));    
    if($count == ''){
        update_option( 'recent_posts', '3' );
    } else {
        if($count == '3'){
            echo '<select  name="recent_posts"><option selected value="3">3</option><option value="6">6</option><option value="9">9</option></select>';
        } elseif ($count == '6') {
            echo '<select  name="recent_posts"><option value="3">3</option><option selected value="6">6</option><option value="9">9</option></select>';
        } elseif ($count == '9') {
            echo '<select  name="recent_posts"><option value="3">3</option><option value="6">6</option><option selected value="9">9</option></select>';
        }
    }    
}

function zzrt_create_video_info()
{

}

function zzrt_video_title()
{
    $title = get_option('video_title');
    echo '<input type="text" name="video_title" value="' . $title . '"';
}

function zzrt_video_desc()
{
    $desc = get_option('video_desc');
    echo '<textarea rows="4" cols="120" name="video_desc">' . $desc . '</textarea>';
}

function zzrt_video_link()
{
    $link = get_option('video_link');
    echo '<input type="url" name="video_link" size="118px" value="'. $link .'">';
}
//======================================================================================================================
// Slides
function zzrt_create_slider_section()
{

}

function zzrt_slide1()
{
    $slide1 = esc_attr(get_option('slide-1'));
    $title = esc_attr(get_option('slide-title-1'));
    $desc = esc_attr(get_option('slide-desc-1'));
    $action =esc_attr(get_option('slide-action-1'));

    echo '<button class="button" id="upload-slide-1">Upload slide 1</button>';

    if($slide1){
        echo '<img id="slide1-preview" class="slide-in-admin" src="' . $slide1 . '">';
    }

    echo '<p><input type="text" name="slide-title-1" placeholder="Title" value="' . $title . '"></p>';
    echo '<p><input type="text" name="slide-desc-1" placeholder="Description" value="' . $desc . '"></p>';
    echo '<p><input type="text" name="slide-action-1" placeholder="Action section" value="' . $action . '"></p>';
    echo '<input type="hidden" name="slide-1" value="' . $slide1 . '">';
    echo '<div id="slide1-change"></div>';
}

function zzrt_slide2()
{
    $slide2 = esc_attr(get_option('slide-2'));
    $title = esc_attr(get_option('slide-title-2'));
    $desc = esc_attr(get_option('slide-desc-2'));
    $action =esc_attr(get_option('slide-action-2'));

    echo '<button class="button" id="upload-slide-2">Upload slide 2</button>';

    if($slide2){
        echo '<img id="slide2-preview" class="slide-in-admin" src="' . $slide2 . '">';
    }

    echo '<p><input type="text" name="slide-title-2" placeholder="Title" value="' . $title . '"></p>';
    echo '<p><input type="text" name="slide-desc-2" placeholder="Description" value="' . $desc . '"></p>';
    echo '<p><input type="text" name="slide-action-2" placeholder="Action section" value="' . $action . '"></p>';
    echo '<input type="hidden" name="slide-2" value="' . $slide2 . '">';
    echo '<div id="slide2-change"></div>';
}

function zzrt_slide3()
{
    $slide3 = esc_attr(get_option('slide-3'));
    $title = esc_attr(get_option('slide-title-3'));
    $desc = esc_attr(get_option('slide-desc-3'));
    $action =esc_attr(get_option('slide-action-3'));

    echo '<button class="button" id="upload-slide-3">Upload slide 3</button>';

    if($slide3){
        echo '<img id="slide3-preview" class="slide-in-admin" src="' . $slide3 . '">';
    }

    echo '<p><input type="text" name="slide-title-3" placeholder="Title" value="' . $title . '"></p>';
    echo '<p><input type="text" name="slide-desc-3" placeholder="Description" value="' . $desc . '"></p>';
    echo '<p><input type="text" name="slide-action-3" placeholder="Action section" value="' . $action . '"></p>';
    echo '<input type="hidden" name="slide-3" value="' . $slide3 . '">';
    echo '<div id="slide3-change"></div>';
}

//======================================================================================================================
// Services
function zzrt_create_services_section()
{

}

function zzrt_service1()
{
    $service_title = esc_attr(get_option('service-title-1'));
    $service_icon = esc_attr(get_option('service-icon-1'));
    $service_desc = esc_attr(get_option('service-desc-1'));

    echo '<p><input type="text" name="service-icon-1" value="' . $service_icon . '" placeholder="Icon tag"></p>';
    echo '<p><input type="text" name="service-title-1" value="' . $service_title . '" placeholder="Title"></p>';
    echo '<p><textarea rows="4" cols="120" name="service-desc-1" placeholder="Description">' . $service_desc . '</textarea></p>';
}

function zzrt_service2()
{
    $service_title = esc_attr(get_option('service-title-2'));
    $service_icon = esc_attr(get_option('service-icon-2'));
    $service_desc = esc_attr(get_option('service-desc-2'));

    echo '<p><input type="text" name="service-icon-2" value="' . $service_icon . '" placeholder="Icon tag"></p>';
    echo '<p><input type="text" name="service-title-2" value="' . $service_title . '" placeholder="Title"></p>';
    echo '<p><textarea rows="4" cols="120" name="service-desc-2" placeholder="Description">' . $service_desc . '</textarea></p>';

}

function zzrt_service3()
{

    $service_title = esc_attr(get_option('service-title-3'));
    $service_icon = esc_attr(get_option('service-icon-3'));
    $service_desc = esc_attr(get_option('service-desc-3'));

    echo '<p><input type="text" name="service-icon-3" value="' . $service_icon . '" placeholder="Icon tag"></p>';
    echo '<p><input type="text" name="service-title-3" value="' . $service_title . '" placeholder="Title"></p>';
    echo '<p><textarea rows="4" cols="120" name="service-desc-3" placeholder="Description">' . $service_desc . '</textarea></p>';
}
//======================================================================================================================
function zzrt_theme_create_settings()
{
    require_once( get_template_directory() . '/inc/templates/zzrt-admin-settings.php');
}

function zzrt_theme_create_slides()
{
    require_once( get_template_directory() . '/inc/templates/zzrt-admin-slides-settings.php');
}

function zzrt_theme_create_services()
{
    require_once( get_template_directory() . '/inc/templates/zzrt-admin-services-settings.php');
}

function zzrt_theme_create_team_info()
{
    require_once( get_template_directory() . '/inc/templates/zzrt-admin-team-info-settings.php');
}