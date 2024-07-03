$(document).ready(function(){
     $("#sbtn").click(function(){        
         var email = $("#email").val().trim();
         var mob = $("#mob").val().trim();
         var pwd = $("#pwd").val().trim();
         var phoneno = /^\d{10}$/;

         if (!(mob.match(phoneno))) {
            showNotification("alert-danger", "Mobile number should contain 10 digits", "bottom", "right", "", "");
            return false;
        }
         if(email != '' & mob != '' & pwd != ''){
         if( email != ""){
             $.ajax({
                 url:'../php/signup.php',
                 type:'post',
                 data:{email:email,mob:mob,pwd:pwd},
                 success:function(response){
                     console.log (response);
                
                     if(response == 1){
                        showmsg("Success","Registration Success","success","../Pages/login.php");

                     }
                   else{
                    showerror("Sorry","Something Went Wrong","error","../Pages/signup.php");
                   }
                 },
                 error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                  }
             });
         }
        }
        else
        {
            showNotification("alert-danger", "All fields are mandatory", "bottom", "right", "", "");
        }
     });
 });