<?php
include 'koneksi.php';

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
</head>

<body>
    <h1>Ubah Data Pengguna</h1>
    <form action="update_dataUser.php" method="POST">
        <label for="id_user">ID Pengguna : </label>
        <input type="text" name = "id_user"
        value="<?= $data['id_user']; ?>" readonly><br>

        <label for="nama">Nama : </label>
        <input type="text" name = "nama"
        value="<?= $data['nama']; ?>"><br>

        <label for="email">E-mail </label>
        <input type="text" name = "email"
        value="<?= $data['email']; ?>"><br>

        <label for="no_hp">No. HP </label>
        <input type="text" name = "no_hp"
        value="<?= $data['no_hp']; ?>"><br>

        <label for="username">Username : </label>
        <input type="text" name = "username"
        value="<?= $data['username']; ?>"><br>

        <label for="password">Password : </label>
        <input type="text" name = "password"
        value="<?= $data['password']; ?>"><br><br>

        <input type="submit" value ="Update">
    </form>
</body>
</html>
