<?php
/*
This template is for displaying archives of facilties like CT SCan, MRI etc
*/
 ?>

<?php get_header( ); ?>
<header>
	<div class="title-hospital-wraper"><h1>Carriers</h1> </div>
</header>
<div id="primary" class="content-area-without-sidebar-hospital">
		<main role="main">
			<div class="archive-posts-wraper-hospital">
		<?php if(have_posts()):	?>
		<div style="clear: both;"></div><!-- dummy div for clear floats-->

		<?php 	while ( have_posts() ) : the_post();?>


				<?php get_template_part( '/template-parts/content', 'carriers-archive' ); ?>



		<?php endwhile  ?>

		<?php endif; ?>
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
