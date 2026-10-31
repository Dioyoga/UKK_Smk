<?php
include "dbConnect.php";



$name = $_POST['name'];
$phonenum = $_POST['phonenum'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE user SET
								name = '$name',
								phonenum = '$phonenum',
								username = '$username',
								password = '$password'
								WHERE name = '$name'
								";

mysqli_query($db_connection, $query)
or die ("Gagal Perintah SQL".'mysql_error'());
header('location:adminUser.php');

?>

