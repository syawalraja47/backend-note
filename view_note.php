<?php
include 'db.php';

$id = $_GET['id'];  // Get the note ID from the URL

// Prepare and execute the query to fetch the note by ID
$sql = "SELECT * FROM notes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Note</title>
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

        .note-container {
            background-image: url('https://www.transparenttextures.com/patterns/wood-pattern.png'); /* Wood texture background */
            background-size: cover;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            font-size: 2em;
            color: #4CAF50;
            text-align: center;
            margin-bottom: 10px;
        }

        .note-date {
            font-size: 0.9em;
            color: #888;
            text-align: center;
        }

        .note-content {
            margin-top: 20px;
            font-family: 'Georgia', serif;
            font-size: 1.1em;
            color: #333;
            background-color: #fafafa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1.2em;
            color: #4CAF50;
            text-decoration: none;
            border: 2px solid #4CAF50;
            padding: 10px 20px;
            border-radius: 4px;
            width: 50%;
            margin: 10px auto;
            text-transform: uppercase;
        }

        .back-link:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

    <div class="note-container">
        <?php if ($row): ?>
            <h1><?php echo htmlspecialchars($row['title']); ?></h1>
            <p class="note-date"><strong>Created At:</strong> <?php echo htmlspecialchars($row['datetime']); ?></p>
            <div class="note-content">
                <p><?php echo nl2br(htmlspecialchars($row['note'])); ?></p>
            </div>
        <?php else: ?>
            <p>Note not found!</p>
        <?php endif; ?>

        <a href="all_notes.php" class="back-link">Back to All Notes</a>
    </div>

</body>
</html>
