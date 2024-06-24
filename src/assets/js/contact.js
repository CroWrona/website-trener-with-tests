
// pojawienie sie dodatkowego pola inne
function showOtherGoalField() {
    var goalSelect = document.getElementById("goal");
    var otherGoalField = document.getElementById("otherGoalField");

    // Sprawdź, czy wybrany cel to "Inne"
    if (goalSelect.value === "other") {
        otherGoalField.style.display = "block";
    } else {
        otherGoalField.style.display = "none";
    }
}

//WYSLANIE FORMULARZA
document.addEventListener('DOMContentLoaded', function() {
    var quizForm = document.getElementById('quizForm');
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName('close')[0];

    quizForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobieganie domyślnej akcji przesłania formularza

        // Utworzenie obiektu FormData z danymi formularza
        var formData = new FormData(quizForm);

        // Wysłanie żądania AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit_contact.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Wyświetlenie komunikatu sukcesu
                    modal.style.display = 'block';
                } else {
                    // Obsługa błędów lub niepowodzenia
                    console.error('Wystąpił błąd podczas przetwarzania żądania.');
                }
            }
        };
        xhr.send(formData);
    });

    // Zamykanie modala po kliknięciu w przycisk "Zamknij"
    span.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Zamykanie modala po kliknięciu na obszarze poza modalem
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});

// pojawiesnie sie formularza po wyslaniu formularza
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("quizForm");
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    form.addEventListener("submit", function(event) {
        event.preventDefault(); 

        // Pokaż modal po wysłaniu formularza
        modal.style.display = "block";
    });

    // Zamknij modal po kliknięciu na przycisk zamykania (x)
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Zamknij modal po kliknięciu na obszar poza modalem
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});