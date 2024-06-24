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
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/blog.css">
    <link rel="stylesheet" href="../assets/css/button.css">
    <link rel="stylesheet" href="../assets/css/directions.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/contact.js"></script>
<script src="../assets/js/footer.js"></script>
<script src="../assets/js/directions.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<?php include_once "../config/config.php"; ?>

<?php include '../includes/views/header.php'; ?>

<form id="quizForm" action="submit_contact.php" method="POST">
    <div class="form-header">
        <h1>Masz pytania?</h1>
        <h2>Skontaktuj się ze mną</h2>
    </div>
    <label for="name">Imię:</label><br>
    <input type="text" id="name" name="name" required><br><br>
    <label for="age">Wiek:</label><br>
    <input type="number" id="age" name="age" required><br><br>
    <label for="gender">Płeć:</label><br>
    <select id="gender" name="gender" required>
        <option value="male">Mężczyzna</option>
        <option value="female">Kobieta</option>
    </select><br><br>
    <label for="goal">Twój cel zdrowotny:</label><br>
    <select id="goal" name="goal" onchange="showOtherGoalField()" required>
        <option value="lose_weight">Schudnąć</option>
        <option value="gain_weight">Przytyć</option>
        <option value="stay_healthy">Zdrowie i kondycja</option>
        <option value="other">Inne</option>
    </select><br><br>
    <div id="otherGoalField" style="display: none;">
        <label for="otherGoal">Inny cel:</label><br>
        <input type="text" id="otherGoal" name="otherGoal"><br><br>
    </div>
    <label for="contact">Kontakt (numer telefonu lub e-mail):</label>
    <input type="text" id="contact" name="contact" required><br><br>
    <p>
        Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z ustawą o ochronie danych osobowych oraz Rozporządzenia 2016/679. 
        Podanie danych jest dobrowolne, ale niezbędne do przetworzenia zapytania. Zostałem poinformowany, że przysługuje mi prawo dostępu do swoich danych,
        możliwości ich poprawiania, żądania zaprzestania ich przetwarzania. Administratorem danych osobowych jest STRONAWWW.COM
        Więcej informacji dot. ochrony danych osobowych znajdą Państwo w polityce prywatności. 
        Klikając WYŚLIJ akceptujesz wszystkie powyższe warunki.
    </p>
    <input type="submit" value="Wyślij">
</form>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Dziękujemy! Twój formularz został wysłany.</p>
        <p>Nasz trener personalny przeczyta Twoje zgłoszenie i skontaktuje się z Tobą wkrótce, aby omówić Twoje cele zdrowotne i odpowiedzieć na wszelkie pytania, jakie możesz mieć.</p>
        <p>Jeśli masz jakiekolwiek dodatkowe pytania lub chcesz uzyskać więcej informacji, prosimy o kontakt poprzez e-mail lub telefon podane na naszej stronie kontaktowej.</p>
        <p> Jeszcze raz dziękujemy za skorzystanie z naszych usług!</p>
    </div>
</div>

<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>

<div class="directions">
    <h2>Instrukcje dojazdu</h2>
    <p>Tutaj znajdziesz mapę oraz instrukcje dojazdu do miejsca, w którym odbywają się treningi.</p>
    <!-- Mapa Google Maps -->
    <div id="map"></div>
    <p>Zapraszamy do treningów! Aby umówić się na zajęcia lub uzyskać więcej informacji, skontaktuj się z nami przez e-mail: <a href="mailto:trener@przyklad.com">trener@przyklad.com</a></p>
    <p>Nasze zajęcia odbywają się na terenie SilowniaFit przy ulicy Sportowa 15. Zapraszamy!</p>
</div>


<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>

<?php include '../includes/views/footer.php'; ?>

<script>
    var currentStep = 1;

    function nextStep() {
        document.getElementById('step' + currentStep).style.display = 'none';
        currentStep = currentStep < 4 ? currentStep + 1 : currentStep;
        document.getElementById('step' + currentStep).style.display = 'block';
    }

    function prevStep() {
        document.getElementById('step' + currentStep).style.display = 'none';
        currentStep = currentStep > 1 ? currentStep - 1 : currentStep;
        document.getElementById('step' + currentStep).style.display = 'block';
    }
</script>

</body>
</html>
