<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama       = $_POST['nama'];
    $telp       = $_POST['telp'];
    $tanggal    = $_POST['tanggal'];
    $waktu      = $_POST['waktu'];
    $layanan    = $_POST['layanan'];
    $pembayaran = $_POST['pembayaran'];
    $catatan    = $_POST['catatan'];

    if ($nama == "" || $telp == "") {
        echo "<script>alert('Nama & No Telp wajib diisi');history.back();</script>";
        exit;
    }

    $query = "INSERT INTO booking 
    (nama, telp, tanggal, waktu, layanan, pembayaran, catatan)
    VALUES 
    ('$nama','$telp','$tanggal','$waktu','$layanan','$pembayaran','$catatan')";

    if (mysqli_query($koneksi, $query)) {
    header("Location: tampilBooking.php");
    exit;
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
}
?>