<?php
include 'db.php';

$sql = "SELECT * FROM notes";
$stmt = $pdo->query($sql);

echo "<!DOCTYPE html>";
echo "<html lang='id'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Semua Catatan</title>";
echo "<style>";
?>
    /* Styling umum untuk body dan halaman */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #e0f7fa; /* Soft light blue for a clean, eco-friendly vibe */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        
        align-items: center;
        min-height: 100vh;
        color: #333;
    }

    .container {
        width: 100%;
        max-width: 900px;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        margin-bottom: 20px;
    }

    h1 {
        text-align: center;
        font-size: 2.5rem;
        color: #4CAF50;
        margin-bottom: 30px;
    }

    /* Styling untuk kartu catatan */
    .note-card {
        background-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png'); /* Wood texture background */
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .note-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .note-card h3 {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 10px;
    }

    .note-card p {
        font-size: 1.1rem;
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .created-at {
        font-size: 0.9rem;
        color: #888;
        margin-bottom: 10px;
    }

    /* Styling untuk tautan tombol */
    .note-links {
        display: flex;
        justify-content: space-between;
        font-size: 1rem;
        color: #4CAF50;
    }

    .note-links a {
        text-decoration: none;
        color: #4CAF50;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .note-links a:hover {
        color: #388e3c;
    }

    /* Styling untuk tombol kembali ke beranda */
    .back-link {
        display: block;
        text-align: center;
        font-size: 1.2rem;
        color: #fff;
        background-color: #4CAF50;
        padding: 12px 25px;
        border-radius: 50px;
        text-decoration: none;
        width: 50%;
        margin: 30px auto 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .back-link:hover {
        background-color: #388e3c;
    }
<?php
echo "</style>";
echo "</head>";
echo "<body>";

echo "<div class='container'>";
echo "<h1>Semua Catatan</h1>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='note-card'>";
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<p class='created-at'><strong>Waktu Dibuat:</strong> " . htmlspecialchars($row['datetime']) . "</p>";
    echo "<p>" . nl2br(htmlspecialchars($row['note'])) . "</p>";
    echo "<div class='note-links'>";
    echo "<a href='view_note.php?id=" . $row['id'] . "'>Lihat</a> | ";
    echo "<a href='update_note.php?id=" . $row['id'] . "'>Perbarui</a> | ";
    echo "<a href='delete_note.php?id=" . $row['id'] . "'>Hapus</a>";
    echo "</div>";
    echo "</div>";
}

echo "<a href='index.php' class='back-link'>Kembali ke Beranda</a>";
echo "</div>";

echo "</body>";
echo "</html>";
?>
