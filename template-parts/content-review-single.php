<?php
/**
 * The template part for displaying single archive from hospital posts
 *
 * @package Twenty-Sixteen-Child
 *
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content-hospital">
		<?php


				$review_description = get_post_meta($post->ID);
				if(!empty($review_description['reviewer_name'][0])){
				$reviewer_name = $review_description['reviewer_name'][0];
				echo '<h3>'.$reviewer_name.'</h3>';

				}

			the_post_thumbnail('post-thumbnail');
			the_content();
			echo '</br>';
			echo get_the_tag_list( '<br>Tags: ',  ', ','<br>' );
			echo '</br>';
			edit_post_link(	);
		?>
	</div><!-- .entry-content-hospital -->
</article><!-- #post-## -->
