<?php
  include "config.php";

  $cname = $_POST['cname'];
  $tid = $_POST['tid'];
  $yoa = $_POST['yoa'];
  $batch = $_POST['batch'];
  $desc = $_POST['desc'];
 
  

  $sql = "INSERT INTO subject (t_id,sub_name,des,batch,yoa) VALUES ('$tid','$cname','$desc','$batch','$yoa')";
  $result=mysqli_query($con, $sql);

  if($result)
  echo "1";
else
  echo "0";
?>