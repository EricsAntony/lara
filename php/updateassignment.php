<?php
include "config.php";
$ass_id = $_POST['assid'];
$aname = $_POST['topic'];
$ddate = $_POST['ddate'];

$des = $_POST['description'];
if (isset($_FILES['file_up']['name'])) {
    echo "Enteered";
    $s = "SELECT t_doc from assignment where ass_id='$ass_id'";
    $result = mysqli_query($con, $s);
    $row = mysqli_fetch_array($result);

    $dir = $_SERVER['DOCUMENT_ROOT'] . "/lab/php/teacherpdfs";
    $data = $row['t_doc'];
    unlink($dir . '/' . $data);

    $file_name = $_FILES['file_up']['name'];
    $file_tmp = explode(".", $_FILES["file_up"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($file_tmp);
    $_FILES["file_up"]["name"] = $newfilename;
    $targetfolder = "teacherpdfs/";
    $targetfolder = $targetfolder . basename($_FILES['file_up']['name']);
    move_uploaded_file($_FILES['file_up']['tmp_name'], $targetfolder);
}



$sql = "UPDATE `assignment` SET `due_date`='$ddate',`topic`='$aname', `t_upload_des` = '$des', `t_doc` = '$newfilename' WHERE  ass_id='$ass_id'";
if (mysqli_query($con, $sql))
    echo 1;
else
    echo mysqli_error($con);
?>