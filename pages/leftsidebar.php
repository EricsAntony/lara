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


<div class="overlay"></div>


<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i
                    class="zmdi zmdi-apps"></i></a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">App Shortcuts</li>
                <li class="body">
                    <ul class="menu app_sortcut list-unstyled">
                        <li>
                            <a href="https://www.wikipedia.org/">
                                <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-wikipedia"></i></div>
                                <p class="mb-0">Wikipedia</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://translate.google.co.in/">
                                <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-translate"></i></div>
                                <p class="mb-0">Translate</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://calendar.google.com/">
                                <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-calendar"></i></div>
                                <p class="mb-0">Calendar</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://classroom.google.com/">
                                <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-google-glass"></i></div>
                                <p class="mb-0">Google Classroom</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://meet.google.com/">
                                <div class="icon-circle mb-2 bg-red"><i class="zmdi zmdi-videocam"></i></div>
                                <p class="mb-0">Meet</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://mail.google.com/">
                                <div class="icon-circle mb-2 bg-grey"><i class="zmdi zmdi-map"></i></div>
                                <p class="mb-0">Gmail</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown"
                role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Notifications</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>8 New Members joined</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <div class="menu-info">
                                    <h4>4 Sales made</h4>
                                    <p><i class="zmdi zmdi-time"></i> 22 mins ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> Deleted account</h4>
                                    <p><i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-green"><i class="zmdi zmdi-edit"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> Changed name</h4>
                                    <p><i class="zmdi zmdi-time"></i> 2 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-grey"><i class="zmdi zmdi-comment-text"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Commented your post</h4>
                                    <p><i class="zmdi zmdi-time"></i> 4 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-purple"><i class="zmdi zmdi-refresh"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Updated status</h4>
                                    <p><i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-blue"><i class="zmdi zmdi-settings"></i></div>
                                <div class="menu-info">
                                    <h4>Settings Updated</h4>
                                    <p><i class="zmdi zmdi-time"></i> Yesterday </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
            </ul>
        </li>

        <li><a href="https://drive.google.com" class="app_google_drive" title="Google Drive"><i
                    class="zmdi zmdi-google-drive"></i></a></li>

        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i
                    class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a href="#" class="mega-menu" title="Log Out" data-toggle="modal" data-target="#colorModal"><i
                    class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>


<!--Left sidebar-->

<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="##"><img src="assets/images/logo.svg" width="25" alt="Aero"><span
                class="m-l-10">LARA</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="#"><img src="assets/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4>
                            <?php echo $_SESSION['tname'] ?>
                        </h4>
                    </div>
                </div>
            </li>
            <li class="active open"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>
            <li><a href="#" data-sessid='<?php echo $_SESSION['teacher'] ?>'class="menu-toggle" id='t_valid'><i class="zmdi zmdi-assignment-account"></i><span>Teacher</span></a>
            <li><a href="student.php" class="menu-toggle"><i class="zmdi zmdi-accounts-alt"></i><span>Student</span></a>
            <li><a href="#" class="menu-toggle"><i class="zmdi zmdi-book-image"></i><span>Subjects</span></a>
                <ul class="ml-menu">
                    <li><a href="#largeModal" data-toggle="modal" data-target="#largeModal1">Add a subject</a></li>
                    <li><a href="viewSubject.php">View</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i
                    class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blush" class="active">
                            <div class="blush"></div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</aside>

<!--Add subject modal-->

<div class="modal fade" id="largeModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">Add a subject</h4>
            </div>
            <div class="modal-body">
                <form id="form_validation" method="POST">
                    <div class="form-group form-float">
                        <input type="hidden" class="form-control" placeholder="Classroom Name" id="tid" required
                            value="<?php echo $_SESSION['tid'] ?>">
                        <input type="text" class="form-control" placeholder="Subject Name" id="cname" required>
                    </div>
                    <div class="form-group form-float">
                        <select class="form-control show-tick ms select2" data-placeholder="Select" name="batch"
                            id="yoa_sub" required>
                            <option disabled selected hidden>For which year of admission</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <select class="form-control show-tick ms select2" data-placeholder="Select" name="batch"
                            id="batch_sub" required>
                            <option disabled selected hidden>Batch</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <textarea id="desc" cols="30" rows="5" placeholder="Description" class="form-control no-resize"
                            required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="createclass" class="btn btn-default btn-round waves-effect">ADD</button>
                <button type="button" class="btn btn-danger waves-effect" id="closem"
                    data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!--Logout modal-->
<div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-red">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">LOG OUT</h4>
            </div>
            <div class="modal-body text-light">Are you sure that you want to exit the current session</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect text-light" id="logout">LOG OUT</button>
                <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="../js/creatclass.js"></script>
<script src="../js/logout.js"></script>

<script src="assets/bundles/libscripts.bundle.js"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script>
     $("#t_valid").click(function () {
                    let uname = $(this).data('sessid');
                    if(uname == 'hod')
                    {
                        window.location='teacher.php'
                    }
                    else
                    {
                        showNotification("alert-danger", "Only HOD have the privilege to access", "bottom", "right", "", "")
                    }

                });
    </script>
</html>