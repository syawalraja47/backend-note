<?php
// index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Catatan Zero Trash</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e0f7fa; /* Soft light blue for a clean, eco-friendly vibe */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            color: #2c3e50; /* Darker text for better contrast */
        }

        h1 {
            font-size: 2.8rem;
            font-weight: 600;
            color: #4CAF50; /* Earthy green color */
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 400;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #27ae60; /* Greenish button color */
            padding: 15px 25px;
            border-radius: 8px;
            font-size: 1.2rem;
            transition: background-color 0.3s;
            display: inline-block;
            margin-bottom: 15px;
        }

        a:hover {
            background-color: #2ecc71; /* Lighter green when hovered */
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            background-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png'); /* Wood texture background */
            background-size: cover;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 30px;
            color: #34495e; /* Darker text for headings */
        }

        .container i {
            color: #4CAF50; /* Green icon */
            margin-right: 10px;
        }

        .container p {
            font-size: 1.1rem;
            color: #7f8c8d; /* Lighter gray text for description */
            margin-top: 20px;
        }

        /* Responsif */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.2rem;
            }

            a {
                padding: 12px 20px;
                font-size: 1rem;
            }

            .container {
                padding: 30px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Selamat Datang di Aplikasi Catatan Zero Trash</h1>

        <h2><a href="create_note.php"><i class="fas fa-pencil-alt"></i>Buat Catatan Baru</a></h2>
        <h2><a href="all_notes.php"><i class="fas fa-list"></i>Lihat Semua Catatan</a></h2>

        <p><i class="fas fa-recycle"></i> Mari bersama-sama mendukung gerakan Zero Trash dengan mencatat ide-ide berkelanjutan!</p>
    </div>

</body>
</html>
