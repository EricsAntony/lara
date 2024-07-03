<?php
include 'config.php';
    
$a=$_POST['razorpay_payment_id'];
$b= $_POST['product_id'];
$c=$_POST['totalAmount'];;
 $sql="update document set pay_status=1 where doc_id='$b'";
 $sql2="INSERT INTO payment_success values('$a','$b',NOW(),'$c') ";
 if(mysqli_query($con,$sql)&&mysqli_query($con,$sql2))
 echo "1";
 else
 echo mysqli_error($con);


?>

