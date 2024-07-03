<?php
$con = mysqli_connect("localhost", "root", "", "lab");
session_start();
$subid = base64_decode($_REQUEST['id']);
$sql = "SELECT * from `subject` where sub_id = $subid";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
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

        <input type="hidden" id="subid" name="subid" value="<?php echo $subid ?>" />
        <section class="content">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2><?php echo $row["sub_name"]?></h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                                </li>

                                <li class="breadcrumb-item active">Assignments</li>
                            </ul>

                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <button class="btn btn-primary float-right " type="button" href='#' data-toggle="modal"
                                data-target="#largeModalSchedule">Schedule an assignment</button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="table-responsive" id="asssignmentdata">


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!-- Jquery DataTable Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>

        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <!-- Bootstrap Notify Plugin Js -->

        <script src="assets/js/pages/tables/footable.js"></script><!-- Custom Js -->

    </html>

    <!--Schedule an assignment modal-->

    <div class="modal fade" id="largeModalSchedule" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Assignment</h4>
                </div>
                <div class="modal-body">
                    <form id="form_validation" method="POST" enctype="multipart/form-data">
                        <div class="form-group form-float">
                            <input type="text" id="topic" name="topic" class="form-control" placeholder="Assignment topic" required>
                        </div>
                        <div class="form-group form-float">
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                </div>
                                <input type="date" class="form-control date" name="ddate" placeholder="Due date Ex: 30/07/2016"
                                    id="ddate">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <input type="file" id="file" name="file" class="form-control file" placeholder="Choose file" onchange="fileValidation()" required>
                        </div>
                        <div class="form-group form-float">
                                <textarea id="description" cols="30" rows="5" placeholder="Description"
                                    class="form-control no-resize" required></textarea>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addassignment" data-dismiss="modal"
                        class="btn btn-default btn-round waves-effect" disabled>ASSIGN</button>
                    <button type="button" class="btn btn-danger waves-effect" id="closem"
                        data-dismiss="modal">CLOSE</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Update assignment details modal-->

    <div class="modal fade" id="largeModalUpdateAssignment" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Update Assignment</h4>
                </div>
                <div class="modal-body">
                    <form id="form_validation1" method="POST">
                        <div class="form-group form-float">
                            <input type="hidden"id="updt_ass_id">
                            <input type="text" class="form-control" placeholder="Assignment Name" required id="assname">
                        </div>
                        <div class="form-group form-float">
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i> &nbspDue Date</span>
                                </div>
                                <input type="date" id="date_picker" class="form-control date"  >
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <input type="file" id="file_up" name="file_up" class="form-control file" placeholder="Choose file" onchange="fileValidationUp()" required>
                        </div>
                        <div class="form-group form-float">
                                <textarea id="des" cols="30" rows="5" placeholder="Description"
                                    class="form-control no-resize" required></textarea>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-round waves-effect" id="confirmupdateassignment"  data-dismiss="modal">UPDATE</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Delete assignment modal-->
    <div class="modal fade" id="colorModalDeleteAssignment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-teal">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">DELETE</h4>
                </div>
                <div class="modal-body text-light">Are you sure that you want to delete the assignment</div>
                <div class="modal-footer">
                    <input type="hidden" id="ass_id">
                    <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal"
                        id="delassignmentconfirm">CONFIRM</button>
                    <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/addassignment.js"></script>
    <script src="../js/assignment.js"></script>
    <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->
    <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->

    <script>
        function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.pdf|\.png|\.docx)$/i;
    if(!allowedExtensions.exec(filePath)){
        showNotification("alert-danger", "Permitted type are .pdf/.docx/.png/.jpg", "bottom", "right", "", "")
        fileInput.value = '';
        return false;
    }
    else{
        document.getElementById("addassignment").disabled = false;
    }
}
</script>

<script>
        function fileValidationUp(){
    var fileInput = document.getElementById('file_up');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.pdf|\.png|\.docx)$/i;
    if(!allowedExtensions.exec(filePath)){
        showNotification("alert-danger", "Permitted type are .pdf/.docx/.png/.jpg", "bottom", "right", "", "")
        fileInput.value = '';
        return ;
    }
   
}
</script>
    <?php
} else {
    header("Location: login.php");
}
?>