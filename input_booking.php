<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$id_kendaraan = $_POST['id_kendaraan'];
$tanggal = $_POST['tanggal'];
$lama_sewa = $_POST['lama_sewa'];


$query = mysqli_query($konek, "INSERT INTO booking(nama,email,no_hp,id_kendaraan,tanggal,lama_sewa)
VALUES('$nama','$email','$no_hp','$id_kendaraan','$tanggal','$lama_sewa')");

if($query){
    header("Location:tampil_booking.php");
} else {
    echo "Gagal Menyimpan Data";
}
?>
