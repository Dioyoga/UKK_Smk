<!DOCTYPE html>
<?php
include "dbConnect.php";
session_start();
if (empty($_SESSION['inputAdmin'])) {
    header("location: adminLogin.php");
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yoga Futsal Surabaya</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href='res/img/icon.jpg' rel='SHORTCUT ICON' />
    <link rel="stylesheet" href="res/css/style.css">
</head>

<body>

    <div class="site-content">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                <a href="adminHome.php" class="nav-brand ml-3 mr-3">
                    <img src="res/img/logoYoga.png" width="100" height="100" class="d-inline-block align-top" alt=""> </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="adminUser.php" style="margin-right:20px">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminVerify.php" style="margin-right:20px">Verifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminTransaction.php" style="margin-right:20px">Transaksi</a>
                    </li>
                    <li class="nav-item active">
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

        <div class="ml-5 mr-5">
            <h1>Tambah Data Harga Lapangan</h1>
            <br>
            <p>
            <div class="mt-3 ml-4 mb-1" style="max-width: 60%">
                <form method="POST" action="input_harga.php">

                <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="number" min=1 max=10 name="opt"  class="form-control" placeholder="opt" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="number" min=1 max=10 name="fieldnum" class="form-control" placeholder="Nomor Lapangan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" name="startday" class="form-control" placeholder="Hari Dimulai" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" name="endday" class="form-control" placeholder="Hari Berakhir" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="number" min=0 max=24 name="starttime" class="form-control" placeholder="Waktu Dimulai" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="number" min=0 max=24 name="endtime" class="form-control" placeholder="Waktu Berakhir" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="number" min=1 name="price" class="form-control" placeholder="Harga" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button id="submit" type="submit" class="btn btn-warning mb-2" name="submit">
                                <font color="043752">Submit</font>
                            </button>
                        </div>
                    </div>
                </form>
            </div>