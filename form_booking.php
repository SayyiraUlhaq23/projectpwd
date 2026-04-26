<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking</title>
</head>
<body>
    <h1>Form Booking VelnoraJogja</h1>
    <form action="input_booking.php" method="POST">
        <label for="nama">Nama</label>
        <input type="text" name="nama"><br>

        <label for="email">E-mail : </label>
        <input type="text" name="email"><br>

        <label for="no_hp">No HP</label>
        <input type="text" name="no_hp"><br>

        <label class="label">Pilih Jenis Kendaraan</label>
            <select name="id_kendaraan" id="id_kendaraan" required>
                <option value="">Pilih Jenis Kendaraan</option>
                <option value="K001">VW</option>
                <option value="K002">Vespa</option>
                <option value="K003">Sepeda</option>
            </select>

        <label for="tanggal">Tanggal Booking</label>
        <input type="date" name="tanggal" id="tanggal">

        <label for="lama_sewa">Lama Sewa</label>
        <input type="text" name="lama_sewa"><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
