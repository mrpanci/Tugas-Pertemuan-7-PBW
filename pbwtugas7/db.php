<?php
$conn = mysqli_connect("localhost", "root", "", "db_kuliah");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
