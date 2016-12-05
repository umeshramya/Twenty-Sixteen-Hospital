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
  $titles= array_reverse(explode(',' , get_option( 'departements')));////this array reverse to make first entey to make it latest post
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
  $titles= array_reverse(explode(',' , get_option( 'facilities')));//this array reverse to make first entey to make it latest post
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

 /*
 ============================
 Carriers custom post type
 ============================
 */

 add_action( 'init', 'hospital_carrier_custom_post_type');
 function hospital_carrier_custom_post_type(){
   $labels = array(
  		"singular_name" => __( 'Carrier' ),
  		"menu_name" => __( 'Carrier' ),
  		"archives" => __( 'true' ),
  		);

  	$args = array(
  		"label" => __( 'Carriers' ),
  		"labels" => $labels,
  		"description" => "These posts for adding Carriers inside the hospital",
  		"public" => true,
  		"publicly_queryable" => true,
  		"show_ui" => true,
  		"show_in_rest" => false,
  		"rest_base" => "",
  		"has_archive" => true,
  		"show_in_menu" => true,
  				"exclude_from_search" => false,
  		"capability_type" => "post",
     	"map_meta_cap" => true,
  		"hierarchical" => false,
  		"rewrite" => array( "slug" => "carriers", "with_front" => true ),
  		"query_var" => true,
     "menu_icon" =>'',
  		"supports" => array( "title" ));
    	register_post_type( "carriers", $args );


 }

add_action( 'add_meta_boxes',function(){
add_meta_box( 'job_description', 'Job Description',
    function($post){
      wp_nonce_field( 'hospital_save_job_description',  "hospital_job_description_nounce" );

    $job_description = get_post_meta( $post->ID );

    if(!empty($job_description['job_title'])){
      $job_title =esc_attr($job_description['job_title'][0]);
    }else{
      $job_title='';
    }

    if(!empty($job_description['qualification'])){
      $qualification =esc_attr($job_description['qualification'][0]);
    }else{
      $qualification='';
    }

    if(!empty($job_description['vacancies'])){
      $vacancies =esc_attr($job_description['vacancies'][0]);
    }else{
      $vacancies='';
    }


    // if(!empty($job_description['opening_date'])){
    //   $opening_date =$job_description['opening_date'][0];
    // }else{
    //   $opening_date='';
    // }

    if(!empty($job_description['closing_date'])){
      $closing_date =$job_description['closing_date'][0];
    }else{
      $closing_date='';
    }

    // if(!empty($job_description['interview_date'])){
    //   $interview_date =$job_description['interview_date'][0];
    // }else{
    //   $interview_date='';
    // }


    if(!empty($job_description['salary_range'])){
      $salary_range = $job_description['salary_range'][0];
    }else{
      $salary_range='';
    }

    if(!empty($job_description['email_copy'])){
      $email_copy =$job_description['email_copy'][0];
    }else{
      $email_copy='';
    }

    // if(!empty($job_description['close_applications'][0])){
    // $option_checked  =$job_description['close_applications'][0];
    // $close_applications = (@$option_checked==1 ? 'checked':'');
    // }




      echo '<div class="element_wrap">
            <label for="job_title">Job Title <br></label>
             <input type="text" name="job_title" id="job_title" style="width:100%" required value="' . $job_title .'">
             </div>';

     echo '<div class="element_wrap">
           <label for="qualification">Qualification <br></label>
            <input type="text" name="qualification" id="qualification" style="width:100%" value="' . $qualification .'">
            </div>';

    echo '<div class="element_wrap">
          <label for="vacancies">vacancies <br></label>
           <input type="text" name="vacancies" id="vacancies" style="width:100%" value="' . $vacancies .'">
           </div>';

      // echo '<div class="element_wrap">
      //       <label for="opening_date">Opening Date<br></label>
      //        <input type="date" name="opening_date" id="opening_date" value="' . $opening_date .'">
      //        </div>';

       echo '<div class="element_wrap">
            <label for="closing_date">Closing Date <strong>(Not visible to public after set date)</strong><br></label>
            <input type="date" name="closing_date" id="closing_date"  value="'.$closing_date.'">
            </div>';

      // echo '<div class="element_wrap">
      //       <label for="interview_date">Interview Date <br></label>
      //       <input type="date" name="interview_date" id="interview_date" value="' . $interview_date .'">
      //       </div>';

      echo '<div class="element_wrap">
            <label for="salary_range">Salary Range<br></label>
             <input type="text" name="salary_range" id="salary_range" style="width:100%" value="' . $salary_range .'">
             </div>';

     echo '<div class="element_wrap">
            <label for="email_copy">Email Copy</label>
            <input type="email" name="email_copy" id="email_copy" style="width:100%" value="' . $email_copy .'">
            </div> <br><br>';

            $content = get_post_meta( $post->ID, 'principle_duties', true);
            $editor_id= 'principle_duties';
            $settings =array(
              'textarea_rows' => 8,
              'media_buttons' => false);
              wp_editor( $content, $editor_id, $settings );


            //   if (!empty($close_applications) && (!$close_applications == 0)){
            //   echo '<br><div class="element_wrap">
            //          <label for="close_applications">Close Applications</label>
            //          <input type="checkbox"  name="close_applications" id="close_applications" value="1" '. $close_applications .' />
            //          </div> <br>';
            //        }else{
            //  echo '<br><div class="element_wrap">
            //         <label for="close_applications">Close Applications</label>
            //         <input type="checkbox"  name="close_applications"  value="1"/>
            //         </div> <br>';
            //       }



},
      'carriers','normal', 'high');


 } );

add_action( 'save_post', 'hospital_save_job_description');
 function hospital_save_job_description($post_id){

   if (isset($_POST['job_title'])){
     $meta_value = sanitize_text_field($_POST['job_title']);
     if ( isset( $meta_value ) && 0 < strlen( trim( $meta_value ) ) ) {
       update_post_meta( $post_id, 'job_title', $meta_value );
      }
    }


    if (isset($_POST['qualification'])){
      $meta_value = sanitize_text_field($_POST['qualification']);
      if ( isset( $meta_value ) && 0 < strlen( trim( $meta_value ) ) ) {
        update_post_meta( $post_id, 'qualification', $meta_value );
       }
     }


     if (isset($_POST['vacancies'])){
       $meta_value = sanitize_text_field($_POST['vacancies']);
       if ( isset( $meta_value ) && 0 < strlen( trim( $meta_value ) ) ) {
         update_post_meta( $post_id, 'vacancies', $meta_value );
        }
      }





    // if (isset($_POST['opening_date'])){
    //   $meta_value =  ($_POST['opening_date']);
    //     update_post_meta( $post_id, 'opening_date', $meta_value );
    //  }

     if (isset($_POST['closing_date'])){
       $meta_value =  ($_POST['closing_date']);
         update_post_meta( $post_id, 'closing_date', $meta_value );
      }
      // if (isset($_POST['interview_date'])){
      //   $meta_value =  ($_POST['interview_date']);
      //     update_post_meta( $post_id, 'interview_date', $meta_value );
      //  }




      if (isset($_POST['salary_range'])){
        $meta_value =  sanitize_text_field($_POST['salary_range']);
        if ( isset( $meta_value ) && 0 < strlen( trim( $meta_value ) ) ) {
          update_post_meta( $post_id, 'salary_range', $meta_value );
         }
       }

       if (isset($_POST['email_copy'])){
         $meta_value = $_POST['email_copy'];
         if ( isset( $meta_value ) && 0 < strlen( trim( $meta_value ) ) ) {
           update_post_meta( $post_id, 'email_copy', $meta_value );
          }
        }

        if (isset($_POST['principle_duties'])){
          $meta_value = $_POST['principle_duties'];
          if ( isset( $meta_value ) && 0 < strlen( trim( $meta_value ) ) ) {
            update_post_meta( $post_id, 'principle_duties', $meta_value );
           }
         }



        // if(!empty( $_POST['close_applications'])){
        // $meta_value = $_POST['close_applications'] ? 1 : 0;
        // update_post_meta( $post_id, 'close_applications', $meta_value );
        // }


 }


 ?>
