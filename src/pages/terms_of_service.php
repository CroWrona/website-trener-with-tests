<?php
include_once "../config/config.php";

// Zapytanie SQL dla regulaminu
$sql_terms = "SELECT TermsText, LastUpdated FROM termsofservice ORDER BY LastUpdated DESC LIMIT 1";
$result_terms = $conn->query($sql_terms);

// Wyświetlanie danych
if ($result_terms->num_rows > 0) {
    // Wyświetlanie regulaminu
    $row_terms = $result_terms->fetch_assoc();
    echo "<h2>Regulamin (aktualizacja: " . $row_terms["LastUpdated"] . ")</h2>";
    echo "<p>" . $row_terms["TermsText"] . "</p>";
} else {
    echo "Brak danych dotyczących regulaminu";
}

// Zamykanie połączenia
$conn->close();
?>
