<?php
$db_connection = mysqli_connect("127.0.0.1", "root","", "futsal");

session_start();
if(!empty($_SESSION['username'])){
	header("location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Yoga Futsal Surabaya</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="res/css/styleloginregister.css">
    <link rel="stylesheet" type="text/css" href="res/css/style.css">
    <link href='res/img/icon.jpg' rel='SHORTCUT ICON' />    

</head>
<body>

    <header>
    

 <!-- content -->
 <div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Pendaftaran Akun</p>
			<div class="input-group">
				<input type="text" placeholder="Nama Lengkap" name="name"  required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username"  required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Nomor Handphone" name="phonenum"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Ulangi Password" name="repeatpass"  required>
			</div>
			<div class="input-group">
				<button name="signup" class="btn">Daftar</button>
			</div>
			<p class="login-register-text">Sudah Punya Akun? <a href="login.php">Login Disini</a>.</p>
		</form>
	</div>

    <?php
        if(isset($_POST['signup'])){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $phonenum = $_POST['phonenum'];
            $password = $_POST['password'];
            $repeatpass = $_POST['repeatpass'];
            if($repeatpass == $password){
                $query = "select * from user where username = '$username'";
                $query_run = mysqli_query($db_connection,$query);
                $num_rows = mysqli_num_rows($query_run);
                if(!($num_rows>0)){
                    $query = "select * from user where phonenum = '$phonenum';";
                    $query_run=mysqli_query($db_connection,$query);
                    $num_rows=mysqli_num_rows($query_run);
                    if(!($num_rows>0)){
                        //$hash_pass = password_hash($password,PASSWORD_DEFAULT);
                        $query = "insert into user (name,username,phonenum,password) values ('$name','$username','$phonenum','$password')";
                        $query_run=mysqli_query($db_connection,$query);
                        if($query_run){
                            echo'
                                <div class="alert alert-success mt-3" role="alert">
                                   Akun Sudah Dibuat! 
                                    Silahkan <a href="login.php" class="alert-link">Login</a>
                                </div>
                                ';
                        }else{
                            echo '
                                <div class="alert alert-danger mt-3" role="alert">
                                    Something went wrong, please try again. 
                                </div>
                                ';
                        }
                    }else{
                        echo '
                            <div class="alert alert-danger mt-3" role="alert">
                                Phone number already in use, please use another number 
                            </div>
                            ';
                    }
                }else{
                    echo '
                        <div class="alert alert-danger mt-3" role="alert">
                            Username already exist, please use another username
                        </div>
                        ';
                }

            }else{
                echo 
                    '<div class="alert alert-danger mt-3" role="alert">
                        Password mismatch, please check your password
                    </div>';
            }
        }
    ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>