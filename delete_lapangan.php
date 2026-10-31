<?php
include"dbConnect.php";


$query = "DELETE FROM field 
							WHERE fieldnum ='$_GET[fieldnum]'
								";

mysqli_query($db_connection, $query)
or die ("Gagal Perintah SQL".'mysql_error'());
header('location:adminField.php');

?>