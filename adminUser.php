<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['inputAdmin'])) {
	header("location: adminLogin.php");
}
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Yoga Futsal Surabaya</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href='res/img/icon.jpg' rel='SHORTCUT ICON' />
	<link rel="stylesheet" href="res/css/style.css">

	<style>
		.align-middle {
			vertical-align: middle !important;
		}
	</style>
</head>

<body>
	<div class="site-content">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light sticky-top">
				<a href="adminHome.php" class="nav-brand ml-3 mr-3">
					<img src="res/img/logoYoga.png" width="100" height="100" class="d-inline-block align-top" alt=""> </a>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="adminUser.php" style="margin-right:20px">User</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="adminVerify.php" style="margin-right:20px">Verifikasi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="adminTransaction.php" style="margin-right:20px">Transaksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="adminPrice.php" style="margin-right:20px">List Harga</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="adminField.php" style="margin-right:20px">Lapangan</a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="adminLogout.php" class="nav-link" href="#" style="margin-right:40px">Logout</a>
					</li>
				</ul>
			</nav>
		</header>

		<?php
		include "dbConnect.php";
        $query = mysqli_query($db_connection, "SELECT * FROM user");?>
		
		<div class="ml-5 mr-5">
			<h1>Data User</h1>
			<br>
			<p>
				<a class="btn btn-primary" href="tambah_user.php">Tambah</a>
			</p>
			<table class="table table-bordered">
				<tr>
					<th>
						No
					</th>
					<th>
						Nama
					</th>
					<th>
						Nomor Handphone
					</th>
					<th>
						Username
					</th>
					<th>
						Password
					</th>
					<th>
						Role
					</th>
					<th>
						Aksi
					</th>
				</tr>
				<?php $no = 1 ?>
                    <?php while ($data = mysqli_fetch_array($query)) {

                    ?>
                        <tr>
                            <td><?php echo $no ++; ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['phonenum'] ?></td>
							<td><?php echo $data['username'] ?></td>
							<td><?php echo $data['password'] ?></td>
							<td><?php echo $data['role'] ?></td>
                            <td>
							<a href="edit_user.php?name=<?php echo $data['name']; ?>" class="btn btn-success">Edit</a>
							<a href="delete_user.php?name=<?php echo $data['name']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                            </td>

						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
	</div>
</body>

</html>