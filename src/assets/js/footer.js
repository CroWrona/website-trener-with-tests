window.addEventListener('scroll', function() {
    var footer = document.getElementById('footer');
    var scrollPosition = window.innerHeight + window.scrollY;
    var bodyHeight = document.body.offsetHeight;

    if (scrollPosition >= bodyHeight) {
        footer.style.opacity = '1';
        footer.style.pointerEvents = 'auto';
    } else {
        footer.style.opacity = '0';
        footer.style.pointerEvents = 'none';
    }
});