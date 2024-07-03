<?php  
 include "config.php";
 $id=$_POST['id'];
 $query = "select * from assignment a,subject s where a.sub_id='$id' and a.sub_id=s.sub_id order by a.ass_id desc";
 $result = mysqli_query($con, $query); 
 $output= '<table class="table table-hover product_item_list c_table theme-color mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Assignment name</th>
                                                <th data-breakpoints="sm xs">Batch</th>
                                                <th data-breakpoints="xs">Due date</th>
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
        data-id4="'.$row["t_doc"].'"
        data-id5="'.$row["t_upload_des"].'"

class="btn btn-default waves-effect waves-float btn-sm waves-green"  data-toggle="modal" data-target="#largeModalUpdateAssignment" id="updateassbtn"><i
class="zmdi zmdi-edit" ></i></button>';
$c='<button type="button"  
data-id1="'.$row["ass_id"].'" class="btn btn-default waves-effect waves-float btn-sm waves-red"  data-toggle="modal" id="delbtn" data-target="#colorModalDeleteAssignment"><i
class="zmdi zmdi-delete"></i></button>';
      
        
           $output .= '  
                <tr>  
                <td><img src="assets/images/ecommerce/6.png" width="48" alt="Product img"></td>
                <td><h5><a href="assignmentPage.php?aid='.base64_encode($row["ass_id"]).'">'.$row["topic"].'</a></h5>
                </td>
                <td><span class="text-muted">'.$row["batch"].'&nbsp'.$row["yoa"].'</span></td>
                <td>'.date("d/m/Y", strtotime($row['due_date'])).'</td> 
                     <td>'.$b.$c.'</td>    
                </tr>  
           ';  
      }  
      
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="5">No assignments were scheduled</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>