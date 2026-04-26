<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking db</title>
</head>

<body>
    <?php
    
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }

    echo "Selamat Datang, " . $_SESSION['username'] . "!";
    ?>
    
    <h1>Menampilkan Data Booking VelnoraJogja</h1>
    <!-- Tabel Data -->
    <table border="1">
        <tr>
            <td>Nama</td>
            <td>Email</td>
            <td>No Hp</td>
            <td>Jenis Kendaraan</td>
            <td>Tanggal</td>
            <td>Lama Sewa</td>
        </tr>

    <?php
    include 'koneksi.php';
    $query = mysqli_query($konek, "SELECT booking. *, kendaraan.jenis_kendaraan FROM booking JOIN kendaraan ON booking.id_kendaraan = kendaraan.id_kendaraan");

    while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?php echo $data['nama']?></td>
        <td><?php echo $data['email']?></td>
        <td><?php echo $data['no_hp']?></td>
        <td><?php echo $data['jenis_kendaraan']?></td>
        <td><?php echo $data['tanggal']?></td>
        <td><?php echo $data['lama_sewa'] . " hari"?></td>
    </tr>
    <?php } ?>
    </table>
    <form action="dashboard.php" method="POST">
        <input type="submit" value="Kembali">
    </form>
</html>
