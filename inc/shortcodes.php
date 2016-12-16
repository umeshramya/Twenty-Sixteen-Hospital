<?php
/*
==================================
Short Codes
==================================
*/
add_shortcode( 'faculty_by_hierarchy_department', function($attr){
  // $faculty_hirerachy_array = explode(',' , get_option('faculty_hirerachy' ));
  // foreach ($faculty_hirerachy_array as $faculty_hirerachy) {


    $args_inner = array('orderby' => 'display_name',
      'meta_query' => array( 'relation' => 'AND',
        array(
      'key' => 'user_faculty_hierarchy',
      'value' => $attr['hierarchy'],
      'compare' => '='),

      array(
        'key' => 'user_department',
        'value' => get_the_title(),
        'compare' => '=')
       ));

      // The Query
      $user_query = new WP_User_Query( $args_inner );

      // User Loop
      if ( ! empty( $user_query->results ) ) {
        $return_string='';
        // echo '<h2>'.$faculty_hirerachy.'</h2>';
        foreach ( $user_query->results as $author ) {

          $return_string = $return_string . faculty_return_string($author);
          }//end of inner foreach loop
        $return_string = $return_string .'<div style="clear: both;"></div>'.
         '<br><hr>';
         return $return_string;
      }
// }//outer for each


});



add_shortcode( 'faculty_by_department', function(){

  $faculty_hierarchy_array = explode(',' , get_option('faculty_hierarchy' ));
  $return_string="";
  foreach ($faculty_hierarchy_array as $faculty_hierarchy) {
    $args_inner = array('orderby' => 'display_name',
      'meta_query' => array( 'relation'=> 'AND',
      array(
      'key' => 'user_faculty_hierarchy',
      'value' => trim($faculty_hierarchy),
      'compare' => '='),

      array(
        'key' => 'user_department',
        'value' => get_the_title(),
        'compare' => '=')
       ));

      // The Query
      $user_query = new WP_User_Query( $args_inner );

      // User Loop
      if ( !empty( $user_query->results ) ) {
      $return_string = $return_string .'<h2>'.$faculty_hierarchy.'</h2>';
        foreach ( $user_query->results as $author ) {
          $return_string = $return_string . faculty_return_string($author);
        }//end of inner foreach loop



            $return_string = $return_string .  '<div style="clear: both;"></div>';//<!-- dummy div for clear floats-->
            $return_string = $return_string . '<br><hr>';
      }//end of if

    }//outer foreach end


return $return_string;

} );


//shortcode [faculty_get_auhtor_by email='']
add_shortcode( 'faculty_get_auhtor_by', function($attr){
$user_email=$attr['email'];
$user_query = new WP_User_Query(array( 'search' => $user_email ));
$author = $user_query->results;

$return_string='';


$return_string = $return_string .'<div style="clear: both;"></div>';
foreach ( $user_query->results as $author ) {

  $return_string =$return_string . faculty_return_string($author);

}//end of inner foreach loop
$return_string = $return_string .'<div style="clear: both;"></div>';



return $return_string;
});

/*
=======================================
shortr code for review submission
=======================================
*/
 add_shortcode( 'review_submit', function($attr){
  $to_email = $attr['to_email'];
   ?>
<form class="" action="" method="post">
<h5>The review submitted on this form will be moderated by admin if found appropriate may be published for public view<h5>

<label for="hospital_review_title">Title<br></label>
<input type="text" name='hospital_review_title' id='hospital_review_title' placeholder="Please enter title of your review" required/>

<label for="hospital_reviewer_email">Your name<br></label>
<input type="email" name='hospital_reviewer_name' id='hospital_reviewer_name' placeholder="Please enter your name" required/>

<label for="hospital_reviewer_email">Your email<br.</label>
<input type="text" name='hospital_reviewer_email' id='hospital_reviewer_email' placeholder="Please enter your name" required />

<label for="hospital_review_content">Reivew<br></label>
<textarea name="hospital_review_content" id="hospital_review_content" placeholder="Please enter your review" rows="8" cols="80" required></textarea>

<input type="hidden" name='hospital_to_email' id='hospital_to_email'   value="<?php  echo $to_email  ?>"/>


<label for="btn_submit_review"><br></label>
<input type="button" name="btn_submit_review" id="btn_submit_review" value="submit">
</form>

   <?php
 } );

// short code of [contact form contact_form to_email=""]
add_shortcode( 'contact_form', function($attr){
$to_email = $attr['to_email'];
 ?>

 <form  id="author_contact_form">
 <input type="hidden" name="to_email" id= "to_email" value="<?php echo  $to_email; ?>">
 <label for="name_email"></label>Name
 <input type="text" name="name_email" id="name_email" value="" placeholder="Enter name">
 <label for="from_email"></label>email.
 <input type="email" name="from_email" id="from_email" value="" placeholder="enter your email">
 <label for="subject_email"></label>subject
 <input type="text" name="subject_email" id="subject_email" value="" placeholder="enter your email subject">
 <label for="message_email"></label>Message
 <textarea name="message_email" id="message_email" rows="8" cols="80"></textarea>

 <input type="button"  name="btn_contact" id="btn_contact" value="Send email">

</form>
<div id="email_result"></div>
<?php
} );


// shortcode [hospital_name]
add_shortcode( 'hospital_name', function(){
  $retrun_string= get_option('hospital_name');
  return $retrun_string;
} );

// shortcode [emergency_phone]
add_shortcode( 'emergency_phone', function(){
  $retrun_string= get_option('emergency_phone');
  $retrun_string ='<a href="tel:'.$retrun_string.'">'. $retrun_string .'</a>';
  return $retrun_string;
} );

//shortcode [ambulance_phone]
add_shortcode( 'ambulance_phone', function(){
  $retrun_string= get_option('ambulance_phone');
  $retrun_string ='<a href="tel:'.$retrun_string.'">'. $retrun_string .'</a>';
  return $retrun_string;
} );


//shortcode [help_desk_phone]
add_shortcode( 'help_desk_phone', function(){
  $retrun_string= get_option('help_desk_phone');
  $retrun_string ='<a href="tel:'.$retrun_string.'">'. $retrun_string .'</a>';
  return $retrun_string;
} );

//shortcode [office_phone]
add_shortcode( 'office_phone', function(){
  $retrun_string= get_option('office_phone');
  $retrun_string ='<a href="tel:'.$retrun_string.'">'. $retrun_string .'</a>';
  return $retrun_string;
} );

//shortcode [hospital_email]
add_shortcode( 'hospital_email', function(){
  $retrun_string= get_option('hospital_email');
  $retrun_string ='<a href="mailto:'.$retrun_string.'">'. $retrun_string .'</a>';
  return $retrun_string;
} );



// shortcode for [hospital_address]

add_shortcode( 'hospital_address',  function(){
  $hospital_address= get_option( 'hospital_address');
  $hospital_google_map_link= get_option( 'hospital_google_map_link');
  $retrun_string ='<a href="'.$hospital_google_map_link.'"><pre>'. $hospital_address . '</pre></a>';
  return $retrun_string;
});





//shortcode [hospital_phones_email]
add_shortcode( 'address_phones_email', function(){
  $hospital_address= get_option( 'hospital_address');
  $hospital_google_map_link= get_option( 'hospital_google_map_link');
  $emergency_phone =trim(get_option('emergency_phone'));
  $ambulance_phone = trim( get_option('ambulance_phone'));
  $help_desk_phone =trim(get_option('help_desk_phone'));
  $office_phone = trim(get_option('office_phone'));
  $hospital_email =trim(get_option('hospital_email'));

  if($hospital_address!=''){
  $retrun_string = '<a href="'.$hospital_google_map_link.'">'.'Address: '. $hospital_address . '<br></a>';

  }

  if($emergency_phone!=''){
    $retrun_string .='<a href="tel:'.$emergency_phone.'">Emergency: '. $emergency_phone .',</a>';
  }

  if ($ambulance_phone !=''){
    $retrun_string .='<a href="tel:'.$ambulance_phone.'"> Ambulance: '. $ambulance_phone .',</a>';
  }

  if($help_desk_phone!=''){
    $retrun_string .='<a href="tel:'.$help_desk_phone.'"> Help Desk: '. $help_desk_phone .',</a>';

  }

  if($office_phone!=''){
    $retrun_string .='<a href="tel:'.$office_phone.'"> Office Phone: '. $office_phone .',</a>';

  }

  if($hospital_email!=''){
    $retrun_string .='<a href="mailto:'.$hospital_email.'"> email: '. $hospital_email .'</a>';

  }
  return $retrun_string;
} );



//  shottcode [schemes]
add_shortcode( 'schemes', function (){
  $args= array('posts_per_page' => -1,
                      'orderby'=> 'title',
                      'order' => 'ASC',
                      'post_type' => 'schemes');
  $the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	$return_string = '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		 $return_string .='<a href="'. esc_url(get_permalink()). '"><li>' . get_the_title() . '</li></a>';
	}
 $return_string .=  '</ul>';
	/* Restore original Post Data */
	wp_reset_postdata();
  return $return_string;
}
});


//  shottcode [insurances]
add_shortcode( 'insurances', function (){
  $args= array('posts_per_page' => -1,
                      'orderby'=> 'title',
                      'order' => 'ASC',
                      'post_type' => 'insurances');
  $the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	$return_string = '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		 $return_string .='<a href="'. esc_url(get_permalink()). '"><li>' . get_the_title() . '</li></a>';
	}
 $return_string .=  '</ul>';
	/* Restore original Post Data */
	wp_reset_postdata();
  return $return_string;
}
});


 ?>
