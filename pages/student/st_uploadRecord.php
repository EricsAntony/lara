<?php
session_start();
if (isset($_SESSION['student'])) {
    $con = mysqli_connect("localhost", "root", "", "lab");
    $assid = base64_decode($_REQUEST['ass_id']);
    $sid = $_SESSION['sid'];
    $sub_id = base64_decode($_REQUEST['sub_id']);
    
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
        <link rel="stylesheet" href="assets/plugins/dropify/css/dropify.min.css">
    </head>

    <body class="theme-blush" >
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader" style="display:block">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48"
                        alt="Aero"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Left Sidebar -->
        <?php
        include "st_leftsidebar.php"
            ?>

        <!-- Main content-->
        <section class="content" >
            <div class="container-fluid">
                <div class="row clearfix">

                    <div class="col-lg-12">
                        <div class="card">
                                <h3>Description</h3>
                                <p><?php
                                $s = "SELECT * from assignment where ass_id = $assid and sub_id = $sub_id";
                                $r = mysqli_query($con,$s);
                                $ro = mysqli_fetch_assoc($r); 
                                 echo $ro['t_upload_des']?></p>
                                <a href="#" class="btn btn-primary float-left" onclick="window.open('../../php/teacherpdfs/<?php echo $ro['t_doc']; ?>', '_blank', 'fullscreen=yes','targetWindow',width=1100,height=2000); return false;">View Lab Cycle</a>
                        </div>
                        
                            <div class="table-responsive" id="here">
                            <?php
                        
                        // $query = "select * from document where s_id=$sid and sub_id=$sub_id and ass_id = $assid order by ass_id desc";
                        $query="select * from document d,student s where d.s_id='$sid' and d.sub_id='$sub_id' and d.ass_id ='$assid' and s.s_id=d.s_id order by ass_id desc";
                        $result = mysqli_query($con, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                        
                        ?>
                                <table class="table table-hover product_item_list c_table theme-color mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th data-breakpoints="xs">Date of submission</th>
                                            <th>Document status</th>
                                            <!-- <th>Print status</th> -->
                                            <th>Remarks</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                           
                                            
                                            $count = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                              
                                                ?>
                                                <td><a href="javascript:void(0)" data-toggle="modal"
                                data-target="#eyebutton" class="eye"
                                 data-submittedon="<?php $date=date_create($row["submission_date"]);echo date_format($date,"d/m/Y");?>"
                                 data-nop="<?php echo $row['no_of_pages'];?>"
                                 data-vstatus="<?php echo $row['v_status'];?>"
                                 data-vdate="<?php echo $row['v_date'];?>"
                                 data-pstatus="<?php echo $row['print_status'];?>"
                                 data-cstatus="<?php echo $row['collect_status'];?>"
                                 data-cdate="<?php echo $row['collect_date'];?>"
                                 data-comm="<?php echo $row['comment'];?>"
                                 ><i class="zmdi ti-eye"></i></a></td>

                                                <td>
                                                    <input type="hidden" value="<?php echo base64_encode($row['doc_id']); ?>" id="doc_id">
                                                    <a href="javascript:void(0)" onclick="window.open('../../php/pdf/<?php echo $row['doc_name']; ?>', '_blank', 'fullscreen=yes','targetWindow','width=1100,height=1500'); return false;">View Doc</a>

                                                </td>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $date=date_create($row["submission_date"]);
                                                    echo date_format($date,"d/m/Y"); ?>
                                                </td>
                                                <td id="status">
                                                    <?php if($row["v_status"]=="not verified")
                                                    {
                                                    ?>
                                                    <span class="badge badge-danger">
                                                        <?php
                                                        echo $row["v_status"];
                                                    }
                                                    else if($row['v_status'] == 'need review')
                                                    {
                                                        ?>
                                                        <span class="badge badge-warning">
                                                        <?php
                                                        echo $row["v_status"];
                                                    }
                                                    else if($row['v_status'] == 'verified'&&$row['pay_status'] != '1')
                                                    {
                                                    ?>
                                                    <span class="badge badge-success">
                                                        <?php  echo $row["v_status"]; 
                                                        }
                                                        else if($row['pay_status'] == '1' && $row['print_status'] == 'not printed')
                                                        {
                                                            ?>
                                                            <span class="badge badge-success">
                                                            In printing queue<?php
                                                        }
                                                        else if($row['pay_status'] == '1' && $row['print_status'] == 'printed'  && $row['collect_status'] != 'collected')
                                                        {?>
                                                            <span class="badge badge-success">
                                                            Ready to Collect   <?php
                                                        }
                                                        else if( $row['print_status'] == 'printed' && $row['collect_status'] == 'collected'){?>
                                                            <span class="badge badge-success">
                                                            Document Collected    <?php
                                                        }
                                                        ?>
                                                        
                                                    </span>
                                                </td>
                                                <!-- <td>
                                                <?php //if($row["print_status"]=="not printed" || $row["print_status"]=="Not printed")
                                                   // {
                                                    ?>
                                                    <span class="badge badge-danger">
                                                        <?php
                                                    // }
                                                    // else
                                                    // {
                                                    ?>
                                                    <span class="badge badge-success">
                                                        <?php //} echo $row["print_status"]; ?>
                                                </td> -->
                                                <td>
                                                    <?php echo $row["remarks"]; ?>
                                                </td>
                                                <td>
                                                    
                                                    <?php if($row["v_status"]=="not verified" || $row["v_status"]=="need review")
                                                    {
                                                        ?>
                                                        <a class="btn btn-primary bg-green"
                                                       onclick="call()" href="javascript:void(0)"
                                                        title="delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                    <?php } 
                                                    else if($row["pay_status"]!="1"){
                                                        ?>
                                                        <a class="btn btn-info" href="javascript:void(0)"
                                                        title="Continue to payment" data-name="<?php echo $row["s_name"]; ?>" data-email="<?php echo $row["email"]; ?>" data-phone="<?php echo $row["mob1"]; ?>"  data-id="<?php echo $row["doc_id"]; ?>" data-pno="<?php echo $row["no_of_pages"]; ?>" id="buy_now">
                                                        <i class="zmdi zmdi-money"></i>
                                                    </a><?php }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            else{

                            
                            ?>
                                <!-- <a href="uploadRecord.php?ass_id=<?php //echo base64_encode($assid) ?>&amp;sub_id=<?php // echo base64_encode($sub_id) ?>"
                                    class="btn btn-primary float-right ">UPLOAD RECORD</a> -->
                                    <button class="btn btn-primary float-right " type="button" href='#' data-toggle="modal"
                                data-target="#largeModalUpload" >UPLOAD RECORD</button>
                                    <?php
                                 }
                                 ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </section>
        <div class="modal fade" id="eyebutton" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-body">
                <div class="card">
                        <div class="header">
                            <h2><strong>document</strong> Info</h2>
                        </div>
                        <div class="body">
                        <small class="text-muted">Submitted on: </small>
                            <p id="s_date"></p>
                            <hr>
                            <small class="text-muted">No of pages: </small>
                            <p id="nop"></p>
                            <hr>
                            <small class="text-muted">Verification status and date: </small>
                            <p id="vstatus"></p>
                            <hr>
                            <small class="text-muted">Print status: </small>
                            <p id="pstatus"></p>
                            <hr>
                            <small class="text-muted">Collect_status, date: </small>
                            <p id="cstatus"></p>
                            <hr>
                            <small class="text-muted">Comment</small>
                            <p id="comm"></p>
                            <hr>
                           
                           
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>


    <!-- Upload record model session_start -->
    <div class="modal fade" id="largeModalUpload" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Upload Document</h4>
                </div>
                <div class="modal-body">
                    <form id="form_validation" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group form-float">
                            <input type="hidden" id="assid" value="<?php echo base64_encode($assid)?>">
                            <input type="hidden" id="sid" value="<?php echo base64_encode($sid)?>">
                            <input type="hidden" id="sub_id" value="<?php echo base64_encode($sub_id)?>">
                           
                            <input type="file" id="file" name="file" accept=".pdf" class="form-control file" placeholder="Choose file" onchange="fileValidation()" required>
                        </div>
                        <div class="form-group form-float">
                           
                            <input type="text" class="form-control" placeholder="Private comment" required id="comment">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="uploaddocument" data-dismiss="modal"
                        class="btn btn-default btn-round waves-effect" disabled>Upload</button>
                    <button type="button" class="btn btn-danger waves-effect" id="closem"
                        data-dismiss="modal">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end -->
    </body>
    <script>
        function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
        showNotification("alert-danger", "Please Select pdf file ", "bottom", "right", "", "")
        fileInput.value = '';
        return false;
    }
    else
    document.getElementById('uploaddocument').disabled=false;
}
        </script> 
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <script src="assets/js/pages/forms/dropify.js"></script>
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->
    <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
    <script src="assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="assets/js/pages/forms/dropify.js"></script>
    <script src="../../js/uploadrecordstudent.js"></script>
    <script src="../../js/payment.js"></script>
    <script>
        $(document).ready(function () {
                $(document).on('click', '.eye', function () {
                    let submission_date = $(this).data('submittedon');
                    let nop = $(this).data('nop');
                    let vstatus = $(this).data('vstatus');
                    let vdate = $(this).data('vdate');
                    let pstatus = $(this).data('pstatus');
                    let cstatus = $(this).data('cstatus');
                    let cdate = $(this).data('cdate');
                    let comm = $(this).data('comm');

                    $('#eyebutton').modal('show');
                    document.getElementById('s_date').innerHTML = submission_date;
                    document.getElementById('nop').innerHTML = nop;
                    document.getElementById('vstatus').innerHTML =vstatus+' -- '+vdate;
                    document.getElementById('pstatus').innerHTML =pstatus;
                    document.getElementById('cstatus').innerHTML = cstatus+' -- '+cdate;
                    document.getElementById('comm').innerHTML = comm;
                });
                });
        </script>

    <?php
} else {
    header("Location: ../login.php");
}