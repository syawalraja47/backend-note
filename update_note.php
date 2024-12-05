<?php
include 'db.php';
session_start(); // Mulai session

$id = $_GET['id'];  // Mendapatkan ID catatan dari URL

// Jika form disubmit, perbarui catatan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['title'];
    $catatan = $_POST['note'];

    // Perbarui catatan di database
    $sql = "UPDATE notes SET title = ?, datetime = NOW(), note = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$judul, $catatan, $id]);

    // Simpan pesan sukses di session
    $_SESSION['success_message'] = 'Catatan berhasil diperbarui!';

    // Redirect ke halaman yang sama untuk menampilkan pesan sukses
    header('Location: update_note.php?id=' . $id);
    exit();
} else {
    // Mengambil detail catatan yang ada untuk mengisi form
    $sql = "SELECT * FROM notes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Perbarui Catatan</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #e0f7fa; /* Soft light blue for a clean, eco-friendly vibe */
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-size: cover;
                    background-position: center;
                }

                .container {
                    background-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png'); /* Wood texture background */
                    background-size: cover;
                    max-width: 600px;
                    width: 100%;
                    padding: 30px;
                    border-radius: 8px;
                    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
                    margin-top: 20px;
                    position: relative;
                }

                h1 {
                    font-size: 2em;
                    color: #4CAF50;
                    text-align: center;
                    margin-bottom: 15px;
                }

                label {
                    font-size: 1.1em;
                    color: #333;
                    margin-bottom: 5px;
                    display: block;
                }

                input[type="text"], textarea {
                    width: 100%;
                    padding: 10px;
                    margin: 10px 0;
                    border-radius: 5px;
                    border: 1px solid #ddd;
                    font-size: 1em;
                    box-sizing: border-box;
                }

                button {
                    width: 100%;
                    padding: 10px;
                    background-color: #4CAF50;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    font-size: 1.2em;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #45a049;
                }

                .back-link {
                    display: block;
                    text-align: center;
                    margin-top: 20px;
                    font-size: 1.1em;
                    color: #4CAF50;
                    text-decoration: none;
                    border: 2px solid #4CAF50;
                    padding: 10px 20px;
                    border-radius: 4px;
                    width: 50%;
                    margin: 20px auto;
                    text-transform: uppercase;
                }

                .back-link:hover {
                    background-color: #4CAF50;
                    color: white;
                }

                .alert {
                    padding: 20px;
                    margin-bottom: 20px;
                    border-radius: 5px;
                    text-align: center;
                    font-size: 1.2em;
                    animation: fadeIn 2s ease-out;
                    margin-top: 20px;
                    background-color: #dff0d8;
                    color: #3c763d;
                }

                /* Animasi fade-in */
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                    }
                    to {
                        opacity: 1;
                    }
                }

                .alert.success {
                    background-color: #d4edda; /* Warna latar belakang */
                    color: #155724; /* Warna teks */
                    border: 1px solid #c3e6cb; /* Border dengan warna hijau muda */
                    font-size: 1.3em; /* Menambah ukuran font */
                    margin-top: 20px; /* Memberikan jarak di atas */
                }

                /* Style untuk animasi centang dan pesan */
                #success-message {
                    display: none;
                    position: absolute;
                    top: 0;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: #d4edda;
                    color: #155724;
                    padding: 20px;
                    border-radius: 5px;
                    text-align: center;
                    font-size: 1.2em;
                    width: 100%;
                    box-sizing: border-box;
                    border: 1px solid #c3e6cb;
                    margin-top: 20px;
                }

                .check-icon {
                    font-size: 2.5em;
                    color: #4CAF50;
                    margin-bottom: 10px;
                }

            </style>
        </head>
        <body>

            <div class="container">
                <h1>Perbarui Catatan</h1>

                <!-- Pesan berhasil diperbarui -->
                <?php
                if (isset($_SESSION['success_message'])) {
                    echo "<div class='alert success'>{$_SESSION['success_message']}</div>";
                    unset($_SESSION['success_message']); // Menghapus pesan setelah ditampilkan
                }
                ?>

                <form action="update_note.php?id=<?php echo $id; ?>" method="POST">
                    <label for="title">Judul:</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>

                    <label for="note">Catatan:</label>
                    <textarea name="note" required><?php echo htmlspecialchars($row['note']); ?></textarea>

                    <button type="submit">Perbarui Catatan</button>
                </form>

                <a href="all_notes.php" class="back-link">Kembali ke Semua Catatan</a>
            </div>

        </body>
        </html>
        <?php
    } else {
        echo "Catatan tidak ditemukan!";
    }
}
?>
