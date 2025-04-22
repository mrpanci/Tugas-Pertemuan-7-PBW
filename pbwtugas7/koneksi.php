<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_kuliah", 3306);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>