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

        <title>Subjects</title>
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
        include "leftsidebar.php"
            ?>
        <section class="content">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>Subjects</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
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
                <span id="here">
                    <?php
                    include "../php/config.php";
                    $tid = $_SESSION['tid'];
                    $query = "select * from subject where t_id='$tid' order by sub_id desc ";
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
                                                        <h3 class="product-title mb-0">
                                                            <?php echo $sub_name ?>
                                                        </h3>
                                                        <h5 class="price mt-0">
                                                            <?php echo $batch ?>&nbsp Batch&nbsp
                                                            <?php echo $yoa ?>&nbsp Admission <span class="col-amber"></span>
                                                        </h5>
                                                        <hr>
                                                        <p class="product-description">
                                                            <?php echo $des ?>
                                                        </p>

                                                        <div class="action">
                                                            <a class="btn btn-primary waves-effect"
                                                                href="subjectPage.php?id=<?php echo base64_encode($subid) ?>">ENTER</a>
                                                            <!-- <button  data-id1="$subid" class="btn btn-info waves-effect" type="button"
                                                                data-toggle="modal" data-target="updatesub" data-id1=$subid><i class="zmdi zmdi-edit" ></i> -->
                                                                <button class="btn btn-info waves-effect" type="button" id="openmodelsub"
                                                                data-toggle="modal" data-target="#updatesub" data-id1="<?php echo $row['sub_name'] ?>" data-id5="<?php echo $row['sub_id'] ?>" data-id2="<?php echo $row['batch'] ?>" data-id3="<?php echo $row['yoa'] ?>" data-id4="<?php echo $row['des'] ?>"><i
                                                                    class="zmdi zmdi-edit"></i></button>
                                                            <button class="btn btn-info waves-effect" type="button"
                                                                data-toggle="modal" data-id9="<?php echo $row['sub_id'] ?>" id="subdelbtn" data-target="#openmodeldelsub"><i
                                                                    class="zmdi zmdi-delete"></i></button>
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


        <!--Update modal-->

        <div class="modal fade" id="updatesub" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title" id="largeModalLabel">Update subject</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form_validation1" method="POST">
                            <div class="form-group form-float">
                            <input type="hidden" class="form-control" id="sub_id" readonly>

                            <input type="text" class="form-control" placeholder="Subject Name" id="sub_name" required>
                            </div>
                            <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="Year of admission" id="sub_yoa" required>
                            </div>
                           <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="Batch" id="sub_batch" required>
                            </div>
                            <div class="form-group form-float">
                            <input type="text" class="form-control" placeholder="Description" id="sub_desc" required>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-round waves-effect" id="update_sub" data-dismiss="modal">UPDATE</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!--Delete modal-->
        <div class="modal fade" id="openmodeldelsub" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-teal">
                    <div class="modal-header">
                        <input type="hidden" id="delsub_id"/>
                        <h4 class="title" id="defaultModalLabel">DELETE</h4>
                    </div>
                    <div class="modal-body text-light">Are you sure that you want to delete the subject</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect text-light" id="confirmdelsubbtn"  data-dismiss="modal">CONFIRM</button>
                        <button type="button" class="btn btn-link waves-effect text-light"
                            data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>


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
       
        <script src="../js/subjects.js"></script>

        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: login.php");
}
?>