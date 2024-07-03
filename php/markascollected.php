<?php

$con = mysqli_connect("localhost", "root", "", "lab");
$doc_id = $_REQUEST['doc_id'];
$date = date('d/m/y');
$s = "SELECT * FROM document where doc_id=$doc_id";
$result = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($result);
$val = $row['collect_status'];
$print = $row['print_status'];
$as_id = $_REQUEST['as_id'];

if ($val == 'not collected') {
    if($print == 'printed')
    {
    $sql = "UPDATE document SET collect_status = 'collected', collect_date='$date', col_as_id='$as_id' where doc_id=$doc_id";
    if (mysqli_query($con, $sql)) {
        header("refresh:0,url=../pages/assistant/la_dash.php");
    } else {
        echo "<script>alert('Failed to change status')</script>";
        header("refresh:0,url=../Pages/assistant/la_dash.php");
    }
}
else
{
    echo "<script>alert('FAILED...The document is not printed')</script>";
        header("refresh:0,url=../Pages/assistant/la_dash.php");
}
}
else
{
    $sql = "UPDATE document SET collect_status = 'not collected', collect_date=NULL, col_as_id=NULL where doc_id=$doc_id";
    if (mysqli_query($con, $sql)) {
        header("refresh:0,url=../pages/assistant/la_dash.php");
    } else {
        echo "<script>alert('Failed to change status')</script>";
        header("refresh:0,url=../Pages/assistant/la_dash.php");
    }
}