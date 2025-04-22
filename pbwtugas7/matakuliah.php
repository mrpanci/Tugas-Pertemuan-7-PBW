<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM matakuliah");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>📘 Daftar Mata Kuliah</h2>
    <a href="tambah_matakuliah.php" class="btn btn-primary mb-3">➕ Tambah Mata Kuliah</a>
    <a href="index.php" class="btn btn-secondary mb-3 float-end">⬅ Kembali</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Mata Kuliah</th>
                <th>Jumlah SKS</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; while($m = mysqli_fetch_array($data)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $m['nama'] ?></td>
                <td><?= $m['jumlah_sks'] ?></td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</div>
</body>
</html>