

$(document).on('click', '#update_sub', function () {
    console.log("Update called");
    var hangoutButton = $("#closem");
    hangoutButton.click();
    var s_id = document.getElementById("sub_id").value;
    var sub_name = document.getElementById("sub_name").value;
    var sub_yoa = document.getElementById("sub_yoa").value;
    var sub_batch = document.getElementById("sub_batch").value;
    var sub_desc = document.getElementById("sub_desc").value;
    console.log(sub_id, sub_name, sub_batch, sub_yoa, sub_desc);

    $.ajax({
        url: "../php/update_sub.php",
        method: "POST",
        data: { sub_id: s_id, sub_name: sub_name, sub_batch: sub_batch, sub_yoa: sub_yoa, sub_desc: sub_desc },
        dataType: "text",
        success: function (data) {
            console.log(data);
            if (data == 1) {
                $("#here").load(window.location.href + " #here");
                showNotification("alert-success", "Subject detail updated", "bottom", "right", "", "");
            }
            else showNotification("alert-error", "Something went wrong", "bottom", "right", "", "")

        }
    });

});
$(document).on('click', '#openmodelsub', function () {
    console.log($(this).data("id1"));

    var s_name = $(this).data("id1");
    var sub_yoa = $(this).data("id3");
    var sub_batch = $(this).data("id2");
    var sub_id = $(this).data("id5");
    var sub_desc = $(this).data("id4");

    document.getElementById("sub_name").value = s_name;
    document.getElementById("sub_yoa").value = sub_yoa;
    document.getElementById("sub_batch").value = sub_batch;
    document.getElementById("sub_desc").value = sub_desc;
    document.getElementById("sub_id").value = sub_id;

});
$(document).on('click', '#subdelbtn', function () {
    console.log($(this).data("id9"));
    var delsub_id = $(this).data("id9");
    document.getElementById("delsub_id").value = delsub_id;

});



$(document).on('click', '#confirmdelsubbtn', function () {

    var hangoutButton = $("#closem");
    hangoutButton.click();
    var s_id = document.getElementById("delsub_id").value;

    $.ajax({
        url: "../php/delete_sub.php",
        method: "POST",
        data: { sub_id: s_id },
        dataType: "text",
        success: function (data) {
            console.log(data);
            if (data == 1) {
                $("#here").load(window.location.href + " #here");
                showNotification("alert-success", "Subject Deleted", "bottom", "right", "", "");
            }
            else showNotification("alert-error", "Something went wrong", "bottom", "right", "", "")

        }
    });

});