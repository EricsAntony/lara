$(document).ready(function () {

    $("#register").click(function () {
        var name = $("#name1").val().trim();
        var email = $("#email").val().trim();
        var mob = $("#mob").val().trim();
        var pwd = $("#pwd").val().trim();
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var phoneno = /^\d{10}$/;

        if (name == '' || email == '' || mob == '' || pwd == '') {
            showNotification("alert-danger", "All fields are mandatory", "bottom", "right", "", "");
            return false;
        }

        if (!(/^[A-Za-z\s]+$/.test(name))) {
            showNotification("alert-danger", "Name should contain only alphabets", "bottom", "right", "", "");
            return false;
        }


        if (!(email.match(validRegex))) {
            showNotification("alert-danger", "Invalid Email!", "bottom", "right", "", "");
            return false;
        }

        if (!(mob.match(phoneno))) {
            showNotification("alert-danger", "Mobile number should contain 10 digits", "bottom", "right", "", "");
            return false;
        }



        console.log(name, email, mob, pwd)
        if (name != '' & email != '' & mob != '' & pwd != '') {
            $.ajax({
                url: '../php/regTeacherPro.php',
                type: 'post',
                data: { email: email, mob: mob, pwd: pwd, name: name },
                success: function (response) {
                    console.log(response);

                    if (response == 1) {
                        location.reload();
                    }
                    else {
                        showerror("Sorry", "Something Went Wrong", "error", "#");
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
        else {
            showNotification("alert-danger", "All fields are mandatory", "bottom", "right", "", "");
        }

    });
});