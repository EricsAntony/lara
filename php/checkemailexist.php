<?php

include "config.php";
$uname = mysqli_real_escape_string($con,$_POST['username']);

$response = array( 
    'count' => 0, 
    'message' => '',
    'error'=>'' 
); 
if ($uname != ""){

    $sql_query = "select *  from student where email='".$uname."' ";
    $result = mysqli_query($con,$sql_query);
    

    while($row = mysqli_fetch_array($result)) 
    { 
   
    //

    
        $response['count']=1;
        $response['admno']=$row["adm_no"];
        $response['yoa']=$row["yoa"];
        $response['name']=$row["s_name"];
        $response['mob']=$row["mob1"];

}}
else{
    $response['count']=1;
        $response['error']= mysqli_error($con);
}

echo json_encode($response);