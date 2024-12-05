<?php
include 'db.php';
session_start(); // Mulai session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $note = $_POST['note'];

    $sql = "INSERT INTO notes (title, datetime, note) VALUES (?, NOW(), ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $note]);

    // Simpan pesan sukses di session
    $_SESSION['success_message'] = 'Catatan berhasil dibuat!';
    $_SESSION['show_success'] = true;

    // Redirect untuk menghindari form resubmission
    header('Location: create_note.php');
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buat Catatan Baru</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <style>
            /* Dasar */
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #e0f7fa; /* Soft light blue for a clean, eco-friendly vibe */
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                color: #333;
            }

            .container {
                background-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png'); /* Wood texture background */
                background-size: cover;
                padding: 40px 30px;
                border-radius: 16px;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 650px;
                text-align: center;
            }

            h1 {
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                color: #388E3C;
                margin-bottom: 30px;
                font-size: 2.4em;
            }

            label {
                font-size: 1.1em;
                margin-bottom: 12px;
                display: block;
                color: #388E3C;
                text-align: left;
            }

            input[type="text"], textarea {
                width: 100%;
                padding: 16px;
                font-size: 1.1em;
                margin-bottom: 20px;
                border: 2px solid #ccc;
                border-radius: 8px;
                box-sizing: border-box;
                background-color: #f7f7f7;
                transition: all 0.3s ease;
                font-family: 'Roboto', sans-serif;
            }

            input[type="text"]:focus, textarea:focus {
                border-color: #388E3C;
                background-color: #e8f5e9;
                outline: none;
            }

            button {
                background-color: #388E3C;
                color: white;
                padding: 16px 24px;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                width: 100%;
                font-size: 1.2em;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            button:hover {
                background-color: #45a049;
                transform: translateY(-3px);
            }

            /* Kembali ke beranda */
            .back-link {
                margin-top: 20px;
            }

            .back-btn {
                background-color: #388E3C;
                color: white;
                padding: 12px 22px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-size: 1.1em;
                text-align: center;
                transition: background-color 0.3s ease;
                display: inline-block;
                margin-top: 15px;
            }

            .back-btn:hover {
                background-color: #45a049;
            }

            /* Animasi dan pesan berhasil */
            .success-message {
                display: none;
                margin-top: 30px;
                font-size: 1.2em;
                color: #388E3C;
                text-align: center;
                opacity: 0;
                transition: opacity 1s ease-out;
            }

            .success-message.show {
                display: block;
                opacity: 1;
            }

            /* Responsif */
            @media (max-width: 768px) {
                body {
                    padding: 20px;
                }

                .container {
                    padding: 25px;
                }

                h1 {
                    font-size: 2em;
                }

                button {
                    font-size: 1em;
                    padding: 12px 22px;
                }

                .back-btn {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>

    <div class="container">
        <h1>Buat Catatan Baru</h1>
        <form action="create_note.php" method="POST">
            <label for="title">Judul:</label>
            <input type="text" name="title" required>

            <label for="note">Catatan:</label>
            <textarea name="note" required></textarea>

            <button type="submit">Buat Catatan</button>
        </form>

        <!-- Menampilkan pesan jika form berhasil disubmit -->
        <?php if (isset($_SESSION['show_success']) && $_SESSION['show_success']) : ?>
            <div class="success-message show">
                <?php
                echo $_SESSION['success_message'];
                unset($_SESSION['show_success']);
                ?>
            </div>
        <?php endif; ?>

        <div class="back-link">
            <a href="index.php" class="back-btn">Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        // Tampilkan pesan sukses setelah submit
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.querySelector('.success-message');

            if (successMessage) {
                // Tampilkan pesan sukses
                setTimeout(function() {
                    successMessage.classList.add('show');
                }, 500); // Delay setelah submit

                // Menghilangkan pesan setelah 5 detik
                setTimeout(function() {
                    successMessage.classList.remove('show'); // Sembunyikan pesan sukses
                }, 5000); // 5 detik setelah pesan muncul
            }
        });
    </script>

    </body>
    </html>
    <?php
}
?>
