<div class="archive-post-hospital">
  <article>
    <?php the_title( sprintf( '<h2 class="entry-title-hospital"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
    // twentysixteen_post_thumbnail();
      $job_description = get_post_meta( $post->ID );
      if(!empty($job_description['job_title'])){
        $job_title =esc_attr($job_description['job_title'][0]);
        $job_string= '<h4>Job Title : ' . $job_title .'</h4>';
      }

      if(!empty($job_description['qualification'])){
        $qualification =$job_description['qualification'][0];
        $job_string=   $job_string . '<small>Qualification : ' . $qualification .'</small>';
      }

      if(!empty($job_description['vacancies'])){
        $vacancies =$job_description['vacancies'][0];
        $job_string=   $job_string .  '<br>Vacancies : ' . $vacancies ;
      }

      if(!empty($job_description['salary_range'])){
        $salary_range = $job_description['salary_range'][0];
        $job_string=   $job_string .  '<br><strong>Salary Range : ' . $salary_range .'</strong>';
      }
      $job_string=   $job_string . '<span style="color:green; float:right; padding:2px;"><p> ..Click to Apply Now</p></span>';

      echo '<a href="'.
      esc_url( get_permalink() )
      .'">'.$job_string .'</a>';

// use closeing date for validating display
if(!empty($job_description['closing_date'])){
  $closing_date =$job_description['closing_date'][0];
}else{
  $closing_date='';
}



    ?>
  </article>
</div>
