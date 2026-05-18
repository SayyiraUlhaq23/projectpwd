<?php
include '../proses/koneksi.php';


$id_kendaraan = $_GET['id_kendaraan'];

$query = mysqli_query($konek,"SELECT * FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");
$data = mysqli_fetch_array($query);

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:../proses/login_db.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styleAdmin.css">
</head>

<body class="tampil-data">
<div class="container container-box">
    <div class="admin-info">
         <i class="bi bi-shield-lock"></i>
         <span>Anda masuk sebagai <b><?= $_SESSION['admin_username']; ?></b></span>
    </div>
    <div class="topbar">
         <h1><i class="bi bi-pencil-square"></i> Ubah Data Kendaraan Sewa</h1>
    </div>
    <div class="form-card">
        <form action="../proses/update_kendaraan.php" method="POST">
            <div class="form-group-admin">
                <label for="id_kendaraan">ID Kendaraan</label>
                <input type="text" name = "id_kendaraan" class="admin-input"
                value="<?= $data['id_kendaraan']; ?>" readonly>
            </div>
            <div class="form-group-admin">
                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                <input type="text" name = "jenis_kendaraan" class="admin-input"
                value="<?= $data['jenis_kendaraan']; ?>">
            </div>
            <div class="form-group-admin">
                <label for="harga_sewa">Harga Sewa</label>
                <input type="text" name = "harga_sewa" class="admin-input"
                value="<?= $data['harga_sewa']; ?>">
            </div>
            <div class="form-action form-action-right">
                <button type="submit" class="btn-save">
                    <i class="bi bi-repeat"></i> Update Data
                </button>
            </div>
        </form>
    </div>
    <div class="form-action">
        <a href="tampil_kendaraan.php" class="btn-back">
            ← Kembali ke beranda
        </a>
    </div>
</div>
</body>
</html>