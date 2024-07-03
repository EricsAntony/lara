$(document).ready(function(){
    console.log('called2');
    $("#viewupload").click(function(){
        console.log('called');
      const article = document.querySelector("#viewupload");
      var doc_id = article.dataset.docid;
        
            $.ajax({
                url:'../pages/viewPdf.php',
                type:'post',
                data:{doc_id:doc_id},
                success:function(response){
                    console.log (response);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                   console.log(xhr.status);
                   console.log(thrownError);
                 }
            });
        
    });
});