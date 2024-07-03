<?php
session_start();
if (isset($_SESSION['teacher'])) {
    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
        <title>LARA</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/style.min.css">
        <script src="sweetalert.min.js"></script>
    </head>

    <body class="theme-blush">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48"
                        alt="Aero"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Left Sidebar -->

        <?php
        include "leftsidebar.php"
            ?>
        <!-- Main Content -->
        <section class="content">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>Teacher Management</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active">Teachers</li>
                            </ul>
                            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                    class="zmdi zmdi-sort-amount-desc"></i></button>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                    class="zmdi zmdi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <!-- Example Tab -->
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>TEACHER</strong> ORGANIZER</h2>

                                </div>
                                <div class="body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs p-0 mb-3">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                href="#home">ADD</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                                id="view">VIEW</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane in active" id="home">
                                            <div class="body">
                                                <form id="myform" method="POST" onkeyup="return checkInp()">
                                                    <div class="form-group form-float">
                                                        <input type="text" class="form-control" placeholder="Full Name"
                                                            name="name" id="name1">
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <input type="email" class="form-control" placeholder="Email"
                                                            name="email" id="email" required>
                                                    </div>

                                                    <div class="form-group form-float">
                                                        <input type="text" class="form-control" placeholder="Mobile"
                                                            name="mob" id="mob">
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <input type="password" class="form-control" placeholder="Password"
                                                            name="pwd" id="pwd" required>
                                                    </div>
                                                    <button class="btn btn-raised btn-primary waves-effect" type="submit"
                                                        id="register">REGISTER</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="profile">
                                            <div class="row clearfix">

                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="body">
                                                            <div class="table-responsive" id="teacherdata">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Delete student modal-->
        <div class="modal fade" id="delstudentmodel" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-teal">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">DELETE</h4>
                    </div>
                    <div class="modal-body text-light">Are you sure that you want to delete the student details</div>
                    <div class="modal-footer">
                        <input type="hidden" id="delid">
                        <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal"
                            id="delteacherconfirm">CONFIRM</button>
                        <button type="button" class="btn btn-link waves-effect text-light"
                            data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>

        <!--update student modal-->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title" id="defaultModalLabel">Edit Student Details</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form_validation" method="POST" role="form">
                            <div class="form-group form-float">
                                <input type="hidden" class="form-control" id="tid" readonly>
                                <input type="text" class="form-control" id="tname" placeholder="Name of teacher" required>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" class="form-control" id="temail" placeholder="Email Id" required>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="Phone Number" id="tphone" required>
</div><div class="modal-footer">
                                <button type="button" data-dismiss="modal" id="updateteacher"
                                    class="btn btn-success waves-effect">Update</button>
                                <button type="button" class="btn btn-danger waves-effect" id="closem"
                                    data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Jquery Core Js -->


    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <!-- Jquery DataTable Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

        <script src="assets/js/pages/tables/jquery-datatable.js"></script>

        <script src="../js/teacher.js"></script>
        <script src="assets/js/pages/ui/sweetalert.js"></script>
        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js -->



    <script src="../js/regTeacher.js"></script>
    <script>
            //Check Email Exist
$(document).ready(function(){
    // console.log("hai");
     $("#email").focusout(function(){
         var username = $("#email").val().trim();
         const button1 = document.getElementById("register"); // assuming the button is assigned an id named "button"
         if( username != ""){
             $.ajax({
                 url:'../php/checkemailexist_teacher.php',
                 type:'post',
                 data:{username:username},
                 success:function(response){
                     if(response >= 1){
                        showNotification("red","Email already exists","bottom","right" ,"bg-red","");
                        button1.disabled = true;
                        return false
                     }
                     else
                     {
                        button1.disabled = false;
                     }
                 }
             });
         }
     });
 });
        </script>


    <!--validation-->
    <script>
        function checkInp() {
            var x = document.forms["myform"]["mob"].value;
            if (isNaN(x)) {
                showNotification("alert-danger", "Mobile number should not include an alphabet", "bottom", "right", "", "");
                return false;
            }
            }
    </script>
    </html>
    <?php
} 
?>