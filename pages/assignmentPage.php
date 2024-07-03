<?php
session_start();
if (isset($_SESSION['teacher'])) {
    $con = mysqli_connect("localhost", "root", "", "lab");
    $ass_id = base64_decode($_REQUEST['aid']);
    $sql = "SELECT * from assignment where ass_id = $ass_id";
    $result = mysqli_query($con, $sql);
    $row1 = mysqli_fetch_assoc($result);
    ?>
    <?php
    $sql = "SELECT * FROM student st, assignment a, subject sb where a.sub_id=sb.sub_id and sb.batch=st.batch and sb.yoa=st.yoa and a.ass_id=$ass_id";
    $result = mysqli_query($con, $sql);
    $total = mysqli_num_rows($result);

    $query = "SELECT st.s_name, st.batch, st.yoa, sb.yoa, sb.batch, a.sub_id, sb.sub_id,d.doc_name,d.print_status, a.ass_id, d.submission_date, d.v_status, d.doc_id from student st, subject sb, assignment a, document d where st.batch=sb.batch and st.yoa=sb.yoa and a.sub_id=sb.sub_id and a.ass_id=$ass_id and a.sub_id=sb.sub_id and d.s_id=st.s_id and d.ass_id=a.ass_id";
    $result1 = mysqli_query($con, $query);
    $count = 0;
    $print_count = 0;
    while ($row = mysqli_fetch_array($result1)) {
        $count++;
    }


    $query1 = "SELECT * FROM document WHERE ass_id = $ass_id";
    $result2 = mysqli_query($con, $query1);
    
    $print_count = 0;
    while ($row = mysqli_fetch_array($result2)) {
        if ($row['print_status'] == "printed")
            $print_count++;
    }
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
                            <h2>
                                <?php echo $row1['topic'] ?>
                            </h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin_dash.php"><i class="zmdi zmdi-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active">Assignment</li>
                            </ul>
                            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                    class="zmdi zmdi-sort-amount-desc"></i></button>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12">


                            <a href="#" class="btn btn-primary float-right"
                                onclick="window.open('../php/teacherpdfs/<?php echo $row1['t_doc']; ?>', '_blank', 'fullscreen=yes','targetWindow',width=1100,height=2000); return false;">View
                                Doc</a>

                        </div>
                    </div>
                </div>
                <h2>Description</h2>
                <p>
                    <?php echo $row1['t_upload_des'] ?>
                </p>
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card state_w1">
                                <div class="body d-flex justify-content-between">
                                    <div>
                                        <h5>
                                            <?php echo $count ?>
                                        </h5>
                                        <span>Total Done</span>
                                    </div>
                                    <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                        data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#FFC107">5,2,3,7,6,4,8,1
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card state_w1">
                                <div class="body d-flex justify-content-between">
                                    <div>
                                        <h5>
                                            <?php echo $total - $count; ?>
                                        </h5>
                                        <span>Pending</span>
                                    </div>
                                    <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                        data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#46b6fe">8,2,6,5,1,4,4,3
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card state_w1">
                                <div class="body d-flex justify-content-between">
                                    <div>
                                        <h5>
                                            <?php echo $print_count ?>
                                        </h5>
                                        <span>Print taken</span>
                                    </div>
                                    <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                        data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#12C500">1,2,6,5,1,9,7,3
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
<?php
$query = "SELECT st.s_name, d.remarks, st.batch,d.col_as_id, d.v_status,d.v_date,d.print_status,d.collect_status, d.collect_date, d.comment,d.no_of_pages, st.yoa,d.remarks, sb.yoa, sb.batch, a.sub_id, sb.sub_id, a.ass_id, d.submission_date, d.v_status, d.doc_id,d.doc_name,a.due_date from student st, subject sb, assignment a, document d where st.batch=sb.batch and st.yoa=sb.yoa and a.sub_id=sb.sub_id and a.ass_id=$ass_id and a.sub_id=sb.sub_id and d.s_id=st.s_id and d.ass_id=a.ass_id order by s_name";
         $result = mysqli_query($con, $query);
         ?>
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="card project_list">
                                <div class="table-responsive">
                                    <table class="table table-hover c_table">
                                        <thead>
                                            <?php
                                            if(mysqli_num_rows($result)>0)
                                            {
                                            ?>
                                            <tr>
                                                <th></th>
                                                <th>Name of student</th>
                                                <th>Date of submission</th>
                                                <th>Status</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php
                                            }
                                            else{

                                            
                                            ?>
                                            <th colspan="6">OOPS! No assignments were submitted</th>
                                            <?php
                                            }
                                            ?>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                
                                                $count = 0;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $count++;
                                                 ?>

                                                    <td><a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#eyeb" class="eye"
                                 data-submittedon="<?php $date=date_create($row["submission_date"]);echo date_format($date,"d/m/Y");?>"
                                 data-nop="<?php echo $row['no_of_pages'];?>"
                                 data-vstatus="<?php echo $row['v_status'];?>"
                                 data-vdate="<?php echo $row['v_date'];?>"
                                 data-pstatus="<?php echo $row['print_status'];?>"
                                 data-cstatus="<?php echo $row['collect_status'];?>"
                                 data-cdate="<?php echo $row['collect_date'];?>"
                                 data-comm="<?php echo $row['comment'];?>"><i class="zmdi ti-eye"></i></a></td>

                                                    <td><a href="#"
                                                            onclick="window.open('../php/pdf/<?php echo $row['doc_name']; ?>', '_blank', 'fullscreen=yes','targetWindow','width=1100,height=1500'); return false;"><?php
                                                               echo $row['s_name'] ?></a></td>
                                                    </td>
                                                    <td>
                                                        <?php if ($row['submission_date'] > $row['due_date']) {
                                                            echo '<span class="badge badge-warning">' . date("d/m/Y", strtotime($row['submission_date'])) .

                                                                '</span>';

                                                        } else {
                                                            $date = date_create($row["submission_date"]);
                                                            echo date_format($date, "d/m/Y");

                                                        } ?>
                                                    </td>

                                                    <td>
                                                        <?php if ($row['v_status'] == 'verified') {
                                                            echo '<span class="badge badge-success">' . $row['v_status'] .

                                                                '</span>';

                                                        } else if ($row['v_status'] == 'not verified') {
                                                            echo '<span class="badge badge-danger">' . $row['v_status'] .

                                                                '</span>';
                                                        } else {
                                                            echo '<span class="badge badge-warning">' . $row['v_status'] .

                                                                '</span>';

                                                        } ?>
                                                    </td>

                                                    <td><input type="hidden" class="form-control" placeholder="remark"
                                                            id="doc_id" value='<?php echo $row['doc_id'] ?>' />

                                                        <button type="button" class="btn btn-primary btn-round edit"
                                                            value="<?php echo $row['doc_id']; ?>"
                                                            data-rem="<?php echo $row['remarks']; ?>"><span></span><i
                                                                class="zmdi zmdi-comment-outline"></i></button>
                                                    </td>
                                                    </td>



                                                    <td><a class="btn btn-primary btn-round"
                                                            href="../php/markasverified.php?doc_id=<?php echo base64_encode($row['doc_id']) ?>&amp;ass_id=<?php echo base64_encode($ass_id) ?>"
                                                            title="">
                                                            <i class="zmdi zmdi-check"></i>
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
        </section>

        <div class="modal fade" id="remar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title" id="largeModalLabel">Add Remarks</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form_validation" method="POST">
                            <div class="form-group form-float">

                                <input type="hidden" class="form-control" placeholder="Subject Name" id="d_id" required>
                            </div>

                            <div class="form-group form-float">
                                <textarea id="remarks" cols="30" rows="5" placeholder="Description"
                                    class="form-control no-resize" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="remarks_add" class="btn btn-default btn-round waves-effect">ADD</button>
                        <button type="button" class="btn btn-danger waves-effect" id="closem"
                            data-dismiss="modal">CLOSE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="eyeb" tabindex="-1" role="dialog">
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
                            <small class="text-muted">Collect_status and date: </small>
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


        <script src="assets/bundles/sparkline.bundle.js"></script>
        <script src="assets/js/pages/charts/sparkline.js"></script>

        <script src="assets/js/pages/ui/notifications.js"></script> <!-- Custom Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script> <!-- Bootstrap Notify Plugin Js -->

        <script>
            $(document).ready(function () {
                $(document).on('click', '.edit', function () {
                    var id = $(this).val();
                    let remarks = $(this).data('rem');
                    $('#remar').modal('show');
                    $('#d_id').val(id);
                    $('#remarks').val(remarks);


                });
                $("#remarks_add").click(function () {
                    var remarks = $("#remarks").val().trim();
                    var doc_id = $("#d_id").val().trim();
                    if (remarks != '') {
                        $.ajax({
                            url: "../php/addremarks.php",
                            method: "POST",
                            data: { remarks: remarks, doc_id: doc_id },
                            dataType: "text",
                            success: function (data) {
                                console.log(data);
                                if (data == 1) {
                                    showNotification("alert-success", "Remarks given", "bottom", "right", "", "");
                                    location.reload();
                                }
                                else if (data == 2) {
                                    showNotification("alert-danger", "Record is verified, can't add remarks", "bottom", "right", "", "");
                                    $('#remar').modal('hide');

                                }

                                else {
                                    showNotification("alert-danger", "Something went wrong", "bottom", "right", "", "");
                                }

                            }
                        });
                    }

                });
            });
        </script>
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
   
                    $('#eyeb').modal('show');
                    document.getElementById('s_date').innerHTML = submission_date;
                    document.getElementById('nop').innerHTML = nop;
                    document.getElementById('vstatus').innerHTML =vstatus+' -- '+vdate;
                    document.getElementById('pstatus').innerHTML =pstatus;
                    document.getElementById('cstatus').innerHTML = cstatus+' -- '+cdate;
                    document.getElementById('comm').innerHTML = comm;

                });
                });
        </script>


    </html>
    <?php

} else {
    header("Location: login.php");
}
?>