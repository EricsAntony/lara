$(document).ready(function(){

    $("#createclass").click(function(){
        var cname = $("#cname").val().trim();
        var yoa = $("#yoa_sub").val().trim();
        var batch = $("#batch_sub").val().trim();
        var desc = $("#desc").val().trim();
        var tid = $("#tid").val().trim();
        
            $.ajax({
                url:'../php/createclassPro.php',
                type:'post',
                data:{cname:cname,yoa:yoa,batch:batch,desc:desc,tid:tid},
                success:function(response){
                    console.log (response);
               
                    if(response == 1){
                     //showNotification("alert-success","Subject Added","bottom","right","","")
                    
                     location.reload(true);
                    }
                  else{
                   showerror("Sorry","Something Wrong","error","#");
                  }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                   console.log(xhr.status);
                   console.log(thrownError);
                 }
            });
        
    });
});