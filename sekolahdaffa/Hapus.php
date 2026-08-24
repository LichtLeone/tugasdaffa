<?php
require "koneksi.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query DELETE dengan Prepared Statement
    $stmt = $koneksi->prepare("DELETE FROM siswa WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: tampil.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    }
    $stmt->close();
} else {
    die("ID siswa tidak ditemukan!");
}
?>
