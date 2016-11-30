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

    $args_inner = array(

      'meta_key' => 'user_faculty_hirerachy',
      'meat_value' => 'HOD'
        );
        // The Query
        $user_query = new WP_User_Query( $args_inner );

        // User Loop
        if ( ! empty( $user_query->results ) ) {
        	foreach ( $user_query->results as $author ) {
            echo '<div class="archive-post-hospital">';
            $author_info = get_userdata($author->ID);
              $link = get_author_posts_url( $author->ID);
              echo  get_avatar( $author->ID, 128 ) ;

              echo '<a href="'. $link .'">'.
              '<h2>'.  $author->display_name . '</h2>' .
                $author->qualification . '</br>' .
              $author->user_department . '</br>' .


              '</a>';



            echo '</div>';
        	}
        } else {
        	echo 'No users found.';
        }
     ?>

	</div><!--.archive-posts-wraper-hospital-->

		<div style="clear: both;"></div>
		<div class="hospital-old-new-posts">
			<?php
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentysixteen' ),
					'next_text'          => __( 'Next page', 'twentysixteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
				) );
			 ?>
		</div><!--.hospital-old-new-posts -->

	 </main>
 </div><!--.content area-->
<?php get_footer( ); ?>
