<?php
include 'koneksi.php';

$id_kendaraan = $_POST['id_kendaraan'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$harga_sewa = $_POST['harga_sewa'];

$query = mysqli_query($konek,"UPDATE kendaraan SET jenis_kendaraan='$jenis_kendaraan',harga_sewa='$harga_sewa' WHERE id_kendaraan='$id_kendaraan'");

if($query){
    header("Location:tampil_kendaraan.php");
} else {
    echo "Gagal update data!";
}
?>
