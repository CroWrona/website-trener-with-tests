//header jest przezroczysty gdy zjedziemy w dol
window.addEventListener('scroll', function() {
    var header = document.querySelector('header');
        if (window.scrollY > 0) {
        // Dodaj klasę dla efektu przezroczystości
        header.classList.add('scrolled');
    } else {
        // Usuń klasę, jeśli przewijanie jest na górze
        header.classList.remove('scrolled');
    }
});

//po naciesnieciu przycisku przejdz do strony
    function redirectToMore() {
        window.location.href = 'o_mnie.php';
    }