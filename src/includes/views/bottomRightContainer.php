<div class="bottom-right-container" id="bottomRightContainer">
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqlMessage = "SELECT message_title, message_content, button_text, button_link, image_link FROM bottom_right_message WHERE active = 1";
    $resultMessage = $conn->query($sqlMessage);

    if ($resultMessage->num_rows > 0) {
        $rowMessage = $resultMessage->fetch_assoc();
    ?>
    <div class="bottom-right-content" style="background-image: <?php echo $rowMessage['image_link'] ? 'url(' . htmlspecialchars($rowMessage['image_link']) . ')' : 'linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3))'; ?>">
        <button class="close-button" onclick="closeMessage()">X</button>
        <p><?php echo htmlspecialchars($rowMessage["message_title"]); ?></p>
        <p><?php echo htmlspecialchars($rowMessage["message_content"]); ?></p>
        <a href="<?php echo htmlspecialchars($rowMessage["button_link"]); ?>" class="btn btn--primary contact-button"><?php echo htmlspecialchars($rowMessage["button_text"]); ?></a>
    </div>
    <div class="message-icons">
        <?php
        $sqlIcons = "SELECT icon, path FROM icon WHERE active = 1";
        $resultIcons = $conn->query($sqlIcons);

        if ($resultIcons->num_rows > 0) {
            while ($rowIcons = $resultIcons->fetch_assoc()) {
                echo '<a href="' . htmlspecialchars($rowIcons["path"]) . '" class="message-icon hidden"><i class="' . htmlspecialchars($rowIcons["icon"]) . '"></i></a>';
            }
        }
        ?>
    </div>
    <?php
    }
    $conn->close();
    ?>


</div>
