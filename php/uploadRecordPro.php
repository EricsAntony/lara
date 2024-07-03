<?php

$con = mysqli_connect("localhost", "root", "", "lab");
$comment = $_POST['comment'];
$ass_id = base64_decode($_POST['ass_id']);
$sid = base64_decode($_POST['s_id']);
$sub_id = base64_decode($_POST['sub_id']);
$date = date("Y-m-d");


//
$file_name = $_FILES['file']['name'];
$file_tmp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($file_tmp);
$_FILES["file"]["name"]=$newfilename;
//

//$file_tmp = $_FILES['file']['tmp_name'];
$targetfolder = "pdf/";
$targetfolder = $targetfolder . basename($_FILES['file']['name']);
//echo "$sub_id, $sid, $ass_id, $comment, $date";


$path = "pdf/$newfilename";


function countPages($path)
{
  $pdftext = file_get_contents($path);
  $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
  return $num;
}


  move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder);
  $totalPages = countPages($path);
  $insertquery = "INSERT INTO document(sub_id, s_id, doc_name, submission_date, v_status, ass_id,comment,no_of_pages) VALUES('$sub_id','$sid','$newfilename','$date','not verified','$ass_id','$comment','$totalPages')";
  $iquery = mysqli_query($con, $insertquery);
  if ($iquery) {

    echo "1";
   
  } else {
    echo mysqli_error($conn);
   
  
}


?>