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

        <title>Student</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/style.min.css">

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
        <section class="content">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>Student Management</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active">Student organizer</li>
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
                                    <h2><strong>STUDENT</strong> ORGANIZER</h2>
                                    <ul class="header-dropdown">
                                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                                data-toggle="dropdown" role="button" aria-haspopup="true"
                                                aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="addviaexcel.php">Upload via Excel</a></li>

                                            </ul>
                                        </li>
                                        <li class="remove">
                                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs p-0 mb-3">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                href="#home">REGISTER</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"
                                                id="view">VIEW</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane in active" id="home">
                                            <div class="body">
                                                <form id="myform" method="POST">
                                                    <div class="form-group form-float">
                                                        <input type="text" class="form-control" placeholder="Full Name"
                                                            name="name" id="name" required>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <input type="email" class="form-control" placeholder="Email"
                                                            name="email" id="email" required>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <input type="text" class="form-control"
                                                            placeholder="Admission Number" name="adm" id="adm" required>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <input type="text" class="form-control" placeholder="Mobile"
                                                            name="mob" id="mob" required>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <input type="text" class="form-control"
                                                            placeholder="year of admission" name="yoa" id="yoa" required>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <select class="form-control show-tick ms select2"
                                                            data-placeholder="Select" name="batch" id="batch" required>
                                                            <option disabled selected hidden>Batch</option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>C</option>
                                                        </select>
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
                                                            <div class="table-responsive">
                                                                <table id="student_data"
                                                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                    <thead>

                                                                        <tr>
                                                                            <th>Adm.No</th>
                                                                            <th>Name</th>
                                                                            <th>Email</th>
                                                                            <th>Mobile</th>
                                                                            <th>Batch</th>
                                                                            <th>Year Of admission</th>
                                                                            <th>Actionn</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>

                                                                       
                                                                          
                                                                </table>
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
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Student Details</h4>
            </div>
            <div class="modal-body"> <form id="form_validation" method="POST">
                    <div class="form-group form-float">
                        <input type="text" class="form-control" id="admno" placeholder="Admisiion Number" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" id="name" placeholder="Name" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder=" Email" id="email"required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="Batch" id="batch" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="Mobile" id="mob" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="Year of admission" id="yoa" required>
                    </div>
            <div class="modal-footer">
                <button type="button" id="createclass" class="btn btn-success waves-effect">Update</button>
                <button type="button" class="btn btn-danger waves-effect" id="closem"
                    data-dismiss="modal">CLOSE</button>
            </div>
            </form> </div>
            
        </div>
    </div>
</div>
        <!-- Jquery Core Js -->
        <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
        <script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>


        <script src="../js/regStudent.js"></script>
        <script src="assets/js/pages/ui/sweetalert.js"></script>
        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js -->
    </body>

    </html>





    <script type="text/javascript" language="javascript">
$(document).ready(function(){
 
 load_data();

 function load_data(is_days)
 {
  var dataTable = $('#student_data').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "ajax":{
	   
    url:"fetch-details.php",
    type:"POST",
    data:{is_days:is_days}
   }
  });
 }

})

    
    <?php
} else {
    header("Location: login.php");
}
?>