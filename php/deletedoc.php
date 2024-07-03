<?php

$con = mysqli_connect("localhost", "root", "", "lab");
$doc_id = base64_decode($_POST['doc_id']);
$s="SELECT doc_name from document where doc_id=$doc_id";
$result=mysqli_query($con,$s);
$row = mysqli_fetch_array($result);

$dir = $_SERVER['DOCUMENT_ROOT']."/lab/php/pdf";
$data=$row['doc_name'];

//echo $dir.'/'.$data;
        unlink($dir.'/'.$data);

    
$sql = "DELETE FROM document where doc_id=$doc_id";

if(mysqli_query($con,$sql))
{
   echo "1";
}
else
{
    echo "<script>alert('Failed to delete')</script>";
}
?>