
jQuery(document).ready(function($){
var mediaUploader;
  $('#admin_upload_profile_picture').on('click',function(e){
  e.preventDefault();
    if(mediaUploader){
      mediaUploader.open();
      return;
    }
    mediaUploader=wp.media.frames.file_frame = wp.media({
      title: 'Choose Profile Picture',
      button: {
        text: 'Choose Picture'
      },
      multiple: false
    });
    mediaUploader.on('select', function(e){
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile_picture').val(attachment.url);
    });
    mediaUploader.open();
  });





  $('#remove_profile_picture').on('click', function(e){
    e.preventDefault();
    var answer = confirm('Are you sure to remove the profile picture?');
    $('#profile_picture').val('');
    $('.hospital_setting_form').submit();
  });


  // user Department scripts


});
document.getElementById('user_department').selectedIndex=
<?php echo esc_attr(get_the_author_meta( 'user_department', $user->ID )); ?>;
