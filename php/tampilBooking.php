<?php
include "koneksi.php";

$query = "SELECT * FROM booking ORDER BY id_booking DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Booking | Mel's Salon</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff6f9;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #d67d96;
            margin-bottom: 20px;
        }

        .btn-back {
        position: fixed;
        top: 20px;
        left: 20px;
        background: #d67d96;
        color: white;
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        box-shadow: 0 6px 14px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
        z-index: 999;
        }

        .btn-back:hover {
            background: #c76a8a;
            transform: translateY(-2px);
        }

        .booking-card {
            max-width: 600px;
            background: white;
            margin: 20px auto;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .booking-card h3 {
            color: #d67d96;
            margin-bottom: 15px;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #f0c2d1;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            color: #555;
        }

        .value {
            color: #333;
            text-align: right;
        }

        .empty {
            text-align: center;
            color: #999;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<h2>Data Booking Salon</h2>

<div style="text-align:center;">
    <a href="../index.html" class="btn-back">← Kembali ke Website</a>
</div>

<?php
if (mysqli_num_rows($result) == 0) {
    echo "<p class='empty'>Belum ada data booking.</p>";
}

$no = 1;
while ($data = mysqli_fetch_assoc($result)) {
?>
<div class="booking-card">
    <h3>Booking #<?= $no++ ?></h3>

    <div class="row">
        <div class="label">Nama</div>
        <div class="value"><?= htmlspecialchars($data['nama']) ?></div>
    </div>

    <div class="row">
        <div class="label">No Telepon</div>
        <div class="value"><?= htmlspecialchars($data['telp']) ?></div>
    </div>

    <div class="row">
        <div class="label">Tanggal</div>
        <div class="value"><?= $data['tanggal'] ?></div>
    </div>

    <div class="row">
        <div class="label">Waktu Booking</div>
        <div class="value"><?= $data['waktu'] ?></div>
    </div>

    <div class="row">
        <div class="label">Layanan</div>
        <div class="value"><?= htmlspecialchars($data['layanan']) ?></div>
    </div>

    <div class="row">
        <div class="label">Pembayaran</div>
        <div class="value"><?= htmlspecialchars($data['pembayaran']) ?></div>
    </div>

    <div class="row">
        <div class="label">Catatan</div>
        <div class="value"><?= htmlspecialchars($data['catatan']) ?></div>
    </div>

    <div style="text-align:center; margin-top:15px;">
        <a href="hapusBooking.php?id=<?= $data['id_booking'] ?>"
           onclick="return confirm('Yakin ingin menghapus booking ini?')"
           style="
                display:inline-block;
                padding:8px 15px;
                background:#e74c3c;
                color:white;
                border-radius:8px;
                text-decoration:none;
                font-weight:bold;
           ">
            Hapus Booking
        </a>
    </div>
</div>
<?php } ?>

</body>
</html>
