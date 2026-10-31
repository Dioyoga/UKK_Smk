<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'dbConnect.php';

	// membuat variabel untuk menampung data dari form
    $nomor_lapangan = $_POST['fieldnum'];
    $tipe   = $_POST['tipe'];
    $image = $_FILES['image']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($image != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $image); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['image']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$image; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'lapangan/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO field (fieldnum, tipe, image) VALUES ('$nomor_lapangan', '$tipe', '$nama_gambar_baru')";
                  $result = mysqli_query($db_connection, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($db_connection).
                           " - ".mysqli_error($db_connection));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='adminField.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_lapangan.php';</script>";
            }
} else {
   $query = "INSERT INTO field(fieldnum, tipe, image) VALUES ('$nomor_lapangan', '$tipe', '$nama_gambar_baru'null)";
                  $result = mysqli_query($db_connection, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($db_connection).
                           " - ".mysqli_error($db_connection));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='adminField.php';</script>";
                  }
}

 

