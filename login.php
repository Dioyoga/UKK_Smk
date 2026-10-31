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
    <title>Login - Yoga Futsal Surabaya</title>
    <link href='res/img/icon.jpg' rel='SHORTCUT ICON' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="res/css/styleloginregister.css">
</head>
<body>
    <header>

<div class="container">
		
		<form  method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="login" class="btn">Login</button>
			</div>
			<br>
			<p class="login-register-text">Tidak Punya Akun? <a href="signup.php">Daftar Sekarang</a>.</p>
			<br>
			<p class="login-register-text"><a href="home.php">Kembali Ke Halaman Utama</a>.</p>
		</form>
		
	</div>
</body>
</html>
    <?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select password from user where username = '$username' And password ='$password' and role='customer'";
        $query_run = mysqli_query($db_connection,$query);
        $num_rows = mysqli_num_rows($query_run);
        if($num_rows>0){
            $data = mysqli_fetch_assoc($query_run);
            if($data['password']){
                session_start();
                $_SESSION['username'] = $username;
                header("location:home.php");
            }else{
                echo 'wrong password';              
            }

        }else{
            echo 'User Tidak Ditemukan';
        }
    }

    ?>
   



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>