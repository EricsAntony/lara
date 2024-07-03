<?php
session_start();
unset($_SESSION['student']);
unset($_SESSION['sid']);
unset($_SESSION['sname']);
if(session_destroy())
{
    echo 1;
}
?>

