<?php
function call()
{
    session_start();
    session_unset();
    session_destroy();
}
ob_start();
$error = "Problem connecting";
$link = mysqli_connect('localhost', 'root', '') or die($error);
mysqli_select_db($link ,'dap2') or call();
?>