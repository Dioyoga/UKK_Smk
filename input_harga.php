<?php
include 'dbConnect.php';


$opt=$_POST['opt'];
$fieldnum = $_POST['fieldnum'];
$startday = $_POST['startday'];
$endday = $_POST['endday'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
// $fieldtipe = $_POST['fieldtipe'];
$price = $_POST['price'];


$query = mysqli_query($db_connection, "insert INTO pricelist 
(opt, fieldnum, startday, endday,starttime,endtime,price) VALUES ('$opt', '$fieldnum', '$startday','$endday','$starttime','$endtime','$price')");


if($query){
	echo "<script>alert('Data berhasil ditambah.');window.location='adminPrice.php';</script>";

}else{
	// echo "Some error occured, Silahkan Coba Lagi!";
	var_dump($query);

}
