<div class="tiles">
    <?php
        // Tworzenie połączenia z bazą danych
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Sprawdzanie połączenia
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Zapytanie SQL do pobrania danych kafelków z uwzględnieniem daty dodania
        $sql = "SELECT image, title, note, link, size FROM tiles WHERE active = true";
        $result = $conn->query($sql);

        // Wyświetlanie kafelków
        if ($result->num_rows > 0) {
            // Wyświetlanie danych każdego wiersza
            while($row = $result->fetch_assoc()) {
                echo "<div class='tile " . $row['size'] . "'>";
                // Sprawdź, czy istnieje link
                if (!empty($row["link"])) {
                    echo "<a href='" . $row["link"] . "'>";
                }
                echo "<img src='" . $row["image"]. "' alt='" . $row["title"]. "'>";
                if (!empty($row["link"])) {
                    echo "</a>";
                }
                // echo "<p class='date-added'>" . $row["date_added"] . "</p>";
                echo "<h2>" . $row["title"]. "</h2>";
                echo "<p>" . $row["note"]. "</p>"; 
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
</div>
