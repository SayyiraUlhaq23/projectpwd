<?php
include 'koneksi.php';
session_start();

// cek login
if (!isset($_SESSION['id_user'])) {
    header("Location: login_user.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$id_kendaraan = $_POST['id_kendaraan'];
$tanggal = $_POST['tanggal'];
$lama_sewa = $_POST['lama_sewa'];
$metode_pembayaran = $_POST['metode_pembayaran'];

$query_kendaraan = mysqli_query($konek, "SELECT harga_sewa FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");
$data_kendaraan = mysqli_fetch_assoc($query_kendaraan);

if (!$data_kendaraan) {
    die("Kendaraan tidak ditemukan");
}

// hitung total harga
$total_harga = $data_kendaraan['harga_sewa'] * $lama_sewa;


$query = mysqli_query($konek, "INSERT INTO booking (id_kendaraan, tanggal, lama_sewa, metode_pembayaran, id_user, total_harga)
    VALUES ('$id_kendaraan', '$tanggal', '$lama_sewa', '$metode_pembayaran', '$id_user', '$total_harga')");

if ($query) {
    header("Location:../user/mybooking.php");
    exit;

} else {
    echo "Gagal menyimpan booking!";
}
?>