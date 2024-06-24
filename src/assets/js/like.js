document.addEventListener('DOMContentLoaded', function() {
    var likeForms = document.querySelectorAll('.like-form');

    likeForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Zapobiegaj domyślnemu zachowaniu formularza

            var formData = new FormData(form);
            
            // Wyślij zapytanie AJAX do like_post.php
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Pomyślnie polubiono wpis
                    //alert('Wpis został polubiony');
                    location.reload(); // Przeładuj stronę, aby zobaczyć aktualną liczbę polubień
                } else {
                    // Nie udało się polubić wpisu
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Błąd:', error);
            });
        });
    });
});