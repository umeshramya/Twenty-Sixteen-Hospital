<?php
/*
Template Name: All staff list
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
    $faculty_hierarchy_array = explode(',' , get_option('faculty_hierarchy' ));
    foreach ($faculty_hierarchy_array as $faculty_hierarchy) {

      $args_inner = array(
        'meta_query' => array( array(
        'key' => 'user_faculty_hierarchy',
        'value' => trim($faculty_hierarchy),
        'compare' => '='))
        );
        // The Query
        $user_query = new WP_User_Query( $args_inner );

        // User Loop
        if ( ! empty( $user_query->results ) ) {
        echo '<h2>'.$faculty_hierarchy.'</h2>';
        	foreach ( $user_query->results as $author ) {
          echo  faculty_return_string($author);//this function returns the archive link box of authors
        	}//end of inner foreach loop
          echo '<div style="clear: both;"></div>';//<!-- dummy div for clear floats-->
          echo '<br><hr>';
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
    <hr id='bottum-line'>
    <?php get_sidebar( 'content-bottom' ); ?>
	 </main>

 </div><!--.content area-->
<?php get_footer( ); ?>
