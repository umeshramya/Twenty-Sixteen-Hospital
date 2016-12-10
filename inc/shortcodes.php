<?php
/*
==================================
Short Codes
==================================
*/
add_shortcode( 'faculty_by_hierarchy_department', function($attr){
  // $faculty_hirerachy_array = explode(',' , get_option('faculty_hirerachy' ));
  // foreach ($faculty_hirerachy_array as $faculty_hirerachy) {


    $args_inner = array(
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
    $args_inner = array(
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
 add_shortcode( 'review_submit', function(){
   ?>
<form class="" action="" method="post">
<label for="hospital_review_title">Title<br></label>
<input type="text" name='hospital_review_title' id='hospital_review_title' placeholder="Please enter title of your review" required="required"/>

<label for="hospital_reviewer_email">Your name<br></label>
<input type="email" name='hospital_reviewer_name' id='hospital_reviewer_name' placeholder="Please enter your name" required="required"/>

<label for="hospital_reviewer_email">Your email<br.</label>
<input type="text" name='hospital_reviewer_email' id='hospital_reviewer_email' placeholder="Please enter your name" required="required" />

<label for="hospital_review_content">Reivew<br></label>
<textarea name="hospital_review_content" id="hospital_review_content" placeholder="Please enter your review " required="required"></textarea>


<label for="btn_submit_review"><br></label>
<input type="button" name="btn_submit_review" id="btn_submit_review" value="submit">
</form>

   <?php
 } );

 ?>
