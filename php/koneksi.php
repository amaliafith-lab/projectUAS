<?php
$koneksi = mysqli_connect("localhost", "root", "", "salon");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>