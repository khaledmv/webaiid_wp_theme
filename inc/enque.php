<?php

/**
 *  @pakage webaiid
 */


 function webaiid_admin_load_scripts($hook){

   if('toplevel_page_webaiid_settings' != $hook) return; 
    wp_register_style( 'webaiid_admin', get_template_directory_uri() . '/css/webaiid.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style( 'webaiid_admin');

    wp_enqueue_media();
    wp_register_script( 'webaiid_admin_scripts', get_template_directory_uri(  ) . '/js/webaiid.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'webaiid_admin_scripts');
 }


 add_action( 'admin_enqueue_scripts', 'webaiid_admin_load_scripts');