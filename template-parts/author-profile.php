<?php
/*
This themplate part is for displaying author profile and also contact form if activated

*/

 ?>





<div style="clear: both;"></div><!-- dummy div for clear floats-->
  <div class="hospital-author-meta">
    <?php


     ?>
    <?php $user_id = esc_attr( $_GET['author']); ?>
    <?php echo get_avatar( $user_id , 200 ); ?>
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

      <form  id="author_contact_form">
      <input type="hidden" name="to_email" id= "to_email" value="<?php echo  esc_attr(get_the_author_meta("email", $user_id)); ?>">
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
