document.addEventListener('DOMContentLoaded', (event) => {
    const imageElement = document.getElementById('changeableImage');
    const images = [
        'imagejs1.jpeg',
        'imagejs2.jpeg',
        'imagejs3.jpeg',
        'imagejs4.jpeg',
        'imagejs5.webp',
        'imagejs6.webp'
    ];
    let currentIndex = 0;

    imageElement.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        imageElement.src = images[currentIndex];
    });
});