window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("scroll-to-top").style.display = "block";
            } else {
                document.getElementById("scroll-to-top").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

// Przewijanie do góry strony po naciśnięciu przycisku
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Nasłuchujemy zdarzenia scroll na oknie
window.addEventListener('scroll', function() {
    var bottomRightContainer = document.getElementById('scroll-to-top');
    var scrollPosition = window.innerHeight + window.scrollY;
    var bodyHeight = document.body.offsetHeight;

    // Jeśli użytkownik zjechał na sam dół strony
    if (scrollPosition >= bodyHeight) {
        bottomRightContainer.classList.add('move-up');
    } else {
        bottomRightContainer.classList.remove('move-up');
    }
});
