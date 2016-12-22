<?php
/*
Template Name: All staff list
*/
 ?>

<?php get_header( ); ?>
<header>
<?php
if (isset($_POST['user_query'])){
  echo '<div class="title-hospital-wraper"><h1>Search Results</h1> </div>';
}else{
  echo '<div class="title-hospital-wraper"><h1>Hospital Faculty</h1> </div>';

}
 ?>



</header>
<div id="primary" class="content-area-without-sidebar-hospital">
		<main role="main">
		<div class="archive-posts-wraper-hospital">
      <?php $search_term=''; ?>

      <form id="search_usear_from"  action="" method="post">
        <input type="text" name="user_query" id="user_query" value=" <?php if(isset($_POST['user_query'])) {echo $_POST['user_query'];}else{ echo'';}; ?>" placeholder="enter your search" >
        <input type="submit" name="btn_search"  id="btn_search" value="search">
      </form>

		<div style="clear: both;"></div><!-- dummy div for clear floats-->
    <?php
    if (isset($_POST['user_query'])){
    $search_term= $_POST['user_query'];

    $args = array (
    'order' => 'ASC',
    'orderby' => 'display_name',
    'search' => '*'.esc_attr( $search_term ).'*',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key'     => 'first_name',
            'value'   => $search_term,
            'compare' => 'LIKE'
        ),
        array(
            'key'     => 'last_name',
            'value'   => $search_term,
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'description',
            'value' => $search_term ,
            'compare' => 'LIKE'
        )
      )
    );


$user_query = new WP_User_Query( $args);

  // User Loop
  if ( ! empty( $user_query->results ) ) {
    foreach ( $user_query->results as $author ) {
    echo  faculty_return_string($author);//this function returns the archive link box of authors
    }//end of inner foreach loop
    echo '<div style="clear: both;"></div>';//<!-- dummy div for clear floats-->
    echo '<br><hr>';

  }//end of if statement for checking empty results

        return;
    }// end of if statemnt of for isset to $_POST



    $faculty_hierarchy_array = explode(',' , get_option('faculty_hierarchy' ));
    foreach ($faculty_hierarchy_array as $faculty_hierarchy) {

      $args_inner = array( 'orderby' => 'display_name',
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
