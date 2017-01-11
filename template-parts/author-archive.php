<div >
  <article>
    <?php the_title( sprintf( '<h2 class="entry-title-hospital"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        twentysixteen_excerpt();
        twentysixteen_post_thumbnail();
        the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
		  	) );?>
        <br><hr>
  </article>
</div>
