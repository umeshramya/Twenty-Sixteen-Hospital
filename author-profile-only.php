<?php
/*
this display archives of single authore along with profile and contct form

*/
 ?>
<?php get_header( ); ?>

<header>
	<div class="title-hospital-wraper"><h1><?php echo the_author_meta('display_name');  ?></h1> </div>
</header>
<div id="primary" class="content-area-without-sidebar-hospital">
		<main role="main">
			<div class="archive-posts-wraper-hospital">
        <!--  get the authorn proile  single author -->
        	<?php get_template_part( '/template-parts/author', 'profile' ); ?>

			<div class="archive-posts-wraper-hospital">

	 </main>
 </div><!--.content area-->
<?php get_footer( ); ?>
