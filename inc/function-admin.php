
<?php
/*
@package Hospital tatwa
======================================
FUNCTION ADMIN
======================================
*/


function hospital_add_admin_menu(){
// generate Hospital admin page
  add_menu_page( 'Hospital Theme Options', 'Hospital', 'manage_options', 'umesh_hospital', 'hospital_theme_create_page' ,' ', 110 );

  // genearte admin menu sub pages
  add_submenu_page( 'umesh_hospital', 'Hospital Settings Options', 'Settings', 'manage_options', 'umesh_hospital', 'hospital_theme_create_page' );
  add_submenu_page( 'umesh_hospital', 'Hospital Theme Options', 'Theme Options', 'manage_options', 'umesh_hospital_theme_support', 'hospital_theme_support_page' );
  add_submenu_page( 'umesh_hospital', 'Hospital CSS Options', 'Custom CSS', 'manage_options', 'umesh_hospital_custom_css', 'hospital_theme_custom_css' );
//Activate custum Settings
add_action( 'admin_init', 'hospital_theme_custom_settings' );

}

add_action( 'admin_menu','hospital_add_admin_menu');

/*
==========================================
Creating sub menu functions
===========================================
*/
function  hospital_theme_create_page(){
// genartion of custom admin page
require_once (get_stylesheet_directory() . '/templates/admin-submenu-settings.php');

}

function hospital_theme_support_page(){
  require_once (get_stylesheet_directory() . '/templates/post-formats.php');

}

function hospital_theme_custom_css(){
//geneate hospital settings

}
/*
============================================
 register fields groups, section and fields
============================================
*/
function hospital_theme_custom_settings(){

  //=========== SETTING OPTIONS =============
  register_setting( 'hospital-theme-group', 'hospital_name' );
    // register_setting( 'hospital-theme-group', 'hospital_address' );
  register_setting( 'hospital-theme-group', 'emergency_phone' );
  register_setting( 'hospital-theme-group', 'ambulance_phone' );
  register_setting( 'hospital-theme-group', 'help_desk_phone' );
  register_setting( 'hospital-theme-group', 'activate_contact' );
  register_setting( 'hospital-theme-group', 'departements' );
  register_setting( 'hospital-theme-group', 'facilities' );
  register_setting( 'hospital-theme-group', 'private_insurence' );
  register_setting( 'hospital-theme-group', 'goverment_schemes' );
  register_setting( 'hospital-theme-group', 'profile_picture' );  //social media
  register_setting( 'hospital-theme-group', 'facebook_handler' );
  register_setting( 'hospital-theme-group', 'twitter_handler','sanitize_twiter_handler' );
  register_setting( 'hospital-theme-group', 'google_plus_handler' );

  //add sectiions to seeting page
  add_settings_section( 'hospital_sidebar_options', 'Sidebar Options', 'hospital_sidebar_options', 'umesh_hospital' );
  //add fields to setting section
  add_settings_field( 'hospital-name', 'Hospital Name', 'hospital_sidebar_name', 'umesh_hospital', 'hospital_sidebar_options'  );
  // add_settings_field( 'hospital-address', 'Hospital address', 'hospital_sidebar_address', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'sidebar-phones', 'Hospital Phones', 'hospital_sidebar_phone', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'Activate-contact-form', 'Activate Builtin Contact Form', 'activate_hopsital_contact_form', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'sidebar-facebook', 'Facebook Page', 'hospital_sidebar_facebook', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'sidebar-twitter', 'Twitter', 'hospital_sidebar_twitter', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'sidebar-google-plus', 'Google Plus', 'hospital_sidebar_google_plus', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'hospital-departement', 'Departements', 'hospital_sidebar_departements', 'umesh_hospital','hospital_sidebar_options');
  add_settings_field( 'hospital-facilities', 'Facilities', 'hospital_sidebar_facilities', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'hospital-private-insurence', 'Private Insurence', 'hospital_sidebar_priavte_insurence', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'hospita_goverment-schemes', 'Goverment Schemes', 'hospital_goverment_schemes', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'sidebar-profile-picture', 'Hospital Profile picture', 'hospital_sidebar_profile_picture', 'umesh_hospital', 'hospital_sidebar_options');


  //=================THEME SUPPORT OPTIONS AND Contact OPTION====================
  register_setting( 'hospital-theme-support-group', 'post_formats' );

  add_settings_section( 'hospital_theme_suppot_options', 'Theme Support', 'hospital_theme_support','umesh_hospital_theme_support' );
  add_settings_field( 'post-formats', 'Post Formats', 'hodpital_theme_post_formats', 'umesh_hospital_theme_support', 'hospital_theme_suppot_options' );


}


/*
==============================
Theme support functions
=============================
*/


function hospital_theme_support(){
  echo '<h3> Activate and Deactivate Theme support options</h3>';
}
function hodpital_theme_post_formats(){
  $option_checked = get_option( 'post_formats' );
  $formats = array ('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
  $output='';
  // $checked='';
  foreach ($formats as $format) {
    $checked = (@$option_checked[$format]==1 ? 'checked':'');
    $output .= '<label> <input type="checkbox" id="'. $format .'" name="post_formats['. $format . ']"  value="1" '. $checked .' />' . $format .'</label> </br>';
  }
echo $output;
}



/*
===============================
Setting functions
==============================
*/

function activate_hopsital_contact_form(){
  $option_checked = get_option( 'activate_contact' );
  $checked = (@$option_checked==1 ? 'checked':'');
 echo '<label> <input type="checkbox"  name="activate_contact"  value="1" '. $checked .' /></label> </br>';
}

function hospital_sidebar_name(){
$hospital_name = esc_attr( get_option( 'hospital_name' ) );
echo '<input type="text" name="hospital_name" value="' . $hospital_name . '" placeholder="Hospital Name"  style="width:100%"/>';
// echo '<input type="text" name="help_desk_phone" value="' . $help_desk_phone . '" placeholder="Help Desk Phone" />';
}

function hospital_sidebar_address(){
// $hospital_address= esc_attr( get_option( 'hopsital_address' ) );
// echo '<textarea name="hopsital_address" placeholder="Hospital Address">'. $hospital_address .'</textarea>';
}

function hospital_sidebar_phone(){
  $emergency_phone = esc_attr( get_option( 'emergency_phone' ) );
  $ambulance_phone = esc_attr( get_option( 'ambulance_phone' ) );
  $help_desk_phone = esc_attr( get_option( 'help_desk_phone' ) );
echo '<input type="text" name="emergency_phone" value="' . $emergency_phone . '" placeholder="Emergency Phone" />';
echo '<input type="text" name="ambulance_phone" value="' . $ambulance_phone . '" placeholder="Ambulance Phone" />';
echo '<input type="text" name="help_desk_phone" value="' . $help_desk_phone . '" placeholder="Help Desk Phone" />';
}

function hospital_sidebar_facebook(){
$facebook_handler = esc_attr( get_option( 'facebook_handler' ) );
echo '<input type="text" name="facebook_handler" value="' . $facebook_handler . '" placeholder="FaceBook" />';
}

function hospital_sidebar_twitter(){
  $twitter_handler = esc_attr( get_option( 'twitter_handler' ) );
  echo '<input type="text" name="twitter_handler" value="' . $twitter_handler . '" placeholder="Twitter" /> <p class="description">Input twitter account without @ symbol</p>';
}

function hospital_sidebar_google_plus(){
  $google_plus_handler = esc_attr( get_option( 'google_plus_handler' ) );
  echo '<input type="text" name="google_plus_handler" value="' . $google_plus_handler . '" placeholder="Google Plus" />';
}

function hospital_sidebar_departements(){
  $departements = esc_attr( get_option( 'departements' ) );
  echo '<input type="text" name="departements" value="' . $departements . '" placeholder="Departements" style="width:100%";/>';
  echo '<p>Enter each departement by coma separtation </p>';
  echo '<p>Example ;- Cardiology, Onco Surgery, Internal Medicine, OBG</p>';
  echo '<p> Use approprite caps and small letters</p>';
}

function hospital_sidebar_facilities(){
  $facilities = esc_attr( get_option( 'facilities' ) );
  echo '<input type="text" name="facilities" value="' . $facilities . '" placeholder="facilities" style="width:100%";/>';
  echo '<p>Enter each facility by coma separtation </p>';
  echo '<p>Example ;- Echo, Ultrasound, CT Scan, MRI</p>';
  echo '<p> Use approprite caps and small letters</p>';
}

function hospital_sidebar_priavte_insurence(){
  $private_insurence = esc_attr( get_option( 'private_insurence' ) );
  echo '<input type="text" name="private_insurence" value="' . $private_insurence . '" placeholder="Private Insurence" style="width:100%";/>';
  echo '<p>Enter each Insurence by coma separtation </p>';
  echo '<p>Example ;- Vidal health care, Medi asst, Star Health</p>';
  echo '<p> Use approprite caps and small letters</p>';
}

function hospital_goverment_schemes(){
  $goverment_schemes = esc_attr( get_option( 'goverment_schemes' ) );
  echo '<input type="text" name="goverment_schemes" value="' . $goverment_schemes . '" placeholder="Goverment Schemes" style="width:100%";/>';
  echo '<p>Enter each scheme by coma separtation </p>';
  echo '<p>Example ;- Yesheswini, Vajapay Yojana, RSBY</p>';
  echo '<p> Use approprite caps and small letters</p>';
}

function hospital_sidebar_profile_picture(){
$profile_picture = esc_attr( get_option( 'profile_picture' ) );
if(empty($profile_picture)){
  echo '<input type="button" class="button button-secondary" name="admin_upload_profile_picture" value="Upload Profile Picture" id="admin_upload_profile_picture" />';
  echo '<input type="hidden" name="profile_picture" value=" " id="profile_picture"/>';
}else{
  echo '<input type="button" class="button button-secondary" name="admin_upload_profile_picture" value="Replace Profile Picture" id="admin_upload_profile_picture" />';
  echo '<input type="button" class="button button-secondary" name="remove_profile_picture" value="Remove" id="remove_profile_picture" />';
  echo '<input type="hidden" name="profile_picture" value="' . $profile_picture . ' " id="profile_picture"/>';
}

}
//sanitize twitter handler
function sanitize_twiter_handler($input){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','',$output);
  return $output;
}

function hospital_sidebar_options(){
  // echo '<h3>custom hopsital sidebar options</h3>';
}





?>
