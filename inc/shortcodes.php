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




 ?>
