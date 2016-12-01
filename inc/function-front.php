<?php
/*\
This file for functions front end

*/
add_filter( 'pre_get_posts', 'hospital_archive_post_per_page' );

function hospital_archive_post_per_page($query){
  if( $query->is_main_query() && $query->is_post_type_archive('departments') ) {
		$query->set( 'posts_per_page', 20 );
	}

  if( $query->is_main_query() && $query->is_post_type_archive('facilities') ) {
    $query->set( 'posts_per_page', 20 );
  }
}

/*
=====================================
Ajax function of contact author form
=====================================
*/
add_action( 'wp_ajax_nopriv_hospital_send_email_author', 'hospital_send_email_author_callback');
add_action( 'wp_ajax_hospital_send_email_author', 'hospital_send_email_author_callback');

function hospital_send_email_author_callback(){

  try {
    $to_email=  esc_attr(trim($_POST["to_email"]));

    if ($to_email=='' || !is_email($to_email)){
      throw new Exception('to email is not valid');
    }

    $name_email=  esc_attr(trim($_POST["name_email"]));
    if ($name_email==''){
      throw new Exception('Please fill your name');
    }


    $from_email =  esc_attr(trim($_POST["from_email"]));
    if ($from_email=='' || !is_email($from_email)){
      throw new Exception('Yor email is not valid');
    }

    $subject_email=esc_attr( trim($_POST["subject_email"] ));
    if ($subject_email==''){
      throw new Exception('Subject of message is needed');
    }

    $message_email =esc_attr(trim($_POST ["message_email"] ));
    if ($message_email==''){
      throw new Exception('Message Body can not be empty');
    }

    $headers = array(
      From => $name_email . ' <' . $from_email . '>'
      // ‘From:'. $name_email . ' <' . $from_email . '>'
    );

        wp_mail( $to_email, $subject_email, $message_email,$from_email, $headers);
      echo "Submitted email";

  } catch (Exception $e) {//trap
    echo $e->getMessage();
  }// end try catch segement

}





$menu_name = 'Header menu';
$menu_exists = wp_get_nav_menu_object( $menu_name );

// If it doesn't exist, let's create it.
if( !$menu_exists){
    $menu_id = wp_create_nav_menu($menu_name);

	// Set up default menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Home'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url( '/' ),
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Facilities'),
         'menu-item-object' => 'archive',
        'menu-item-url' => home_url( '/?post_type=facilities' ),
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Departements'),
         'menu-item-object' => 'archive',
        'menu-item-url' => home_url( '/?post_type=departments' ),
        'menu-item-status' => 'publish'));

}


 ?>
