<?php
include 'koneksi.php';

$id_booking = $_POST['id_booking'];
$id_kendaraan = $_POST['id_kendaraan'];
$tanggal = $_POST['tanggal'];
$lama_sewa = $_POST['lama_sewa'];
$status = $_POST['status'];

$query_kendaraan = mysqli_query($konek, "SELECT harga_sewa FROM kendaraan 
                   WHERE id_kendaraan='$id_kendaraan'");
$data_kendaraan = mysqli_fetch_assoc($query_kendaraan);

$harga_sewa = $data_kendaraan['harga_sewa'];
$total_harga = $harga_sewa * $lama_sewa;

// UPDATE Booking
$query = mysqli_query($konek,"UPDATE booking SET 
        id_kendaraan='$id_kendaraan', tanggal='$tanggal', lama_sewa='$lama_sewa', total_harga='$total_harga', status='$status'  
        WHERE id_booking='$id_booking'");

if($query){
    header("Location:tampil_booking.php");
} else {
    echo "Gagal update data!";
}
?>
