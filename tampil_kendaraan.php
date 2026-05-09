<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit;
}
?>

<!-- // echo "[!] Anda masuk sebagai <b>" . $_SESSION['username'] . "<b>."; -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styleAdmin.css">
</head>
  
<body class="tampil-kendaraan">
<div class="container container-box">
    <div class="admin-info">
        <i class="bi bi-shield-lock"></i>
        <span>Anda masuk sebagai <b><?= $_SESSION['username']; ?></b></span>
    </div>

    <div class="topbar">
        <h1><i class="bi bi-car-front"></i> Data Kendaraan Sewa</h1>
        <a href="form_kendaraan.php" class="btn-add">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    </div>

    <!-- Tabel Data -->
    <table>
        <thead>
        <tr>
            <th>ID Kendaraan</th>
            <th>Jenis Kendaraan</th>
            <th>Harga Sewa (per hari)</th>
            <th colspan="2">Aksi</th>
        </tr>
        </thead>

        <tbody>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($konek,"SELECT * FROM kendaraan");

        while($data=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $data['id_kendaraan']?></td>
            <td><?php echo $data['jenis_kendaraan']?></td>
            <td><?php echo $data['harga_sewa']?></td>
            <td>
                <a class="btn-action btn-edit" href="edit_kendaraan.php?id_kendaraan=<?php echo $data['id_kendaraan']; ?>">
                Edit</a>
                <a class="btn-action btn-delete" href="delete_kendaraan.php?id_kendaraan=<?php echo $data['id_kendaraan']; ?>" 
                onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <div class="bottom-bar">
    <a href="dashboard.php" class="btn-back">
        ← Kembali ke Dashboard
    </a>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
