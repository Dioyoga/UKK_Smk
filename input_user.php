<?php
include "dbConnect.php";



$name = $_POST['name'];
$phonenum = $_POST['phonenum'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$query = "INSERT INTO user (name, phonenum, username, password, role) VALUES ('$name', '$phonenum', '$username','$password','$role')";

								$result = mysqli_query($db_connection, $query);
								// periska query apakah ada error
								if(!$result){
									die ("Query gagal dijalankan: ".mysqli_errno($db_connection).
										 " - ".mysqli_error($db_connection));
								} else {
								  //tampil alert dan akan redirect ke halaman index.php
								  //silahkan ganti index.php sesuai halaman yang akan dituju
								  echo "<script>alert('Data berhasil ditambah.');window.location='adminUser.php';</script>";
								}
			  

?>

