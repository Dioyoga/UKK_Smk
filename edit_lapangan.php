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


        <?php
        include 'dbConnect.php';

        $nomor_lapangan = $_GET['fieldnum'];
        $data = mysqli_query($db_connection, "SELECT * FROM field WHERE fieldnum = $nomor_lapangan");
        $data = mysqli_fetch_assoc($data);

        if (isset($_POST['submit'])) {
            $nomor_lapangan = $_POST['fieldnum'];
            $tipe = $_POST['tipe'];

            $allowedExtenstions = ['jpg', 'png'];
            $fileName = $_FILES['image']['name'];
            $x = explode('.', $fileName);
            $extension = strtolower(end($x));
            $fileTmp = $_FILES['image']['tmp_name'];

            if (!empty($fileName)) {
                if (in_array($extension, $allowedExtenstions)) {
                    $upload = move_uploaded_file($fileTmp, 'lapangan/' . $fileName);

                    if ($upload) {
                        $insert = mysqli_query($db_connection, "
					UPDATE
						field
					SET
						fieldnum = '$nomor_lapangan',
						tipe = '$tipe',
						image = '$fileName',
					WHERE
						fieldnum = $nomor_lapangan
				");

                        echo '<script>alert("Berhasil di-update"); location.href = "adminField.php"</script>';
                    } else {
                        echo '<script>alert("File yang di-upload gagal")</script>';
                    }
                } else {
                    echo "<script>alert('Ekstensi file yang di-upload tidak diperbolehkan')</script>";
                }
            } else {
                $insert = mysqli_query($db_connection, "
			UPDATE
				field 
			SET
				fieldnum = '$nomor_lapangan',
				tipe = '$tipe',
			WHERE
				fieldnum = $nomor_lapangan
		");

                echo '<script>alert("Berhasil di-update"); location.href = "adminField.php"</script>';
            }
        }
        ?>

        <style type="text/css">
            * {
                font-family: "Trebuchet MS";
            }

            h1 {
                text-transform: uppercase;
                color: black;
            }

            button {
                background-color: black;
                color: #fff;
                padding: 10px;
                text-decoration: none;
                font-size: 12px;
                border: 0px;
                margin-top: 35px;
                transform: translate(-190%, 10%);
            }

            label {
                margin-top: 10px;
                float: left;
                text-align: left;
                width: 100%;
            }

            input {
                padding: 6px;
                width: 100%;
                box-sizing: border-box;
                background: #f8f8f8;
                border: 2px solid #ccc;
                outline-color: black;
            }

            div {
                width: 100%;
                height: auto;
            }

            .base {
                width: 1000px;
                height: auto;
                padding: 20px;
                margin-left: auto;
                margin-right: auto;
                background: #ededed;
            }
        </style>


        <div class="container ml-5 mt-3">
            <h1>Edit Lapangan <?php echo $data['fieldnum']; ?></h1>
            <br>
            <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
                <section class="base">
                    <div class="ml-6 mr-0 mt-3">
                        <!-- menampung nilai id produk yang akan di edit -->
                        <input name="fieldnum" value="<?php echo $data['fieldnum']; ?>" hidden />
                        <div>
                            <div>
                                <label>Nomor Lapangan</label>
                                <input type="text" name="fieldnum" value="<?php echo $data['fieldnum']; ?>" />
                            </div>
                            <label>Tipe</label>
                            <input type="text" name="tipe" value="<?php echo $data['tipe']; ?>" autofocus="" required="" />
                        </div>
                        <div>
                            <label>Gambar Lapangan</label>
                            <img src="lapangan/<?php echo $data['image']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                            <input type="file" name="image" />
                            <i style="float: left;font-size: 11px;color: black">Abaikan jika tidak merubah gambar lapangan</i>
                        </div>
                        <div>
                            <button type="submit">Simpan Perubahan</button>
                        </div>
                </section>
            </form>
            <br>
            <br>