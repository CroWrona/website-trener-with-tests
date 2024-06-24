<?php
// Dane do połączenia z bazą danych
include_once "config/config.php";

// Sprawdzenie czy dane formularza zostały przesłane
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pobranie i filtrowanie danych z formularza
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    //ograniczenia zdrowotne
    //czy interesuje cie wsparcie dieteyczne 
    $goal = filter_input(INPUT_POST, 'goal', FILTER_SANITIZE_STRING);
    $otherGoal = filter_input(INPUT_POST, 'otherGoal', FILTER_SANITIZE_STRING);
    $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);

    // Przygotowanie zapytania SQL z użyciem przygotowanych instrukcji
    $stmt = $conn->prepare("INSERT INTO contact_data (name, age, gender, goal, other_goal, contact) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $name, $age, $gender, $goal, $otherGoal, $contact);

    // Wykonanie zapytania
    if ($stmt->execute()) {
        // Komunikat o pomyślnym wysłaniu formularza
        echo "Dziękujemy! Formularz został wysłany. Trener skontaktuje się z Tobą.";
    } else {
        // Komunikat o błędzie podczas wysyłania formularza
        echo "Wystąpił błąd podczas wysyłania formularza.";
    }

    // Zamknięcie połączenia
    $stmt->close();
    $conn->close();
}
?>
