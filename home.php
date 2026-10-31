<?php
$db_connection = mysqli_connect("127.0.0.1", "root", "", "futsal");

error_reporting(0);
session_start();
// if (empty($_SESSION['username'])) {
//     header("location: login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Yoga Futsal Surabaya</title>

    <style>
        body {
            background: url("res/img/back.jpg") no-repeat fixed center;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="res/css/style.css">
    <link href='res/img/icon.jpg' rel='SHORTCUT ICON' />

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <a href="home.php" class="nav-brand ml-3 mr-3">
                <img src="res/img/logoYoga.png" width="100" height="100" class="d-inline-block align-top" alt=""> </a>


            <?php if ($_SESSION['username'] == null) {  ?>



                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white" style="margin-Right:50px" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="font-size:30px">account_circle</i> Login / Register</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="login.php">Login</a>

                            <a class="dropdown-item" href="signup.php">Sign Up</a>

                        </div>
                    </li>
                </ul>



            <?php } else { ?>

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="booking.php" style="margin-right:20px;color:#fff">Data Booking</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="history.php" style="margin-right:20px;color:#fff">Riwayat Transaksi</a>
                    </li>

                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown" style="margin-left: 600px;">
                        <a class="nav-link text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="font-size:30px">account_circle</i><?php echo $_SESSION['username']; ?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>
                    </li>
                </ul>


            <?php } ?>
        </nav>
    </header>

    <br>
    <?php include "dbConnect.php";
    $query = mysqli_query($db_connection, "SELECT * FROM field,pricelist where field.fieldnum=pricelist.fieldnum");
    ?>

    <div class="col-md-12" style="margin-top: 1px;">

        <h1 style="color:#fff" class="text-center">Silahakan Pilih Lapangan & Cari Jadwal</h1>
    </div>

    <?php
    if (isset($_POST['date_search'])) {
        $field = $_POST['field'];
        $date = $_POST['date'];


        $time = strtotime($date);
        $now = date('Y-m-d');
        $newformat = date('l\, F jS Y', $time);

        $day = floor(($time - time()) / 86400);
        if ($day + 1 < 0 || $day + 1 > 30) {
            echo '
        <div class="alert alert-danger mt-5" style="max-width: 100%" role="alert">
        <h5 class="alert-heading">Tanggal tidak berlaku
         !</h5>
         Harap masukkan tanggal dalam 30 hari ke depan dari hari ini!
        </div>
        ';
        } else {
            header("location: searchbooking.php?date=" . $date . "&field=" . $field);
        }
        echo '</div>';
    }
    ?>

    <div class=" ml-3 mt-3">
        <div class="row mt-3">
            <?php while ($data = mysqli_fetch_array($query,)) { ?>
                <div class="col-md-4" style="padding-top:1cm;">
                    <div class="card">
                        <img src="lapangan/<?php echo $data['image'] ?>" class="card-img-top" style="height: 6cm;">
                        <div class="card-body">
                            <h5 class="card-title">Lapangan <?php echo $data['fieldnum'] ?></h5>
                            <p class="card-text">
                                <b>Tipe :</b> <?php echo $data['tipe'] ?>
                            </p>
                            <p class="card-text">
                                <b>Harga : </b> <a> Rp </a> <?php echo $data['price'] ?> <a>Per Jam</a>
                            </p>

                            <form method="POST" class="form-inline">
                                <div class="form-group mb-2">
                                    <input type="date" class="form-control" name="date" required>
                                    <input type="hidden" class="form-control" name="field" value="<?php echo $data['fieldnum'] ?>">

                                </div>
                                <button type="submit" class="btn btn-warning mb-2" name="date_search">
                                    <font color="043752">Search!</font>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <br>






        <br>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>