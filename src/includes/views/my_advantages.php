<div class="container">
        <div class="grid-container">
            <?php
        // Tworzenie połączenia z bazą danych
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Sprawdzanie połączenia
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

                // Zapytanie SQL do pobrania aktywnych danych
                $sql = "SELECT emoticon, title, description FROM my_advantages WHERE active = 1";
                $result = $conn->query($sql);

                // Generowanie elementów na podstawie danych z bazy danych
                if ($result->num_rows > 0) {
                    // Wyświetlanie danych dla każdego wiersza
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="element">';
                        echo '<div class="emoticon">' . $row["emoticon"] . '</div>';
                        echo '<div class="title">' . $row["title"] . '</div>';
                        echo '<div class="description">' . $row["description"] . '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Brak aktywnych elementów";
                }

                // Zamknięcie połączenia z bazą danych
                $conn->close();
            ?>
        </div>
    </div>
