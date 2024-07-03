$(document).ready(function () {
    // console.log("hai");
    $("#submit").click(function () {
        console.log("hai");
        var username = $("#email").val().trim();
        var password = $("#pwd").val().trim();

        if (username != "" && password != "") {
            $.ajax({
                url: '../php/login.php',
                type: 'post',
                data: { username: username, password: password },
                success: function (response) {
                    var msg = "";
                    console.log(response)
                    if (response == 1) {
                        showNotification("alert-success", "Redirecting to Dashbord", "bottom", "right", "", "")
                        window.location = "admin_dash.php";

                    } else if (response == 2) {
                        showNotification("alert-success", "Redirecting to Dashbord", "bottom", "right", "", "")
                        window.location = "../pages/student/st_dash.php";

                    } else if (response == 3) {
                        showNotification("alert-success", "Redirecting to Dashbord", "bottom", "right", "", "")
                        window.location = "../pages/assistant/la_dash.php";
                    }

                    else
                        showerror("Invalid Login", "username or email is wrong", "warning")
                }
            });
        }
    });
});