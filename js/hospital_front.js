jQuery(document).ready(function($){
  $('#btn_contact').on('click',function(e){
  var to_email = $('#to_email').val();
  var name_email = $("#name_email").val();
  var from_email = $("#from_email").val();
  var subject_email = $("#subject_email").val();
  var message_email= $("#message_email").val();



  // var to_email = <?php echo the_author_meta('display_name'); ?>

  var datastring =  'to_email='+ to_email
                    + '&name_email=' + name_email
                    + '&from_email=' + from_email
                    + '&subject_email=' + subject_email
                    +'&message_email=' + message_email;
alert (datastring);
  $.ajax({
    url: 'ajax-js';
    data:datastring;
    type : "POST";
    action:'hospital_send_email_author';
  })




});

})
