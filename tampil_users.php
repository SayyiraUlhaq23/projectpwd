<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit;
}

echo "[!] Anda masuk sebagai <b>" . $_SESSION['username'] . "<b>.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db pengguna</title>
</head>
  
<body>
    <h1>Menampilkan Data Akun Pengguna</h1>
    <!-- <a href="register.php">+ Tambah Data</a> -->
    <!-- Tabel Data -->
    <br>
    <table border="1">
        <tr>
            <th>ID Pengguna</th>
            <th>Nama</th>
            <th>E-mail</th>
            <th>No. Handphone</th>
            <th>Username</th>
            <th>Password</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        include 'koneksi.php';
        $query = mysqli_query($konek,"SELECT * FROM users");

        while($data=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $data['id_user']?></td>
            <td><?php echo $data['nama']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['no_hp']?></td>
            <td><?php echo "@" . $data['username']?></td>
            <td><?php echo $data['password']?></td>
            <td>
                <a href="edit_dataUser.php?id_user=<?php echo $data['id_user']; ?>">
                Edit</a> |
                <a href="delete_user.php?id_user=<?php echo $data['id_user']; ?>" 
                onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <form action="dashboard.php" method="POST">
        <input type="submit" value="Kembali">
    </form>

</body>
</html>
