document.addEventListener("DOMContentLoaded", function() {
    const testimonials = document.querySelectorAll('.testimonial');
    let currentTestimonialIndex = 0;

    function showTestimonial(index) {
        testimonials.forEach(testimonial => {
            testimonial.classList.remove('active');
        });
        testimonials[index].classList.add('active');
    }

    showTestimonial(currentTestimonialIndex);

    document.querySelector('.next').addEventListener('click', function() {
        currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
        showTestimonial(currentTestimonialIndex);
    });

    document.querySelector('.prev').addEventListener('click', function() {
        currentTestimonialIndex = (currentTestimonialIndex - 1 + testimonials.length) % testimonials.length;
        showTestimonial(currentTestimonialIndex);
    });
});
