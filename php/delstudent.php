<?php
  include "config.php";

  $id = $_POST['id'];
  $sql = "DELETE FROM `student` WHERE s_id='$id'";
  $result=mysqli_query($con, $sql);

  if($result)
  echo "1";
else
  echo mysqli_error($con);
?>