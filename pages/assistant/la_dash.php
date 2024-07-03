<?php
session_start();
if (isset($_SESSION['assistant'])) {

    ?>
<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>LARA - Lab Assistant</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css" />

    <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
    <link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
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
    include "la_leftsidebar.php"
        ?>
    <!-- Main Content -->
    <section class="content">
        <div class="">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="la_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                            </li>

                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                    <div class="container-fluid">
                        <!-- Basic Examples -->
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>RECORD</strong> QUEUE</h2>
                                        <ul class="header-dropdown">
                                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                                    <li><a href="javascript:void(0);">Action</a></li>
                                                    <li><a href="javascript:void(0);">Another action</a></li>
                                                    <li><a href="javascript:void(0);">Something else</a></li>
                                                </ul>
                                            </li>
                                            <li class="remove">
                                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Name of the student</th>
                                                        <th>Assignment name</th>
                                                        <th>Subject</th>
                                                        <th>Print status</th>
                                                        <th>Collection status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name of the student</th>
                                                        <th>Assignment name</th>
                                                        <th>Subject</th>
                                                        <th>Print status</th>
                                                        <th>Collection status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $con = mysqli_connect("localhost", "root", "", "lab");
                                                        $query = "select a.topic, st.s_name, sb.sub_name,d.doc_id, d.print_status,d.doc_name, d.collect_status, a.ass_id, d.ass_id, d.s_id, d.sub_id, d.v_status from subject sb,assignment a, student st, document d where d.s_id=st.s_id and d.sub_id=sb.sub_id and d.ass_id=a.ass_id and d.v_status='verified' and d.pay_status='1'";
                                                        $result = mysqli_query($con, $query);
                                                        $count = 1;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <td>
                                                            <a href="javascript:void(0)" onclick="window.open('../../php/pdf/<?php echo $row['doc_name']; ?>', '_blank', 'fullscreen=yes','targetWindow','width=1100,height=1500'); return false;">
                                                            <?php echo $row['s_name'] ?> 
                                                        </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['topic'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['sub_name'] ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if($row['print_status'] == 'printed')
                                                                {
                                                                    echo '<span class="badge badge-success">'.$row['print_status'].'</span>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<span class="badge badge-danger">'.$row['print_status'].'</span>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td> <?php
                                                                if($row['collect_status'] == 'collected')
                                                                {
                                                                    echo '<span class="badge badge-success">'.$row['collect_status'].'</span>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<span class="badge badge-danger">'.$row['collect_status'].'</span>';
                                                                }
                                                                ?></td>
                                                            <td><a class="btn btn-info"
                                                                    href="../../php/markasprinted.php?doc_id=<?php echo $row['doc_id'] ?>&amp;as_id=<?php echo $_SESSION['as_id']?>" title="Mark as printed">
                                                                    <i class="zmdi zmdi-print"></i>
                                                                </a><a class="btn btn-info"
                                                                    href="../../php/markascollected.php?doc_id=<?php echo $row['doc_id'] ?>&amp;as_id=<?php echo $_SESSION['as_id']?>" title="Mark as collected">
                                                                    <i class="zmdi zmdi-redo"></i>
                                                                </a></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                </tbody>
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
    </section>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
    <script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="assets/bundles/c3.bundle.js"></script>
    <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
    <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="assets/js/pages/index.js"></script>
    <script src="assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="assets/bundles/datatablescripts.bundle.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

</html>
<?php
} else {
    header("Location: login.php");
}
?>