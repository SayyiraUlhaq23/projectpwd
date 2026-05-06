<?php
include 'koneksi.php';
session_start();

$nama = $_GET['nama']?? '';
$email = $_GET['email']?? '';
$no_hp = $_GET['no_hp']?? '';
$id_kendaraan = $_GET['id_kendaraan'] ?? '';
$tanggal = $_GET['tanggal'] ?? '';
$lama_sewa = $_GET['lama_sewa'] ?? '';
$metode_pembayaran = $_GET['metode_pembayaran'] ?? '';

if ($nama && $email && $id_kendaraan) {

    $query = mysqli_query($konek, "INSERT INTO booking(nama,email,no_hp,id_kendaraan,tanggal,lama_sewa,metode_pembayaran)
        VALUES
        ('$nama','$email','$no_hp','$id_kendaraan','$tanggal','$lama_sewa','$metode_pembayaran')");

    $id = mysqli_insert_id($konek);
    $id_booking = "BK" . str_pad($id, 3, '0', STR_PAD_LEFT);

    if($query){
        header("Location: landing.php?id_booking=$id_booking&id_kendaraan=$id_kendaraan&tanggal=$tanggal&lama_sewa=$lama_sewa&metode_pembayaran=$metode_pembayaran");
        exit;
    } else {
        echo "Gagal Menyimpan Data";
    }

} else {
    echo "Data tidak lengkap atau kendaraan tidak valid";
}
?>
