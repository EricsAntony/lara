<?php
  $url='localhost';
  $username='root';
  $password='';
  $conn=mysqli_connect($url,$username,$password,"lab");
 

  $name = $_POST['name'];
  $email = $_POST['email'];
  $adm = $_POST['adm'];
  $mobile = $_POST['mob'];
  $yoa = $_POST['yoa'];
  $batch = $_POST['batch'];
  $pwd = $_POST['pwd'];
 
  

  $sql = "INSERT INTO student (s_name,email,adm_no,mob1,batch,yoa,pwd) VALUES ('$name','$email','$adm','$mobile','$batch','$yoa','$pwd')";
  $result=mysqli_query($conn, $sql);

  if($result)
  echo "1";
else
  echo "0";
?>