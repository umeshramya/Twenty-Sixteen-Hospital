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

echo '<div class="hospital-carrier">';
		$job_description = get_post_meta( $post->ID );
		if(!empty($job_description['job_title'])){
			$job_title =esc_attr($job_description['job_title'][0]);
			echo '<h4>Job Title : ' . $job_title .'</h4>';
		}

		if(!empty($job_description['qualification'])){
			$qualification =$job_description['qualification'][0];
			echo '<small>Qualification : ' . $qualification .'</small>';
		}

		if(!empty($job_description['vacancies'])){
			$vacancies =$job_description['vacancies'][0];
			echo  '<br>Vacancies : ' . $vacancies ;
		}

		if(!empty($job_description['salary_range'])){
			$salary_range = $job_description['salary_range'][0];
			echo  '<br><strong>Salary Range : ' . $salary_range .'</strong>';
		}

		if(!empty($job_description['closing_date'])){
			echo '<br>Last date for applying : ' . $job_description['closing_date'][0];
		}
echo '</div>
			<div class="hospital-carrier">';
		if(!empty($job_description['principle_duties'])){
			print_r( '<br>Job Discription : <br>' . html_entity_decode($job_description['principle_duties'][0]));
			// the_content( $job_description['principle_duties'][0] );
		}
echo '</div>';

$hospital_email= get_option( 'hospital_email');
if(empty($hospital_email)){
	$hospital_email= get_option( 'admin_email');
}


$email_display = 'email to with bio attachment : '. $hospital_email . '<br>use this subject line : ' . get_the_title();
echo '<a href="mailto:'.$hospital_email.'?subject='. get_the_title()  .'">'. $email_display . '</a>';

	echo '</br>';
	echo get_the_tag_list( '<br>Tags: ',  ', ','<br>' );
	echo '</br>';
	edit_post_link();

		?>
			</div><!-- .entry-content -->
</article><!-- #post-## -->
