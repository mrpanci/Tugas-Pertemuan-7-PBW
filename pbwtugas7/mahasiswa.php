<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>👨‍🎓 Daftar Mahasiswa</h2>
    <a href="tambah_mahasiswa.php" class="btn btn-primary mb-3">➕ Tambah Mahasiswa</a>
    <a href="index.php" class="btn btn-secondary mb-3 float-end">⬅ Kembali</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; while($m = mysqli_fetch_array($data)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $m['npm'] ?></td>
                <td><?= $m['nama'] ?></td>
                <td><?= $m['jurusan'] ?></td>
                <td><?= $m['alamat'] ?></td>
                <td>
                    <a href="hapus_mahasiswa.php?npm=<?= $m['npm'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a> |
                    <a href="edit_mahasiswa.php?npm=<?= $m['npm'] ?>" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</div>
</body>
</html>