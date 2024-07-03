//set min date
var today = new Date();
var dd = String(today.getDate() + 1).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
$('#date_picker').attr('min', today);
$('#ddate').attr('min', today);
//end date
$(document).ready(function () {
  function fetch_data() {
    var id = document.getElementById("subid").value;
    $.ajax({
      url: "../php/getassignmentdata.php",
      method: "POST",
      data: { id: id },
      success: function (data) {

        $('#asssignmentdata').html(data);

      }
    });
  }
  fetch_data();



  $('#addassignment').on('click', function() {
    var file_data = $('#file').prop('files')[0];   
    var form_data = new FormData();     
    var sid = document.getElementById("subid").value.trim();
    var topic = $("#topic").val().trim();
    var ddate = $("#ddate").val().trim(); 
    var des = $("#description").val().trim();
    form_data.append('file', file_data);
    form_data.append('topic', topic);
    form_data.append('subid', sid);
    form_data.append('ddate', ddate);
    form_data.append('description', des);
                              
    $.ajax({
        url: '../php/addassignment.php', // <-- point to server-side PHP script 
          // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(response){
          fetch_data();
                console.log(response);
        
                if (response == 1) {
                  showNotification("alert-success", "Assignment scheduled", "bottom", "right", "", "")
        
                }
                else {
                  showNotification("alert-error", "Assignment scheduling failed", "bottom", "right", "", "")
                }
              
        }
     });
});


  $("#delassignmentconfirm").click(function () {
    var delid = document.getElementById("ass_id").value;

    //debugger
    $.ajax({
      url: '../php/delassignment.php',
      type: 'post',
      data: { id: delid },
      success: function (response) {
        fetch_data();
        console.log(response);

        if (response == 1) {
          showNotification("alert-success", "Assignment removed", "bottom", "right", "", "")

        }
        else {
          showNotification("alert-error", "Assignment removal failed", "bottom", "right", "", "")
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      }
    });

  });


  //delete
  $(document).on('click', '#delbtn', function () {

    var a_id = $(this).data("id1");
    console.log(a_id);

    document.getElementById("ass_id").value = a_id;


  });
  //updatebutton click
  $(document).on('click', '#updateassbtn', function () {

    var a_id = $(this).data("id1");
    var assname = $(this).data("id3");
    var assduedate = $(this).data("id2");
    var t_doc = $(this).data("id4");
    var t_des = $(this).data("id5");

    document.getElementById("updt_ass_id").value = a_id;
    document.getElementById("assname").value = assname;
    document.getElementById("date_picker").value = assduedate;
    document.getElementById("des").value = t_des;
  });
  //confirm update btn
  $("#confirmupdateassignment").click(function () {
    var assid = document.getElementById("updt_ass_id").value;
    var assname = document.getElementById("assname").value;
    var assduedate = document.getElementById("date_picker").value;
    var des = document.getElementById("des").value;

    var file_data = $('#file_up').prop('files')[0];   
    var form_data = new FormData();     

    form_data.append('file_up', file_data);
    form_data.append('topic', assname);
    form_data.append('assid', assid);
    form_data.append('ddate', assduedate);
    form_data.append('description', des);
    //debugger
    $.ajax({
      url: '../php/updateassignment.php', // <-- point to server-side PHP script 
        // <-- what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,                         
      type: 'post',
      success: function(response){
        fetch_data();      
              if (response == 1) {
                showNotification("alert-success", "Assignment updated", "bottom", "right", "", "")
      
              }
              else {
                showNotification("alert-success", "Assignment updated", "bottom", "right", "", "")
              }
            
      }
   });
  });
});