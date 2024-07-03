<?php
session_start();
unset($_SESSION['assistant']);
unset($_SESSION['as_id']);
unset($_SESSION['as_name']);
if(session_destroy())
{
    echo 1;
}
?>

