<?php
include 'koneksi.php';

if (!isset($_GET['npm'])) {
    echo "<script>alert('NPM mahasiswa tidak ditemukan!'); window.location='mahasiswa.php';</script>";
    exit;
}

$npm = mysqli_real_escape_string($koneksi, $_GET['npm']);
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$npm'");
$m = mysqli_fetch_assoc($data);

if (!$m) {
    echo "<script>alert('Data mahasiswa tidak ditemukan!'); window.location='mahasiswa.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $jurusan = $_POST['jurusan'];
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));

    if (empty($nama) || empty($jurusan) || empty($alamat)) {
        echo "<script>alert('Semua field harus diisi!'); window.location='edit_mahasiswa.php?npm=$npm';</script>";
        exit;
    }

    $query = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data mahasiswa berhasil diupdate.'); window.location='mahasiswa.php';</script>";
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>✏️ Edit Mahasiswa</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" name="npm" id="npm" class="form-control" value="<?= $m['npm'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $m['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-select">
                <option value="Teknik Informatika" <?= $m['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                <option value="Sistem Informasi" <?= $m['jurusan'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
                <option value="Manajemen Informatika" <?= $m['jurusan'] == 'Manajemen Informatika' ? 'selected' : '' ?>>Manajemen Informatika</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required><?= $m['alamat'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>