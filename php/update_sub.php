<?php
include "config.php";
$sub_id=$_POST['sub_id'];
$sub_name=$_POST['sub_name'];
$sub_batch=$_POST['sub_batch'];
$sub_yoa=$_POST['sub_yoa'];
$sub_desc=$_POST['sub_desc'];

 $sql = "UPDATE `subject` SET`sub_name`='$sub_name',`batch`='$sub_batch',`yoa`='$sub_yoa',`des`='$sub_desc' WHERE sub_id='$sub_id'";  
 if(mysqli_query($con, $sql))
 echo "1";
 else
 echo mysqli_error($con);
?>