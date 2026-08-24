<?php
require "koneksi.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID siswa tidak ditemukan!");
}

$id = $_GET['id'];

// Ambil data siswa berdasarkan ID (Prepared Statement)
$stmt = $koneksi->prepare("SELECT * FROM siswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$siswa = $result->fetch_assoc();

if (!$siswa) {
    die("Data siswa tidak ditemukan!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
</head>
<body>

<h1>Edit Data Siswa</h1>

<form method="POST" action="proses_edit.php">
    <!-- Input hidden untuk membawa ID siswa saat submit -->
    <input type="hidden" name="id" value="<?= $siswa['id'] ?>">

    <label for="nama">Nama</label><br>
    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($siswa['nama']) ?>" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($siswa['email']) ?>" required><br><br>

    <label for="kelas">Kelas</label><br>
    <input type="text" id="kelas" name="kelas" value="<?= htmlspecialchars($siswa['kelas']) ?>" required><br><br>

    <button type="submit">Simpan Perubahan</button>
</form>

<br>
<a href="tampil.php">Kembali ke Daftar Siswa</a>

</body>
</html>
