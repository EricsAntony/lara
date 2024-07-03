<?php
session_start();
if (isset($_SESSION['student'])) {
    //$sub_id = $_REQUEST['sub_id'];
    $con = mysqli_connect("localhost", "root", "", "lab");
    $sub_id = base64_decode($_REQUEST['sub_id']);
    $query = "select a.topic, sb.batch, a.due_date, a.ass_id from subject sb,assignment a where sb.sub_id=a.sub_id and a.sub_id=$sub_id order by a.ass_id desc";
    $result = mysqli_query($con, $query);
    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

        <title>Assignments</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- JQuery DataTable Css -->
        <link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/style.min.css">
    </head>

    <!-- Left Sidebar -->
    <?php
    include "st_leftsidebar.php"
        ?>

    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Assignments</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                            </li>

                            <li class="breadcrumb-item active">Assignments</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover product_item_list c_table theme-color mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Assignment name</th>
                                            <th data-breakpoints="xs">Due date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php

                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <td><img src="assets/images/ecommerce/6.png" width="48" alt="Product img"></td>

                                                <td><a
                                                        href="st_uploadRecord.php?ass_id=<?php echo base64_encode($row['ass_id']) ?>&amp;sub_id=<?php echo base64_encode($sub_id) ?>">
                                                        <?php echo $row["topic"]; ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $row["due_date"]; ?>
                                                </td>
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


    </section>

    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <!-- Jquery DataTable Plugin Js -->
    <script src="assets/bundles/datatablescripts.bundle.js"></script>

    <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
    <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->

    <script src="assets/js/pages/tables/footable.js"></script><!-- Custom Js -->

    </html>

    <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->
    <?php
} else {
    header("Location: ../login.php");
}