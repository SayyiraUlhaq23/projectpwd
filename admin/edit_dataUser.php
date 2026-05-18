<?php
include '../proses/koneksi.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:../proses/login_db.php");
    exit;
}

$id_user = $_GET['id_user'];

$query = mysqli_query($konek,"SELECT * FROM users WHERE id_user='$id_user'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
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
        <h1><i class="bi bi-person-gear"></i> Ubah Data Pengguna</h1>
    </div>

    <div class="form-card">
    <form action="../proses/update_dataUser.php" method="POST">
        <div class="form-group-admin">
            <label for="id_user">ID Pengguna</label>
            <input type="text" name = "id_user" class="admin-input"
            value="<?= $data['id_user']; ?>" readonly>
        </div>

        <div class="form-group-admin">
            <label for="nama">Nama : </label>
            <input type="text" name = "nama" class="admin-input"
            value="<?= $data['nama']; ?>">
        </div>

        <div class="form-group-admin">
            <label for="email">E-mail </label>
            <input type="text" name = "email" class="admin-input"
            value="<?= $data['email']; ?>">
        </div>

        <div class="form-group-admin">
            <label for="no_hp">No. HP</label>
            <input type="text" name = "no_hp" class="admin-input"
            value="<?= $data['no_hp']; ?>">
        </div>

        <div class="form-group-admin">
            <label for="username">Username</label>
            <input type="text" name = "username" class="admin-input"
            value="<?= $data['username']; ?>">
        </div>
        
        <div class="form-group-admin">
            <label for="password">Password</label>
            <input type="text" name = "password" class="admin-input"
            value="<?= $data['password']; ?>">
        </div>
        <div class="form-action form-action-right">
            <button type="submit" class="btn-save">
                <i class="bi bi-repeat"></i> Update Data
            </button>
        </div>
    </form>
    </div>
    <div class="form-action">
        <a href="tampil_users.php" class="btn-back">
            ← Kembali ke beranda
        </a>
    </div>
</div>
</body>
</html>