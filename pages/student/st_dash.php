<?php
session_start();
if (isset($_SESSION['student'])) {
    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

        <title>Student Dash</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- JQuery DataTable Css -->
        <link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
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
        include "st_leftsidebar.php"
            ?>
        <section class="content">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>Subjects you are assigned to</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="st_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active">Subjects</li>
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
                <span>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "lab");
                    $tid = $_SESSION['sid'];
                    $query = "select sub_name, sb.batch, sb.yoa, des, sub_id from subject sb,student st where sb.batch=st.batch and sb.yoa=st.yoa and st.s_id=$tid order by sub_id desc";
                    $result = mysqli_query($con, $query);
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $sub_name = $row['sub_name'];
                        $batch = $row['batch'];
                        $yoa = $row['yoa'];
                        $des = $row['des'];
                        $subid = $row['sub_id'];
                        ?>

                        <!-- Basic Examples -->
                        <div class="container-fluid">
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="body">
                                            <div class="row">

                                                <div class="col-xl-9 col-lg-8 col-md-12">
                                                    <div class="product details">
                                                        <h3 class="product-title mb-0"><?php echo $sub_name?></h3>
                                                        <h5 class="price mt-0"><?php echo $batch?> Batch <?php echo $yoa?> admission <span
                                                                class="col-amber"></span></h5>
                                                        <hr>
                                                        <p class="product-description"><?php echo $des?></p>

                                                        <div class="action">
                                                            <a class="btn btn-primary waves-effect"
                                                                href="st_subjectPage.php?sub_id=<?php echo base64_encode($subid)?>">ENTER</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                    } ?>

        </section>

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
        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <!-- Bootstrap Notify Plugin Js -->
        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ../login.php");
}