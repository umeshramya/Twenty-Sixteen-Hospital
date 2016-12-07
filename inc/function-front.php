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


       $headers = "From:'.$from_email .' \r\n";
       $headers .="Cc:'. get_option('hospital_email') .' \r\n";


        wp_mail( $to_email, $subject_email, $message_email,$from_email, $headers);
      echo "Submitted email";

  } catch (Exception $e) {//trap
    echo $e->getMessage();
  }// end try catch segement

}


/*
==================================================================
faculty_return_string
this function returns the author details for dsiplay as acrhive
===============================================================
*/
function faculty_return_string($author){
$return_string = '<div class="archive-post-hospital author-links">';
// $user_post_count =  count_user_posts( $author->ID,  'post',  true );
// $_SESSION['author_ID']= $author->ID;

$link = get_author_posts_url($author->ID);
$return_string = $return_string .
          '<a href="'. add_query_arg('author_ID' , $author->ID , $link ).'">'.// add_query_arg function adds argument end of permlink to be used as $_GET on author.php
            get_avatar( $author->ID, 160 ) .
        '<h2>'. $author->display_name . '</h2>' .
                $author->qualification . '</br>' .
                $author->user_department . '</br>' .
                '</a>';

    $return_string = $return_string .  '</div>';

  return $return_string;
}



/*
================================
Creatig menu items for archives
1. Departements
2. facilities
3. Carriers
4. Private insurences
5. Goverment Schemes

================================
*/

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

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Carriers'),
             'menu-item-object' => 'archive',
            'menu-item-url' => home_url( '/?post_type=carriers' ),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Insurences'),
             'menu-item-object' => 'archive',
            'menu-item-url' => home_url( '/?post_type=insurences' ),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Schemes'),
             'menu-item-object' => 'archive',
            'menu-item-url' => home_url( '/?post_type=schemes' ),
            'menu-item-status' => 'publish'));
}


 ?>
