
<!-- this template is for admin_submenu setting of hospital menu -->
<?php
$hospital_name = esc_attr( get_option( 'hospital_name' ) );
$hospital_address = esc_attr( get_option( 'hospital_address' ) );
$emergency_phone = esc_attr( get_option( 'emergency_phone' ) );
$ambulance_phone = esc_attr( get_option( 'ambulance_phone' ) );
$help_desk_phone = esc_attr( get_option( 'help_desk_phone' ) );
$Hospital_profile_picture = esc_attr( get_option( 'profile_picture' ) );
$all_phone_numbers = '<h4>Emergency Phone ' . $emergency_phone . '</br> Ambulance Phone ' . $ambulance_phone . '</br>' . 'Help desk phone ' . $help_desk_phone .'</br></h4>';
 ?>
<h1> Hospital Settings </h1>

<div class="wrapper">
  <div class="preview-container">
        <div class="hospital_numbers">
          <?php print '<h3>'. $hospital_name . '</h3>';  ?>
          <?php print  $hospital_address ;  ?>
          <?php print $all_phone_numbers; ?>
        </div><!-- .hospital_numbers -->
        <div class="image-container">
            <img id= "hospital_profile_picture_preview" src="<?php echo $Hospital_profile_picture ?>" alt="Hospital profile picture" />
        </div><!-- .image-container-->
  </div><!-- .preview-container -->

  <div class="form-container">
    <?php settings_errors( ); ?>
    <form  class="hospital_setting_form" action="options.php" method="post">
    <?php settings_fields( 'hospital-theme-group' ); ?>
    <?php do_settings_sections( 'umesh_hospital' ); ?>
    <?php submit_button('Save Changes', 'primary','btnSubmit'); ?>
  </form>
  </div><!-- .form-container -->
</div><!-- .wrapper -->
