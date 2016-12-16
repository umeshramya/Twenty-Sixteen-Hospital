<?php
/*
This template is for displaying archives of departments like cardiology, surgery etc
*/
 ?>


<?php get_header( ); ?>
<header>
	<div class="title-hospital-wraper"><h1>Private insurances</h1> </div>

</header>
<div id="primary" class="content-area-without-sidebar-hospital">
		<main role="main">
			<div class="archive-posts-wraper-hospital">
        <?php $args = array('posts_per_page' => -1,
                            'orderby'=> 'title',
                            'order' => 'ASC',
                            'post_type' => 'insurances');
        $the_query= new WP_Query($args); ?>
        <?php if($the_query->have_posts()):	?>
        <div style="clear: both;"></div><!-- dummy div for clear floats-->

        <?php 	while ($the_query-> have_posts() ) : $the_query->the_post();?>

        <?php get_template_part( '/template-parts/content', 'custom-archive' ); ?>

        <?php endwhile  ?>

        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
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
    <hr id='bottum-line'>
    <?php get_sidebar( 'content-bottom' ); ?>
	 </main>

 </div><!--.content area-->
<?php get_footer( ); ?>
