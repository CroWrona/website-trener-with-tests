<?php

// Zapytanie SQL do pobrania aktywnej dodatkowej zawartości
$sql = "SELECT image_url, description_title, description_text, path, side FROM additional_content WHERE active = 1";
$result = $conn->query($sql);

// Sprawdzenie, czy zapytanie zostało wykonane poprawnie
if ($result === false) {
    // Obsługa błędu zapytania
    echo "Błąd zapytania SQL: " . $conn->error;
} else {
    // Sprawdzenie, czy zwrócono jakiekolwiek wyniki
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Ustalenie klasy CSS na podstawie wartości pola 'side'
            $imageContainerClass = $row['side'] === 'left' ? 'half-content image-content left' : 'half-content image-content right';
            $textContainerClass = $row['side'] === 'left' ? 'half-content text-content right' : 'half-content text-content left';
            $textWrapClass = $row['side'] === 'right' ? 'text-wrap-right' : ''; // Dodajemy klasę tylko wtedy, gdy obrazek jest po prawej stronie

            echo "<div class='content-wrapper'>";
            echo "<div class='" . $imageContainerClass . "'>";
            echo "<img src='" . $row["image_url"] . "' alt='Opis obrazka'>";
            echo "</div>";
            echo "<div class='" . $textContainerClass . " " . $textWrapClass . "'>"; 
            echo "<h2>" . $row["description_title"] . "</h2>";
            echo "<p>" . $row["description_text"] . "</p>";

            // Sprawdź, czy istnieje ścieżka
            if (!empty($row["path"])) {
                echo "<a href='" . $row["path"] . "'><button class='btn-read-more'>Więcej o mnie</button></a>";
            }

            echo "</div>";
            echo "</div>";
        }
    } else {
        // Komunikat o braku aktywnej dodatkowej zawartości
        echo "Brak aktywnej dodatkowej zawartości.";
    }
}

// Zamknięcie połączenia z bazą danych
$conn->close();
?>
