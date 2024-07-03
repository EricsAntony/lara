<?php

$con = mysqli_connect("localhost", "root", "", "lab");
$doc_id = $_REQUEST['doc_id'];

$sql = "SELECT * FROM document where doc_id='$doc_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$doc_name = $row['doc_name'];



//echo "<iframe src=\"student/pdf/$doc_name\" width=\"100%\" style=\"height:100%\"></iframe>";
echo "<object width=400 height=500 type='application/pdf' data='../student/pdf/$doc_name?#zoom=85&scrollbar=0&toolbar=0&navpanes=0'></object>";
header("refresh:3;url=la_dash.php");
//echo '<embed src="student/pdf/$doc_name" type="application/pdf" width="100%" height="600px" />';
?>