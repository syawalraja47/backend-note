<?php
include 'db.php';

$id = $_GET['id'];

// Menyiapkan query untuk menghapus dan mengeksekusinya
$sql = "DELETE FROM notes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

// Menampilkan pesan sukses
echo "<div style='text-align: center; font-size: 1.5em; color: green;'>Catatan berhasil dihapus!</div>";
?>

<!-- Tombol untuk kembali ke daftar semua catatan -->
<div style="text-align: center; margin-top: 20px;">
    <a href="all_notes.php" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; font-size: 1.2em;">
        Kembali ke Semua Catatan
    </a>
</div>
