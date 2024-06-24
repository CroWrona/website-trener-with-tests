//zamkniecie
function closeMessage() {
    var bottomRightContainer = document.getElementById('bottomRightContainer');
    bottomRightContainer.style.opacity = '0';
    setTimeout(function() {
        bottomRightContainer.style.display = 'none';
    }, 500);
}

//gdy zjedziemy na sam dol .bottom-right-content wskoczy wyzej
window.addEventListener('scroll', function() {
    var bottomRightContainer = document.getElementById('bottomRightContainer');
    var scrollPosition = window.innerHeight + window.scrollY;
    var bodyHeight = document.body.offsetHeight;

    if (scrollPosition >= bodyHeight) {
        bottomRightContainer.classList.add('move-up');
    } else {
        bottomRightContainer.classList.remove('move-up');
    }
});

//pojawienie sie widgetu
document.addEventListener("DOMContentLoaded", function() {
    var bottomRightContainer = document.getElementById("bottomRightContainer");
    if (bottomRightContainer) {
        setTimeout(function() {
            bottomRightContainer.style.opacity = "1";
            bottomRightContainer.classList.remove('hidden');
        }, 1000); // Opóźnienie 1 sekundy

        bottomRightContainer.style.opacity = "0"; // Ustawienie początkowej przezroczystości na 0
    }
});
