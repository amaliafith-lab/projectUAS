<?php
// koneksi database
include "koneksi.php";

// cek parameter id
if (!isset($_GET['id'])) {
    echo "<script>
        alert('ID booking tidak ditemukan');
        window.location='tampilBooking.php';
    </script>";
    exit;
}

$id = $_GET['id'];

// query hapus
$query = "DELETE FROM booking WHERE id_booking='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
        alert('Data booking berhasil dihapus');
        window.location='tampilBooking.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data');
        window.location='tampilBooking.php';
    </script>";
}
?>