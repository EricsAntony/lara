<?php
include "config.php";
$query = "select * from student order by s_id desc";
$result = mysqli_query($con, $query);
$output = '<table
 class="table table-bordered table-striped table-hover js-basic-example dataTable" id="dataTables">
 <thead>

     <tr>
     <th>Sl.No</th>
         <th>Adm.No</th>
         <th>Name</th>
         <th>Email</th>
         <th>Mobile</th>
         <th>Batch</th>
         <th>Year Of admission</th>
         <th>Action</th>
     </tr>
 </thead>
 <tfoot>

     <tbody>';
if (mysqli_num_rows($result) > 0) {

     $i = 1;
     while ($row = mysqli_fetch_array($result)) {

          $b = '<button type="button"  
        data-id1="' . $row["s_id"] . '"
        data-id2="' . $row["adm_no"] . '"
        data-id3="' . $row["s_name"] . '"
        data-id4="' . $row["email"] . '"
        data-id5="' . $row["mob1"] . '" 
        data-id6="' . $row["batch"] . '" 
        data-id7="' . $row["yoa"] . '" 
      
        class="btn btn-xs btn-default btn_update"  data-toggle="modal" data-target="#defaultModal"><i
        class="zmdi zmdi-edit"></i></button>';
          $c = '<button type="button"  
        data-id1="' . $row["s_id"] . '"
        class="btn btn-xs btn-default btn_update"  data-toggle="modal" id="delbtn" data-target="#delstudentmodel"><i
        class="zmdi zmdi-delete"></i></button>';


          $output .= '  
                <tr>  
                     <td>' . $i++ . '</td>  
                     <td>' . $row["adm_no"] . '</td> 
                     <td>' . $row["s_name"] . '</td>  
                     <td>' . $row["email"] . '</td> 
                     <td>' . $row["mob1"] . '</td>  
                     <td>' . $row["batch"] . '</td>  
                     <td>' . $row["yoa"] . '</td> 
                     <td>' . $b . $c . '</td>   
                </tr>  
           ';
     }

} else {
     $output .= '<tr>  
                          <td colspan="8">Data not Found</td>  
                     </tr>';
}
$output .= '</table>  
      </div>
      <script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
      <script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
      <script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
      <script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
      <script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
      <script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
      <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
      <script src="assets/js/pages/tables/jquery-datatable.js"></script>';
echo $output;
?>