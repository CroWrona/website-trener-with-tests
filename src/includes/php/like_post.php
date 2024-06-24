<?php
// Sprawdzenie, czy przesłano poprawne dane
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    // Rozpoczęcie sesji, aby przechować informacje o polubieniach użytkownika
    session_start();

    // Sprawdzenie, czy użytkownik już polubił ten wpis
    if (!isset($_SESSION['liked_posts']) || !in_array($post_id, $_SESSION['liked_posts'])) {
        // Utworzenie połączenia z bazą danych
        include_once "../../config/config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Zwiększenie liczby polubień dla danego wpisu
        $sql = "UPDATE blog_posts SET likes = likes + 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $post_id);

        if ($stmt->execute()) {
            // Zaktualizowano liczbę polubień pomyślnie
            echo json_encode(array("success" => true));

            // Dodanie wpisu do listy polubionych przez użytkownika
            $_SESSION['liked_posts'][] = $post_id;
        } else {
            // Wystąpił błąd podczas aktualizacji liczby polubień
            echo json_encode(array("success" => false, "error" => "Błąd podczas aktualizacji liczby polubień"));
        }

        // Zamknięcie połączenia z bazą danych
        $stmt->close();
        $conn->close();
    } else {
        // Użytkownik już polubił ten wpis
        echo json_encode(array("success" => false, "error" => "Możesz polubić ten wpis tylko raz"));
    }
} else {
    // Nieprawidłowe dane przesłane
    echo json_encode(array("success" => false, "error" => "Nieprawidłowe dane przesłane"));
}
?>
