<?php
/*
front page php to be used for home page
 */

get_header(); ?>

<div id="primary" class="content-area-without-sidebar-hospital">
	<main id="main" class="site-main" role="main">
		<div class="archive-posts-wraper-hospital">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page-front' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
</div><!--.archive-posts-wraper-hospital-->
	<hr id='bottum-line'>
	<?php get_sidebar( 'content-bottom' ); ?>
	</main><!-- .site-main -->



</div><!-- .content-area -->


<?php get_footer(); ?>
