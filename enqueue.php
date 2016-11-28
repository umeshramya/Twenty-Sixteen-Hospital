<?php
/*
@package Hospital tatwa
======================================
ADMIN ENQUEUE FUNCTION
======================================
*/

 function hospital_load_admin_scripts($hook){
  if ('toplevel_page_umesh_hospital' != $hook ){
    return;
  }
  wp_register_style('hospital_admin_style', get_stylesheet_directory() . '/css/hospital_admin.css', array(), '1.0.0', 'all' );
  wp_enqueue_style('hospital_admin_style');
  wp_enqueue_media();
  wp_register_script( 'hospital_admin_script', get_stylesheet_directory(). '/js/hospital_admin.js', array('jquery'),'1.0.0', true );
  wp_enqueue_script( 'hospital_admin_script');
 }
 add_action( 'admin_enqueue_scripts','hospital_load_admin_scripts');




/*
===================
ENQUE FRONT EBML_ID_CONTENTENCODING
=========================
*/
function hospital_enque_front_end_files(){
  wp_enqueue_style( 'hospital_frot_style', get_stylesheet_directory_uri(). '/css/hospital_front.css', array(), '1.0.0', 'all');
  wp_register_script( 'hospital_front_script',get_stylesheet_directory_uri().'/js/hospital_front.js', array('jquery'),'1.0.0' , true );
  wp_localize_script( 'hospital_front_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'hospital_front_script');

}
add_action( 'wp_enqueue_scripts','hospital_enque_front_end_files');
