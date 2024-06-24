<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sprawdzamy czy komentarz nie jest pusty
    if(!empty($_POST['comment'])) {
        // Pobieramy dane z formularza
        $comment = $_POST['comment'];
        $post_id = $_POST['post_id'];

        // Tworzymy nowe połączenie z bazą danych
        include_once "../../config/config.php";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Sprawdzamy połączenie z bazą danych
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Przygotowujemy zapytanie SQL w celu dodania komentarza do bazy danych
        $sql = "INSERT INTO comments (post_id, comment_text) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $post_id, $comment);

        // Wykonujemy zapytanie
        if ($stmt->execute()) {
            echo "Komentarz dodany pomyślnie.";
        } else {
            echo "Błąd podczas dodawania komentarza: " . $conn->error;
        }

        // Zamykamy połączenie z bazą danych
        $stmt->close();
        $conn->close();
    } else {
        echo "Komentarz nie może być pusty.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>