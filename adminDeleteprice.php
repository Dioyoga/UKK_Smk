<?php
include"dbConnect.php";


$query = "DELETE FROM pricelist 
							WHERE opt ='$_GET[opt]'
								";

mysqli_query($db_connection, $query)
or die ("Gagal Perintah SQL".'mysql_error'());
header('location:adminPrice.php');

?>