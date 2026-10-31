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
                    <li class="nav-item ">
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
                    <li class="nav-item active">
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



        <div class="container ml-5 mt-3">
            <h1>Tambah Data Lapangan</h1>
            <br>
            <form role="form" method="post" action="input_lapangan.php" enctype="multipart/form-data">
                <div class="ml-6 mr-0 mt-3">

                    <div class="form-group">
                        <label>Nomor Lapangan</label>
                        <input class="form-control" name="fieldnum">
                    </div>
                    <div class="form-group">
                        <label>Tipe</label>
                        <input class="form-control" name="tipe">
                    </div>
                    <div class="form-group">
                        <p>Pilih File Gambar : <br /><input type='file' name='image' ></p>
                    </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="adminField.php" class="btn btn-success" style="margin-right:1%;">Batal</a>
                        <br>
                        <br>
                        <br>
            </form>
        </div>
    </div>
    <p>
        </div>
</body>

</html>