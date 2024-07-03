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

        <title>File Upload</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugins/dropify/css/dropify.min.css">
        <link rel="javascript" href="https://va.tawk.to/v1/session/start">

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
                    <div class="row" id="here">
                        
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>File Upload</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active">File Upload</li>
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
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2> </h2>
                                </div>
                                <div class="body">
                                    <!-- <form method="post" id="form-id" action="addviaexcelpro.php"> -->
                                    <!-- <input type="file" class="dropify"><br>
                                        <input type="submit" id="sub" name="save" class="btn btn-primary btn-block waves-effect waves-light">
                                        </form> -->
                                    <form method="POST" action="addviaexcelpro.php" id="exelform"
                                        enctype="multipart/form-data" >
                                        <input type="file" name="file" id="file"  accept=".csv" class="dropify file1"
                                            onchange="fileValidation()"><br>
                                        <input type="submit" id="sub" name="save"
                                            class="btn btn-primary btn-block waves-effect waves-light">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div >
                                <strong>NOTE: </strong>The .csv file should be in the following order and exclude the headings. Only data is to be uploaded. <p><strong>ORDER TO BE FOLLOWED:-</strong>&nbspAdmission number, Name of the student, Email, Batch(A/B/C), Year of admission</p>
                            </div>
            </div>
            
        </section>
        <!-- Jquery Core Js -->

        <script src="assets/plugins/dropify/js/dropify.min.js"></script>

        <script src="assets/js/pages/forms/dropify.js"></script>
        <script src="../js/addexcel.js"></script>
        
        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->

        <script>
            function fileValidation() {
                var fileInput = document.getElementById('file');
                var filePath = fileInput.value;
                var allowedExtensions = /(\.csv)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    showNotification("alert-danger", "Please Select a CSV file ", "bottom", "right", "", "")
                    fileInput.value = '';
                    return false;
                }
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: login.php");
}
?>