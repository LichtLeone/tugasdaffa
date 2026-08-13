<?php
require "koneksi.php";

$pesan = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama  = $koneksi->real_escape_string($_POST["nama"]);
    $email = $koneksi->real_escape_string($_POST["email"]);
    $kelas = $koneksi->real_escape_string($_POST["kelas"]);


    $stmt = $koneksi->prepare("INSERT INTO siswa (nama, email, kelas) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $kelas);

    if ($stmt->execute()) {
        $pesan = "Data berhasil disimpan!";
    } else {
        $pesan = "Gagal menyimpan data: " . $koneksi->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
</head>
<body>

<h1>Tambah Data Siswa</h1>

<?php if ($pesan): ?>
    <p><strong><?= htmlspecialchars($pesan) ?></strong></p>
<?php endif; ?>

<form method="POST" action="form_siswa.php">
    <label for="nama">Nama</label><br>
    <input type="text" id="nama" name="nama" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="kelas">Kelas</label><br>
    <input type="text" id="kelas" name="kelas" required><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="tampil.php">Lihat Daftar Siswa</a>

</body>
</html>