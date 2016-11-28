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

// var datastring =  'to_email='+ to_email
//                   + '&name_email=' + name_email
//                   + '&from_email=' + from_email
//                   + '&subject_email=' + subject_email
//                   +'&message_email=' + message_email;

function hospital_send_email_author_callback(){
  $to_email= esc_html( $_POST['to_email'] );
  $name_email= esc_html( $_POST['name_email'] );
  $from_email = esc_html( $_POST['from_email'] );
  $subject_email=esc_html( $_POST['subject_email'] );
  $message_email =esc_html($_POST ['message_email'] );
  echo $message_email;
}

 ?>
