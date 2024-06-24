<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../favicon/favicon.ico">
    <title>https://github.com/CroWrona</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/bottom_right_containder.css">
    <link rel="stylesheet" href="../assets/css/additional_content.css">
    <link rel="stylesheet" href="../assets/css/tile.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link rel="stylesheet" href="../assets/css/testimonials.css">
    <link rel="stylesheet" href="../assets/css/important_info.css">
    <link rel="stylesheet" href="../assets/css/my_advantages.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<script src="../assets/js/footer.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/bottomRightContainer.js"></script>
<script src="../assets/js/testimonials.js"></script>

    <?php include_once "../config/config.php"; ?>

    <?php include '../includes/views/header.php'; ?>
    
    <?php include '../includes/views/additional_content.php'; ?>

    <div class="important-info">
        <p>Ważne informacje</p>
    </div>

    <?php include '../includes/views/tile.php'; ?>

    <div class="important-info">
        <p>Co mnie wyróżnia?</p>
    </div>

    <?php include '../includes/views/my_advantages.php'; ?>

    <div class="important-info">
        <p>Opinie Klientów</p>
    </div>

    <?php include '../includes/views/testimonials.php'; ?>

    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <div class="spacer"></div>

    <?php include '../includes/views/bottomRightContainer.php'; ?>

    <?php include '../includes/views/footer.php'; ?>
    
</body>
</html>
