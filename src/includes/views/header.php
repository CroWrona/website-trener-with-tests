<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<header>
    <div class="logo">
        <h1>TRENER PERSONALNY</h1>
        <p>Tomasz II Demko</p>
    </div>

    <nav class="nav-links">
        <?php
            // Zapytanie SQL do pobrania aktywnych linków nawigacyjnych
            $sqlNavLinks = "SELECT title, path FROM nav_links WHERE active = 1";
            $resultNavLinks = $conn->query($sqlNavLinks);

            if ($resultNavLinks->num_rows > 0) {
                while ($rowNavLinks = $resultNavLinks->fetch_assoc()) {
                    $title = $rowNavLinks['title'];
                    $path = $rowNavLinks['path'];
                    
                    // Ustawienie klasy 'active' dla obecnej strony
                    $activeClass = ($currentPage == $path) ? 'active' : '';
                    
                    echo "<a href='$path' class='$activeClass'>$title</a>";
                }
            }
        ?>
    </nav>

    <div class="social-icons">
        <?php 
            // Pobierz ikony społecznościowe
            $sqlIcons = "SELECT icon, path FROM icon WHERE active = 1";
            $resultIcons = $conn->query($sqlIcons);

            if ($resultIcons->num_rows > 0) {
                while ($rowIcons = $resultIcons->fetch_assoc()) {
                    echo '<a href="' . htmlspecialchars($rowIcons["path"]) . '"><i class="' . htmlspecialchars($rowIcons["icon"]) . ' fa-2x text-black"></i></a>';
                }
            }
        ?>
    </div>
</header>
