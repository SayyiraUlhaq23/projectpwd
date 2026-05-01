<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking - Velnora Jogja</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        .booking-container {
            max-width: 600px;
            margin: 60px auto;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: none;
        }

        .card-header {
            background-color: #023b39;
            color: white;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            border-radius: 15px 15px 0 0;
            padding: 15px;
        }

        .btn-primary {
            background-color: #023b39;
            border: none;
        }

        .btn-primary:hover {
            background-color: #023b39;
        }

        label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container booking-container">
    <div class="card">
        <div class="card-header">
            Form Booking Velnora Jogja
        </div>

        <div class="card-body">
            <form action="input_booking.php" method="POST">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Pilih Kendaraan</label>
                    <select name="id_kendaraan" class="form-select" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        <option value="K001">VW</option>
                        <option value="K002">Vespa</option>
                        <option value="K003">Sepeda</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tanggal Booking</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Lama Sewa (hari)</label>
                    <input type="number" name="lama_sewa" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Submit Booking
                </button>

            </form>
        </div>
    </div>
</div>

</body>
</html>