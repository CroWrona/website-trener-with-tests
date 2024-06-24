<?php
include_once "../config/config.php";

// Zapytanie SQL dla polityki prywatności
$sql_privacy = "SELECT PolicyText, LastUpdated FROM privacypolicy ORDER BY LastUpdated DESC LIMIT 1";
$result_privacy = $conn->query($sql_privacy);

// Wyświetlanie danych
if ($result_privacy->num_rows > 0) {
    // Wyświetlanie polityki prywatności
    $row_privacy = $result_privacy->fetch_assoc();
    echo "<h2>Polityka prywatności (aktualizacja: " . $row_privacy["LastUpdated"] . ")</h2>";
    echo "<p>" . $row_privacy["PolicyText"] . "</p>";
} else {
    echo "Brak danych dotyczących polityki prywatności";
}

// Zamykanie połączenia
$conn->close();
?>
