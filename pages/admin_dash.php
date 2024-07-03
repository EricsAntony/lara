<?php
session_start();
if (isset($_SESSION['teacher'])) {
    include '../php/config.php';
    $sql = "SELECT count(*) as c FROM subject WHERE t_id = " . $_SESSION['tid'];
    $result = mysqli_query($con, $sql);
    $subCount = mysqli_fetch_array($result);

    $sql1 = "SELECT count(*) as c FROM assignment a, subject s WHERE s.sub_id=a.sub_id and s.t_id = " . $_SESSION['tid'];
    $result1 = mysqli_query($con, $sql1);
    $assignCount = mysqli_fetch_array($result1);

    $sql2 = "SELECT count(*) as c FROM document d, assignment a, subject s WHERE s.sub_id=a.sub_id and a.ass_id=d.ass_id and v_status='verified' and s.t_id = " . $_SESSION['tid'];
    $result2 = mysqli_query($con, $sql2);
    $vCount = mysqli_fetch_array($result2);

    $sql3 = "SELECT count(*) as c FROM document d, assignment a, subject s WHERE s.sub_id=a.sub_id and a.ass_id=d.ass_id and v_status='not verified'  and s.t_id = " . $_SESSION['tid'];
    $result3 = mysqli_query($con, $sql3);
    $pCount = mysqli_fetch_array($result3);

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
        <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
        <link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css" />

        <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/style.min.css">
        <script src="sweetalert.min.js"></script>
    </head>

    <body class="theme-blush" >
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
            <div class="">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>Dashboard</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Home</a></li>
                                <li class="breadcrumb-item active"></li>
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
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card widget_2 big_icon">
                                <div class="body">
                                    <h6>Total Subjects</h6>
                                    <h2>
                                        <?php echo $subCount['c'] ?><small class="info"> subjects</small>
                                    </h2>
                                    <div class="progress">
                                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="20"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card widget_2 big_icon assignments">
                                <div class="body">
                                    <h6>Total Assignments</h6>
                                    <h2>
                                        <?php echo $assignCount['c'] ?> <small class="info"> assignments</small>
                                    </h2>
                                    <div class="progress">
                                        <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 38%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card widget_2 big_icon ">
                                <div class="body">
                                    <h6>Total docs verified</h6>
                                    <h2>
                                        <?php echo $vCount['c'] ?> <small class="info">verified</small>
                                    </h2>

                                    <div class="progress">
                                        <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 39%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card widget_2 big_icon">
                                <div class="body">
                                    <h6>Pending</h6>
                                    <h2>
                                        <?php echo $pCount['c'] ?> <small class="info">pending</small>
                                    </h2>

                                    <div class="progress">
                                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="89"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong><i class="zmdi zmdi-chart"></i> Quick</strong> note </h2>
                                    
                                </div>
                                <div class="body mb-2">
                                    <div class="row clearfix">
                                        <p>Hi
                                            <?php echo $_SESSION['tname'] ?>,
                                        </p>

                                        <p><strong> &nbsp&nbspLARA</strong> is a web application developed to manage the lab
                                            records of students. This application significantly reduce the efforts taken by
                                            the faculty and students to manage their records. The system need <strong>proper
                                                internet conncetion</strong> for the smooth functioning. LARA is designed
                                            and developed under the supervision of MCA department of Union Christian
                                            College, Aluva and all rights are reserved to the college only.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
       

        <!-- Jquery Core Js -->
        <!-- slimscroll, waves Scripts Plugin Js -->
        <script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
        <script src="assets/bundles/c3.bundle.js"></script>
        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->

        <script src="assets/js/pages/index.js"></script>
        <script src="assets/js/pages/todo-js.js"></script>

    </html>
    <?php
} else {
    header("Location: login.php");
}
?>