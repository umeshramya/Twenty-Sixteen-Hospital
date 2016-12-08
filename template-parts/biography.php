<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div style="clear: both;"></div><!-- dummy div for clear floats-->
<!-- <div class="author-info"> -->
<div class="author-wraper" style="width:300">
	<!-- <div class="author-avatar"> -->
		<div class="" style="width:150; float:left;">
		<?php
		echo get_avatar( get_the_author_meta( 'user_email'), 120);
		?>
	</div><!-- .author-avatar -->

	<div class="author_details" style="width:150; float:left; padding-left:15px">
		<h2 class="author-title"><span class="author-heading">
			<?php echo 'Author : '. esc_attr( get_the_author_meta( 'display_name' )).'<br>'; ?>
			<?php echo '<small> &nbsp &nbsp &nbsp'.esc_attr( get_the_author_meta( 'qualification' )).'</small><br>'; ?>
	    <?php echo esc_attr( get_the_author_meta( 'user_department')) .'<br>'; ?>

		<p class="author-bio">

			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'Contact  %s', 'twentysixteen' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->
		<div style="clear: both;"></div><!-- dummy div for clear floats-->
	</div><!-- .author_wraper -->
</div><!-- .author-wraper -->
