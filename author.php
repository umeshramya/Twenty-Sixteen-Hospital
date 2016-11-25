<?php get_header( ); ?>

<header>
	<div class="title-hospital-wraper"><h1><?php echo the_author_meta('display_name');  ?></h1> </div>
</header>
<div id="primary" class="content-area-without-sidebar-hospital">
		<main role="main">
			<div class="archive-posts-wraper-hospital">
				<div style="clear: both;"></div><!-- dummy div for clear floats-->
					<div class="hospital-author-meta">
						<?php echo get_avatar( get_the_author_meta( 'ID' ) , 200 ); ?>
						<br>
						<?php echo the_author_meta( 'qualification' ).'<br>'; ?>
						<?php echo the_author_meta('user_department').'<br>'; ?>
						<?php echo the_author_meta ('description').'<br>'; ?>
					</div>
					<div class="hospital-contact-form" >
						<h2> Send email to <?php echo the_author_meta('display_name'); ; ?></h2>
						<form class="hospital_contact_form" action="" method="post">
							<label for="from_email"></label>email.
							<input type="email" name="from_email" id='from_email' value="" placeholder="enter your email">
							<label for="email_subject"></label>subject
							<input type="text" name="email_subject" id="email_subject" value="" placeholder="enter your email subject">
							<label for="email_message"></label>Message
							<textarea name="email_message" id="email_message" rows="8" cols="80"></textarea>
							
							<input type="submit" class="primery" name="submit_btn">
						</form>
					</div>
				<div style="clear: both;"></div><!-- dummy div for clear floats-->
			</div>
			<br>
			<hr>
			<div class="archive-posts-wraper-hospital">
		<?php if(have_posts()):	?>
		<div style="clear: both;"></div><!-- dummy div for clear floats-->

		<?php 	while ( have_posts() ) : the_post();?>


				<?php get_template_part( '/template-parts/content', 'archive' ); ?>



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
