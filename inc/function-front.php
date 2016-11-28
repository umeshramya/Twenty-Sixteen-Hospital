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


add_action( 'wp_ajax_nopriv_hospital_send_email_author', 'hospital_send_email_author_callback');
add_action( 'wp_ajax_hospital_send_email_author', 'hospital_send_email_author_callback');

function hospital_send_email_author_callback(){


  $to_email=  $_POST["to_email"];
  $name_email=  $_POST["name_email"];
  $from_email =  $_POST["from_email"] ;
  $subject_email=esc_html( $_POST["subject_email"] );
  $message_email =esc_html($_POST ["message_email"] );

    wp_mail( $to_email, $subject_email, $message_email,$from_email);
    echo "Submitted email";
}

 ?>
