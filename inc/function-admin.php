
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
require_once (get_stylesheet_directory() . '/inc/templates/admin-submenu-settings.php');

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

  register_setting( 'hospital-theme-group', 'faculty_hierarchy');
  register_setting( 'hospital-theme-group', 'hospital_email');
  register_setting( 'hospital-theme-group', 'office_phone');

  register_setting( 'hospital-theme-group', 'profile_picture' );
  // register_setting( 'hospital-theme-group', 'facebook_handler' );
  // register_setting( 'hospital-theme-group', 'twitter_handler','sanitize_twiter_handler' );
  // register_setting( 'hospital-theme-group', 'google_plus_handler' );

  //add sectiions to seeting page
  add_settings_section( 'hospital_sidebar_options', 'Sidebar Options', 'hospital_sidebar_options', 'umesh_hospital' );
  //add fields to setting section
  add_settings_field( 'hospital-name', 'Hospital Name', 'hospital_sidebar_name', 'umesh_hospital', 'hospital_sidebar_options'  );
  // add_settings_field( 'hospital-address', 'Hospital address', 'hospital_sidebar_address', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'sidebar-phones', 'Hospital Phones', 'hospital_sidebar_phone', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'Activate-contact-form', 'Activate Builtin Contact Form', 'activate_hopsital_contact_form', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'hospital_email', 'Hospital email', 'hospital_contact_email', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'office-phone', 'Office Phone', 'hospital_office_phone', 'umesh_hospital','hospital_sidebar_options');


  // add_settings_field( 'sidebar-facebook', 'Facebook Page', 'hospital_sidebar_facebook', 'umesh_hospital', 'hospital_sidebar_options');
  // add_settings_field( 'sidebar-twitter', 'Twitter', 'hospital_sidebar_twitter', 'umesh_hospital', 'hospital_sidebar_options');
  // add_settings_field( 'sidebar-google-plus', 'Google Plus', 'hospital_sidebar_google_plus', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'hospital-departement', 'Departements', 'hospital_sidebar_departements', 'umesh_hospital','hospital_sidebar_options');
  add_settings_field( 'hospital-facilities', 'Facilities', 'hospital_sidebar_facilities', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'hospital-private-insurence', 'Private Insurence', 'hospital_sidebar_priavte_insurence', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'hospita_goverment-schemes', 'Goverment Schemes', 'hospital_goverment_schemes', 'umesh_hospital', 'hospital_sidebar_options' );
  add_settings_field( 'hospital-faculty-hierarchy', 'Faculty Hierarchy', 'hospital_faculty_hierarchy', 'umesh_hospital', 'hospital_sidebar_options');
  add_settings_field( 'sidebar-profile-picture', 'Hospital Profile picture', 'hospital_sidebar_profile_picture', 'umesh_hospital', 'hospital_sidebar_options');

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

function hospital_contact_email(){
  $contact_email = sanitize_email( get_option( 'hospital_email' ) );
  echo '<input type="text" name="hospital_email" value="' . $contact_email . '" placeholder="Hospital email" />';
}

function hospital_office_phone(){
  $office_phone = esc_attr( get_option( 'office_phone' ) );
  echo '<input type="text" name="office_phone" value="' . $office_phone . '" placeholder="office_phone" />';

}


// function hospital_sidebar_facebook(){
// $facebook_handler = esc_attr( get_option( 'facebook_handler' ) );
// echo '<input type="text" name="facebook_handler" value="' . $facebook_handler . '" placeholder="FaceBook" />';
// }
//
// function hospital_sidebar_twitter(){
//   $twitter_handler = esc_attr( get_option( 'twitter_handler' ) );
//   echo '<input type="text" name="twitter_handler" value="' . $twitter_handler . '" placeholder="Twitter" /> <p class="description">Input twitter account without @ symbol</p>';
// }
//
// function hospital_sidebar_google_plus(){
//   $google_plus_handler = esc_attr( get_option( 'google_plus_handler' ) );
//   echo '<input type="text" name="google_plus_handler" value="' . $google_plus_handler . '" placeholder="Google Plus" />';
// }

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

function hospital_faculty_hierarchy(){
  $faculty_hierarchy= esc_attr( get_option( 'faculty_hierarchy' ) );
  echo '<input type="text" name="faculty_hierarchy" value="' . $faculty_hierarchy . '" placeholder="Faculty hierarchy" style="width:100%";/>';
  echo '<p>Enter each postion by coma separtation </p>';
  echo '<p>Example :- HOD, Senior Consultant, Consultant, Resident, Techanician, Nurse, Ward boy</p>';
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
// //sanitize twitter handler
// function sanitize_twiter_handler($input){
//   $output = sanitize_text_field( $input );
//   $output = str_replace('@','',$output);
//   return $output;
// }

function hospital_sidebar_options(){
  // echo '<h3>custom hopsital sidebar options</h3>';
}







/*
====================
USER ADD metabox
====================

*/
add_action( 'show_user_profile', 'hospital_user_fields');
add_action( 'edit_user_profile', 'hospital_user_fields');

function hospital_user_fields($user){
// ==============departments options================================
$cur_user_department=  esc_attr(get_the_author_meta( 'user_department', $user->ID ));
$departments_array = explode (',' ,  get_option('departements'));

echo '<label for="user_department"/> Department </label>';
echo '<select name="user_department" id="user_department"/>';

echo '<option value="Select Department">Select Department</option>';
foreach ($departments_array as $department) {
    echo '<option value="'. trim($department) .'"';
    if ($cur_user_department== trim($department) ){echo 'selected="true"';}
   echo  '>'. trim($department) .'</option>';
}
  echo '</select></br>';
// ===================Qulification===================
$cur_user_quilification=  esc_attr(get_the_author_meta( 'qualification', $user->ID ));
echo '<label for="qualification">Qualification</label>';
echo '<input type="text" name="qualification" id="qualification" value="'. trim($cur_user_quilification) .'"/></br>';

// ===================Registretion Number============
$cur_user_registration=  esc_attr(get_the_author_meta( 'registration_number', $user->ID ));
echo '<label for="registration_number">Registration Number</label>';
echo '<input type="text" name="registration_number" id="registration_number" value="'. trim($cur_user_registration) .'"/></br>';

// ===================faculty Hirerachy=============
$cur_user_faculty_hierarchy = esc_attr( get_the_author_meta( "user_faculty_hierarchy" , $user->ID  ) );
$faculty_hierarchy_array =explode (',' ,  get_option('faculty_hierarchy'));

echo '<label for="user_faculty_hierarchy"/> Faculty Hierarchy </label>';
echo '<select name="user_faculty_hierarchy" id="user_faculty_hierarchy"/>';

echo '<option value="Select faculty hierarchy">Select faculty hierarchy</option>';
foreach ($faculty_hierarchy_array as $faculty_hierarchy) {
    echo '<option value="'. trim($faculty_hierarchy) .'"';
    if ($cur_user_faculty_hierarchy== trim($faculty_hierarchy) ){echo 'selected="true"';}
   echo  '>'. trim($faculty_hierarchy) .'</option>';
}
  echo '</select></br>';

//=====================Activate Contact Form per authot=========

$option_checked=  esc_attr(get_the_author_meta( 'activate_contact_form', $user->ID ));
$checked = (@$option_checked==1 ? 'checked':'');
echo '<label for="activate_contact_form">Activate Contact Form </label>';
echo '<input type="checkbox"  name="activate_contact_form"  value="1" '. $checked .' /></br>';

// echo '<input type="text" name="registration_number" id="registration_number" value="'. trim($cur_user_registration) .'"/></br>';
//
// $option_checked = get_option( 'activate_contact' );
// $checked = (@$option_checked==1 ? 'checked':'');
// echo '<label> <input type="checkbox"  name="activate_contact"  value="1" '. $checked .' /></label> </br>';

// ====================Consulation Time=============
// ====================On leave setting=============

}

add_action( 'personal_options_update','hospital_save_user_data' );
add_action( 'edit_user_profile_update', 'hospital_save_user_data' );
function hospital_save_user_data($user){
  if(!current_user_can( 'edit_user',$user )){
    return false;
  }

  update_user_meta( $user, 'user_department', $_POST['user_department']);
  update_user_meta ($user, 'qualification', $_POST['qualification'] );
  update_user_meta ($user, 'registration_number', $_POST['registration_number'] );
  update_user_meta( $user, 'user_faculty_hierarchy', $_POST['user_faculty_hierarchy'] );
  update_user_meta( $user, 'activate_contact_form', $_POST['activate_contact_form'] );

}




?>
