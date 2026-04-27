<?php
include 'koneksi.php';

$id_kendaraan = $_GET['id_kendaraan'];

mysqli_query($konek,"DELETE FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");

header("Location:tampil_kendaraan.php");
?>