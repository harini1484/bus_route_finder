<?php
session_start();
if($_SESSION['staff']=="")
{
header("location:login_staff.php");
}
?>