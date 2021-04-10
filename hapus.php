<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$nik = $_GET['nik'];
 
 
// menghapus data dari database
$input = "DELETE from data_pendaftar where nik='$nik'";
    $query = mysqli_query($con, $input);
 
 if (!$query) {
    die ('SQL Error: ' . mysqli_error($con));
  }

    header("location:tampil.php");
 
?>