document.getElementById('btn').addEventListener('click', function() {
    alert('compra realizada!');
});
document.addEventListener('DOMContentLoaded', () => {
    // Slider Functionality
    const slides = document.querySelector('.slides');
    const slideImages = slides.querySelectorAll('img');
    let index = 0;

    function showSlide(n) {
        index = (n + slideImages.length) % slideImages.length;
        slides.style.transform = `translateX(-${index * 100}%)`;
    }

    document.querySelector('.next').addEventListener('click', () => {
        showSlide(index + 1);
    });

    document.querySelector('.prev').addEventListener('click', () => {
        showSlide(index - 1);
    });

    // Cart Functionality
    const buttons = document.querySelectorAll('.product button');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const productName = button.getAttribute('data-name');
            const productPrice = button.getAttribute('data-price');
            alert(`¡Añadido al carrito!\n\nProducto: ${productName}\nPrecio: $${productPrice}`);
        });
    });
});
