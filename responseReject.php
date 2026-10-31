<?php
include 'dbConnect.php';
$transnum = $_GET['transnum'];
$reject="UPDATE booking SET status = 'Rejected' where transnum=$transnum";
$reject2="UPDATE price SET totalprice=0 where transnum=$transnum";
mysqli_query($db_connection,$reject);
mysqli_query($db_connection,$reject2);
header("location:adminVerify.php");
?>