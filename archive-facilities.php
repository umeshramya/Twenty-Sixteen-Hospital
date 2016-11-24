<?php get_header( ); ?>
<header>
	<div class="title-hospital-wraper"><h1>Facilities</h1> </div>
</header>
<div id="primary" class="content-area-without-sidebar-hospital">
		<main role="main">
			<div class="archive-posts-wraper-hospital">
		<?php if(have_posts()):	?>
		<div style="clear: both;"></div><!-- dummy div for clear floats-->

		<?php 	while ( have_posts() ) : the_post();?>
			<div class="archive-post-hospital">
				<article>
					<?php the_title( sprintf( '<h2 class="entry-title-hospital"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h>' );
					twentysixteen_post_thumbnail();?>
				</article>
			</div>

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
