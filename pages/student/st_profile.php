<?php
session_start();
if (isset($_SESSION['student'])) {
    $con = mysqli_connect("localhost","root","","lab");
    $tid = $_SESSION['sid'];
    $query = "select * from student where s_id='$tid'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result)
    
    ?>
<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Profile</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Light Gallery Plugin Css -->
<link rel="stylesheet" href="assets/plugins/light-gallery/css/lightgallery.css">
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
</head>

<!--Sidebar-->
<?php
include 'st_leftsidebar.php'
?>

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="st_dash.php"><i class="zmdi zmdi-home"></i>Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_3">
                        <div class="body">
                            <a href="#"><img src="assets/images/profile_av.jpg" class="rounded-circle shadow " alt="profile-image"></a>
                            <h4 class="m-t-10"><?php echo $row['s_name']?></h4>                            
                            
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <small class="text-muted">Email address: </small>
                            <p><?php echo $row['email']?></p>
                            <hr>
                            <small class="text-muted">Admission no: </small>
                            <p><?php echo $row['adm_no']?></p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            <p><?php echo $row['mob1']?></p>
                            <hr>
                            <small class="text-muted">Year of admission: </small>
                            <p><?php echo $row['yoa']?></p>
                            <hr>
                            <small class="text-muted">Batch: </small>
                            <p><?php echo $row['batch']?></p>
                            <hr>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/plugins/light-gallery/js/lightgallery-all.min.js"></script> <!-- Light Gallery Plugin Js --> 
<script src="assets/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/medias/image-gallery.js"></script>
<script src="assets/js/pages/calendar/calendar.js"></script>
</body>

</html>
<?php
} else {
    header("Location: ../login.php");
}