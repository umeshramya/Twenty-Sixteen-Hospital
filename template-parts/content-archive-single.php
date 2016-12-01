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

	<div class="">
		<?php
			the_content();
			edit_post_link(	);
		?>
			</div><!-- .entry-content -->
</article><!-- #post-## -->
