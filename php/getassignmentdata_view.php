<?php  
 include "config.php";
 $id=$_POST['id'];
 $query = "select * from assignment a,subject s where a.sub_id='$id' and a.sub_id=s.sub_id and view=1 order by a.ass_id desc";
 $result = mysqli_query($con, $query); 
 $output= '<table class="table table-hover product_item_list c_table theme-color mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Assignment name</th>
                                                <th data-breakpoints="sm xs">Batch</th>
                                                <th data-breakpoints="xs">Date of upload</th>
                                                <th data-breakpoints="xs">Description</th>
                                                <th data-breakpoints="sm xs md">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>';  
 if(mysqli_num_rows($result) > 0)  
 {  
     
     $i=1;
      while($row = mysqli_fetch_array($result))  
      {  
       
        $b='<button type="button"  
        data-id1="'.$row["ass_id"].'"
        data-id2="'.$row["due_date"].'"
        data-id3="'.$row["topic"].'"

class="btn btn-xs btn-default btn_update"  data-toggle="modal" data-target="#largeModalUpdateAssignment" id="updateassbtn"><i
class="zmdi zmdi-edit" ></i></button>';
$c='<button type="button"  
data-id1="'.$row["ass_id"].'" class="btn btn-xs btn-default btn_update"  data-toggle="modal" id="delbtn" data-target="#colorModalDeleteAssignment"><i
class="zmdi zmdi-delete"></i></button>';
      
        
           $output .= '  
                <tr>  
                <td><img src="assets/images/ecommerce/6.png" width="48" alt="Product img"></td>
                <td><h5><a href="assignmentPage.php?aid='.$row["ass_id"].'">'.$row["topic"].'</a></h5>
                </td>
                <td><span class="text-muted">'.$row["batch"].'&nbsp'.$row["yoa"].'</span></td>
                <td>'.$row["date_assi"].'</td> 
                <td>'.$row["t_upload_des"].'</td> 
                     <td>'.$b.$c.'</td>    
                </tr>  
           ';  
      }  
      
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="5">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>