//set min date
var today = new Date();
    var dd = String(today.getDate()+1).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);
    $('#ddate').attr('min',today);
//end date
$(document).ready(function(){  
    function fetch_data()  
    {  
     var id=document.getElementById("subid").value;
         $.ajax({  
              url:"../php/getassignmentdata_view.php",  
              method:"POST",
              data:{id:id}  ,
              success:function(data){  
                  
                   $('#asssignmentdata').html(data);  
                  
              }  
         });  
    }  
    fetch_data(); 


    $("#addassignment").click(function(){
        var sid=document.getElementById("subid").value;
          var topic = $("#topic").val().trim();
          
          var ddate = $("#ddate").val().trim();
          
          //debugger
              $.ajax({
                  url:'../php/addassignment.php',
                  type:'post',
                  data:{topic:topic,sid:sid,ddate:ddate},
                  success:function(response){
                    fetch_data(); 
                      console.log (response);
                 
                      if(response == 1){
                       showNotification("alert-success","Assignment scheduled","bottom","right","","")
                      
                      }
                    else{
                        showNotification("alert-error","Assignment scheduling failed","bottom","right","","")
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                     console.log(xhr.status);
                     console.log(thrownError);
                   }
              });
          
      });


      $("#delassignmentconfirm").click(function(){
        var delid=document.getElementById("ass_id").value;
         
          //debugger
              $.ajax({
                  url:'../php/delassignment.php',
                  type:'post',
                  data:{id:delid},
                  success:function(response){
                    fetch_data(); 
                      console.log (response);
                 
                      if(response == 1){
                       showNotification("alert-success","Assignment Deleted","bottom","right","","")
                      
                      }
                    else{
                        showNotification("alert-error","Somthing Wrong","bottom","right","","")
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                     console.log(xhr.status);
                     console.log(thrownError);
                   }
              });
          
      }); 
    
   
    //delete
      $(document).on('click', '#delbtn', function(){  
        
        var a_id=$(this).data("id1");
         console.log(a_id);
       
        document.getElementById("ass_id").value=a_id;
       
        
    }); 
    //updatebutton click
    $(document).on('click', '#updateassbtn', function(){  
        
      var a_id=$(this).data("id1");
      var assname=$(this).data("id3");
      var assduedate=$(this).data("id2");
      document.getElementById("updt_ass_id").value=a_id;
      document.getElementById("assname").value=assname;
      document.getElementById("date_picker").value=assduedate;
  }); 
  //confirm update btn
  $("#confirmupdateassignment").click(function(){
    var assid=document.getElementById("updt_ass_id").value;
    var assname =document.getElementById("assname").value;
   var assduedate= document.getElementById("date_picker").value;
      //debugger
          $.ajax({
              url:'../php/updateassignment.php',
              type:'post',
              data:{id:assid,aname:assname,ddate:assduedate},
              success:function(response){
                fetch_data(); 
                  console.log (response);
             
                  if(response == 1){
                   showNotification("alert-success","Assignment Updated","bottom","right","","")
                  
                  }
                else{
                    showNotification("alert-error","Somthing Wrong","bottom","right","","")
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                 console.log(xhr.status);
                 console.log(thrownError);
               }
         
      


});
});
});