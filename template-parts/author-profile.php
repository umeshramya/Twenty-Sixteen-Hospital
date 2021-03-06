<?php
/*
This themplate part is for displaying author profile and also contact form if activated

*/

 ?>

<div style="clear: both;"></div><!-- dummy div for clear floats-->
  <div class="hospital-author-meta">
    <?php

    $user_id='';
    if(isset( $_GET['author_ID'])){
      $user_id = esc_attr( $_GET['author_ID']);
    }

   ?>
    <?php echo get_avatar( esc_attr( get_the_author_meta( 'ID', $user_id)) , 200 ); ?>
    <br>
    <?php echo esc_attr( get_the_author_meta( 'qualification', $user_id) ).'<br>'; ?>
    <?php echo esc_attr( get_the_author_meta( 'user_department', $user_id)) .'<br>'; ?>
    <?php echo esc_attr( get_the_author_meta( 'description', $user_id)).'<br>'; ?>
  </div>

  <?php
  // code check user checked activate contactfrom both needed checked to get form
  $option_author_checked = esc_attr(get_option( 'activate_contact' ));//from admin checkbox
  $option_checked =  esc_attr(get_the_author_meta( 'activate_contact_form', $user_id ));//from user profile of author
  if((@$option_checked==1) && (@$option_author_checked==1)){
    ?>

  <div class="hospital-contact-form" >
    <h2> Send email to <?php echo  esc_attr(get_the_author_meta('display_name', $user_id));  ?></h2>


<?php
// using short code for contact form
$to_email=get_the_author_meta("email", $user_id);
echo do_shortcode( '[contact_form to_email="'. $to_email .'"]');
 ?>

<?php } ?><!-- end of if statment for activate contact form-->

<div style="clear: both;"></div><!-- dummy div for clear floats-->
</div>
<br>
<hr>
