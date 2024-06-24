document.addEventListener('DOMContentLoaded', function() {
    var likeForms = document.querySelectorAll('.like-comment-form');

    likeForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Zapobiegaj domyślnemu zachowaniu formularza

            var formData = new FormData(form);
            
            // Wyślij zapytanie AJAX do like_comment.php
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Pomyślnie polubiono komentarz
                    alert('Komentarz został polubiony');
                    // Możesz też zaktualizować licznik polubień bez przeładowania strony
                    var likeCount = form.querySelector('.like-count');
                    likeCount.textContent = parseInt(likeCount.textContent) + 1;
                } else {
                    // Nie udało się polubić komentarza
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Błąd:', error);
            });
        });
    });
});
