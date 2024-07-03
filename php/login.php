<?php
session_start();
include "config.php";
$uname = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if ($uname != "" && $password != "") {

    $sql_query = "select count(*) as cntUser,t_id, t_name from teacher where t_email='" . $uname . "' and pwd='" . $password . "'";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);
    $n = $row['t_name'];
    $count = $row['cntUser'];
    $id = $row['t_id'];
    //
    $sql_query2 = "select count(*) as cntUser,s_id, s_name  from student where email='" . $uname . "' and pwd='" . $password . "'";
    $result2 = mysqli_query($con, $sql_query2);
    $row2 = mysqli_fetch_array($result2);

    $count2 = $row2['cntUser'];
    $sid = $row2['s_id'];
    $sname = $row2['s_name'];

    $sql_query3 = "select count(*) as cntUser,as_id, as_name,email, pwd  from assistant where email='" . $uname . "' and pwd='" . $password . "'";
    $result3 = mysqli_query($con, $sql_query3);
    $row3 = mysqli_fetch_array($result3);
    $as_id = $row3['as_id'];
    $as_name = $row3['as_name'];
    $count3 = $row3['cntUser'];

    if ($count > 0) {
        $_SESSION['teacher'] = $uname;
        $_SESSION['tid'] = $id;
        $_SESSION['tname'] = $n;
        echo 1;
    } else if ($count2 > 0) {
        $_SESSION['student'] = $uname;
        $_SESSION['sid'] = $sid;
        $_SESSION['sname'] = $sname;
        echo 2;
    } else if ($count3 > 0) {
        $_SESSION['assistant'] = $uname;
        $_SESSION['as_id'] = $as_id;
        $_SESSION['as_name'] = $as_name;
        echo 3;
    } else {
        echo mysqli_error($con);
    }
}