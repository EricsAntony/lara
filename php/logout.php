<?php
session_start();
unset($_SESSION['teacher']);
unset($_SESSION['tid']);
unset($_SESSION['tname']);
if(session_destroy())
{
    echo 1;
}
?>

