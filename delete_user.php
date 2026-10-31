<?php
include "dbConnect.php";


$query = "DELETE FROM user 
							WHERE name ='$_GET[name]'
								";

mysqli_query($db_connection, $query)
or die ("Gagal Perintah SQL".'mysql_error'());
header('location:adminUser.php');

?>

