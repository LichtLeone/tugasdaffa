<?php
require "koneksi.php";

$hasil = $koneksi->query("SELECT * FROM siswa ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
</head>
<body>

<h1>Daftar Siswa</h1>
<a href="formsiswa.php">+ Tambah Siswa</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Kelas</th>
    </tr>
    <?php $no = 1; ?>
    <?php while ($row = $hasil->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row["nama"]) ?></td>
        <td><?= htmlspecialchars($row["email"]) ?></td>
        <td><?= htmlspecialchars($row["kelas"]) ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>