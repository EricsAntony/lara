$(document).ready(function () {

  $("#register").click(function () {
    var name = $("#name").val().trim();
    var email = $("#email").val().trim();
    var adm = $("#adm").val().trim();
    var mob = $("#mob").val().trim();
    var yoa = $("#yoa").val().trim();
    var batch = $("#batch").val();
    var pwd = $("#pwd").val().trim();

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var phoneno = /^\d{10}$/;
    var admno = /^\d{4}$/;
    var year = /^[0-9]+$/

    if (name == '' || email == '' || mob == '' || pwd == '' || adm == '' || yoa == '' || batch == '') {
      showNotification("alert-danger", "All fields are mandatory", "bottom", "right", "", "");
      return false;
    }

    if (!name?.match(/^[A-Za-z\s]*$/)) {
      showNotification("alert-danger", "Name should contain only alphabets", "bottom", "right", "", "");
      return false;
    }


    if (!(email.match(validRegex))) {
      showNotification("alert-danger", "Invalid Email!", "bottom", "right", "", "");
      return false;
    }

    if (!(adm.match(admno))) {
      showNotification("alert-danger", "Admission number should contain 4 digits", "bottom", "right", "", "");
      return false;
    }

    if (!(mob.match(phoneno))) {
      showNotification("alert-danger", "Mobile number should contain 10 digits", "bottom", "right", "", "");
      return false;
    }

      if (!year.test(yoa)) {
        showNotification("alert-danger", "Year of admission should be in numeric", "bottom", "right", "", "");
        return false;
      }

      if (yoa.length != 4) {
        showNotification("alert-danger", "Year of admission should contain 4 digits", "bottom", "right", "", "");
        return false;
      }
      var current_year = new Date().getFullYear();
      if ((yoa < 2020) || (yoa > current_year)) {
        showNotification("alert-danger", "Year of admission should be between 2020 and the current year", "bottom", "right", "", "");
        return false;
      }


    if (name != '' & email != '' & adm != '' & mob != '' & yoa != '' & batch != '' & pwd != '') {
      $.ajax({
        url: '../php/regStudentPro.php',
        type: 'post',
        data: { email: email, mob: mob, pwd: pwd, yoa: yoa, batch: batch, name: name, adm: adm },
        success: function (response) {
          console.log(response);

          if (response == 1) {
            location.reload();
          }
          else {
            showerror("Sorry", "Something Wrong", "error", "#");
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