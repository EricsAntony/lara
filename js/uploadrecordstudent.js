$('#uploaddocument').on('click', function() {
    var file_data = $('#file').prop('files')[0];   
    var form_data = new FormData();     
    var assid =document.getElementById("assid").value.trim();
    var sid = $("#sid").val().trim();
    var sub_id = $("#sub_id").val().trim(); 
    var comment = $("#comment").val().trim();            
    form_data.append('file', file_data);
    form_data.append('ass_id', assid);
    form_data.append('sub_id', sub_id);
    form_data.append('s_id', sid);
    form_data.append('comment', comment);
                              
    $.ajax({
        url: '../../php/uploadRecordPro.php', // <-- point to server-side PHP script 
          // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(response){
         
                console.log(response);
        
                if (response == 1) {
                    $( "#here" ).load(window.location.href + " #here" );
                  showNotification("alert-success", "Record uploaded", "bottom", "right", "", "")
        
                }
                else {
                  showNotification("alert-error", "Somthing Wrong", "bottom", "right", "", "")
                }
              
        }
     });
});
function call(){
Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
    //   Swal.fire(
    //     'Deleted!',
    //     'Your file has been deleted.',
    //     'success'
    //   )
    var delid=document.getElementById("doc_id").value;
      
       //debugger
           $.ajax({
               url:'../../php/deletedoc.php',
               type:'post',
               data:{doc_id:delid},
               success:function(response){
                 
                   console.log (response);
              
                   if(response == 1){
                    $( "#here" ).load(window.location.href + " #here" );
                    showNotification("alert-success","Record removed","bottom","right","","")
                   
                   }
                 else{
                     showNotification("alert-error","Something went Wrong","bottom","right","","")
                 }
               },
               error: function (xhr, ajaxOptions, thrownError) {
                  console.log(xhr.status);
                  console.log(thrownError);
                }
           });
    }
  })}