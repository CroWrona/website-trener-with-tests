<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <title>https://github.com/CroWrona</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/bottom_right_containder.css">
    <link rel="stylesheet" href="../assets/css/additional_content.css">
    <link rel="stylesheet" href="../assets/css/tile.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/quiz.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/blog_single.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link rel="stylesheet" href="../assets/css/comment.css">
    <link rel="stylesheet" href="../assets/css/scroll_to_top.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        /* Dodany styl CSS dla pola komentarza */
        .comment-form textarea {
            width: 100%; /* Ustawienie szerokości na 100% */
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            display: inline-block;
            resize: none; /* Wyłączenie możliwości zmiany rozmiaru */
        }
    </style>
</head>

<body>
    <!-- JavaScript -->
    <script src="../assets/js/footer.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/scroll_to_top.js"></script>

    <?php include_once "../config/config.php"; ?>
    <?php include '../includes/views/header.php'; ?>

    <button class="scroll-to-top" id="scroll-to-top" onclick="scrollToTop()" title="Przewiń do góry">
        <i class="fas fa-arrow-up"></i>
    </button>

<?php
// Tutaj powinieneś mieć wcześniejsze zdefiniowanie połączenia z bazą danych

// Sprawdzanie, czy parametr id został przekazany za pomocą metody GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; // Pobranie ID wpisu z parametru GET

    if ($id > 0) {
        // Przygotowanie zapytania SQL z wykorzystaniem prepared statements
        $sql = "SELECT title, image_url, short_description, full_text, created_at, likes, comment_active FROM blog_posts WHERE id = ? AND active = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id); // "i" oznacza, że oczekiwana jest liczba całkowita (integer)
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Wyświetlenie pełnej treści wpisu
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h2 class='blog-title'>" . htmlspecialchars($row["title"]) . "</h2>";
                echo "<p class='blog-date'>" . htmlspecialchars($row["created_at"]) . "</p>";

                // Wyświetlanie obrazka, jeśli istnieje
                if (!empty($row["image_url"])) {
                    echo "<img src='" . $row["image_url"] . "' alt='Miniatura zdjęcia' class='blog-image'>";
                }

                echo "<p class='blog-content'>" . htmlspecialchars($row["full_text"]) . "</p>";
                echo "<p class='blog-likes'>" . $row["likes"] . " Polubień</p>";
                echo "<form class='like-form' action='../includes/php/like_post.php' method='post'>";
                echo "<input type='hidden' name='post_id' value='$id'>";
                echo "<input type='submit' value='Polub'>";
                echo "</form>";
                echo "</div>";

                // Wyświetlanie obszaru komentarzy i przycisku polubienia
                if ($row['comment_active'] == 1) {
                    echo "<div class='comment-section'>";
                    echo "<h3>Wcześniejsze komentarze:</h3>";

                    // Pobieranie komentarzy
                    $sql_comments = "SELECT id, comment_text, created_at, likes FROM comments WHERE post_id = ?";
                    $stmt_comments = $conn->prepare($sql_comments);
                    $stmt_comments->bind_param("i", $id);
                    $stmt_comments->execute();
                    $result_comments = $stmt_comments->get_result();

                    if ($result_comments->num_rows > 0) {
                        // Pętla wyświetlająca komentarze
                        while ($row_comment = $result_comments->fetch_assoc()) {
                            echo "<div class='comment-container'>";
                            echo "<div class='comment'>";
                            echo "<p class='comment-text'>" . htmlspecialchars($row_comment['comment_text']) . "</p>";
                            echo "<p class='comment-date'>Data dodania: " . htmlspecialchars($row_comment['created_at']) . "</p>";
                            // Przycisk polubienia komentarza i licznik
                            echo "<form class='like-comment-form' action='../includes/php/like_comment.php' method='post'>";
                            echo "<input type='hidden' name='comment_id' value='" . $row_comment['id'] . "'>";
                            echo "<button type='submit' class='like-comment-btn'><i class='far fa-thumbs-up'></i> Polub</button>";
                            echo "<span class='like-count'>" . $row_comment['likes'] . "</span>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>Brak komentarzy.</p>";
                    }

                    echo "<form class='comment-form' action='../includes/php/add_comment.php' method='post' id='commentForm'>";
                    echo "<textarea name='comment' placeholder='Dodaj komentarz'></textarea>";
                    echo "<input type='hidden' name='post_id' value='$id'>";
                    echo "<input type='submit' value='Dodaj komentarz'>";
                    echo "</form>";
                    echo "</div>";
                } else {
                    // Komentarze są wyłączone dla tego wpisu
                }
            }
            // Zamknięcie prepared statement
            $stmt->close();
            if ($stmt_comments) {
                $stmt_comments->close();
            }
        } else {
            echo "Brak danych do wyświetlenia.";
        }
    } else {
        echo "Nieprawidłowe żądanie.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}

$conn->close();
?>

<!-- Spacer -->
<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>
<!-- Footer -->
<?php include '../includes/views/footer.php'; ?>
<!-- JavaScript -->
<script src="../assets/js/like.js"></script>
<script src="../assets/js/comment.js"></script>
<script src="../assets/js/like_comment.js"></script>
</body>
</html>
