<?php
/*
Template Name : All staff list
This template is for displaying archives of facilties like CT SCan, MRI etc
*/
 ?>

<?php get_header( ); ?>
<header>
	<div class="title-hospital-wraper"><h1>Hospital Faculty</h1> </div>
</header>
<div id="primary" class="content-area-without-sidebar-hospital">
		<main role="main">
			<div class="archive-posts-wraper-hospital">
		<div style="clear: both;"></div><!-- dummy div for clear floats-->
    <?php
    $faculty_hirerachy_array = explode(',' , get_option('faculty_hirerachy' ));
    foreach ($faculty_hirerachy_array as $faculty_hirerachy) {

      $args_inner = array(
        'meta_query' => array( array(
        'key' => 'user_faculty_hirerachy',
        'value' => trim($faculty_hirerachy),
        'compare' => '='))
        );
        // The Query
        $user_query = new WP_User_Query( $args_inner );

        // User Loop
        if ( ! empty( $user_query->results ) ) {
        echo '<h2>'.$faculty_hirerachy.'</h2>';
        	foreach ( $user_query->results as $author ) {

            echo '<div class="archive-post-hospital">';
            // $author_info = get_userdata($author->ID);
              $link = get_author_posts_url( $author->ID);
                    echo '<a href="'. $link .'">'.
                    get_avatar( $author->ID, 128 ) .
                    '<h2>'. $author->display_name . '</h2>' .
                            $author->qualification . '</br>' .
                            $author->user_department . '</br>' .
                    '</a>';

            echo '</div>';
        	}//end of inner foreach loop
          echo '<div style="clear: both;"></div>';//<!-- dummy div for clear floats-->
          echo '<hr>';
        }//end of if

      }//outer foreach end
     ?>

	</div><!--.archive-posts-wraper-hospital-->

		<div style="clear: both;"></div>
		<div class="hospital-old-new-posts">
			<?php

      //this div meant for creating pagination 
			 ?>
		</div><!--.hospital-old-new-posts -->

	 </main>
 </div><!--.content area-->
<?php get_footer( ); ?>
