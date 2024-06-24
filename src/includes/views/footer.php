<?php
// Tworzenie połączenia z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Zapytanie SQL dla stopki strony
$sql_footer = "SELECT CompanyName, ContactEmail, PhoneNumber, TermsOfServiceLink, PrivacyPolicyLink FROM footerinfo ORDER BY LastUpdated DESC LIMIT 1";
$result_footer = $conn->query($sql_footer);

// Wyświetlanie danych
if ($result_footer->num_rows > 0) {
    // Wyświetlanie stopki strony
    $row_footer = $result_footer->fetch_assoc();
    echo '<footer id="footer">';
    echo '<div class="row">';
    echo '<div class="col">';
    echo '<p>' . $row_footer["CompanyName"] . '<a href="mailto:' . $row_footer["ContactEmail"] . '">' . $row_footer["ContactEmail"] . '</a> | Telefon: <a href="tel:' . $row_footer["PhoneNumber"] . '">' . $row_footer["PhoneNumber"] . '</a></p>';
    echo '</div>';
    echo '<div class="col text-right">';
    echo '<a href="' . $row_footer["TermsOfServiceLink"] . '">Regulamin</a> | <a href="' . $row_footer["PrivacyPolicyLink"] . '">Polityka prywatności</a>';
    echo '</div>';
    echo '</div>';
    echo '</footer>';
} else {
    echo '<footer id="footer">';
    echo '<div class="row">';
    echo '<div class="col">';
    echo '<p>Brak danych dotyczących stopki strony</p>';
    echo '</div>';
    echo '<div class="col text-right">';
    echo '<a href="terms_of_service.php">Regulamin</a> | <a href="privacy_policy.php">Polityka prywatności</a>';
    echo '</div>';
    echo '</div>';
    echo '</footer>';
}

// Zamykanie połączenia
$conn->close();
?>
