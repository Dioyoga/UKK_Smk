<?php
include "dbConnect.php";
?>

<!DOCTYPE html>
<?php
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

        <div class="landing-text ml-5 mt-3">
        <h1>Status Lapangan</h1>
    

        <?php include "dbConnect.php";
        $query = mysqli_query($db_connection, "SELECT * FROM field ");  ?>
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
        <?PHP
        if (isset($_POST['date_search'])) {
            $field = $_POST['field'];
            $date = $_POST['date'];


            $time = strtotime($date);
            $now = date('Y-m-d');
            $newformat = date('l\, F jS Y', $time);

            $day = floor(($time - time()) / 86400);
            echo '<div class="row ml-5 mt-5" style="max-width:90%;">';
            for ($x = 7; $x <= 23; $x++) {
                $available = true;
                $query = "select * from booking_price where tgl = '$date' and fieldnum=$field;";
                $query_run = mysqli_query($db_connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    if ($row['start'] <= $x && $x < $row['end'] && $row['status'] != "Rejected") {
                        $available = false;
                    }
                }

                if ($available) {
                    echo '
                    <div class="card  mr-4 mb-2 " style="width:120px;">
                        <div class="card-body">
                            <h5 class="card-title mt-2 ml-1">' . $x . '.00 - ' . ($x + 1) . '.00</h5>
                        </div>
                    </div>';
                } else {
                    echo '<div class="card mr-4 mb-2 bg-secondary" style="width:120px;">
                            <div class="card-body dark">
                                <h5 class="card-title mt-2 ml-1">' . $x . '.00 - ' . ($x + 1) . '.00</h5>
                            </div>
                        </div>';
                }
            }
            echo '</div>';
            echo '</div>';
        }
        ?>

    </div>
    <br>
    <div class="landing-text ml-5 mt-3">
        <h1>Data Lapangan</h1>
    </div>

    <div class="ml-5 mr-5" style="margin-top: 0px;">
        <?php
        $query = mysqli_query($db_connection, "SELECT * FROM field");
        if (mysqli_num_rows($query) ==  0) { ?>
            <div class="text-center">
                <p>There is no data</p>
                <a href="tambah_lapangan.php" class="btn btn-dark text-center">Add Data</a>
            </div>
        <?php } else { ?>
            <br>
            <a href="tambah_lapangan.php" class="btn btn-primary mt-3">Tambah Data</a>
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Nomor Lapangan
                    </th>
                    <th>
                        Tipe
                    </th>
                    <th>
                        Gambar
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
                <tbody>
                    <?php $no = 0 ?>
                    <?php while ($data = mysqli_fetch_array($query)) {

                    ?>
                        <tr>
                            <td><?php echo $no + 1; ?></td>
                            <td><?php echo $data['fieldnum'] ?></td>
                            <td><?php echo $data['tipe'] ?></td>
                            <td style="text-align: center;"><img src="lapangan/<?php echo $data['image']; ?>" style="width: 120px;"></td>

                            <td>
                                <a href="edit_lapangan.php?fieldnum=<?php echo $data['fieldnum']; ?>" class="btn btn-success">Edit</a>

                                <a href="delete_lapangan.php?fieldnum=<?php echo $data['fieldnum']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</a>
                            </td>

                            <?php $no++; ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>