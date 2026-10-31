<?php
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $phonenum = $_POST['phonenum'];
            $username = $_POST['username'];
            $password = $_POST['password'];


            $sql =
                "update user
                set 
name = $name , 
phonenum = $phonenum , 
username = $username, 
password =$password
where name = $name;";


            $query_run = mysqli_query($db_connection, $sql);
            if ($query_run) {
                echo "<script>alert('Data berhasil diubah.');window.location='adminUser.php';</script>";
            } else {
                echo "Some error occured, Silahkan Coba Lagi!";
            }
        }
        ?>
