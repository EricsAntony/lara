$(document).ready(function(){
    $("#logout1").click(function(){
            $.ajax({
                url:'../../php/logout_student.php',
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