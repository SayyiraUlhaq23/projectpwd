<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kendaraan db</title>
</head>
  
<body>
    <h1>Menampilkan Data Kendaraan Sewa</h1>
    <a href="form_kendaraan.php">Tambah Data</a>
    <!-- Tabel Data -->
    <table border="1">
        <tr>
            <td>ID Kendaraan</td>
            <td>Jenis Kendaraan</td>
            <td>Harga Sewa (per hari)</td>
        </tr>

        <?php
        include 'koneksi.php';
        $query = mysqli_query($konek,"SELECT * FROM kendaraan");

        while($data=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $data['id_kendaraan']?></td>
            <td><?php echo $data['jenis_kendaraan']?></td>
            <td><?php echo $data['harga_sewa']?></td>
            <td><a href="edit_kendaraan.php?id_kendaraan=<?php echo $data['id_kendaraan']; ?>">
                Edit Data</a></td>
        </tr>
        <?php } ?>
    </table>
    <form action="dashboard.php" method="POST">
        <input type="submit" value="Kembali">
    </form>

</body>
</html>
