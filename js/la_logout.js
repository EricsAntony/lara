$(document).ready(function(){
     $("#la_logout").click(function(){
        console.log('Called');
             $.ajax({
                 url:'../../php/la_logout.php',
                 type:'post',
                 success:function(response){
                     console.log (response)
                     if(response == 1){
                       window.location = "../login.php";
                     }
                 }
             });
         
     });
 });