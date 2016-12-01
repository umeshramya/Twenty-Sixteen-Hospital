<?php
/*
this is of single with descrption of Author contact form and blog post of author
*/
 ?>
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

          <?php
          // code check user checked activate contactfrom
          $option_checked=  esc_attr(get_the_author_meta( 'activate_contact_form'));
          if(@$option_checked==1){
            ?>

					<div class="hospital-contact-form" >
						<h2> Send email to <?php echo the_author_meta('display_name');  ?></h2>
						<form class="hospital_contact_form" id="author_contact_form">
							<input type="hidden" name="to_email" id= "to_email" value="<?php echo the_author_meta("email") ?>">
							<label for="name_email"></label>Name
							<input type="text" name="name_email" id="name_email" value="" placeholder="Enter name">
							<label for="from_email"></label>email.
							<input type="email" name="from_email" id="from_email" value="" placeholder="enter your email">
							<label for="subject_email"></label>subject
							<input type="text" name="subject_email" id="subject_email" value="" placeholder="enter your email subject">
							<label for="message_email"></label>Message
							<textarea name="message_email" id="message_email" rows="8" cols="80"></textarea>

							<input type="button"  name="btn_contact" id="btn_contact" value="Send email">

						</form>
            <div id="email_result"></div>
            <?php } ?><!-- end of if statment for activate contact form-->

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
