<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <title>https://github.com/CroWrona</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/bottom_right_containder.css">
    <link rel="stylesheet" href="../assets/css/additional_content.css">
    <link rel="stylesheet" href="../assets/css/tile.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/blog.js"></script>
<script src="../assets/js/footer.js"></script>

<?php include_once "../config/config.php"; ?>

<?php include '../includes/views/header.php'; ?>

<div class="mini-blog">
    <?php

    // Zapytanie SQL do pobrania danych z mini bloga tylko dla aktywnych wpisów
    $sql = "SELECT id, title, image_url, short_description, full_text, created_at FROM blog_posts WHERE active = 1";
    $result = $conn->query($sql);

    // Wyświetlanie wpisów z mini bloga
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<h2 class='blog-title'>" . $row["title"] . "</h2>";
            echo "<p class='blog-date'>" . $row["created_at"] . "</p>";

            // Wyświetlanie obrazka, jeśli istnieje
            if (!empty($row["image_url"])) {
                echo "<img src='" . $row["image_url"] . "' alt='Miniatura zdjęcia' class='blog-image'>";
            }

            echo "<p class='blog-content'>" . $row["short_description"] . "</p>";
            echo "<p class='full-content' style='display: none;'>" . $row["full_text"] . "</p>";
            echo "<button class='btn-read-more' data-id='" . $row["id"] . "'>Czytaj dalej</button>";
            echo "</div>";
        }
    } else {
        echo "Brak wpisów w mini blogu.";
    }
    $conn->close();
    ?>
</div>

<div class="spacer"></div>
<div class="spacer"></div>

<?php include '../includes/views/footer.php'; ?>

</body>
</html>
