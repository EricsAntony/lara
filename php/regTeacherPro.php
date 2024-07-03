<?php
  $url='localhost';
  $username='root';
  $password='';
  $conn=mysqli_connect($url,$username,$password,"lab");
 

  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mob'];
  $pwd = $_POST['pwd'];
 
  

  $sql = "INSERT INTO teacher (t_name,t_email,t_mob,pwd) VALUES ('$name','$email','$mobile','$pwd')";
  $result=mysqli_query($conn, $sql);

  if($result)
  echo "1";
else
  echo "0";
?>