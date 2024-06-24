<?php

// Sprawdzenie, czy przesłano poprawne dane
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];

    // Rozpoczęcie sesji, aby przechować informacje o polubieniach użytkownika
    session_start();

    // Sprawdzenie, czy użytkownik już polubił ten komentarz
    if (!isset($_SESSION['liked_comments']) || !in_array($comment_id, $_SESSION['liked_comments'])) {
        // Utworzenie połączenia z bazą danych
        include_once "../../config/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Zwiększenie liczby polubień dla danego komentarza
        $sql = "UPDATE comments SET likes = likes + 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $comment_id);

        if ($stmt->execute()) {
            // Zaktualizowano liczbę polubień pomyślnie
            echo json_encode(array("success" => true));

            // Dodanie komentarza do listy polubionych przez użytkownika
            $_SESSION['liked_comments'][] = $comment_id;
        } else {
            // Wystąpił błąd podczas aktualizacji liczby polubień
            echo json_encode(array("success" => false, "error" => "Błąd podczas aktualizacji liczby polubień"));
        }

        // Zamknięcie połączenia z bazą danych
        $stmt->close();
        $conn->close();
    } else {
        // Użytkownik już polubił ten komentarz
        echo json_encode(array("success" => false, "error" => "Możesz polubić ten komentarz tylko raz"));
    }
} else {
    // Nieprawidłowe dane przesłane
    echo json_encode(array("success" => false, "error" => "Nieprawidłowe dane przesłane"));
}
?>
