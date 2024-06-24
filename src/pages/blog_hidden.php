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
    <link rel="stylesheet" href="../assets/css/quiz.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/blog_single.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/blog.js"></script>
    <script src="../assets/js/footer.js"></script>

    <?php include_once "../config/config.php"; ?>

    <?php include '../includes/views/header.php'; ?>

    <?php

    // Tworzenie połączenia
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Sprawdzanie połączenia
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sprawdzanie, czy parametr id został przekazany za pomocą metody GET
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        // Pobranie ID wpisu z parametru GET
        $id = $_GET['id'];

        // Sprawdzenie, czy ID jest większe od zera
        if ($id > 0) {
            // Przygotowanie zapytania SQL z wykorzystaniem prepared statements
            $sql = "SELECT title, image_url, short_description, full_text, created_at FROM blog_posts WHERE id = ? AND active = 0";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id); // "i" oznacza, że oczekiwana jest liczba całkowita (integer)
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Wyświetlenie pełnej treści wpisu
                while($row = $result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<h2 class='blog-title'>" . htmlspecialchars($row["title"]) . "</h2>";
                    // echo "<p class='blog-date'>" . htmlspecialchars($row["created_at"]) . "</p>";

                    // Wyświetlanie obrazka, jeśli istnieje
                    if (!empty($row["image_url"])) {
                        echo "<img src='" . $row["image_url"] . "' alt='Miniatura zdjęcia' class='blog-image'>";
                    }

                    echo "<p class='blog-content'>" . htmlspecialchars($row["full_text"]) . "</p>";
                    echo "</div>";
                }

                $stmt->close();
            } else {
                echo "Brak danych do wyświetlenia.";
            }
        } else {
            echo "Nieprawidłowe żądanie.";
        }
    } else {
        echo "Nieprawidłowe żądanie.";
    }

    // Zamknięcie połączenia z bazą danych
    $conn->close();
    ?>


    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>

    <?php include '../includes/views/footer.php'; ?>

</body>
</html>
