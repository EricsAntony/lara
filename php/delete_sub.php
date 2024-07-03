<?php
include "config.php";
$sub_id = $_POST['sub_id'];

$s = "SELECT t_doc from assignment where sub_id='$sub_id'";
$result = mysqli_query($con, $s);
$dir = $_SERVER['DOCUMENT_ROOT'] . "/lab/php/teacherpdfs";
while ($row = mysqli_fetch_array($result)) {
    $data = $row['t_doc'];
    unlink($dir . '/' . $data);
}

$q = "SELECT doc_name from document where sub_id='$sub_id'";
$result1 = mysqli_query($con, $q);
$dir = $_SERVER['DOCUMENT_ROOT'] . "/lab/php/pdf";
while ($row1 = mysqli_fetch_array($result1)) {
    $data = $row1['doc_name'];
    unlink($dir . '/' . $data);
}
$del_assign = "DELETE FROM assignment where sub_id = '$sub_id'";

$del_doc = "DELETE FROM document where sub_id = '$sub_id'";

$sql = "DELETE FROM `subject`  WHERE sub_id='$sub_id'";

if (mysqli_query($con, $sql) && mysqli_query($con, $del_assign) && mysqli_query($con, $del_doc))
    echo "1";
else
    echo mysqli_error($con);
?>