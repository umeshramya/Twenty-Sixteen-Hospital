jQuery(document).ready(function($){

  /*
  ===========================
  ajax contact form submission
  ============================
  */
  $('#btn_contact').on('click',function(e){
      e.preventDefault();
  var to_email = $('#to_email').val();
  var name_email = $("#name_email").val();
  var from_email = $("#from_email").val();
  var subject_email = $("#subject_email").val();
  var message_email= $("#message_email").val();

if(to_email==''){
  alert("To email cannot be empty");
  return;
}

 if(name_email==''){
   alert('Name can not be empty');
   return;
 }


if (from_email==''){
  alert('Your email is required');
  return;
}else{
  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if(!filter.test(from_email)){
    alert('Please enter valid email address');
    return;

  }
}

if(subject_email==''){
  alert('subject of email can not be empty');
  return;
}
if (message_email==''){
  alert('message can be empty');
  return;
}
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


           $("#name_email").attr("disabled", true);
           $("#from_email").attr("disabled", true);
           $("#subject_email").attr("disabled", true);
           $("#message_email").attr("disabled", true);
            $('#btn_contact').attr("disabled", true);

            $("#email_result").html(result);
            alert (result);
        },
        error: function(errorThrown){
            $("#email_result").html(errorThrown);
            alert(errorThrown);

            }
    });
});

/*
===========================
ajax review submission
============================
*/

$('#btn_submit_review').on('click',function(e){
    e.preventDefault();
var title = $('#hospital_review_title').val();
var name = $("#hospital_reviewer_name").val();
var email = $("#hospital_reviewer_email").val();
var content = $("#hospital_review_content").val();


if(title==''){
alert("please add title to your review");
return;
}

if(name==''){
 alert('Please enter your name');
 return;
}


if (email==''){
alert('Your email is required');
return;
}else{
var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
if(!filter.test(email)){
  alert('Please enter valid email address');
  return;

}
}

if(content==''){
alert('your review content is required');
return;
}
if (message_email==''){
alert('message can be empty');
return;
}
$.ajax({
  datatype : "json",
  type : "post",
  url: myAjax.ajaxurl,
  data:{ action:"hospital_submit_review",
          title :  title,
          name : name,
          email :  email,
          content :  content
        },
  success:function(result) {
          // This outputs the result of the ajax request


         $("#hospital_review_title").attr("disabled", true);
         $("#hospital_reviewer_name").attr("disabled", true);
         $("#hospital_reviewer_email").attr("disabled", true);
         $("#hospital_review_content").attr("disabled", true);

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
