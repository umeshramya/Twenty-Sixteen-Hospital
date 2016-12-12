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


       $headers[]= "Reply-To:<". $name_email ."> <". $from_email . ">";
      //  $headers[] .="Cc:<". get_option('hospital_email') . ">";


        wp_mail( $to_email, $subject_email , $message_email, $headers);
      echo "Submitted email";
      die();

  } catch (Exception $e) {//trap
    echo $e->getMessage();
    die();
  }// end try catch segement

}
/*
==========================================
ajax functio of review submit
==========================================
*/
add_action( 'wp_ajax_nopriv_hospital_submit_review', 'hospital_submit_review_callback');
add_action( 'wp_ajax_hospital_submit_review', 'hospital_submit_review_callback');

function hospital_submit_review_callback(){



$title=wp_strip_all_tags( $_POST['title']);
$name =wp_strip_all_tags($_POST['name']);
$email=wp_strip_all_tags($_POST['email']);
$content =wp_strip_all_tags($_POST['content']);
$to_email= wp_strip_all_tags($_POST['to_email'] );
try {
  $postarr = array(
    'post_author' => 1,
    'post_title'  =>$title,
    'post_content'  => $content,
    'post_type'   =>'reviews',
    'meta_input'  => array(
      'reviewer_name' => $name,
      'reviewer_email'  => $email
    )
     );

wp_insert_post( $postarr );
// send email copy to admin of site to check

  $subject = 'Review ' . get_option('blogname' ). ' ' . $title ;
  $headers[]= "Reply-To:<". $name ."> <". $email . ">";
  wp_mail( $to_email, $subject, $content, $headers );
  echo "submitted your valuble review";
    die();

} catch (Exception $e) {
  echo $e->getMessage();
  die();

}

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
4. Private insurances
5. Goverment Schemes
6. Packages
7. Reviews

================================
*/

$menu_name = 'Header menu';
$menu_exists = wp_get_nav_menu_object( $menu_name );

// If it doesn't exist, let's create it.
if( !$menu_exists){
    $menu_id = wp_create_nav_menu($menu_name);

	// Set up default menu items
    // wp_update_nav_menu_item($menu_id, 0, array(
    //     'menu-item-title' =>  __('Home'),
    //     'menu-item-classes' => 'home',
    //     'menu-item-url' => home_url( '/' ),
    //     'menu-item-status' => 'publish'));

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
            'menu-item-title' =>  __('insurances'),
             'menu-item-object' => 'archive',
            'menu-item-url' => home_url( '/?post_type=insurances' ),
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Schemes'),
             'menu-item-object' => 'archive',
            'menu-item-url' => home_url( '/?post_type=schemes' ),
            'menu-item-status' => 'publish'));


        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Packages'),
             'menu-item-object' => 'archive',
            'menu-item-url' => home_url( '/?post_type=packages' ),
            'menu-item-status' => 'publish'));


        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  __('Reviews'),
             'menu-item-object' => 'archive',
            'menu-item-url' => home_url( '/?post_type=reviews' ),
            'menu-item-status' => 'publish'));
}


 ?>
