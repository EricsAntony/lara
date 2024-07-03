

$(document).ready(function () {
    $('#dataTables').dataTable();
});


$(document).on('click', '.btn_update', function(){  
    //console.log("function called");
    var s_id=$(this).data("id1");
     var adm_no=$(this).data("id2");
    var s_name=$(this).data("id3");
    var email=$(this).data("id4");
    var mob1=$(this).data("id5");
    var batch=$(this).data("id6");
    var yoa=$(this).data("id7");
   
    document.getElementById("sid").value=s_id;
    document.getElementById("admno").value=adm_no;
    document.getElementById("sname").value=s_name;
    document.getElementById("semail").value=email;
    document.getElementById("sbatch").value=batch;
    document.getElementById("smob").value=mob1;
    document.getElementById("syoa").value=yoa;
    
}); 

$(document).on('click', '#delbtn', function(){  
  //console.log("del function called");
  var s_id=$(this).data("id1");
  document.getElementById("stid").value=s_id;
}); 


$(document).ready(function(){  
    function fetch_data()  
    {  
         $.ajax({  
              url:"../php/getstudentdata.php",  
              method:"POST",  
              success:function(data){  
                  
                   $('#live_data').html(data);  
                  
              }  
         });  
    }  
    fetch_data();   

    $("#delstudentconfirm").click(function(){
     var delid=document.getElementById("stid").value;
      
       //debugger
           $.ajax({
               url:'../php/delstudent.php',
               type:'post',
               data:{id:delid},
               success:function(response){
                 fetch_data(); 
                   console.log (response);
              
                   if(response == 1){
                    showNotification("alert-success","Student details removed","bottom","right","","")
                   
                   }
                 else{
                     showNotification("alert-error","Somthing went Wrong","bottom","right","","")
                 }
               },
               error: function (xhr, ajaxOptions, thrownError) {
                  console.log(xhr.status);
                  console.log(thrownError);
                }
           });
       
   });  



    $(document).on('click', '#Updatestudent', function(){  
        //console.log("Update called");
        var hangoutButton = $("#closem");
        hangoutButton.click();
    var s_id= document.getElementById("sid").value;
    var adm_no =document.getElementById("admno").value;
    var s_name  = document.getElementById("sname").value;
    var email = document.getElementById("semail").value;
    var mob1 = document.getElementById("smob").value;
    var batch =document.getElementById("sbatch").value;
    var yoa  = document.getElementById("syoa").value;
    console.log(s_name,email,mob1,batch,yoa);
    
             $.ajax({  
                  url:"../php/updatestudent.php",  
                  method:"POST",  
                  data:{s_id:s_id,adm_no:adm_no,s_name:s_name , email:email , mob1:mob1 ,batch:batch,yoa:yoa},  
                  dataType:"text",  
                  success:function(data){ 
                    fetch_data();   
                   console.log(data);
                    if(data==1)
                    showNotification("alert-success","Student detail updated","bottom","right","","");
                    else showNotification("alert-error","Something went wrong","bottom","right","","")
                   
                  }  
             });  
       
   });
  }); 