<?php
  $url='localhost';
  $username='root';
  $password='';
  $conn=mysqli_connect($url,$username,$password,"lab");
  
  $file = $_FILES['file']['tmp_name'];
  if ($file != '') {
   $handle = fopen($file, "r");
   $c = 1;
   while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
   {
    $name = $filesop[1];
    $email = $filesop[2];
    $adm_no= $filesop[0];
    $yoa=$filesop[4];
    $batch=$filesop[3];
    $sql = "INSERT INTO student(s_name,email,adm_no,batch,yoa)values('$name','$email','$adm_no','$batch','$yoa')";
    $stmt = mysqli_prepare($conn,$sql);
    if(mysqli_stmt_execute($stmt))
    $m = 1;
    $c = $c + 1;
  }
  echo 1;
}
else
{
  echo 2;
}




?>