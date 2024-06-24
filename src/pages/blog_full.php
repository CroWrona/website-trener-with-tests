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
    <link rel="stylesheet" href="../assets/css/blog_full.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        /* Dodatkowe style CSS */
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .navigation-buttons .left-arrow {
            margin-right: auto;
        }

        .navigation-buttons .right-arrow {
            margin-left: auto;
        }

        .navigation-button {
            padding: 10px;
            color: #333; /* Kolor strzałek */
            font-size: 24px; /* Rozmiar strzałek */
            text-decoration: none;
        }

        .navigation-button:hover {
            color: #555; /* Kolor strzałek po najechaniu myszką */
        }
    </style>
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
            $sql = "SELECT title, image_url, short_description, full_text, created_at FROM blog_posts WHERE id = ? AND active = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id); // "i" oznacza, że oczekiwana jest liczba całkowita (integer)
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Wyświetlenie pełnej treści wpisu
                while($row = $result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<h2 class='blog-title'>" . htmlspecialchars($row["title"]) . "</h2>";
                    echo "<p class='blog-date'>" . htmlspecialchars($row["created_at"]) . "</p>";

                    // Wyświetlanie obrazka, jeśli istnieje
                    if (!empty($row["image_url"])) {
                        echo "<img src='" . $row["image_url"] . "' alt='Miniatura zdjęcia' class='blog-image'>";
                    }

                    echo "<p class='blog-content'>" . htmlspecialchars($row["full_text"]) . "</p>";
                    echo "</div>";
                }

                // Liczymy ilość dostępnych wpisów w bazie danych
                $sql_count = "SELECT COUNT(*) as total FROM blog_posts WHERE active = 1";
                $result_count = $conn->query($sql_count);
                if ($result_count && $result_count->num_rows > 0) {
                    $row_count = $result_count->fetch_assoc();
                    $total_posts = $row_count['total'];

                    echo "<div class='navigation-buttons'>";
                    $previous_post_id = null;
                    $sql_previous = "SELECT id FROM blog_posts WHERE id < $id AND active = 1 ORDER BY id DESC LIMIT 1";
                    $result_previous = $conn->query($sql_previous);
                    if ($result_previous && $result_previous->num_rows > 0) {
                        $previous_post_id = $result_previous->fetch_assoc()['id'];
                        // Strzałka w lewo (Poprzedni wpis)
                        echo "<a href='blog_full.php?id=" . $previous_post_id . "' class='navigation-button left-arrow'><i class='fas fa-arrow-left'></i></a>";
                    }


                    $next_post_id = null;
                    $sql_next = "SELECT id FROM blog_posts WHERE id > $id AND active = 1 ORDER BY id ASC LIMIT 1";
                    $result_next = $conn->query($sql_next);
                    if ($result_next && $result_next->num_rows > 0) {
                        $next_post_id = $result_next->fetch_assoc()['id'];
                        // Strzałka w prawo (Następny wpis)
                        echo "<a href='blog_full.php?id=" . $next_post_id . "' class='navigation-button right-arrow'><i class='fas fa-arrow-right'></i></a>";
                    }

                    echo "</div>";
                } else {
                    echo "Brak danych do wyświetlenia.";
                }

                // Zamknięcie prepared statement
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
