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
            $link = get_author_posts_url( $author->ID);
          $return_string = $return_string .
           '<div class="archive-post-hospital author-links">'.
          // $author_info = get_userdata($author->ID);
                   '<a href="'. $link .'">'.
                  get_avatar( $author->ID, 160 ) .
                  '<h2>'. $author->display_name . '</h2>' .
                          $author->qualification . '</br>' .
                          $author->user_department . '</br>' .
                  '</a>'.
                 '</div>';
        }//end of inner foreach loop
        $return_string = $return_string .'<div style="clear: both;"></div>'.
         '<br><hr>';
         return $return_string;
      }
// }//outer for each


});




 ?>
