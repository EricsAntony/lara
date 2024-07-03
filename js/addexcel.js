$(document).ready(function (e) {
    // Submit form data via Ajax
    //console.log("function called")
    $("#exelform").on('submit', function (e) {
    
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../php/addviaexcelpro.php',
            data: new FormData(this),
           
            contentType: false,
            cache: false,
            processData: false,
            success:function(response){
                console.log(response);

                if (response == 1) {
                   // console.log("indside ok");
                    // document.getElementById('sub').disabled=true;
                    //document.getElementById('sub').value="Data Uploaded";
                    showNotification("alert-success", "Details uploaded", "bottom", "right", "", "")
                    document.getElementById("sub").disabled=true;
                    $("#file").val('');

                   
                } else if  (response == 2) {
                    
                    //console.log(response)
                    showNotification("alert-danger", "Please choose a file", "bottom", "right", "", "")
                }else{
                    showNotification("alert-danger", "Smothing wrong", "bottom", "right", "", "")  
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
              }

        });
    });
});