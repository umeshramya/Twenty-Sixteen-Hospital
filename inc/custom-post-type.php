<?php
/*
@package Hospital tatwa
======================================
CUSTOM POST TYPE
======================================
*/
$contact= get_option( 'activate_contact' );
if(@$contact == 1){
 add_action( 'init', 'hospital_contact_custom_post_type');
 add_filter( 'manage_hopsital_contact_posts_columns', 'hospital_contact_columns');
 add_action( 'manage_hopsital_contact_posts_custom_column', 'hospital_contact_custom_column', 10, 2 );

 }

//==========contact form CPT =============

function hospital_contact_custom_post_type(){
  $label  = array(
    'name'          =>'Messages',
    'singular_name' =>'Message',
    'menu_name'     =>'Messages',
    'name_admin_bar'=>'Message'
   );

   $args  = array(
     'labels'           =>$label,
     'show_ui'          =>true,
     'show_in_menu'     =>true,
     'capability_type'  =>'post',
     'position'         =>26,
     'menu_icon'        =>'dashicons-email-alt',
     'hierarchical'     =>false,
     'supports'         =>array('title', 'editor', 'author')
    );

    register_post_type( 'hopsital_contact', $args );

}

function hospital_contact_columns($newColumns){
  $newColumns = array();
  $newColumns['title']='Name with Message';
  $newColumns['from_email']='From email';
  // $newColumns['message']='Message';
  $newColumns['to_email']='To email';
  $newColumns['to_name']='To Name';
  $newColumns['date']='Date';
  return $newColumns;

}

function hospital_contact_custom_column($colum, $post_id){
  switch ($colum) {
    case ('from_email'):
    echo 'From email';
    break;
    case ('to_email'):
    echo 'To email';
    break;
    break;
    case ('to_email'):
    echo 'To email';
    break;
    case ('to_name'):
    echo 'To name';
    break;

    default:
      # code...
      break;
  }

}

/*
====================
USER ADD metabox
====================

*/
add_action( 'show_user_profile', 'hospital_user_fields');
add_action( 'edit_user_profile', 'hospital_user_fields');

function hospital_user_fields($user){
// ==============departments options================================
$cur_user_department=  esc_attr(get_the_author_meta( 'user_department', $user->ID ));
$departments_array = explode (',' ,  get_option('departements'));

echo '<label for="user_department"/> Department </label>';
echo '<select name="user_department" id="user_department"/>';

echo '<option value="Select Department">Select Department</option>';
foreach ($departments_array as $department) {
    echo '<option value="'. $department .'"';
    if ($cur_user_department== $department ){echo 'selected="true"';}
   echo  '>'. $department .'</option>';
}
  echo '</select>';
// ===================Qulification===================
$cur_user_quilification=  esc_attr(get_the_author_meta( 'qualification', $user->ID ));
echo '<label for="qualification">Qualification</label>';
echo '<input type="text" name="qualification" id="qualification" value="'. $cur_user_quilification .'"/>';

// ===================Registretion Number============
$cur_user_registration=  esc_attr(get_the_author_meta( 'registration_number', $user->ID ));
echo '<label for="registration_number">Registration Number</label>';
echo '<input type="text" name="registration_number" id="registration_number" value="'. $cur_user_registration .'"/>';

// ===================Mangement Position=============
// ====================Consulation Time=============
// ====================On leave setting=============

}

add_action( 'personal_options_update','hospital_save_user_data' );
add_action( 'edit_user_profile_update', 'hospital_save_user_data' );
function hospital_save_user_data($user){
  if(!current_user_can( 'edit_user',$user )){
    return false;
  }

  update_user_meta( $user, 'user_department', $_POST['user_department']);
  update_user_meta ($user, 'qualification', $_POST['qualification'] );
  update_user_meta ($user, 'registration_number', $_POST['registration_number'] );
}


/*
=======================
DEPARTAMENT POST TYPE
=======================
*/

 add_action( 'init', 'hospital_department_custom_post_type');


function hospital_department_custom_post_type (){
  $labels = array(
 		"singular_name" => __( 'Department' ),
 		"menu_name" => __( 'Department' ),
 		"archives" => __( 'true' ),
 		);

 	$args = array(
 		"label" => __( 'Departments' ),
 		"labels" => $labels,
    "description" => "<p>These posts for adding departments inside the hospital</p>
                      <p>These are auto generated from hospital setting options</p>
                      <p>To order them change the date</p>
                      <p>To delete the post always empty it from thrash also or else it may create error</P>",
 		"public" => true,
 		"publicly_queryable" => true,
 		"show_ui" => true,
 		"show_in_rest" => false,
 		"rest_base" => "",
 		"has_archive" => true,
 		"show_in_menu" => true,
 				"exclude_from_search" => false,
 		"capability_type" => "post",
    "capabilities" => array(
    "create_posts" => "do_not_allow", ),// false < WP 4.5, credit @Ewout
 		"map_meta_cap" => true,
 		"hierarchical" => false,
 		"rewrite" => array( "slug" => "departments", "with_front" => true ),
 		"query_var" => true,
    "menu_icon" =>'dashicons-building',

 		"supports" => array( "title", "editor", "thumbnail", "excerpt" ));
   	register_post_type( "departments", $args );
}


// ============insert post department atomatically===============
function  hospital_insert_department_posts(){
  $titles= explode(',' , get_option( 'departements'));
    foreach ($titles as $title ) {
    $title=trim($title);
  $post_object= get_page_by_title( $title,  'OBJECT',  'departments');
if (null==$post_object){
        wp_insert_post( array(
          'post_name'   =>  $title,
          'post_type'   => 'departments',
          'post_title' => $title,
          'post_status' => 'publish'
        ));
      }else{

        }
   }
}

add_action('init', 'hospital_insert_department_posts');
/*
============================
Facilities custom post type
============================
*/

add_action( 'init', 'hospital_facility_custom_post_type');
function hospital_facility_custom_post_type (){
  $labels = array(
 		"singular_name" => __( 'Facility' ),
 		"menu_name" => __( 'Facility' ),
 		"archives" => __( 'true' ),
 		);

 	$args = array(
 		"label" => __( 'Facilities' ),
 		"labels" => $labels,
 		"description" => "These posts for adding facilties inside the hospital
                      These are auto generated from hospital setting options
                      To order them change the date
                      To delete the post empty it from thrash also or else it wont function",
 		"public" => true,
 		"publicly_queryable" => true,
 		"show_ui" => true,
 		"show_in_rest" => false,
 		"rest_base" => "",
 		"has_archive" => true,
 		"show_in_menu" => true,
 				"exclude_from_search" => false,
 		"capability_type" => "post",
    "capabilities" => array(
    "create_posts" => "do_not_allow", ),// false < WP 4.5, credit @Ewout
 		"map_meta_cap" => true,
 		"hierarchical" => false,
 		"rewrite" => array( "slug" => "facilities", "with_front" => true ),
 		"query_var" => true,
    "menu_icon" =>'dashicons-palmtree',

 		"supports" => array( "title", "editor", "thumbnail", "excerpt" ));
   	register_post_type( "facilities", $args );
}
// ============insert post facilities atomatically===============
function  hospital_insert_facility_posts(){
  $titles= explode(',' , get_option( 'facilities'));
    foreach ($titles as $title ) {
    $title=trim($title);
  $post_object= get_page_by_title( $title,  'OBJECT',  'facilities');
if (null==$post_object){
        wp_insert_post( array(
          'post_name'   =>  $title,
          'post_type'   => 'facilities',
          'post_title' => $title,
          'post_status' => 'publish'
        ));
      }else{

        }
   }
}

add_action('init', 'hospital_insert_facility_posts');




 ?>
