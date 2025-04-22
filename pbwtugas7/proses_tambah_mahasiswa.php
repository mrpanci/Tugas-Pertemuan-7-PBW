<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi data (sederhana)
    $npm = trim($_POST['npm']); // Hapus spasi di awal dan akhir
    $nama = trim($_POST['nama']);
    $jurusan = $_POST['jurusan'];
    $alamat = trim($_POST['alamat']);

    if (empty($npm) || empty($nama) || empty($jurusan) || empty($alamat)) {
        echo "<script>alert('Semua field harus diisi!'); window.location='tambah_mahasiswa.php';</script>";
        exit;
    }

    $npm = mysqli_real_escape_string($koneksi, $npm);
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $alamat = mysqli_real_escape_string($koneksi, $alamat);

    $query = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) 
              VALUES ('$npm', '$nama', '$jurusan', '$alamat')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data mahasiswa berhasil disimpan.'); window.location='mahasiswa.php';</script>";
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>