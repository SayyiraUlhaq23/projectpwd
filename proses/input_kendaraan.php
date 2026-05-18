<?php
include 'koneksi.php';

if (isset($_POST['id_kendaraan'])) {
    $id_kendaraan = $_POST['id_kendaraan'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $harga_sewa = $_POST['harga_sewa'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    
    $folder = "../assets/";
    move_uploaded_file($tmp, $folder . $gambar);

    $query = mysqli_query($konek,"INSERT INTO kendaraan(id_kendaraan,jenis_kendaraan,harga_sewa, gambar, deskripsi) 
            VALUES('$id_kendaraan','$jenis_kendaraan','$harga_sewa','$gambar','$deskripsi')");

    if($query){
        header("Location:../admin/tampil_kendaraan.php");
    }else{
        echo "Gagal Menyimpan Data";
    }
} else {
    header("Location:../admin/tampil_kendaraan.php");
    exit;
}
?>