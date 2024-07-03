<?php
include "config.php";

$aid = $_POST['id'];



$s="SELECT t_doc from assignment where ass_id='$aid'";
$result=mysqli_query($con,$s);
$row = mysqli_fetch_array($result);

$dir = $_SERVER['DOCUMENT_ROOT'] . "/lab/php/teacherpdfs";
$data = $row['t_doc'];

$sql = "DELETE FROM `assignment` WHERE ass_id='$aid'";
$result = mysqli_query($con, $sql);

unlink($dir . '/' . $data);


$h ="SELECT * from document where ass_id='$aid'";
$i = mysqli_query($con,$h);
$dir = $_SERVER['DOCUMENT_ROOT'] . "/lab/php/pdf";


while($r = mysqli_fetch_array($i))
{
  $data = $r['doc_name'];
  unlink($dir . '/' . $data);
}

$sql_q = "DELETE FROM document where ass_id = '$aid'";
$q = mysqli_query($con,$sql_q);


if ($result && $q)
  echo "1";
else
  echo mysqli_error($con);
?>