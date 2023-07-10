<?php

/**
 *  @pakage webaiid
 */


 function webaiid_add_admin_page(){
    // Admin page
    add_menu_page( 'Webaiid theme options', 'Webaiid', 'manage_options', 'webaiid_settings', 'webaiid_theme_create_page', 'dashicons-schedule', 110);
    // add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $callback:callable, $icon_url:string, $position:integer|float|null );

    // Submenu page
    add_submenu_page( 'webaiid_settings', 'Webaiid theme options', 'Settings', 'manage_options', 'webaiid_settings');
    add_submenu_page( 'webaiid_settings', 'Webaiid theme options', 'Css', 'manage_options', 'webaiid_css_settings', 'webaiid_theme_css_submneu');
    // add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $callback:callable, $position:integer|float|null );


    // activate custom settings
    add_action( 'admin_init', 'webaiid_custom_settings');
 }

 // add action admin_menu
 add_action( 'admin_menu', 'webaiid_add_admin_page');

function webaiid_custom_settings(){
    register_setting( 'webaiid_settings_group', 'profile_picture');
    register_setting( 'webaiid_settings_group', 'first_name');
    register_setting( 'webaiid_settings_group', 'last_name');
    register_setting( 'webaiid_settings_group', 'twiter_handler');


    add_settings_section( 'webaiid_sidebar', 'Sidebar options', 'webaiid_sidebar_option', 'webaiid_settings');
    add_settings_field( 'sidebar_profile', 'Profile Pic', 'sidebar_profile_pic', 'webaiid_settings', 'webaiid_sidebar');
    add_settings_field( 'sidebar_name', 'Full Name', 'webaiid_sidebar_name', 'webaiid_settings', 'webaiid_sidebar');
    add_settings_field( 'sidebar_social', 'Twiter', 'webaiid_twiter_handler', 'webaiid_settings', 'webaiid_sidebar');
    // add_settings_field( $id:string, $title:string, $callback:callable, $page:string, $section:string, $args:array );
}



// add_settings_section callback
function webaiid_sidebar_option(){
    echo " Customize sidebar";
}


function sidebar_profile_pic(){
    $profilePic = esc_attr(get_option('profile_picture'));
    echo '<input type="button" class="button btn-secondary" value="Upload Profile Pic" id="upload-button" /> <input type="hidden" id="profile-pic" name="profile_picture" value="'. $profilePic.'" /> ';
}

function webaiid_sidebar_name(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/> ';
}

function webaiid_twiter_handler(){
    $twiter = esc_attr(get_option('twiter_handler'));
    
    echo '<input type="text" name="twiter_handler" value="'.$twiter.'" placeholder="twiter handler"/> <p> Input your twiter user name</p> ';
}


// admin page callback
 function webaiid_theme_create_page(){
    // code goes here 
   require_once(get_template_directory() . "/inc/templates/webaiid-admin-page.php");
 }

// submenu page callback

 function webaiid_theme_css_submneu(){
    // submenu
    echo "webaiid css settings";
 }

