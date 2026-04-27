<?php
include 'koneksi.php';

$id_booking = $_POST['id_booking'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$id_kendaraan = $_POST['id_kendaraan'];
$tanggal = $_POST['tanggal'];
$lama_sewa = $_POST['lama_sewa'];

$query = mysqli_query($konek,"UPDATE booking SET
nama='$nama',email='$email',no_hp='$no_hp',id_kendaraan='$id_kendaraan',tanggal='$tanggal',lama_sewa='$lama_sewa'  
WHERE id_booking='$id_booking'");

if($query){
    header("Location:tampil_booking.php");
} else {
    echo "Gagal update data!";
}
?>
