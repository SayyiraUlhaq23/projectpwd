<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kendaraan</title>
</head>

<body>
    <h1> Form Kendaraan Sewa</h1>
    <form action="input_kendaraan.php" method="POST">
        <label for="id_kendaraan">ID Kendaraan : </label>
        <input type="text" name = "id_kendaraan"><br>

        <label for="jenis_kendaraan">Jenis Kendaraan : </label>
        <input type="text" name = "jenis_kendaraan"><br>

        <label for="harga_sewa">Harga Sewa : </label>
        <input type="text" name = "harga_sewa"><br>

        <input type="submit" value ="Submit">
    </form>
</body>
</html>
