
<h1>Hospital Theme Support Options</h1>
<?php settings_errors( ); ?>
 <form class="hospital_setting_form" action="options.php" method="post">
   <?php settings_fields( 'hospital-theme-support-group' ); ?>
   <?php do_settings_sections( 'umesh_hospital_theme_support' ); ?>
   <?php submit_button(); ?>

 </form>
