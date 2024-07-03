<?php

$con = mysqli_connect("localhost", "root", "", "lab");
$comment = $_POST['t_upload_des'];
$sub_id = $_POST['sub_id'];
$date = date("d/m/y");
$topic = $_POST['topic'];

//echo "$comment, $sub_id, $date, $topic";
//
$file_name = $_FILES['file']['name'];
$file_tmp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($file_tmp);
$_FILES["file"]["name"]=$newfilename;
//

//$file_tmp = $_FILES['file']['tmp_name'];
$targetfolder = "upload_pdf/";
$targetfolder = $targetfolder . basename($_FILES['file']['name']);
//echo "$sub_id, $sid, $ass_id, $comment, $date";



  move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);
  $insertquery = "INSERT INTO assignment(sub_id,topic,t_doc, t_upload_des, date_assi,view) VALUES('$sub_id','$topic','$newfilename','$comment','$date',1)";
  $iquery = mysqli_query($con, $insertquery);
  if ($iquery) {

    echo "<script>alert('Record uploaded...!')</script>";
    header("refresh:0;url=subjectPage.php?id=$sub_id");
  } else {
    echo "<script>alert('Failed to upload record...!')</script>";
    header("refresh:5;url=subjectPage.php?id=$sub_id");
  
}


?>