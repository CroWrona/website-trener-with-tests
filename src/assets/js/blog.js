//przejscie do blog full
document.addEventListener('DOMContentLoaded', function() {
    var readMoreButtons = document.querySelectorAll('.btn-read-more');
    readMoreButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.stopPropagation(); 
            var fullContent = this.previousElementSibling;
            if (fullContent.classList.contains('full-content')) {
                var url = 'blog_single.php';
                window.location.href = url + '?id=' + this.dataset.id;
            }
        });
    });
});
