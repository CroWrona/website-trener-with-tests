<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <title>https://github.com/CroWrona</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link rel="stylesheet" href="../assets/css/directions.css">
    <link rel="stylesheet" href="../assets/css/faq.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/footer.js"></script>

<?php include_once "../config/config.php"; ?>

<?php include '../includes/views/header.php'; ?>

<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>

<?php

// Zapytanie SQL
$sql = "SELECT question, answer FROM faq WHERE active = 1";

// Wykonanie zapytania
$result = $conn->query($sql);

?>

<div class="faq">
    <h2>FAQ (Najczęściej Zadawane Pytania)</h2>
    <?php
    // Sprawdzenie czy zapytanie zwróciło wyniki
    if ($result->num_rows > 0) {
        // Wyświetlenie danych dla każdego wiersza z wyników zapytania
        while ($row = $result->fetch_assoc()) {
            echo "<div class='question'>";
            echo "<h3>" . $row['question'] . "</h3>";
            echo "<p>" . $row['answer'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "Brak wyników";
    }
    // Zamknięcie połączenia
    $conn->close();
    ?>
</div>

<div class="spacer"></div>
<div class="spacer"></div>

<?php include '../includes/views/footer.php'; ?>

</body>
</html>
