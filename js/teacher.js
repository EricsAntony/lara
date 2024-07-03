

$(document).ready(function () {
    $('#dataTables').dataTable();
});


$(document).on('click', '.btn_update', function(){  
    //console.log("function called");
    var s_id=$(this).data("id1");
     var adm_no=$(this).data("id2");
    var s_name=$(this).data("id3");
    var email=$(this).data("id4");
  
   
    document.getElementById("tid").value=s_id;
    document.getElementById("tname").value=adm_no;
    document.getElementById("temail").value=s_name;
    document.getElementById("tphone").value=email;
    
    
}); 

$(document).on('click', '#delbtn', function(){  
  console.log("del function called");
  var s_id=$(this).data("id1");
  document.getElementById("delid").value=s_id;
}); 


$(document).ready(function(){  
    function fetch_data()  
    {  
         $.ajax({  
              url:"../php/getteacherdata.php",  
              method:"POST",  
              success:function(data){  
                  
                   $('#teacherdata').html(data);  
                  
              }  
         });  
    }  
    fetch_data();   

    $("#delteacherconfirm").click(function(){
     var delid=document.getElementById("delid").value;
      
       //debugger
           $.ajax({
               url:'../php/deleteteacher.php',
               type:'post',
               data:{id:delid},
               success:function(response){
                 fetch_data(); 
                   console.log (response);
              
                   if(response == 1){
                    showNotification("alert-success","Teacher details removed","bottom","right","","")
                   
                   }
                 else{
                     showNotification("alert-danger","Something went Wrong","bottom","right","","")
                 }
               },
               error: function (xhr, ajaxOptions, thrownError) {
                  console.log(xhr.status);
                  console.log(thrownError);
                }
           });
       
   });  



    $(document).on('click', '#updateteacher', function(){  
        //console.log("Update called");
        var hangoutButton = $("#closem");
        hangoutButton.click();
    var id= document.getElementById("tid").value;
    var name =document.getElementById("tname").value;
    var email  = document.getElementById("temail").value;
    var phone = document.getElementById("tphone").value;
    
             $.ajax({  
                  url:"../php/updateteacher.php",  
                  method:"POST",  
                  data:{id:id,name:name,email:email , phone:phone },  
                  dataType:"text",  
                  success:function(data){ 
                    fetch_data();   
                   console.log(data);
                    if(data==1)
                    showNotification("alert-success","Teacher details updated","bottom","right","","");
                    else showNotification("alert-danger","Something went wrong","bottom","right","","")
                   
                  }  
             });  
       
   });
  }); 