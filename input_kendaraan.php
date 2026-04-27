<?php
include 'koneksi.php';

$id_kendaraan = $_POST['id_kendaraan'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$harga_sewa = $_POST['harga_sewa'];

$query = mysqli_query($konek,"INSERT INTO kendaraan(id_kendaraan,jenis_kendaraan,harga_sewa) 
VALUES('$id_kendaraan','$jenis_kendaraan','$harga_sewa')");

if($query){
    header("Location:tampil_kendaraan.php");
}else{
    echo "Gagal Menyimpan Data";
}
?>
