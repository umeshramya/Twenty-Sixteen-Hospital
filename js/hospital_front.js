jQuery(document).ready(function($){
  $('#btn_contact').on('click',function(e){
  var to_email = $('#to_email').val();
  var name_email = $("#name_email").val();
  var from_email = $("#from_email").val();
  var subject_email = $("#subject_email").val();
  var message_email= $("#message_email").val();

  $.ajax({
    datatype : "json",
    type : "post",
    url: myAjax.ajaxurl,
    data:{ action:"hospital_send_email_author",
            to_email :  to_email,
            name_email : name_email,
            from_email :  from_email,
            subject_email :  subject_email,
            message_email :   message_email
          },
    success:function(result) {
            // This outputs the result of the ajax request

            $("#email_result").html(result);
            alert (result);
        },
        error: function(errorThrown){
            $("#email_result").html(errorThrown);
            alert(errorThrown);

            }
    });



});

})
