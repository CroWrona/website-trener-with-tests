document.getElementById('commentForm').addEventListener('submit', function (event) {
    event.preventDefault(); 
    var form = event.target;
    var formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
});